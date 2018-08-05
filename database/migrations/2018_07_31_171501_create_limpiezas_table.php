<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLimpiezasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('limpiezas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('paciente_id');
            $table->date('date');
            $table->longText('observations')->nullable();
            $table->timestamps();

            $table->foreign('paciente_id')->references('id')->on('pacientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('limpiezas');
    }
}
