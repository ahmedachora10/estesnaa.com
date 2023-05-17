<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class RestoreServicesContainer extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function restore($service)
    {
        $service = Service::onlyTrashed()->findOrFail($service);

        $service->restore();
        session()->flash('success', 'تم استعادة الخدمة بنجاح');
    }

    public function render()
    {
        $user = auth()->user();
        $services = [];

        if($user->role == 'admin') {
            $services = Service::with(['category', 'owner'])->withAvg('rating', 'rating')
            ->onlyTrashed()->where('name', 'like',"%{$this->search}%")->orderBy('sort')
            ->paginate(setting('pagination'));
        } elseif(in_array($user->role, ['service_provider', 'inventor'])) {
            $services = $user->services()->with('category')->orderBy('sort')->onlyTrashed()
            ->where('name', 'like',"%{$this->search}%")->paginate(setting('pagination'));
        }

        return view('livewire.dashboard.restore-services-container', [
            'services' => $services
        ]);
    }
}