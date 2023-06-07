<?php

namespace App\Http\Livewire\Dashboard;

use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class NotificationsContainer extends Component
{
    use WithPagination;

    protected $listeners = ['makeItRead'];

    protected $paginationTheme = 'bootstrap';

    public $view = 'dashboard.notifications-card-container';

    public function mount($view = 'dashboard.notifications-card-container')
    {
        $this->view = $view;
        auth()->user()->unreadNotifications->markAsRead();
    }

    public function makeItRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
    }

    public function render()
    {
        $notifications = collect([]);

        if($this->view == 'dashboard.notifications-card-container') {
            $notifications = auth()->user()->notifications()->latest()->take(8)->get();
        } else {
            $notifications = auth()->user()->notifications()->latest()->paginate(setting('pagination'));
        }

        return view('livewire.'.$this->view, [
            'notifications' => $notifications
        ]);
    }
}
