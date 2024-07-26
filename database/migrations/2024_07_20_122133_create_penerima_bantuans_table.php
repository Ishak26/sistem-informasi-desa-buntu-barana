<?php

use App\Models\Bantuan;
use App\Models\Penduduk;
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
        Schema::create('penerima_bantuans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Bantuan::class);
            $table->foreignIdFor(Penduduk::class)->unique();
            $table->boolean('status')->nullable()->default(0);
            $table->string('buktiterima')->nullable();
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
        Schema::dropIfExists('penerima_bantuans');
    }
};
