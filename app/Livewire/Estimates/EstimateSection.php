<?php

namespace App\Livewire\Estimates;

use App\Models\Estimate;
use Livewire\Component;

class EstimateSection extends Component
{
    public Estimate $estimate;

    public function mount(Estimate $estimate)
    {
        $this->estimate = $estimate;
    }

    public function render()
    {
        return view('livewire.estimates.estimate-section');
    }
}
