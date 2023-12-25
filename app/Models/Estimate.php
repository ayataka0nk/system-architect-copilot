<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'project_id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function featureGroups()
    {
        return $this->hasMany(FeatureGroup::class);
    }

    public static function findOrdered(string $id)
    {
        return Estimate::with([
            'project',
            'featureGroups' => function ($query) {
                $query->orderBy('sequence');
            },
            'featureGroups.featureCategories' => function ($query) {
                $query->orderBy('sequence');
            },
            'featureGroups.featureCategories.features' => function ($query) {
                $query->orderBy('sequence');
            },
        ])->findOrFail($id);
    }
}
