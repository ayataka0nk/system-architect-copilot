<?php

namespace App\Livewire\Estimates;

use App\Models\Feature;
use App\Models\FeatureCategory;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
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
        foreach ($this->featureCategory->features as $feature) {
            $feature->update([
                'proposed_estimated_hours' => 1
            ]);
        }
        $this->refreshFeatureCategory();
    }

    #[On('approve-proposed-estimated-hours.{featureCategory.id}')]
    public function approveProposedEstimatedHours(Feature $feature)
    {
        Log::debug('approve-proposed-estimated-hours', ['featureId' => $feature->id]);
        $feature->approveProposedEstimatedHours();
        $this->refreshFeatureCategory();
    }

    #[On('reject-proposed-estimated-hours.{featureCategory.id}')]
    public function rejectProposedEstimatedHours(Feature $feature)
    {
        $feature->rejectProposedEstimatedHours();
        $this->refreshFeatureCategory();
    }

    private function refreshFeatureCategory()
    {
        $this->featureCategory->refresh();
        $this->featureCategory->load('features');
        $this->featureCategory->features = $this->featureCategory->features->sortBy('sequence');
    }


    public function render()
    {
        return view('livewire.estimates.feature-category-section');
    }
}
