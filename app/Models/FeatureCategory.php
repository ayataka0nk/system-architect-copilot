<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'memo', 'feature_group_id'];

    public function featureGroup()
    {
        return $this->belongsTo(FeatureGroup::class);
    }

    public function features()
    {
        return $this->hasMany(Feature::class);
    }
}
