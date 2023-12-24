<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\FeatureCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FeatureController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(string $featureCategoryId)
    {
        $featureCategory = FeatureCategory::with(['featureGroup.estimate'])->findOrFail($featureCategoryId);
        return view('estimates.features.create', [
            'estimate' => $featureCategory->featureGroup->estimate,
            'featureCategory' => FeatureCategory::findOrFail($featureCategoryId)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $featureCategoryId)
    {
        $values = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $feature = Feature::create($values + [
            'feature_category_id' => $featureCategoryId,
        ]);

        return redirect()->route('estimates.show', $feature->featureCategory->featureGroup->estimate->id);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feature $feature)
    {
        $feature->load(['featureCategory.featureGroup.estimate']);
        return view('estimates.features.edit', [
            'estimate' => $feature->featureCategory->featureGroup->estimate,
            'feature' => $feature,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feature $feature)
    {
        $values = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $feature->update($values);

        return redirect()->route('estimates.show', $feature->featureCategory->featureGroup->estimate->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feature $feature)
    {
        $feature->delete();

        return redirect()->route('estimates.show', $feature->featureCategory->featureGroup->estimate->id);
    }

    public function changeSequence(Request $request)
    {
        $values = $request->validate([
            'ordered_id' => 'required|array',
            'ordered_id.*' => 'integer',
        ]);

        foreach ($values['ordered_id'] as $sequence => $id) {
            $feature = Feature::findOrFail($id);
            $feature->sequence = $sequence;
            $feature->save();
        }
        return response()->noContent();
    }

    public function approveProposedEstimatedHours(Request $request, Feature $feature)
    {
        Log::debug('call approveProposedEstimatedHours');
        Log::debug($request->all());
        $feature->estimated_hours = $feature->proposed_estimated_hours;
        $feature->proposed_estimated_hours = null;
        $feature->save();
        return response()->noContent();
    }

    public function rejectProposedEstimatedHours(Request $request, Feature $feature)
    {
        Log::debug('call rejectProposedEstimatedHours');
        Log::debug($request->all());

        $feature->proposed_estimated_hours = null;
        $feature->save();
        return response()->noContent();
    }
}
