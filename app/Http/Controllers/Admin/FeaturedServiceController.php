<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeaturedService;
use App\Http\Requests\Admin\FeaturedService\StoreFeaturedServiceRequest;
use App\Http\Requests\Admin\FeaturedService\UpdateFeaturedServiceRequest;

class FeaturedServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.featured.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.featured.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\FeaturedService\StoreFeaturedServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFeaturedServiceRequest $request)
    {
        FeaturedService::create($request->validated());

        return redirect()->route('featuredservices.index')->with('success', trans('message.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeaturedService  $featuredservice
     * @return \Illuminate\Http\Response
     */
    public function show(FeaturedService $featuredservice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FeaturedService  $featuredservice
     * @return \Illuminate\Http\Response
     */
    public function edit(FeaturedService $featuredservice)
    {
        return view('admin.featured.edit', compact('featuredservice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\FeaturedService\UpdateFeaturedServiceRequest  $request
     * @param  \App\Models\FeaturedService  $featuredservice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFeaturedServiceRequest $request, FeaturedService $featuredservice)
    {
        $featuredservice->update($request->validated());

        return redirect()->route('featuredservices.index')->with('success', trans('message.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeaturedService  $featuredservice
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeaturedService $featuredservice)
    {
        $featuredservice->delete();

        return redirect()->route('featuredservices.index')->with('success', trans('message.delete'));
    }
}
