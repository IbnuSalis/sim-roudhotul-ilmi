@extends('layouts.app')
@section('title', 'Pendaftaran Berhasil - Roudhotul Ilmi')
@section('content')
<div class="min-h-[60vh] flex items-center justify-center py-16 px-8">
    <div class="max-w-lg w-full bg-white rounded-2xl shadow-xl border border-surface-container p-10 text-center">
        <div class="w-20 h-20 rounded-full bg-green-100 flex items-center justify-center mx-auto mb-6">
            <span class="material-symbols-outlined text-green-600 text-5xl">check_circle</span>
        </div>
        <h1 class="font-h3 text-on-surface mb-2">Pendaftaran Berhasil!</h1>
        <p class="text-on-surface-variant mb-6">Formulir pendaftaran Anda telah berhasil dikirim. Simpan kode pendaftaran berikut:</p>
        <div class="bg-primary/10 border border-primary/30 rounded-xl p-4 mb-6">
            <p class="text-sm text-on-surface-variant mb-1">Kode Pendaftaran</p>
            <p class="text-3xl font-bold text-primary font-mono">{{ $pendaftaran->kode_daftar }}</p>
        </div>
        <div class="text-left bg-surface-container-low rounded-xl p-4 mb-6 space-y-2">
            <div class="flex justify-between text-sm">
                <span class="text-on-surface-variant">Nama</span>
                <span class="font-semibold text-on-surface">{{ $pendaftaran->nama_lengkap }}</span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-on-surface-variant">Program</span>
                <span class="font-semibold text-on-surface">{{ $pendaftaran->label_program }}</span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-on-surface-variant">Tahun Ajaran</span>
                <span class="font-semibold text-on-surface">{{ $pendaftaran->tahun_ajaran }}</span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-on-surface-variant">Status</span>
                <span class="px-2 py-0.5 rounded-full text-xs font-bold bg-yellow-100 text-yellow-800">{{ $pendaftaran->label_status }}</span>
            </div>
        </div>
        <p class="text-sm text-on-surface-variant mb-8">Tim kami akan menghubungi Anda melalui nomor <strong>{{ $pendaftaran->telepon }}</strong> untuk informasi selanjutnya.</p>
        <a href="{{ route('home') }}" class="bg-primary text-on-primary px-8 py-3 rounded-xl font-label-md hover:bg-primary/90 transition-colors inline-block">
            Kembali ke Beranda
        </a>
    </div>
</div>
@endsection
