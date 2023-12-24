<?php

namespace Database\Factories;

use App\Models\Feature;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feature>
 */
class FeatureFactory extends Factory
{
    private static int $sequence = 0;
    private static int $featureCategoryId = 0;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->text,
            'estimated_hours' => $this->faker->randomNumber(2, false),
            'sequence' => self::$sequence++,
            'proposed_estimated_hours' => $this->faker->randomNumber(2, false),
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Feature $feature) {
        })->afterCreating(function (Feature $feature) {
            if (self::$featureCategoryId !== $feature->feature_category_id) {
                self::$featureCategoryId = $feature->feature_category_id;
                self::$sequence = 0;
            }
        });
    }
}
