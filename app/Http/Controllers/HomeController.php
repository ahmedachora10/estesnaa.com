<?php

namespace App\Http\Controllers;

use App\Models\FeaturedService;
use App\Models\Invention;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredServices = FeaturedService::active()->get();
        return view('front.home', compact('featuredServices'));
    }

    public function inventors()
    {
        $inventors = User::whereRoleIs('inventor')->get();
        return view('front.inventions.inventors', compact('inventors'));
    }

    public function showInventor(User $inventor)
    {
        abort_if(!$inventor->hasRole('inventor'), 404);

        return view('front.inventions.inventor', compact('inventor'));
    }

    public function inventions()
    {
        $inventions = Invention::active()->latest()->get();
        return view('front.inventions.index', compact('inventions'));
    }

    public function showInvention(Invention $invention)
    {
        return view('front.inventions.show', compact('invention'));
    }

}