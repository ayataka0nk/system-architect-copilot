<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Estimate;
use App\Models\Feature;
use App\Models\FeatureCategory;
use App\Models\FeatureGroup;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com'
        ]);
        Project::factory()->state([
            'name' => '沢山の機能を持つサンプルプロジェクト',
            'description' => '沢山の機能を持つサンプルプロジェクトの説明',
            'created_at' => Carbon::now()->addHour(),
            'updated_at' => Carbon::now()->addHour()
        ])->has(Estimate::factory()
            ->count(20)
            ->has(FeatureGroup::factory()
                ->count(2)
                ->has(FeatureCategory::factory()
                    ->count(10)
                    ->has(Feature::factory()
                        ->count(5)))))
            ->create();
        Project::factory()->count(20)->create();
        $this->call([
            SampleProjectSeeder::class
        ]);
    }
}
