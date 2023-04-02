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
        return view('livewire.dashboard.services-container', [
            'services' => Service::with(['category', 'owner'])->latest()->paginate(setting('pagination'))
        ]);
    }
}
