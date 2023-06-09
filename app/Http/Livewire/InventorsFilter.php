<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class InventorsFilter extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $countries = [];
    public $search = '';

    public $searchByCountry = null;

    public function mount()
    {
        // $this->countries = collect(Country::withCount(['inventors' => function ($query)
        // {
        //     $query->whereHas('inventorProfilePlan');
        // }])->whereHas('inventors.inventorProfilePlan')->get());

    }

    public function filter()
    {
        return $this->search;
    }

    public function selectCountry(Country $country)
    {
        $this->searchByCountry = $country->id;
    }

    public function render()
    {
        $this->countries = collect(Country::withCount(['inventors' => function ($query)
        {
            $query->whereHas('inventorProfilePlan');
        }])->whereHas('inventors.inventorProfilePlan')->get());

        return view('livewire.inventors-filter', [
            'inventors' => User::active()->whereRoleIs('inventor')
            ->whereHas('inventorProfile', function ($query)
            {
                $query->hasCertificate();
            })
            ->whereHas('inventorProfilePlan')
            ->whereHas('country',function ($query)
            {
                $query->where('name', 'like', "%{$this->filter()}%");
            })
            ->when($this->searchByCountry, function ($query)
            {
                $query->where('country_id', $this->searchByCountry);
            })
            ->latest()->paginate(25)
        ]);
    }
}
