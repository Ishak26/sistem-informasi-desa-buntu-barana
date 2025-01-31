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
            $table->String('foto');
            $table->String('nama');
            $table->bigInteger('nip')->unique();
            $table->String('jabatan');
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
