<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class Toast extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $title = '', public $content = null)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.toast');
    }
}