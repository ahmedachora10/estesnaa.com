<?php

namespace App\Http\Controllers;

use App\Casts\Status;
use App\Models\Package;
use App\Models\Subscription;
use App\Models\Transaction;
use App\Models\User;
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

        if($package->amount == 0 && !$isServiceProvider) {
            $this->saveSubscription($package);
            return redirect()->route('payment.success');
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
                    if($this->saveTransaction($data) !== false) {
                        if(session()->exists('packageID')) {
                            $package = Package::find(session('packageID'));

                            if($package) {
                                $this->saveSubscription($package);
                            }

                            session()->remove('packageID');
                        } elseif(auth()->user()->role == 'service_provider') {
                            $user = User::find(auth()->id());
                            $user->service_provider_subscription_paid = true;
                            $user->save();
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

}