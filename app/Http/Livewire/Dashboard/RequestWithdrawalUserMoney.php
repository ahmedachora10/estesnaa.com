<?php

namespace App\Http\Livewire\Dashboard;

use App\Casts\UserActivityType;
use App\Models\UserBankActivity;
use App\Models\UserProfit;
use App\Models\UserWithdrawalRequest;
use Livewire\Component;

class RequestWithdrawalUserMoney extends Component
{

    public UserProfit $userProfit;

    public $email;
    public $amount;

    public function mount()
    {
        $this->userProfit = auth()->user()->profit;
        $this->amount = $this->userProfit->total;
    }

    public function save()
    {
        // dd($this->amount, $this->email);
        $this->validate([
            'amount' => [
                'required',
                function ($attribute, $value, $fail) {
                    // Add custom validation logic here
                    if ($value > $this->userProfit->total) {
                        $fail('المبلغ المطلوب غير متوفر في حسابك!');
                    }
                }
            ],
            'email' => 'required|email'
        ]);

        // Save a request
        UserWithdrawalRequest::create([
            'user_id' => auth()->id(),
            'email' => $this->email,
            'amount' => $this->amount
        ]);

        $this->userProfit->total -= $this->amount;
        $this->userProfit->save();

        UserBankActivity::create([
            'user_id' => auth()->id(),
            'activity_type' => UserActivityType::PULL,
            'amount' => $this->amount
        ]);

        $this->dispatchBrowserEvent('toast', ['title' => 'تم ارسال طلبك بنجاح', 'content' => ' سيتم معالجة الطلب خلال 24 ساعة', 'updatedAmount' => $this->userProfit->total]);

    }

    public function render()
    {
        return view('livewire.dashboard.request-withdrawal-user-money');
    }
}