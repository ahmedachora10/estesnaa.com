<?php

namespace App\View\Components\Dashboard\Tables;

use Illuminate\View\Component;

class Table1 extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $title = null, public $action = null, public $columns = [])
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
        return view('components.dashboard.tables.table1');
    }
}
