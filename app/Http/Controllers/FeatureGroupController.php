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
        return view('feature-groups.create', [
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
        $estimate = Estimate::findOrFail($estimateId);
        $estimate->featureGroups()->create($values);
        return redirect()->route('estimates.show', $estimate->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeatureGroup $featureGroup)
    {
        return view('feature-groups.edit', [
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
        return redirect()->route('estimates.show', $featureGroup->estimate->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeatureGroup $featureGroup)
    {
        $featureGroup->delete();
        return redirect()->route('estimates.show', $featureGroup->estimate->id);
    }
}
