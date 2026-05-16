<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profil_sekolahs', function (Blueprint $table) {
            $table->id();

            // Identitas Sekolah
            $table->string('nama_sekolah')->default('KBTK & Rumah Tahfid Roudhotul Ilmi');
            $table->string('npsn')->nullable();
            $table->string('nss')->nullable();
            $table->string('akreditasi')->default('B');
            $table->string('kepala_sekolah')->default('Ustadzah Nur Fadhilah, S.Pd.');
            $table->string('tahun_berdiri')->default('2010');
            $table->string('status')->default('Swasta');
            $table->string('jenjang')->default('PAUD/TK');
            $table->text('alamat')->nullable();
            $table->string('kelurahan')->default('Jetis Kulon');
            $table->string('kecamatan')->default('Wonocolo');
            $table->string('kabupaten_kota')->default('Surabaya');
            $table->string('provinsi')->default('Jawa Timur');
            $table->string('kode_pos')->default('60162');
            $table->string('telepon')->default('+62 812-3456-7890');
            $table->string('email')->default('roudhotulilmi@gmail.com');
            $table->string('website')->nullable();
            $table->string('instagram')->default('roudhotulilmi');
            $table->string('nama_yayasan')->default('Yayasan Pendidikan Islam Roudhotul Ilmi');
            $table->string('ketua_yayasan')->nullable();
            $table->string('foto_gedung')->nullable();

            // Visi & Misi
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->text('tujuan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil_sekolahs');
    }
};