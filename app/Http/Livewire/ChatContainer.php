<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use App\Models\Message;
use Livewire\Component;

class ChatContainer extends Component
{

    public $message;

    public $chat;

    public $view;

    protected $rules = [
        'message' => 'required|string'
    ];

    public function mount($chat, $view = 'livewire.chat.front.chat-container')
    {
        $this->chat = $chat;
        $this->view = $view;
    }

    public function save()
    {
        // if(!$this->image) {
            // } else {
                //     $this->upload();
                // }
        $this->validate();

        $newMessage = Message::create([
            'chat_id' => $this->chat->id,
            'user_id' => auth()->id(),
            'content' => $this->message,
        ]);

        if($newMessage) {
            $chat = $this->chat;//Chat::find($this->chat);

            $chat->touch();

            // Assign sender & receiver
            $sender = $chat->service_provider_id == auth()->id() ? $chat->serviceProvider : $chat->user;
            $receiver = $chat->service_provider_id != auth()->id() ? $chat->serviceProvider : $chat->user;

            // Send real time notification 'Pusher'
            // Notification::send($chat->service_provider_id != auth()->id() ? $chat->serviceProvider : $chat->user, new NewMessageNotification($receiver ,$sender, $this->message, $this->chat));
        }

        $this->reset('message');

    }

    // public function upload()
    // {
    //     $this->validate(['image' => 'required|image']);

    //     $path = str_replace('public', 'storage', $this->image->storeAs('public/images/chat', date('Y-m-d') . str()->random(3) . '.' . $this->image->extension()));

    //     $this->message = $path;

    //     $this->reset('image');
    // }

    public function render()
    {
        return view($this->view, [
            'chat' => $this->chat->load('messages')
        ]);
    }
}