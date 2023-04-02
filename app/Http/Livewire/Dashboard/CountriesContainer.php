<?php

namespace App\Http\Livewire\Dashboard;

use App\Casts\Status;
use App\Models\Country;
use Livewire\Component;
use Livewire\WithPagination;

class CountriesContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updateStatus(Country $country)
    {
        if($country) {
            $country->update(['status' => Status::DISABLED->value == $country->status->value ? Status::ENABLED->value : Status::DISABLED->value]);
        }
    }

    public function render()
    {
        return view('livewire.dashboard.countries-container', [
            'countries' => Country::latest()->paginate(setting('pagination'))
        ]);
    }
}