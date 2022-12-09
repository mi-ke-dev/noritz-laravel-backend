<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNovaNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nova_notes', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->timestamps();
            $table->text('text');
            $table->boolean('system');
            $table->string('notable_type');
            $table->uuid('notable_id');
            $table->bigInteger('created_by')->nullable();

            $table->index(['notable_type', 'notable_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nova_notes');
    }
}
