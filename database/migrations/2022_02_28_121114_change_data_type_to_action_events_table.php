<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDataTypeToActionEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('action_events', function (Blueprint $table) {
            $table->string('target_id',40)->change();
            $table->string('actionable_id',40)->change();
            $table->string('model_id',40)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('action_events', function (Blueprint $table) {
            //
        });
    }
}
