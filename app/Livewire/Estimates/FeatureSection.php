<?php

namespace App\Livewire\Estimates;

use App\Models\Feature;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class FeatureSection extends Component
{
    #[Reactive]
    public Feature $feature;

    public string $class;
    public string $dataId;

    public function mount(
        Feature $feature,
        string $class = '',
        string $dataId = '',
    ) {
        $this->feature = $feature;
        $this->class = $class;
        $this->dataId = $dataId;
    }

    public function approve()
    {
        $featureCategoryId = $this->feature->feature_category_id;
        $this->dispatch("approve-proposed-estimated-hours.$featureCategoryId",  $this->feature);
    }

    public function reject()
    {
        $featureCategoryId = $this->feature->feature_category_id;
        $this->dispatch("reject-proposed-estimated-hours.$featureCategoryId", $this->feature);
    }

    public function render()
    {
        return view('livewire.estimates.feature-section');
    }
}
