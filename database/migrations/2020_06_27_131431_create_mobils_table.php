<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();

            // $table->unsignedBigInteger('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreignId('brand_id');

            $table->string('no_plat', 32);
            $table->string('nama_mobil', 64);
            // $table->string('tipe_mobil', 128);
            $table->integer('max_minyak');
            $table->string('foto', 128);
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
        Schema::dropIfExists('mobils');
    }
}
