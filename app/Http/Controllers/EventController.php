<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('front.events.index');
    }

    public function show(Event $event)
    {
        $event->increment('views');
        return view('front.events.show', compact('event'));
    }
}
