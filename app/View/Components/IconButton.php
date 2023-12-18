<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class IconButton extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $variant = 'standard',
        public string $icon,
        public bool $active = false,
        public string $color = 'primary'
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.icon-button');
    }
}
