<?php

namespace App\View\Components\Estimates;

use App\Models\Estimate;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SummaryCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Estimate $estimate)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.estimates.summary-card');
    }
}
