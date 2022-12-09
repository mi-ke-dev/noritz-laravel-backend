<?php

namespace App\Domain\TechnicalInfo\Database\Factories;

use App\Models\SecurityRole;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SecurityRoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SecurityRole::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->numberBetween(1,100),
            'name' => $this->faker->text,
        ];
    }
}
