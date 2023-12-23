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
        'feature_category_id',
        'sequence'
    ];

    public function featureCategory()
    {
        return $this->belongsTo(FeatureCategory::class);
    }
}
