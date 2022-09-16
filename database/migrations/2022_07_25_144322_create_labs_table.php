<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('appointment_id');

            $table->string('whitebooldcells')->nullable();
            $table->string('redbooldcells')->nullable();
            $table->string('prothrombintime')->nullable();
            $table->string('activatedpartialthromboplastin')->nullable();
            $table->string('aspartateaminotransferase')->nullable();
            $table->string('alanineaminotransferase')->nullable();
            $table->string('mlactatedehydrogenase')->nullable();
            
            $table->string('bloodureanitrogen')->nullable();
            $table->string('WBCcountWdifferential')->nullable();
            $table->string('Quantitativeimmunoglobulin')->nullable();
            $table->string('Erythrocytesedimentationrate')->nullable();
            $table->string('alpha_antitrypsin')->nullable();
            $table->string('Reticcount')->nullable();
            $table->string('arterialbloodgasses')->nullable();
            

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
        Schema::dropIfExists('labs');
    }
}
