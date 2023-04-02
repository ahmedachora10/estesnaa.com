<?php

namespace App\Http\Livewire\Package;

use Livewire\Component;

class Features extends Component
{
    public $features = [];
    public $feature = null;

    public function mount($mode = 'store', $features = [])
    {
        if($mode == 'update') {
            $this->features = $features ?? [];
        }

    }

    public function addFeature()
    {
        if($this->feature) {
            array_push($this->features, $this->feature);
            $this->reset('feature');
        }
    }

    public function removeFeature($feature)
    {
        if(in_array($this->features[$feature], $this->features)) {
            unset($this->features[$feature]);
        }
    }

    public function render()
    {
        return view('livewire.package.features');
    }
}