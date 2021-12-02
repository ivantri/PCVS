<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_batches', function (Blueprint $table) {
            $table->id();
            $table->foreignId("vaccine_id");
            $table->foreignId("healthcare_id");
            $table->string("batchno");
            $table->date("expirydate");
            $table->integer("quantityavailable");
            $table->integer("quantittadministered");
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
        Schema::dropIfExists('tb_batches');
    }
}
