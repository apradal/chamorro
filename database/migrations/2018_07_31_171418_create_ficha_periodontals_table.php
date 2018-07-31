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
            $table->unsignedInteger('pacient_id');
            $table->text('reason');
            $table->text('symptom');
            $table->smallInteger('smoker');
            $table->string('smoker_desc')->nullable();
            $table->smallInteger('stress');
            $table->string('stress_desc')->nullable();
            $table->smallInteger('halitosis');
            $table->string('halitosis_desc')->nullable();
            $table->smallInteger('sensitivity');
            $table->string('sensitivity_desc')->nullable();
            $table->smallInteger('bleeding');
            $table->string('bleeding_desc')->nullable();
            $table->text('family_background');
            $table->longText('habits');
            $table->timestamps();

            $table->foreign('pacient_id')->references('id')->on('pacientes');
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
