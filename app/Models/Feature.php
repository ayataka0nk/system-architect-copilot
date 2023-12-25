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
        'proposed_estimated_hours',
        'feature_category_id',
        'sequence'
    ];

    public function approveProposedEstimatedHours()
    {
        $this->estimated_hours = $this->proposed_estimated_hours;
        $this->proposed_estimated_hours = null;
        $this->save();
    }

    public function rejectProposedEstimatedHours()
    {
        $this->proposed_estimated_hours = null;
        $this->save();
    }

    public function featureCategory()
    {
        return $this->belongsTo(FeatureCategory::class);
    }
}
