<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureGroup extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'memo', 'estimate_id'];

    public function estimate()
    {
        return $this->belongsTo(Estimate::class);
    }

    public function featureCategories()
    {
        return $this->hasMany(FeatureCategory::class);
    }
}
