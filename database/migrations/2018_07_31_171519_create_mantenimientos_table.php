<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMantenimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('periodontal_record_id');
            $table->integer('pacient_id');
            $table->date('date');
            $table->longText('observations')->nullable();
            $table->timestamps();

            $table->foreign('periodontal_record_id')->references('id')->on('ficha_periodontals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mantenimientos');
    }
}
