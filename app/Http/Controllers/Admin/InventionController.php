<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invention;
use App\Http\Requests\Admin\Invention\StoreInventionRequest;
use App\Http\Requests\Admin\Invention\UpdateInventionRequest;
use App\Models\Category;
use App\Utils\UploadImage;

class InventionController extends Controller
{
    use UploadImage;

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
        return view('admin.inventions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::inventionsSection()->latest()->get();
        return view('admin.inventions.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\Invention\StoreInventionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInventionRequest $request)
    {
        $request->validated();

        Invention::create($request->safe()->except('image') + $this->saveImage($request->image) + ['user_id' => auth()->id()]);

        return redirect()->route('inventions.index')->with('success', 'تم اضافة الاختراع بنجاح. المرجو انتظار المراجعة من قبل الادارة');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invention  $invention
     * @return \Illuminate\Http\Response
     */
    public function show(Invention $invention)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invention  $invention
     * @return \Illuminate\Http\Response
     */
    public function edit(Invention $invention)
    {
        $categories = Category::inventionsSection()->latest()->get();
        return view('admin.inventions.edit', compact('invention', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\Invention\UpdateInventionRequest  $request
     * @param  \App\Models\Invention  $invention
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInventionRequest $request, Invention $invention)
    {
        $request->validated();

        $data = [];
        if($request->exists('image') && $request->image != null) {
            $this->removeImage($invention->image);
            $data = $this->saveImage($request->image);
        }

        $invention->update($request->safe()->except('image') + $data + ['user_id' => auth()->id()]);

        return redirect()->route('inventions.index')->with('success', trans('message.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invention  $invention
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invention $invention)
    {
        if($invention->image) {
            $this->removeImage($invention->image);
        }

        $invention->delete();
        return redirect()->route('inventions.index')->with('success', trans('message.delete'));
    }
}
