<?php

namespace App\View\Components\Estimates;

use App\Models\FeatureGroup;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeatureGroupSection extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public FeatureGroup $featureGroup)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.estimates.feature-group-section');
    }
}
