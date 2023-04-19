<?php

namespace App\Http\Livewire\Dashboard;

use App\Casts\UserWithdrawalRequestType;
use App\Models\UserWithdrawalRequest;
use App\Notifications\SendUserMoney;
use Livewire\Component;
use Livewire\WithPagination;

class WithdrawalRequestsContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updateStatus(UserWithdrawalRequest $request, $type)
    {
        if($request) {
            $request->update(['status' => $type]);

            if($type == UserWithdrawalRequestType::COMPLETED->value) {
                $request->user->notify(new SendUserMoney([
                    'title' => 'تم تحويل ' . $request->amount . '$ الى حسابك بنجاح.',
                    'content' => ''
                ]));
                $this->send($request);
            }
        }
    }

    private function send($request)
    {
        $paypalPaymentUrl = 'https://www.paypal.com/cgi-bin/webscr';
        $paypalParams = [
            'cmd' => '_xclick',
            'business' => $request->email,
            'currency_code' => 'USD',
            'amount' => $request->amount,
            'item_name' => $request->user->name,
            'return' => route('payment.direct'),
            'cancel_return' => route('payment.direct'),
        ];
        $paypalPaymentUrl .= '?' . http_build_query($paypalParams);

        return redirect()->away($paypalPaymentUrl);
    }

    public function render()
    {
        return view('livewire.dashboard.withdrawal-requests-container', [
            'requests' => UserWithdrawalRequest::with('user')->orderBy('status')->paginate(setting('pagination')),
            'types' => UserWithdrawalRequestType::cases()
        ]);
    }
}
