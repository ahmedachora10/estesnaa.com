<?php

namespace App\Http\Controllers;

use App\Models\DeadInventor;
use App\Models\Event;
use App\Models\FeaturedService;
use App\Models\Invention;
use App\Models\Package;
use App\Models\Page;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;

use function Clue\StreamFilter\fun;

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
        abort_if(!$inventor->hasRole('inventor') || !$inventor->inventorProfilePlan, 404);

        return view('front.inventions.inventor', compact('inventor'));
    }

    public function inventions()
    {
        $inventions = Invention::active()->latest()->get();
        return view('front.inventions.index', compact('inventions'));
    }

    public function showInvention(Invention $invention)
    {
        $invention->increment('views');
        return view('front.inventions.show', compact('invention'));
    }

    public function packages()
    {
        if(auth()->user()->role == 'service_provider') {
            return redirect()->route('front.service-provider.plan');
        }

        $packages = Package::active()->where('group', auth()->user()->role)->orderBy('price')->get();

        $user_plan = auth()->user()->plan;
        $user_expired_plan = auth()->user()->expiredPlan;

        return view('front.packages.packages', compact('packages', 'user_plan', 'user_expired_plan'));
    }

    public function serviceProviderPlan()
    {
        $package = Package::active()->where('group', auth()->user()->role)->first();
        $user_plan = auth()->user()->service_provider_subscription_paid;
        return view('front.packages.service_provider_package', compact('package', 'user_plan'));
    }

    public function inventorProfilePlan()
    {
        $packages = Package::active()->where('group', 'inventor_profile')->get();
        $user_plan = auth()->user()->inventorProfilePlan;
        return view('front.packages.inventor_profile_package', compact('packages', 'user_plan'));
    }

    public function showPage(Page $page)
    {
        return view('front.page', compact('page'));
    }

    public function deceasedInventors()
    {
        $inventors = DeadInventor::latest()->paginate(20);

        return view('front.inventions.deceased-inventors', compact('inventors'));
    }

}