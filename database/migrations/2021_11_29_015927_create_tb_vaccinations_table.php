<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbVaccinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_vaccinations', function (Blueprint $table) {
            $table->id();
            $table->date("appointmentdate");
            $table->string("status");
            $table->string("remarks");
            $table->foreignId("batch_id");
            $table->foreignId("patient_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_vaccinations');
    }
}
