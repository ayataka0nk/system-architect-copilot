<?php

namespace App\Http\Controllers;

use App\Models\Estimate;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('updated_at', 'desc')
            ->limit(3)->get();
        Log::debug($projects->toArray());
        $estimates = Estimate::orderBy('updated_at', 'desc')
            ->limit(3)->get();
        return view('dashboard', [
            'projects' => $projects,
            'estimates' => $estimates,
        ]);
    }
}
