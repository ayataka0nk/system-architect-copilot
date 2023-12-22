<?php

namespace App\Http\Controllers;

use App\Models\Estimate;
use App\Models\FeatureGroup;
use Illuminate\Http\Request;

class FeatureGroupController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create($estimateId)
    {
        $estimate = Estimate::findOrFail($estimateId);
        return view('feature_groups.create', [
            'estimate' => $estimate
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $estimateId)
    {
        $values = $request->validate([
            'name' => 'required',
            'memo' => 'nullable',
        ]);
        $estimate = Estimate::with(['project', 'featureGroups'])->findOrFail($estimateId);
        $estimate->featureGroups()->create($values);
        $estimate->refresh();

        return view('estimates.show', [
            'project' => $estimate->project,
            'estimate' => $estimate,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeatureGroup $featureGroup)
    {
        return view('feature_groups.edit', [
            'estimate' => $featureGroup->estimate,
            'featureGroup' => $featureGroup
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FeatureGroup $featureGroup)
    {
        $values = $request->validate([
            'name' => 'required',
            'memo' => 'nullable',
        ]);
        $featureGroup->update($values);
        $featureGroup->refresh();

        return view('estimates.show', [
            'project' => $featureGroup->estimate->project,
            'estimate' => $featureGroup->estimate,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeatureGroup $featureGroup)
    {
        //
    }
}
