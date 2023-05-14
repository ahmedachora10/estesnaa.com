<?php

namespace App\Http\Livewire\Dashboard;

use App\Casts\Status;
use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class ServicesContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updateStatus(Service $service)
    {
        if($service) {
            $service->update(['status' => $service->status->value == Status::ENABLED->value ? Status::DISABLED : Status::ENABLED]);
        }
    }
    public function render()
    {
        $user = auth()->user();
        $services = [];

        if($user->role == 'admin') {
            $services = Service::with(['category', 'owner'])->withAvg('rating', 'rating')->orderBy('sort')->paginate(setting('pagination'));
        } elseif(in_array($user->role, ['service_provider', 'inventor'])) {
            $services = $user->services()->with('category')->orderBy('sort')->paginate(setting('pagination'));
        }

        return view('livewire.dashboard.services-container', [
            'services' => $services
        ]);
    }
}