<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class EventsContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $user = auth()->user();
        $events = [];

        if($user->role == 'admin') {
            $events = Event::with(['category', 'owner'])->latest()->paginate(setting('pagination'));
        } elseif($user->role == 'event') {
            $events = $user->events()->with('category')->latest()->paginate(setting('pagination'));
        }

        return view('livewire.dashboard.events-container', [
            'events' => $events
        ]);
    }
}
