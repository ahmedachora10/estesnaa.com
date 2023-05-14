<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriesContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.dashboard.categories-container',[
            'categories' => Category::orderBy('sort')->paginate(setting('pagination'))
        ]);
    }
}