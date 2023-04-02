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
        return view('livewire.dashboard.events-container', [
            'events' => Event::with('category')->latest()->paginate(setting('pagination'))
        ]);
    }
}