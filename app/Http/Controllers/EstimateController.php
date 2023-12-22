<?php

namespace App\Http\Controllers;

use App\Models\Estimate;
use App\Models\Project;
use Illuminate\Http\Request;

class EstimateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $projectId)
    {
        $project = Project::with(['estimates'])->findOrFail($projectId);
        return view('estimates.index', [
            'project' => $project,
            'estimates' => $project->estimates,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $projectId)
    {
        return view('estimates.create', [
            'projectId' => $projectId
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $projectId)
    {
        $values = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);
        $project = Project::findOrFail($projectId);
        $estimate = $project->estimates()->create($values);
        return view('estimates.show', [
            'project' => $project,
            'estimate' => $estimate,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $estimate = Estimate::with(['project', 'featureGroups'])->findOrFail($id);
        return view('estimates.show', [
            'project' => $estimate->project,
            'estimate' => $estimate,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $estimate = Estimate::with(['project'])->findOrFail($id);
        return view('estimates.edit', [
            'estimate' => $estimate,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $estimate = Estimate::with([
            'project',
            'featureGroups.featureCategories.features'
        ])->findOrFail($id);
        $estimate->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return view('estimates.show', [
            'project' => $estimate->project,
            'estimate' => $estimate,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}