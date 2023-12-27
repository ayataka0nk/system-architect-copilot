<?php

namespace App\Http\Controllers;

use App\Adapters\LanguageModelClient\LanguageModelClientFactory;
use App\Adapters\LanguageModelClient\Message;
use App\Models\Feature;
use App\Models\FeatureCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FeatureController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, string $featureCategoryId)
    {
        $sequence = $request->input('sequence');
        Log::debug('create feature', ['sequence' => $sequence]);
        $featureCategory = FeatureCategory::with(['featureGroup.estimate'])->findOrFail($featureCategoryId);
        return view('estimates.features.create', [
            'estimate' => $featureCategory->featureGroup->estimate,
            'featureCategory' => FeatureCategory::findOrFail($featureCategoryId),
            'sequence' => $sequence,
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
            'estimated_hours' => 'nullable|integer',
            'estimated_hours_reason' => 'nullable|string',
            'sequence' => 'integer',
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
            'name' => 'required|string',
            'description' => 'nullable|string',
            'estimated_hours' => 'nullable|numeric',
            'estimated_hours_reason' => 'nullable|string',
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


    public function proposeEstimatedHours(
        Request $request,
        FeatureCategory $featureCategory,
        LanguageModelClientFactory $languageModelClientfactory
    ) {
        Log::debug('call proposeEstimatedHours');
        Log::debug($request->all());

        $client = $languageModelClientfactory->make(LanguageModelClientFactory::TURBO);
        $completion = $client->createChatCompletion(messages: [new Message(role: 'user', content: 'こんにちは')]);
        Log::debug($completion->content);
        return response()->json([
            'result' => $completion->content
        ]);
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

    public function approveProposedEstimatedHours(Feature $feature)
    {
        $feature->approveProposedEstimatedHours();
        return response()->noContent();
    }

    public function rejectProposedEstimatedHours(Feature $feature)
    {
        $feature->rejectProposedEstimatedHours();
        return response()->noContent();
    }
}
