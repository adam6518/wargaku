<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('voters', function (Blueprint $table) {

            $table->id();

            $table->string('nama');
            $table->string('nik')->unique();
            $table->string('no_kk');

            $table->string('jenis_kelamin');

            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();

            $table->string('no_hp')->nullable();

            $table->string('kabupaten')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('desa')->nullable();
            $table->string('dusun')->nullable();
            $table->string('rt_rw')->nullable();

            $table->string('tps')->nullable();

            $table->string('status_dukungan')->nullable();
            $table->string('kategori')->nullable();

            $table->text('aspirasi')->nullable();
            $table->text('catatan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('voters');
    }
};