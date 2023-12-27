<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'estimated_hours',
        'estimated_hours_reason',
        'proposed_estimated_hours',
        'proposed_estimated_hours_reason',
        'feature_category_id',
        'sequence'
    ];

    public function approveProposedEstimatedHours()
    {
        $this->estimated_hours = $this->proposed_estimated_hours;
        $this->estimated_hours_reason = $this->proposed_estimated_hours_reason;
        $this->proposed_estimated_hours = null;
        $this->proposed_estimated_hours_reason = null;
        $this->save();
    }

    public function rejectProposedEstimatedHours()
    {
        $this->proposed_estimated_hours = null;
        $this->proposed_estimated_hours_reason = null;
        $this->save();
    }

    public function featureCategory()
    {
        return $this->belongsTo(FeatureCategory::class);
    }
}
