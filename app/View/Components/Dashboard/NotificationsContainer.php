<?php

namespace App\View\Components\Dashboard;

use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class NotificationsContainer extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $notifications = null, public $unreadNotifications = 0)
    {
        $this->notifications = auth()->user()->notifications()->latest()->take(8)->get();
        $this->unreadNotifications = collect($this->notifications)->whereNull('read_at')->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.notifications-container');
    }
}