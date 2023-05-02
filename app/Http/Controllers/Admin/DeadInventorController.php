<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDeadInventorRequest;
use App\Models\DeadInventor;
use App\Utils\UploadImage;
use Illuminate\Http\Request;

class DeadInventorController extends Controller
{
    use UploadImage;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.deceased-inventors.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.deceased-inventors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeadInventorRequest $request)
    {
        $request->validated();
        DeadInventor::create($request->safe()->only(['name', 'description']) + $this->saveImage($request->image, 'inventors/deceased'));

        return redirect()->route('deceased.index')->with('success', trans('message.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeadInventor  $deceased
     * @return \Illuminate\Http\Response
     */
    public function show(DeadInventor $deceased)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeadInventor  $deceased
     * @return \Illuminate\Http\Response
     */
    public function edit(DeadInventor $deceased)
    {
        return view('admin.deceased-inventors.edit', compact('deceased'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DeadInventor  $deceased
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDeadInventorRequest $request, DeadInventor $deceased)
    {
        $request->validated();

        $image = [];

        if($request->exists('image') && $request->image != null) {
            $this->removeImage($deceased->image);
            $image = $this->saveImage($request->image);
        }

        $deceased->update($request->safe()->except(['image']) + $image);

        return redirect()->route('deceased.index')->with('success', trans('message.updade'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeadInventor  $deceased
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeadInventor $deceased)
    {
        $this->removeImage($deceased->image);
        $deceased->delete();

        return redirect()->route('deceased.index')->with('success', trans('message.delete'));
    }
}