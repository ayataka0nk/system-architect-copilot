<?php

namespace App\Livewire\Estimates;

use App\Models\FeatureGroup;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class FeatureGroupSection extends Component
{

    public FeatureGroup $featureGroup;
    public string $class;

    public function mount(FeatureGroup $featureGroup, string $class = '')
    {
        $this->featureGroup = $featureGroup;
        $this->class = $class;
    }

    public function render()
    {
        return view('livewire.estimates.feature-group-section');
    }
}
