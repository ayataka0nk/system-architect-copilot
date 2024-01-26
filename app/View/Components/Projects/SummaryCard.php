<?php

namespace App\View\Components\Projects;

use App\Models\Project;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SummaryCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Project $project)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.projects.summary-card');
    }
}
