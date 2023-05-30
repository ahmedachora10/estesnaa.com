<?php

namespace App\View\Components\Notifications;

use App\Notifications\StoreServiceNotification;
use Illuminate\View\Component;

class StoreService extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $notification)
    {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.notifications.store-service');
    }
}
