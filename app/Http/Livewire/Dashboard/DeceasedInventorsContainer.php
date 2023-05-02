<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\DeadInventor;
use Livewire\Component;
use Livewire\WithPagination;

class DeceasedInventorsContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.dashboard.deceased-inventors-container', [
            'deceasedInventors' => DeadInventor::latest()->paginate(setting('pagination'))
        ]);
    }
}