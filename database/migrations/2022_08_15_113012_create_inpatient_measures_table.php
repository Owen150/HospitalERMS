<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInpatientMeasuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inpatient_measures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('inpatient_id');
            $table->integer('app_id');
            $table->string('measure_1');
            $table->string('measure_2');
            $table->string('measure_3');
            $table->string('measure_4');
            $table->string('measure_5');
            $table->string('measure_6');
            $table->string('measure_7');
            $table->timestamps();

            $table->foreign('inpatient_id')->references('id')->on('inpatients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inpatient_measures');
    }
}
