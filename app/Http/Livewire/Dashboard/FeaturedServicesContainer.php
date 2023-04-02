<?php

namespace App\Http\Livewire\Dashboard;

use App\Casts\Status;
use App\Models\FeaturedService;
use Livewire\Component;
use Livewire\WithPagination;

class FeaturedServicesContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updateStatus(FeaturedService $featured)
    {
        if($featured) {
            $featured->update(['status' => Status::DISABLED->value == $featured->status->value ? Status::ENABLED->value : Status::DISABLED->value]);
        }
    }

    public function render()
    {
        return view('livewire.dashboard.featured-services-container', [
            'featuredServices' => FeaturedService::latest()->paginate(setting('pagination'))
        ]);
    }
}