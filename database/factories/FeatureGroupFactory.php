<?php

namespace Database\Factories;

use App\Models\FeatureGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FeatureGroup>
 */
class FeatureGroupFactory extends Factory
{
    private static int $sequence = 0;
    private static int $estimateId = 0;

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
        return $this->afterMaking(function (FeatureGroup $featureGroup) {
        })->afterCreating(function (FeatureGroup $featureGroup) {
            if (self::$estimateId !== $featureGroup->estimate_id) {
                self::$estimateId = $featureGroup->estimate_id;
                self::$sequence = 0;
            }
        });
    }
}
