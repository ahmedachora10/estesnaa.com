<?php

namespace App\Http\Livewire\Dashboard;

use App\Casts\Status;
use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $roles;

    public $status = null;
    public $role = null;

    public function mount()
    {
        $this->roles = Role::all();
    }

    public function filterByStatus($status)
    {
        $this->status = $status;
    }

    public function filterByRole($role)
    {
        // dd($role);
        $this->role = $role;
    }

    public function updateStatus(User $user, int $status)
    {
        if($user) {
            $user->update(['status' => $status]);
        }
    }

    public function render()
    {
        return view('livewire.dashboard.users-container', [
            'users' => User::with('roles')->where('id', '<>', auth()->id())
            ->when($this->status,function ($query)
            {
                $query->where('status', $this->status);
            })
            ->when($this->role,function ($query)
            {
                $query->where('role', $this->role);
            })
            ->latest()->paginate(setting('pagination') ?? 10)
        ]);
    }
}