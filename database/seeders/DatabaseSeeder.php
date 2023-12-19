<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        \App\Models\Project::factory()->create([
            'name' => 'Project 1',
            'description' => 'Description 1',
        ]);
        \App\Models\Project::factory()->create([
            'name' => 'Project 2',
            'description' => 'Description 2',
        ]);
    }
}
