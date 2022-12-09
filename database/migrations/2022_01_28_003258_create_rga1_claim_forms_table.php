<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRga1ClaimFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rga1_claim_forms', function (Blueprint $table) {
            $table->uuid('id')->default('uuid_generate_v4()');
            $table->string('companycustomer_name')->nullable();
            $table->string('sales_order_number')->nullable();
            $table->string('customer_reference_number')->nullable();
            $table->string('customer_purchase_order_number')->nullable();
            $table->json('items')->nullable();
            $table->text('describe_the_issue');
            $table->boolean('has_the_box_been_opened')->nullable();
            $table->boolean('has_the_item_been_installed')->nullable();
            $table->boolean('is_the_items_in_new_resalable_condition')->nullable();
            $table->text('reason_for_return')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email', 191);
            $table->string('email_confirm', 191)->nullable();
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
        Schema::dropIfExists('rga1_claim_forms');
    }
}
