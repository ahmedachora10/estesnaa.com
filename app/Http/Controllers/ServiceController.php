<?php

namespace App\Http\Controllers;

use App\Casts\Status;
use App\Models\Category;
use App\Models\Chat;
use App\Models\Service;
use App\Utils\CategoryType;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicesCategories = Category::servicesSection()->latest()->get();
        return view('front.services.index', compact('servicesCategories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        abort_if(!$service->owner->service_provider_subscription_paid, 404);


        return view('front.services.show', compact('service'));
    }

    public function services(Category $category)
    {
        abort_if($category->parent_id && $category->parent_id->value != CategoryType::SERVICES->value, 404);

        $services = $category->services->loadCount('orders');

        return view('front.services.services', compact('services', 'category'));
    }
}