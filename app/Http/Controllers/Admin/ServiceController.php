<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Http\Requests\Admin\Service\StoreServiceRequest;
use App\Http\Requests\Admin\Service\UpdateServiceRequest;
use App\Models\Category;
use App\Models\User;
use App\Notifications\StoreServiceNotification;
use App\Utils\UploadImage;
use Illuminate\Support\Facades\Notification;

class ServiceController extends Controller
{
    use UploadImage;

    public function __construct() {
        $this->middleware('has.plan')->only('create', 'edit');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.services.index');
    }

    public function restore()
    {
        return view('admin.services.restores');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::servicesSection()->latest()->get();
        return view('admin.services.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\Service\StoreServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        $request->validated();

        $service = Service::create($request->safe()->except('image') + $this->saveImage($request->image) + ['user_id' => auth()->id()]);


        Notification::send(User::whereRoleIs('admin')->get(), new StoreServiceNotification([
            'title' => 'خدمة جديدة',
            'content' => 'تم اضافة خدمة من قبل ' . $service->owner->name
        ]));

        return redirect()->route('services.index')->with('success', 'تم اضافة الخدمة بنجاح. المرجو انتظار مراجعة الخدمة من قبل الادارة');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $categories = Category::servicesSection()->latest()->get();
        return view('admin.services.edit', compact('service', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\Service\UpdateServiceRequest  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $request->validated();

        $data = [];

        if($request->exists('image') && $request->image != null) {
            $this->removeImage($service->image);
            $data = $this->saveImage($request->image);
        }

        $service->update($request->safe()->except('image') + $data + ['user_id' => auth()->id()]);

        return redirect()->route('services.index')->with('success', trans('message.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        // if($service->image){
        //     $this->removeImage($service->image);
        // }

        $service->delete();

        return redirect()->route('services.index')->with('success', trans('message.delete'));
    }
}
