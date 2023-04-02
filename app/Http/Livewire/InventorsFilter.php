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
        $this->countries = Country::withCount('inventors')->get();
    }

    public function filter()
    {
        return $this->search;
    }

    public function render()
    {
        return view('livewire.inventors-filter', [
            'inventors' => User::active()->whereRoleIs('inventor')->whereHas('country',function ($query)
            {
                $query->where('name', 'like', "%{$this->filter()}%");
            })->latest()->paginate(setting('pagination'))
        ]);
    }
}