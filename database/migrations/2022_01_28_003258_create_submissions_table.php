<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->uuid('id')->default('uuid_generate_v4()')->primary();
            $table->string('is_this_a_heater')->nullable();
            $table->string('is_this_venting_accessories_andor_parts')->nullable();
            $table->string('have_you_contacted_technical_support_for_troubleshooting')->nullable();
            $table->string('was_the_item_received_damaged')->nullable();
            $table->string('did_you_receive_incorrect_items_andor_quantities')->nullable();
            $table->string('is_the_item_defective')->nullable();
            $table->string('is_this_new_unused_and_needs_to_be_returned')->nullable();
            $table->string('submission_type')->nullable();
            $table->uuid('submission_id')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('submitted_at')->nullable();
            $table->timestamps();
            $table->string('claim_id')->nullable();
            $table->time('archived_at', 6)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submissions');
    }
}
