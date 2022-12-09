<?php

namespace App\Domain\ClaimForms\Database\Factories;

use App\Domain\ClaimForms\Models\Submission;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SubmissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Submission::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        ];
    }
}
