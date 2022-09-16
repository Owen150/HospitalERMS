<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeasureradiologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measureradiologies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('appointment_id');

            $table->string('measrure_1')->nullable();
            $table->string('measrure_2')->nullable();
            $table->string('measrure_3')->nullable();
            $table->string('measrure_4')->nullable();
            $table->string('measrure_5')->nullable();
            $table->string('measrure_6')->nullable();
            

            $table->string('department')->nullable();

            $table->timestamps();
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('appointment_id')->references('id')->on('appointments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('measureradiologies');
    }
}
