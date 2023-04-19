<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\InventionOrder;
use App\Models\ServiceOrder;
use Livewire\Component;

class Orders extends Component
{

    public function render()
    {
        $servicesOrders = ServiceOrder::with(['buyer', 'service.category']);
        $inventionsOrders = InventionOrder::with(['buyer', 'invention.category']);

        if(auth()->user()->role == 'service_provider') {
            $servicesOrders->where('service_provider_id', auth()->id());
        } elseif(auth()->user()->role == 'inventor') {
            $inventionsOrders->whereHas('invention', function ($query)
            {
                $query->where('user_id', auth()->id());
            });
        }

        $servicesOrders = $servicesOrders->latest()->take(10)->get();
        $inventionsOrders = $inventionsOrders->latest()->take(10)->get();

        return view('livewire.dashboard.orders', [
            'servicesOrders' => $servicesOrders,
            'inventionsOrders' => $inventionsOrders,
        ]);
    }
}