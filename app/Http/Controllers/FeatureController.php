<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\FeatureCategory;
use Illuminate\Http\Request;

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
        //
    }
}
