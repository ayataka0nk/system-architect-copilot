<?php

namespace App\Http\Controllers;

use App\Models\FeatureCategory;
use App\Models\FeatureGroup;
use Illuminate\Http\Request;

class FeatureCategoryController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(string $featureGroupId)
    {
        $featureGroup = FeatureGroup::with(['estimate'])->findOrFail($featureGroupId);
        return view('estimates.feature-categories.create', [
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

        $featureGroup = FeatureGroup::with([
            'estimate', 'estimate.project'
        ])->findOrFail($featureGroupId);
        $featureGroup->featureCategories()->create($value);

        return redirect()->route('estimates.show', [
            'project' => $featureGroup->estimate->project,
            'estimate' => $featureGroup->estimate,
        ]);
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
        $featureCategory->load([
            'featureGroup',
            'featureGroup.estimate',
            'featureGroup.estimate.project'
        ]);


        return redirect()->route('estimates.show', [
            'project' => $featureCategory->featureGroup->estimate->project,
            'estimate' => $featureCategory->featureGroup->estimate,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeatureCategory $featureCategory)
    {
        //
    }
}