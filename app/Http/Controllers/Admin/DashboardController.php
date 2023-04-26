<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\PendingBalanceDuration;
use App\Models\Category;
use App\Models\Event;
use App\Models\InventionOrder;
use App\Models\Package;
use App\Models\PlatformProfitBalance;
use App\Models\ServiceOrder;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = collect(User::with('roles')->get());
        $admins_count = $users->filter(function ($item)
        {
            return $item->roles->where('name', 'admin')->first();
        })->count();

        $employees_count = $users->filter(function ($item)
        {
            return $item->roles->where('name', 'employee')->first();
        })->count();

        $inventors_count = $users->filter(function ($item)
        {
            return $item->roles->where('name', 'inventor')->first();
        })->count();

        $service_providers_count = $users->filter(function ($item)
        {
            return $item->roles->where('name', 'service_provider')->first();
        })->count();

        $events_providers_count = $users->filter(function ($item)
        {
            return $item->roles->where('name', 'event')->first();
        })->count();

        if(auth()->user()->role == 'event') {
            $events_count = auth()->user()->events()->count();
        } else {
            $events_count = Event::count();
        }

        $categories_count = Category::count();
        $packages_count = Package::count();

        // Payment Statistics
        $total_amount = Transaction::sum('amount');

        $user_bank_amount = null;
        if(in_array(auth()->user()->role, ['service_provider', 'inventor'])) {
            $user_bank_amount =  auth()->user()->profit ? auth()->user()->profit->total : auth()->user()->profit()->create(['total' => 0]);
        }

        $service_provider_pending_balance = null;
        if(auth()->user()->role == 'service_provider') {
            $service_provider_pending_balance =  auth()->user()->pending_balance;
        }

        $inventions_orders_total_amount = null;
        $services_orders_total_amount = null;
        $platform_profit = null;

        if(auth()->user()->role == 'admin') {
            $inventions_orders_total_amount = InventionOrder::sum('amount') ?? 0;
            $services_orders_total_amount = ServiceOrder::sum('amount') ?? 0;
            $platform_profit = PlatformProfitBalance::sum('amount');
        }

        return view('admin.dashboard', compact(
            'admins_count', 'employees_count', 'inventors_count', 'events_count',
            'packages_count', 'categories_count', 'service_providers_count',
            'events_count', 'events_providers_count', 'total_amount', 'user_bank_amount',
            'inventions_orders_total_amount', 'services_orders_total_amount',
            'service_provider_pending_balance', 'platform_profit'
        ));
    }
}