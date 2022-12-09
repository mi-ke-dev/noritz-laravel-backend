<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_events', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->char('batch_id', 36);
            $table->string('user_id', 36);
            $table->string('name');
            $table->string('actionable_type');
            $table->string('actionable_id', 36);
            $table->string('target_type');
            $table->string('target_id', 36);
            $table->string('model_type');
            $table->string('model_id', 36)->nullable();
            $table->text('fields');
            $table->string('status', 25)->default('running');
            $table->text('exception');
            $table->timestamps();
            $table->text('original')->nullable();
            $table->text('changes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('action_events');
    }
}
