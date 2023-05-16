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

    public function mount()
    {
        $this->countries = collect(Country::withCount('inventors')->whereHas('inventors.inventorProfilePlan')->get());
    }

    public function filter()
    {
        return $this->search;
    }

    public function render()
    {
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
            ->latest()->paginate(setting('pagination'))
        ]);
    }
}
