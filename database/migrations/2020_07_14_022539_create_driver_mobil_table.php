<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverMobilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_mobil', function (Blueprint $table) {
            $table->integer('driver_id')->constrained('drivers');
            $table->integer('mobil_id')->constrained('mobils');
            $table->primary(['driver_id', 'mobil_id']);

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
        Schema::dropIfExists('driver_mobil');
    }
}
