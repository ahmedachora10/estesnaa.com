<?php

namespace App\Http\Livewire\Dashboard;

use App\Casts\Status;
use App\Models\Package;
use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class PackagesContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $roles;

    public function mount()
    {
        $this->roles = collect(Role::all());
    }

    public function updateStatus(Package $package)
    {
        if($package) {
            $package->update(['status' => Status::DISABLED->value == $package->status->value ? Status::ENABLED->value : Status::DISABLED->value]);
        }
    }

    public function render()
    {
        return view('livewire.dashboard.packages-container', [
            'packages' => Package::latest()->paginate(setting('pagination'))
        ]);
    }
}