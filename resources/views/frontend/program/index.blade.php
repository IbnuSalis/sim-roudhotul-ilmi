@extends('layouts.app')
@php
    $labels = ['kbtk' => 'KB-TK Roudhotul Ilmi', 'tahfid' => 'Rumah Tahfid Roudhotul Ilmi', 'tpa' => 'TPA Roudhotul Ilmi'];
    $judul = $labels[$kategori] ?? 'Program Sekolah';
@endphp
@section('title', $judul . ' - Roudhotul Ilmi')
@section('content')

<div class="bg-gradient-to-br from-primary to-tertiary text-white py-16 px-8">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center gap-2 text-sm opacity-70 mb-4">
            <a href="{{ route('home') }}" class="hover:text-white">Beranda</a><span>/</span><span>Program Sekolah</span><span>/</span><span>{{ $judul }}</span>
        </div>
        <h1 class="text-h2 font-bold mb-2">{{ $judul }}</h1>
        <div class="flex gap-3 mt-4">
            <a href="{{ route('program.kbtk') }}" class="px-4 py-2 rounded-full text-sm font-semibold {{ $kategori === 'kbtk' ? 'bg-white text-primary' : 'bg-white/20 hover:bg-white/30 text-white' }} transition-colors">KB-TK</a>
            <a href="{{ route('program.tahfid') }}" class="px-4 py-2 rounded-full text-sm font-semibold {{ $kategori === 'tahfid' ? 'bg-white text-primary' : 'bg-white/20 hover:bg-white/30 text-white' }} transition-colors">Rumah Tahfid</a>
            <a href="{{ route('program.tpa') }}" class="px-4 py-2 rounded-full text-sm font-semibold {{ $kategori === 'tpa' ? 'bg-white text-primary' : 'bg-white/20 hover:bg-white/30 text-white' }} transition-colors">TPA</a>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-8 py-12">
    @if($programs->isEmpty())
        <div class="text-center py-20 text-on-surface-variant">
            <span class="material-symbols-outlined text-6xl text-outline mb-4 block">menu_book</span>
            <p>Program untuk kategori ini belum tersedia.</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($programs as $prog)
            <div class="bg-white rounded-2xl shadow border border-surface-container overflow-hidden hover:shadow-xl transition-shadow">
                @if($prog->foto)
                <div class="h-52 overflow-hidden">
                    <img src="{{ asset('storage/'.$prog->foto) }}" alt="{{ $prog->judul }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500"/>
                </div>
                @endif
                <div class="p-6">
                    <h3 class="font-label-md text-on-surface text-lg mb-3">{{ $prog->judul }}</h3>
                    @if($prog->deskripsi)
                    <p class="text-sm text-on-surface-variant leading-relaxed">{{ Str::limit($prog->deskripsi, 150) }}</p>
                    @endif
                    @if($prog->detail)
                    <div class="mt-4 pt-4 border-t border-surface-container">
                        <p class="text-xs text-on-surface-variant leading-relaxed">{!! nl2br(e(Str::limit($prog->detail, 200))) !!}</p>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    @endif

    <div class="mt-12 bg-primary/10 border border-primary/20 rounded-2xl p-8 text-center">
        <h3 class="font-h3 text-on-surface mb-3">Tertarik Mendaftarkan Anak Anda?</h3>
        <p class="text-on-surface-variant mb-6">Daftarkan putra-putri Anda di program {{ $judul }} sekarang.</p>
        <a href="{{ route('spmb') }}" class="bg-primary text-on-primary px-8 py-3 rounded-xl font-label-md hover:bg-primary/90 transition-colors shadow inline-block">
            Daftar SPMB 2025/2026
        </a>
    </div>
</div>
@endsection
