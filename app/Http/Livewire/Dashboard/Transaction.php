<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Transaction as ModelsTransaction;
use Livewire\Component;

class Transaction extends Component
{
    public function render()
    {
        return view('livewire.dashboard.transaction', [
            'transactions' => ModelsTransaction::take(6)->get()
        ]);
    }
}