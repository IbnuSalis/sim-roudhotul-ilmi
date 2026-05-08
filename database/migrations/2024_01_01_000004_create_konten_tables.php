<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Guru / Staf Pengajar
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan');
            $table->string('pendidikan')->nullable();
            $table->string('foto')->nullable();
            $table->text('deskripsi')->nullable();
            $table->integer('urutan')->default(0);
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });

        // Fasilitas
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('gambar')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('ikon')->nullable();
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });

        // Program Sekolah
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('kategori'); // kbtk, tahfid, tpa
            $table->string('foto')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('detail')->nullable();
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });

        // Agenda
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->date('tanggal');
            $table->string('lokasi')->nullable();
            $table->enum('status', ['akan_datang', 'selesai'])->default('akan_datang');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('agendas');
        Schema::dropIfExists('programs');
        Schema::dropIfExists('fasilitas');
        Schema::dropIfExists('gurus');
    }
};
