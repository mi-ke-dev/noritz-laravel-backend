<?php

namespace App\Domain\ClaimForms\Database\Factories;

use App\Domain\ClaimForms\Models\RGA2ClaimForm;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RGA2ClaimFormFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RGA2ClaimForm::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date,
            'companycustomer_name' => $this->faker->text,
            'contact_person' => $this->faker->text,
            'email' => $this->faker->safeEmail,
            'email_confirm' => $this->faker->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'sales_order_number' => $this->faker->text,
            'po_number' => $this->faker->text,
            'customer_reference_number' => $this->faker->text,
            'was_the_item_received_damaged' => $this->faker->boolean,
            'did_you_receive_incorrect_items_andor_quantities' => $this->faker->boolean,
            'is_the_item_defective' => $this->faker->boolean,
            'is_this_new_unused_and_needs_to_be_returned' => $this->faker->boolean,
            'was_the_packaging_damaged' => $this->faker->boolean,
            'was_the_carrier_notified_of_the_damage' => $this->faker->boolean,
            'were_any_items_refused_from_the_shipment' => $this->faker->boolean,
            'was_the_quantity_on_the_packing_slip_correct' => $this->faker->boolean,
            'did_the_received_item_match_the_packing_slip' => $this->faker->boolean,
            'is_the_item_missing_components' => $this->faker->boolean,
            'describe_the_issue' => $this->faker->paragraph,
            'i_agree_to_the_terms_and_conditions' => $this->faker->boolean,
        ];
    }
}
