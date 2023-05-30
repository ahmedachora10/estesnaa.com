<?php

namespace App\View\Components\Notifications;

use App\Notifications\NewUser as NotificationsNewUser;
use Illuminate\View\Component;

class NewUser extends Component
{
    public $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $notification)
    {
        $this->type = $this->notification->type == NotificationsNewUser::class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.notifications.new-user');
    }
}
