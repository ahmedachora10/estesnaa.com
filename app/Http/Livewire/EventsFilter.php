<?php

namespace App\Http\Livewire;

use App\Casts\Status;
use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class EventsFilter extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $categories = [];
    public $usersEeventsStatistics = [];
    public $search = '';

    public function mount()
    {
        $this->categories = Category::eventsSection()->withCount('events')->get();
        $this->usersEeventsStatistics = User::withCount('events')->whereHas('events', function ($query)
        {
            $query->active();
        })->where('role', 'event')->get();
    }

    public function filter()
    {
        return $this->search;
    }

    public function render()
    {
        return view('livewire.events-filter', [
            'events' => Event::active()->where(function ($query)
            {
                $query->where('title', 'like', "%{$this->filter()}%")
                ->orWhere('description', 'like', "%{$this->filter()}%")
                ->orWhere('address', 'like', "%{$this->filter()}%");
            })->latest()->paginate(setting('pagination'))
        ]);
    }
}