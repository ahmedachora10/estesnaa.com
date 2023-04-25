<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Utils\CategoryType;
use App\Utils\UploadImage;

class CategoryController extends Controller
{
    use UploadImage;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriesType = CategoryType::cases();
        return view('admin.categories.create', compact('categoriesType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\Category\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $request->validated();
        Category::create($request->safe()->except('image') + $this->saveImage($request->image, 'categories'));

        return redirect()->route('categories.index')->with('success', trans('message.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categoriesType = CategoryType::cases();
        return view('admin.categories.edit', compact('category', 'categoriesType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\Category\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {

        $request->validated();

        $data = [];
        if($request->exists('image') && $request->image != null) {
            $this->removeImage($category->image);
            $data = $this->saveImage($request->image, 'categories');
        }

        $category->update($request->safe()->except('image') + $data);

        return redirect()->route('categories.index')->with('success', trans('message.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->image) {
            $this->removeImage($category->image);
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', trans('message.delete'));
    }
}