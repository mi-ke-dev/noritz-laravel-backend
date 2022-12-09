<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttributesToHeaterSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('heater_series', function (Blueprint $table) {
            $table->string('category')->nullable()->after('sort_order');
            $table->text('description')->nullable()->after('category');
            $table->text('lifestyle_photo')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('heater_series', function (Blueprint $table) {
            //
        });
    }
}
