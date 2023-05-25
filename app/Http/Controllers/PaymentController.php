<?php

namespace App\Http\Controllers;

use App\Casts\Stage;
use App\Casts\Status;
use App\Casts\UserActivityType;
use App\Models\Chat;
use App\Models\Invention;
use App\Models\InventionOrder;
use App\Models\Package;
use App\Models\PendingBalance;
use App\Models\PlatformPendingBalance;
use App\Models\PlatformProfitBalance;
use App\Models\Service;
use App\Models\ServiceOrder;
use App\Models\ServiceStage;
use App\Models\Subscription;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserBankActivity;
use App\Models\UserProfit;
use App\Notifications\SendUserMoney;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Omnipay\Omnipay;

class PaymentController extends Controller
{
    private $geteway;

    public function __construct() {
        $this->geteway = Omnipay::create('PayPal_Rest');
        $this->geteway->setClientId(setting('paypal_client_id'));
        $this->geteway->setSecret(setting('paypal_client_secret'));
        $this->geteway->setTestMode(!setting('paypal_live_mode'));
    }

    public function pay(Request $request, Package $package)
    {
        abort_if($package->status->value == Status::DISABLED->value,404);

        $isServiceProvider = auth()->user()->role == 'service_provider';

        if($package->amount == 0 && $package->group != 'service_provider' && !$isServiceProvider) {
            $this->saveSubscription($package);

            return redirect()->route('payment.success');
        }elseif($package->amount == 0 && ($isServiceProvider || auth()->user()->role == 'inventor') && $package->group == 'service_provider') {
            $done = DB::transaction(function () use($package)
            {
                $this->saveSubscription($package);

                $user = User::find(auth()->id());
                $user->service_provider_subscription_paid = true;
                $user->save();
                return true;
            });

            return redirect()->route($done ? 'services.create' : 'payment.cancel');
        }

        try {
            $response = $this->geteway->purchase([
                'amount' => $package->amount,
                'currency' => 'USD',
                'returnUrl' => route('payment.success'),
                'cancelUrl' => route('payment.cancel'),
            ])->send();

            if($response->isRedirect()) {
                if(!$isServiceProvider) {
                    session()->put('packageID', $package->id);
                }
                return $response->redirect();
            } else {
                return $response->getMessage();
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function inventionOrderPayment(Invention $invention)
    {
        abort_if($invention->status->value == Status::DISABLED->value, 404);


        try {
            $response = $this->geteway->purchase([
                'amount' => $invention->original_price,
                'currency' => 'USD',
                'returnUrl' => route('payment.success'),
                'cancelUrl' => route('payment.cancel'),
            ])->send();

            if($response->isRedirect()) {
                session()->put('inventionID', $invention->id);
                return $response->redirect();
            } else {
                return $response->getMessage();
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function serviceOrderPayment(Service $service)
    {
        abort_if($service->status->value == Status::DISABLED->value, 404);

        if($service->price == 0) {
            return back();
        }

        try {
            $response = $this->geteway->purchase([
                'amount' => $service->price,
                'currency' => 'USD',
                'returnUrl' => route('payment.success'),
                'cancelUrl' => route('payment.cancel'),
            ])->send();

            if($response->isRedirect()) {
                session()->put('serviceID', $service->id);
                return $response->redirect();
            } else {
                return $response->getMessage();
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function success(Request $request)
    {
        if($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->geteway->completePurchase([
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ])->send();

            if($transaction->isSuccessful()) {
                $data = $transaction->getData();
                DB::transaction(function () use($data)
                {

                    // TODO: when buy service & save user profit, take platform percentage profit

                    $transaction = $this->saveTransaction($data);
                    if($transaction !== false) {
                        if(session()->exists('packageID')) {
                            $package = Package::find(session('packageID'));

                            if($package) {
                                $this->saveSubscription($package);
                            }

                            session()->remove('packageID');
                        } elseif(in_array(auth()->user()->role, ['service_provider', 'inventor']) && !session()->exists('inventionID')) {
                            $user = User::find(auth()->id());
                            $user->service_provider_subscription_paid = true;
                            $user->save();
                        } elseif(session()->exists('inventionID')) {
                            $invention = Invention::find(session()->get('inventionID'));

                            if($invention) {
                                InventionOrder::create([
                                    'buyer_id' => auth()->id(),
                                    'transaction_id' => $transaction->id,
                                    'invention_id' => $invention->id,
                                    'amount' => $transaction->amount
                                ]);

                                $userProfit = UserProfit::where('user_id', $invention->user_id)->first();

                                if(!$userProfit) {
                                    $userProfit = new UserProfit();
                                    $userProfit->user_id = $invention->user_id;
                                }
                                $userProfit->total += $transaction->amount;
                                $userProfit->save();


                                UserBankActivity::create([
                                    'user_id' => $invention->user_id,
                                    'activity_type' => UserActivityType::RECEIVED,
                                    'amount' => $transaction->amount
                                ]);

                                session()->remove('inventionID');
                            }
                        }elseif(session()->exists('serviceID')) {
                            $service = Service::find(session()->get('serviceID'));

                            if($service) {
                                ServiceOrder::create([
                                    'buyer_id' => auth()->id(),
                                    'transaction_id' => $transaction->id,
                                    'service_id' => $service->id,
                                    'service_provider_id' => $service->user_id,
                                    'amount' => $transaction->amount
                                ]);

                                // PendingBalance::create(['user_id' => $service->user_id, 'amount' => calc_service_provider_profit($transaction->amount)]);

                                // PlatformProfitBalance::create(['service_id' => $service->id, 'amount' => calc_platform_profit($transaction->amount)]);

                                $userProfit = UserProfit::firstWhere('user_id', $service->user_id);

                                if(!$userProfit) {
                                    $userProfit = new UserProfit();
                                    $userProfit->user_id = $service->user_id;
                                    $userProfit->total = 0;
                                    $userProfit->save();
                                }

                                // Add amount to pending balance untill receipt serevice
                                PlatformPendingBalance::create([
                                    'user_id' => auth()->id(),
                                    'amount' => $transaction->amount,
                                    'is_service_provider_received_money' => false
                                ]);

                                $service_stage = ServiceStage::create([
                                    'buyer_id' => auth()->id(),
                                    'service_id' => $service->id,
                                    'stage' => Stage::IMPLEMENT
                                ]);

                                // UserBankActivity::create([
                                //     'user_id' => $service->user_id,
                                //     'activity_type' => UserActivityType::RECEIVED,
                                //     'amount' => calc_service_provider_profit($transaction->amount)
                                // ]);

                                if(!Chat::firstWhere([
                                    ['service_provider_id', '=', $service->user_id],
                                    ['service_id', '=', $service->id],
                                    ['user_id', '=', auth()->id()],
                                    ['deal_id', '=', null],
                                ])) {
                                    Chat::create([
                                        'service_provider_id' => $service->user_id,
                                        'service_id' => $service->id,
                                        'user_id' => auth()->id(),
                                        'deal_id' => $service_stage->id,
                                    ]);
                                }

                                $service_stage->service->owner->notify(new SendUserMoney([
                                    'title' => "مبروك! تم اختيارك للعمل على المشروع <a href='".route('front.services.stage.index', $service_stage)."'>{$service_stage->service->name}</a>",
                                    'content' => ''
                                ]));

                                session()->remove('serviceID');
                            }
                        }
                    }

                });
            }
        }
        return view('payment.success');
    }

    public function cancel(Request $request)
    {
        return view('payment.cancel');
    }

    private function saveTransaction(array $data)
    {
        if(Transaction::where("payment_id", $data['id'])->first()) return false;
        return Transaction::create([
            'user_id' => auth()->id(),
            'payment_id' => $data['id'],
            'payer_id' => $data['payer']['payer_info']['payer_id'],
            'amount' => $data['transactions'][0]['amount']['total'],
            'status' => $data['state'],
            'payment_method' => $data['payer']['payment_method'],
        ]);
    }

    public function saveSubscription(Package $package)
    {
        $oldSubs = Subscription::where('user_id', auth()->id());
        if($oldSubs->count() > 0) {
            $oldSubs->update(['status' => Status::DISABLED->value]);
        }

        return Subscription::create([
            'user_id' => auth()->id(),
            'plan_id' => $package->id,
            'amount' => $package->amount,
            'start_date' => now(),
            'end_date' => now()->addDays($package->duration)
        ]);
    }

    public function direct()
    {
        dd(request());
    }

}