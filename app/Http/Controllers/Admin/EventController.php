<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Http\Requests\Admin\Event\StoreEventRequest;
use App\Http\Requests\Admin\Event\UpdateEventRequest;
use App\Models\Category;
use App\Models\User;
use App\Notifications\StoreEvent;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{

    public function __construct() {
        $this->middleware('has.plan')->only('create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.events.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::eventsSection()->get();

        return view('admin.events.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\Event\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        $request->validated();

        $event = Event::create($request->safe()->except('image') + $this->saveImage($request->image) + ['user_id' => auth()->id()]);

        Notification::send(User::whereRoleIs('admin')->get(), new StoreEvent([
            'title' => 'فعالية جديدة',
            'content' => 'تم اضافة فعالية جديدة من قبل ' . $event->owner->name,
            'link' => route('events.index')
        ]));

        return redirect()->route('events.index')->with('success', 'تم اضافة الفعالية بنجاح. المرجو انتظار مراجعة الفعالية من قبل الادارة');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        if(auth()->user()->role != 'admin') {
            abort_if(auth()->user()->role == 'event' && auth()->id() != $event->user_id, 404);
        }

        $categories = Category::eventsSection()->get();

        return view('admin.events.edit', compact('categories', 'event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\Event\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        if(auth()->user()->role != 'admin') {
            abort_if(auth()->user()->role == 'event' && auth()->id() != $event->user_id, 404);
        }

        $request->validated();

        $data = [];

        if($request->exists('image') && $request->image != null) {
            $this->removeImage($event->image);
            $data = $this->saveImage($request->image);
        }

        $event->update($request->safe()->except('image') + $data);

        return redirect()->route('events.index')->with('success', trans('message.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $this->removeImage($event->image);

        $event->delete();

        return redirect()->route('events.index')->with('success', trans('message.delete'));
    }

    private function removeImage($image)
    {
        $image = str_replace('storage', 'public', $image);

        if(Storage::exists($image)) {
            return Storage::delete($image);
        }

        return false;
    }


    private function saveImage($image)
    {
        $image_full_path = $image->storeAs('public/images/events', date('Y-m-d') . auth()->id() . str()->random(8) . '.' . $image->extension());

        return ['image' => str_replace('public', 'storage', $image_full_path)];
    }
}
