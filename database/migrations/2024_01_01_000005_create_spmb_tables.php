<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Pendaftaran SPMB
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_daftar')->unique();
            // Data Anak
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama')->default('Islam');
            $table->integer('anak_ke')->nullable();
            $table->integer('jumlah_saudara')->nullable();
            $table->string('asal_sekolah')->nullable();
            // Data Orang Tua
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('telepon');
            $table->string('email')->nullable();
            $table->text('alamat');
            // Program yang dipilih
            $table->string('program'); // kbtk, tahfid, tpa
            $table->string('tahun_ajaran')->default('2025/2026');
            // Status
            $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->text('catatan_admin')->nullable();
            // Dokumen
            $table->string('foto_anak')->nullable();
            $table->timestamps();
        });

        // Saran & Masukan
        Schema::create('sarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->nullable();
            $table->string('telepon')->nullable();
            $table->string('subjek')->nullable();
            $table->text('pesan');
            $table->boolean('sudah_dibaca')->default(false);
            $table->timestamps();
        });

        // Galeri
        Schema::create('galeris', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('gambar');
            $table->string('kategori')->nullable();
            $table->text('deskripsi')->nullable();
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galeris');
        Schema::dropIfExists('sarans');
        Schema::dropIfExists('pendaftarans');
    }
};
