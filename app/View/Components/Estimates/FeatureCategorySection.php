<?php

namespace App\View\Components\Estimates;

use App\Models\FeatureCategory;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeatureCategorySection extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public FeatureCategory $featureCategory)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.estimates.feature-category-section');
    }
}
