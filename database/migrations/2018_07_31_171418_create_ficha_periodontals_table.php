<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichaPeriodontalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_periodontals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('paciente_id');
            $table->text('reason')->nullable();
            $table->text('symptom')->nullable();
            $table->smallInteger('smoker')->nullable();
            $table->string('smoker_desc')->nullable();
            $table->smallInteger('stress')->nullable();
            $table->string('stress_desc')->nullable();
            $table->smallInteger('halitosis')->nullable();
            $table->string('halitosis_desc')->nullable();
            $table->smallInteger('sensitivity')->nullable();
            $table->string('sensitivity_desc')->nullable();
            $table->smallInteger('bleeding')->nullable();
            $table->string('bleeding_desc')->nullable();
            $table->text('family_background')->nullable();
            $table->longText('habits')->nullable();
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
        Schema::dropIfExists('ficha_periodontals');
    }
}
