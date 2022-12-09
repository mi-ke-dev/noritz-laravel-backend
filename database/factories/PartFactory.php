<?php

namespace App\Domain\PartsLookup\Database\Factories;

use App\Domain\PartsLookup\Models\Part;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PartFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Part::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->numberBetween(1,100),
            'part_list_id' => $this->faker->numberBetween(1,100),
            'keyword' => $this->faker->numberBetween(1,100),
            'part_description_en' => $this->faker->numberBetween(1,100),
            'part_description_jp' => $this->faker->numberBetween(1,100),
            'part_number' => $this->faker->numberBetween(1,100),
            'available_for_sale' => $this->faker->numberBetween(1,100),
            'version' => $this->faker->numberBetween(1,100),
            'sequence' => $this->faker->numberBetween(1,100),
            'upgrade_reason_en' => $this->faker->numberBetween(1,100),
            'upgrade_reason_jp' => $this->faker->numberBetween(1,100),
        ];
    }
}
