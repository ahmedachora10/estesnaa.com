<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function chat(Chat $chat)
    {
        abort_if($chat->user_id != auth()->id() && $chat->service_provider_id != auth()->id(), 404);

        if($chat->deal_id != null) {
            return redirect()->route('front.services.stage.index', $chat->deal_id);
        }

        $chat->load(['user','serviceProvider', 'service']);

        $chat->messages()->where('user_id', '!=', auth()->id())->update(['seen' => now()]);

        return view('front.chat.index', compact('chat'));
    }

    public function newChat(User $service_provider, Service $service)
    {
        abort_if($service_provider->role != 'service_provider' && $service->user_id != $service_provider->id, 404);

        if($chatExists = Chat::firstWhere([
            ['service_provider_id', '=', $service_provider->id],
            ['user_id', '=', auth()->id()],
            ['service_id', '=', $service->id],
            ['deal_id', '=', null],
        ])){
            return redirect()->route('chat.index', $chatExists);
        }

        $chat = Chat::create([
            'service_provider_id' => $service_provider->id,
            'user_id' => auth()->id(),
            'service_id' => $service->id,
        ]);

        return redirect()->route('chat.index', $chat);
    }
}