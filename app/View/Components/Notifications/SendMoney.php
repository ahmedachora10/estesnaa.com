<?php

namespace App\View\Components\Notifications;

use App\Notifications\SendUserMoney;
use Illuminate\View\Component;

class SendMoney extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $notification, public $checkType = false)
    {
        $this->checkType = $this->notification->type == SendUserMoney::class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.notifications.send-money');
    }
}