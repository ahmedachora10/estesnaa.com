<?php

namespace App\Http\Livewire\Dashboard;

use App\Casts\Status;
use App\Models\Category;
use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class EventsContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $userPlan = null;

    public function mount()
    {
        $this->userPlan = auth()->user()->plan;
    }

    public function updateStatus(Event $event)
    {
        if($event) {
            $event->update(['status' => Status::DISABLED->value == $event->status->value ? Status::ENABLED->value : Status::DISABLED->value]);
        }
    }

    public function render()
    {
        $user = auth()->user();
        $events = [];

        if($user->role == 'admin') {
            $events = Event::with(['category', 'owner'])->latest()->paginate(setting('pagination'));
        } elseif(in_array($user->role, ['event', 'inventor'])) {
            $events = $user->events()->with('category')->latest()->paginate(setting('pagination'));
        }

        return view('livewire.dashboard.events-container', [
            'events' => $events
        ]);
    }
}