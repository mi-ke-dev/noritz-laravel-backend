<?php

namespace App\Domain\ClaimForms\Database\Factories;

use App\Domain\ClaimForms\Models\RGA1ClaimForm;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RGA1ClaimFormFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RGA1ClaimForm::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'companycustomer_name' => $this->faker->text,
            'sales_order_number' => $this->faker->text,
            'customer_reference_number' => $this->faker->text,
            'customer_purchase_order_number' => $this->faker->text,
            'describe_the_issue' => $this->faker->paragraph,
            'has_the_box_been_opened' => $this->faker->boolean,
            'has_the_item_been_installed' => $this->faker->boolean,
            'is_the_items_in_new_resalable_condition' => $this->faker->boolean,
            'reason_for_return' => $this->faker->paragraph,
            'name' => $this->faker->text,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->safeEmail,
            'email_confirm' => $this->faker->safeEmail,
        ];
    }
}
