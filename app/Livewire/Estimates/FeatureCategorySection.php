<?php

namespace App\Livewire\Estimates;

use App\Models\FeatureCategory;
use Illuminate\Support\Facades\Log;
use Livewire\Component;


class FeatureCategorySection extends Component
{
    public FeatureCategory $featureCategory;

    public string $class;
    public string $dataId;

    public function mount(
        FeatureCategory $featureCategory,
        string $dataId = '',
        string $class = ''
    ) {
        $this->featureCategory = $featureCategory;
        $this->dataId = $dataId;
        $this->class = $class;
    }


    public function proposeEstimatedHours()
    {
        Log::debug('dispatch propose-estimated-hours', ['featureCategoryId' => $this->featureCategory->id]);
        foreach ($this->featureCategory->features as $feature) {
            $feature->update([
                'proposed_estimated_hours' => 1
            ]);
        }
        $this->refresh();
        $this->dispatch('refresh-features.' . $this->featureCategory->id);
    }

    private function refresh()
    {
        $this->featureCategory->features = $this->featureCategory->features->sortBy('sequence');
    }

    public function render()
    {
        return view('livewire.estimates.feature-category-section');
    }
}
