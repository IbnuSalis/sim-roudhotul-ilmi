@extends('layouts.app')
@section('title', 'Visi & Misi - Roudhotul Ilmi')
@section('content')

<div class="bg-gradient-to-br from-primary to-tertiary text-white py-16 px-8">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center gap-2 text-sm opacity-70 mb-4">
            <a href="{{ route('home') }}" class="hover:text-white">Beranda</a><span>/</span><span>Visi &amp; Misi</span>
        </div>
        <h1 class="text-h2 font-bold">Visi &amp; Misi</h1>
    </div>
</div>

<div class="max-w-4xl mx-auto px-8 py-12 space-y-8">
    <!-- VISI -->
    <div class="bg-white rounded-2xl shadow-xl border border-surface-container p-8">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-12 h-12 rounded-xl bg-primary flex items-center justify-center">
                <span class="material-symbols-outlined text-white">visibility</span>
            </div>
            <h2 class="font-h3 text-on-surface">Visi</h2>
        </div>
        <div class="text-on-surface-variant leading-relaxed text-lg font-medium italic border-l-4 border-primary pl-6">
            {{ $profil->visi ?? 'Menjadi lembaga pendidikan Islam terpadu yang melahirkan generasi Qur\'ani, berakhlak mulia, dan siap menghadapi tantangan zaman.' }}
        </div>
    </div>

    <!-- MISI -->
    <div class="bg-white rounded-2xl shadow-xl border border-surface-container p-8">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-12 h-12 rounded-xl bg-tertiary flex items-center justify-center">
                <span class="material-symbols-outlined text-white">flag</span>
            </div>
            <h2 class="font-h3 text-on-surface">Misi</h2>
        </div>
        <div class="text-on-surface-variant leading-relaxed whitespace-pre-line">
            {{ $profil->misi ?? "1. Menyelenggarakan pendidikan berbasis Al-Qur'an dan nilai-nilai Islam.\n2. Membangun karakter islami sejak usia dini.\n3. Menyediakan lingkungan belajar yang aman, nyaman, dan menyenangkan.\n4. Bermitra aktif dengan orang tua dalam mendidik anak." }}
        </div>
    </div>

    <!-- TUJUAN -->
    @if($profil->tujuan)
    <div class="bg-white rounded-2xl shadow-xl border border-surface-container p-8">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-12 h-12 rounded-xl bg-secondary-container flex items-center justify-center">
                <span class="material-symbols-outlined text-primary">target</span>
            </div>
            <h2 class="font-h3 text-on-surface">Tujuan</h2>
        </div>
        <div class="text-on-surface-variant leading-relaxed whitespace-pre-line">{{ $profil->tujuan }}</div>
    </div>
    @endif
</div>
@endsection
