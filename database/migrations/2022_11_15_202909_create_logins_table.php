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
        Schema::create('logins', function (Blueprint $table) {
            $table->id();
            $table->string('profil')->nullable();
            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->String('nama')->nullable();
            $table->bigInteger('nik')->unique()->nullable();
            $table->string('bidang')->nullable();
            $table->bigInteger('hp')->nullable();
            $table->String('alamat')->nullable();
            $table->date('tanggallahir')->nullable();
            $table->String('jeniskelamin')->nullable();
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
        Schema::dropIfExists('logins');
    }
};
