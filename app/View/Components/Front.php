<?php

namespace App\View\Components;

use App\Models\Slider;
use Illuminate\View\Component;

class Front extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $sliders = [])
    {
        $this->sliders = request()->routeIs('home') ? Slider::active()->orderBy('sort')->get() : [];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.front');
    }
}