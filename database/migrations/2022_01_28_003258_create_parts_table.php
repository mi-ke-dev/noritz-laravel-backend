<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('part_list_id')->nullable();
            $table->string('keyword')->nullable();
            $table->string('part_description_en')->nullable();
            $table->string('part_description_jp')->nullable();
            $table->string('part_number')->nullable();
            $table->string('available_for_sale')->nullable();
            $table->string('version')->nullable();
            $table->string('sequence')->nullable();
            $table->string('upgrade_reason_en')->nullable();
            $table->string('upgrade_reason_jp')->nullable();
            $table->timestamps();
            $table->string('serial_num_information')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parts');
    }
}
