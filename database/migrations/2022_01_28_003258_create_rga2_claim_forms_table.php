<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRga2ClaimFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rga2_claim_forms', function (Blueprint $table) {
            $table->uuid('id')->default('uuid_generate_v4()');
            $table->date('date')->nullable();
            $table->string('companycustomer_name')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('email', 191);
            $table->string('email_confirm', 191);
            $table->string('phone')->nullable();
            $table->string('sales_order_number')->nullable();
            $table->string('po_number')->nullable();
            $table->string('customer_reference_number')->nullable();
            $table->boolean('was_the_item_received_damaged')->nullable();
            $table->boolean('did_you_receive_incorrect_items_andor_quantities')->nullable();
            $table->boolean('is_the_item_defective')->nullable();
            $table->boolean('is_this_new_unused_and_needs_to_be_returned')->nullable();
            $table->boolean('was_the_packaging_damaged')->nullable();
            $table->boolean('was_the_carrier_notified_of_the_damage')->nullable();
            $table->boolean('were_any_items_refused_from_the_shipment')->nullable();
            $table->boolean('was_the_quantity_on_the_packing_slip_correct')->nullable();
            $table->boolean('did_the_received_item_match_the_packing_slip')->nullable();
            $table->boolean('is_the_item_missing_components')->nullable();
            $table->string('purchase_overage')->nullable();
            $table->string('purchase_damage')->nullable();
            $table->json('claim_photos')->nullable();
            $table->json('items_received')->nullable();
            $table->text('describe_the_issue');
            $table->boolean('i_agree_to_the_terms_and_conditions');
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
        Schema::dropIfExists('rga2_claim_forms');
    }
}
