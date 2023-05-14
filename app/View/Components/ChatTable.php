<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class ChatTable extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $chat = [])
    {
        $this->chat = auth()->user()->chat()->with(['lastMessage', 'serviceProvider', 'user'])->orderByDesc('updated_at')->get() ?? [];
        // dd(auth()->user()->messages);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.chat-table');
    }
}