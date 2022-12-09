<?php

namespace App\Domain\ClaimForms\Database\Factories;

use App\Domain\ClaimForms\Models\RMAClaimForm;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RMAClaimFormFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RMAClaimForm::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'noritz_distributor' => $this->faker->text,
            'contact_name' => $this->faker->text,
            'distributor_address' => $this->faker->text,
            'phone_number' => $this->faker->phoneNumber,
            'noritz_sales_representative' => $this->faker->text,
            'installing_company' => $this->faker->text,
            'installer_contact' => $this->faker->text,
            'installer_phone_number' => $this->faker->phoneNumber,
            'noritz_engineer' => $this->faker->text,
            'installer_address' => $this->faker->text,
            'owner_name' => $this->faker->text,
            'owner_phone_number' => $this->faker->phoneNumber,
            'installation_address' => $this->faker->text,
            'return_shipping_address' => $this->faker->text,
            'model_number' => $this->faker->text,
            'serial_number' => $this->faker->text,
            'reason_for_return' => $this->faker->paragraph,
            'return_box' => $this->faker->boolean,
            'return_remote_controller' => $this->faker->boolean,
            'return_remote_cord' => $this->faker->boolean,
            'other' => $this->faker->text,
            'box_purchase_distributors_only' => $this->faker->boolean,
            'remote_controller_purchase_distributors_only' => $this->faker->boolean,
            'remote_cord_purchase_distributors_only' => $this->faker->boolean,
            'initials' => $this->faker->text,
            'accept_terms_and_conditions' => $this->faker->boolean,
            'name' => $this->faker->text,
            'email' => $this->faker->safeEmail,
            'fax_number' => $this->faker->phoneNumber,
        ];
    }
}
