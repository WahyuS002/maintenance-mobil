<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();

            $table->integer('driver_id')->constrained('drivers');
            $table->integer('mobil_id')->constrained('mobils');

            $table->string('nama_driver', 64);
            $table->string('nama_mobil', 64);
            $table->string('no_plat', 32);

            $table->string('laporan', 64);
            $table->timestamp('waktu');
            $table->integer('biaya');

            // $table->primary(['driver_id', 'mobil_id']);

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
        Schema::dropIfExists('laporan');
    }
}
