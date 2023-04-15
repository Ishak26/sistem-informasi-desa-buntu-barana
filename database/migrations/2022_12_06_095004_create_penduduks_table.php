<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nik')->unique();
            $table->string('nama');
            $table->string('email');
            $table->string('alamat');
            $table->string('dusun');
            $table->string('agama');
            $table->string('status');
            $table->bigInteger('hp');
            $table->string('umur');
            $table->string('jk');
            $table->date('tanggallahir');
            $table->String('tempatlahir');
            $table->string('pendidikan');
            $table->string('namasekolah')->nullable();
            $table->string('pekerjaan');
            $table->bigInteger('penghasilan')->nullable();
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
        Schema::dropIfExists('penduduks');
    }
};
