<?php

namespace App\Http\Livewire\Dashboard;

use App\Casts\Status;
use App\Models\City;
use Livewire\Component;
use Livewire\WithPagination;

class CitiesContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updateStatus(City $city)
    {
        if($city) {
            $city->update(['status' => Status::DISABLED->value == $city->status->value ? Status::ENABLED->value : Status::DISABLED->value]);
        }
    }

    public function render()
    {
        return view('livewire.dashboard.cities-container', [
            'cities' => City::with('country')->latest()->paginate(setting('pagination'))
        ]);
    }
}
