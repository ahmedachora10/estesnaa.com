<?php

namespace App\Http\Livewire\Dashboard;

use App\Casts\Status;
use App\Models\Page;
use Livewire\Component;
use Livewire\WithPagination;

class PagesContainer extends Component
{
      use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updateStatus(Page $page)
    {
        if($page) {
            $page->update(['status' => Status::DISABLED->value == $page->status->value ? Status::ENABLED->value : Status::DISABLED->value]);
        }
    }


    public function render()
    {
        return view('livewire.dashboard.pages-container', [
            'pages' => Page::latest()->paginate(setting('pagination'))
        ]);
    }
}