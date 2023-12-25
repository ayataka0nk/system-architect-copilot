<?php

namespace App\Livewire\Estimates;

use App\Models\Feature;
use App\Models\FeatureCategory;
use Illuminate\Support\Facades\DB;
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

    public function updateOrder($orders)
    {
        Log::debug('updateOrder called', $orders);
        DB::beginTransaction();
        try {
            foreach ($orders as $sequence => $id) {
                $feature = Feature::findOrFail($id);
                $feature->sequence = $sequence;
                $feature->save();
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function render()
    {
        return view('livewire.estimates.feature-category-section');
    }
}
