<?php

namespace App\Http\Livewire\Dashboard;

use App\Casts\Status;
use App\Models\Subscription;
use Livewire\Component;
use Livewire\WithPagination;

class SubscriptionsContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updateStatus(Subscription $subscription)
    {
        if($subscription) {
            $subscription->update(['status' => $subscription->status->value == Status::ENABLED->value ? Status::DISABLED->value : Status::ENABLED->value]);
        }
    }

    public function destroy(Subscription $subscription)
    {
        if($subscription) {
            $subscription->delete();
            session()->flash('success', trans('message.delete'));
        }
    }

    public function render()
    {
        return view('livewire.dashboard.subscriptions-container', [
            'subscriptions' => Subscription::with(['user', 'package'])->latest()->paginate(setting('pagination'))
        ]);
    }
}