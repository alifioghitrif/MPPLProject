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
        Schema::create('aparat_warga_assocs', function (Blueprint $table) {
            $table->id("WargaID");
            $table->string("NIK", 16);
            $table->string("Nama", 64);
            $table->string("Nomor_KK", 16);
            $table->string("Jenis_Kelamin", 32);
            $table->string("Status_Perkawinan", 32);
            $table->date("Tanggal_Lahir");
            $table->string("Pekerjaan", 64);
            $table->string("Status_Dalam_Keluarga", 64);
            $table->string("Nomor_Telepon", 16);
            $table->foreignId("dusun_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aparat_warga_assocs');
    }
};
