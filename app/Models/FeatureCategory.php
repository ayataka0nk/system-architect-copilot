<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'memo',
        'feature_group_id',
        'sequence'
    ];

    public function featureGroup()
    {
        return $this->belongsTo(FeatureGroup::class);
    }

    public function features()
    {
        return $this->hasMany(Feature::class);
    }

    public function nextFeatureSequence()
    {
        if ($this->features->isNotEmpty()) {
            return $this->features->last()->sequence + 1;
        } else {
            return 0;
        }
    }
}
