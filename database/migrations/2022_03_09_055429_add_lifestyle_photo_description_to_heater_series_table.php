<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLifestylePhotoDescriptionToHeaterSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('heater_series', function (Blueprint $table) {
            $table->text('lifestyle_photo_description')->nullable()->after('lifestyle_photo');
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
