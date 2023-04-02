<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.dashboard.products-container',[
            'products' => Product::latest()->paginate(setting('pagination'))
        ]);
    }
}
