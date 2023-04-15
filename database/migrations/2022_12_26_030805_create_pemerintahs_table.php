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
        Schema::create('pemerintahs', function (Blueprint $table) {
            $table->id();
            $table->String('nama');
            $table->bigInteger('nik')->unique();
            $table->foreignId('id_jabatan');
            $table->bigInteger('hp');
            $table->String('alamat');
            $table->date('tanggallahir');
            $table->String('jeniskelamin');
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
        Schema::dropIfExists('pemerintahs');
    }
};
