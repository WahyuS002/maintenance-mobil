<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 64);

            $table->char('nik', 16)->unique();
            $table->string('role', 10)->nullable();
            $table->string('password');
            $table->string('alamat', 32)->nullable();
            $table->integer('no_hp')->nullable();
            $table->enum('jk', ['p', 'l'])->nullable();

            $table->rememberToken();

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
        Schema::dropIfExists('drivers');
    }
}
