<?php

namespace App\Livewire\Estimates;

use App\Models\Feature;
use Livewire\Component;

class FeatureSection extends Component
{

    public Feature $feature;
    public string $class;
    public string $dataId;

    public function mount(
        Feature $feature,
        string $class = '',
        string $dataId = ''
    ) {
        $this->feature = $feature;
        $this->class = $class;
        $this->dataId = $dataId;
    }

    public function approve()
    {
        $this->feature->approveProposedEstimatedHours();
    }

    public function reject()
    {
        $this->feature->rejectProposedEstimatedHours();
    }

    public function render()
    {
        return view('livewire.estimates.feature-section');
    }
}
