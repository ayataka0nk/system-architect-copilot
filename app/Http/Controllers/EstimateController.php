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
        $estimates = Estimate::where('project_id', $projectId)->paginate(6);
        return view('estimates.index', [
            'project' => $project,
            'estimates' => $estimates,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $projectId)
    {
        $project = Project::findOrFail($projectId);
        return view('estimates.create', [
            'project' => $project
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
        return redirect()->route('estimates.show', $estimate->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $estimate = Estimate::with(['project', 'featureGroups'])->findOrFail($id);
        return view('estimates.show', [
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
        return redirect()->route('estimates.show', $estimate->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estimate $estimate)
    {
        $estimate->delete();
        return redirect()->route('projects.estimates.index', $estimate->project->id);
    }
}
