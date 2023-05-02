<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;

class CertificateStatusButton extends Component
{
    public User $user;

    public $status;

    public $labelName = ['معطل', 'مفعل'];

    public function mount(User $user)
    {
        $this->user = $user;
        $this->status = $this->user->inventorProfile->confirmed;
    }

    public function update()
    {
        $this->status = !$this->status;

        $this->user->inventorProfile()->update(['confirmed' => $this->status]);
    }

    public function render()
    {
        return view('livewire.dashboard.certificate-status-button');
    }
}