<?php

namespace App\Http\Controllers;

use App\Models\FeatureCategory;
use App\Models\FeatureGroup;
use App\Services\Estimates\ProposeEstimatedHoursService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FeatureCategoryController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(string $featureGroupId)
    {
        $featureGroup = FeatureGroup::with(['estimate'])->findOrFail($featureGroupId);
        return view('estimates.feature-categories.create', [
            'estimate' => $featureGroup->estimate,
            'featureGroup' => $featureGroup,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $featureGroupId)
    {
        $value = $request->validate([
            'name' => 'required|max:255',
            'memo' => 'nullable|max:1000',
        ]);

        $featureGroup = FeatureGroup::with(['estimate'])->findOrFail($featureGroupId);
        $featureGroup->featureCategories()->create($value);

        return redirect()->route('estimates.show',  $featureGroup->estimate->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeatureCategory $featureCategory)
    {
        $featureCategory->load(['featureGroup', 'featureGroup.estimate']);
        return view('estimates.feature-categories.edit', [
            'estimate' => $featureCategory->featureGroup->estimate,
            'featureCategory' => $featureCategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FeatureCategory $featureCategory)
    {
        $value = $request->validate([
            'name' => 'required|max:255',
            'memo' => 'nullable|max:1000',
        ]);

        $featureCategory->update($value);
        return redirect()->route('estimates.show', $featureCategory->featureGroup->estimate->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeatureCategory $featureCategory)
    {
        $featureCategory->delete();
        return redirect()->route('estimates.show', $featureCategory->featureGroup->estimate->id);
    }

    public function changeSequence(Request $request)
    {
        $values = $request->validate([
            'ordered_id' => 'required|array',
            'ordered_id.*' => 'integer',
        ]);
        foreach ($values['ordered_id'] as $sequence => $id) {
            $category = FeatureCategory::findOrFail($id);
            $category->sequence = $sequence;
            $category->save();
        }
        return response()->noContent();
    }

    public function proposeEstimatedHours(
        FeatureCategory $featureCategory,
        ProposeEstimatedHoursService $service
    ) {
        $result = $service->handle(featureCategoryId: $featureCategory->id);
        foreach ($featureCategory->features as $feature) {
            $featureEstimation = $result->where('id', $feature->id)->first();
            if (!$featureEstimation) {
                Log::warning('Feature estimation not found', [
                    'feature_id' => $feature->id,
                ]);
                continue;
            }
            $feature->update([
                'proposed_estimated_hours' => $featureEstimation['proposed_estimated_hours'],
                'proposed_estimated_hours_reason' => $featureEstimation['proposed_estimated_hours_reason'],
            ]);
        }
        return response()->noContent();
    }
}
