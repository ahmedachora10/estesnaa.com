<?php

namespace App\View\Components\Notifications;

use Illuminate\View\Component;

class Item extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $notification, public $type, public $icon = 'cube-alt', public $bg = 'warning')
    {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.notifications.item');
    }
}
