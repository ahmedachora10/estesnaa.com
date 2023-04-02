<?php

namespace App\Http\Livewire\Dashboard;

use App\Casts\Status;
use App\Models\Invention;
use Livewire\Component;
use Livewire\WithPagination;

class InventionsContainer extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function updateStatus(Invention $invention)
    {
        if($invention) {
            $invention->update(['status' => Status::DISABLED->value == $invention->status->value ? Status::ENABLED->value : Status::DISABLED->value]);
        }
    }

    public function render()
    {
        return view('livewire.dashboard.inventions-container', [
            'inventions' => Invention::with(['category', 'owner'])->latest()->paginate(setting('pagination'))
        ]);
    }
}