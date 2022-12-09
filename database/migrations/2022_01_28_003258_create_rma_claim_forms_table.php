<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRmaClaimFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rma_claim_forms', function (Blueprint $table) {
            $table->uuid('id')->default('uuid_generate_v4()');
            $table->string('party_requesting_the_rma_and_responsible_for_charges')->nullable();
            $table->string('noritz_distributor')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('distributor_address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('noritz_sales_representative')->nullable();
            $table->string('installing_company')->nullable();
            $table->string('installer_contact')->nullable();
            $table->string('installer_phone_number')->nullable();
            $table->string('noritz_engineer')->nullable();
            $table->string('installer_address')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('owner_phone_number')->nullable();
            $table->string('installation_address')->nullable();
            $table->string('return_shipping_address')->nullable();
            $table->string('model_number')->nullable();
            $table->string('gas_type')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('application_type')->nullable();
            $table->string('recirculation_pump')->nullable();
            $table->text('reason_for_return')->nullable();
            $table->boolean('return_box')->nullable();
            $table->boolean('return_remote_controller')->nullable();
            $table->boolean('return_remote_cord')->nullable();
            $table->string('other')->nullable();
            $table->string('preapprove_the_total_amount_for_repair')->nullable();
            $table->boolean('box_purchase_distributors_only')->nullable();
            $table->boolean('remote_controller_purchase_distributors_only')->nullable();
            $table->boolean('remote_cord_purchase_distributors_only')->nullable();
            $table->string('initials')->nullable();
            $table->boolean('accept_terms_and_conditions');
            $table->string('name')->nullable();
            $table->string('email', 191);
            $table->string('fax_number')->nullable();
            $table->timestamps();
            $table->boolean('is_archived')->default(false);
            $table->integer('claim_id', true);
            $table->timestamp('archived_at', 6)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rma_claim_forms');
    }
}
