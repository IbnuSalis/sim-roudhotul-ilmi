<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('beranda_settings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kepala')->default('Ustadzah Nur Fadhilah, S.Pd.');
            $table->string('jabatan_kepala')->default('Kepala Yayasan');
            $table->string('foto_kepala')->nullable();
            $table->text('quote_kepala')->nullable();
            $table->text('sambutan')->nullable();
            $table->integer('jumlah_guru')->default(8);
            $table->integer('jumlah_siswa')->default(120);
            $table->integer('jumlah_rombel')->default(6);
            $table->string('label_guru')->default('Guru & Staf Profesional');
            $table->string('label_siswa')->default('Peserta Didik Aktif');
            $table->string('label_rombel')->default('Rombongan Belajar');
            $table->string('hero_slide_1')->nullable();
            $table->string('hero_slide_2')->nullable();
            $table->string('hero_slide_3')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beranda_settings');
    }
};