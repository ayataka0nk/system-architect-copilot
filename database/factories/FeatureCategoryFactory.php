<?php

namespace Database\Factories;

use App\Models\FeatureCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FeatureCategory>
 */
class FeatureCategoryFactory extends Factory
{
    private static int $sequence = 0;
    private static int $featureGroupId = 0;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence,
            'memo' => $this->faker->text,
            'sequence' => self::$sequence++,
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (FeatureCategory $featureCategory) {
        })->afterCreating(function (FeatureCategory $featureCategory) {
            if (self::$featureGroupId !== $featureCategory->feature_group_id) {
                self::$featureGroupId = $featureCategory->feature_group_id;
                self::$sequence = 0;
            }
        });
    }
}
