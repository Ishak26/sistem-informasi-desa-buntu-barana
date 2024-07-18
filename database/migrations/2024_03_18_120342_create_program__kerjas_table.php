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
        Schema::create('program__kerjas', function (Blueprint $table) {
            $table->id();
            $table->string('proker');
            $table->string('bidang');
            $table->string('terbilang');
            $table->bigInteger('anggaran');
            $table->string('Sumber_dana')->nullable();
            $table->boolean('Verifikasi_sekertaris')->nullable();
            $table->boolean('Verifikasi_KepalaDesa')->nullable();
            $table->string('proposal')->nullable();
            $table->boolean('Status_terlaksana')->nullable();
            $table->string('Dokumentasi_pelaksanaan')->nullable();
            $table->date('Tanggal_Pengerjaan')->nullable();
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
        Schema::dropIfExists('program__kerjas');
    }
};
