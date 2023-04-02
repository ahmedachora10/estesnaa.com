<?php

namespace App\Http\Livewire\Dashboard;

use App\Casts\Status;
use App\Models\Slider;
use Livewire\Component;
use Livewire\WithPagination;

class SlidersContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updateStatus(Slider $slider)
    {
        if($slider) {
            $slider->update(['status' => $slider->status->value == Status::ENABLED->value ? Status::DISABLED : Status::ENABLED]);
        }
    }

    public function render()
    {
        return view('livewire.dashboard.sliders-container', [
            'sliders' => Slider::latest()->paginate(setting('pagination'))
        ]);
    }
}