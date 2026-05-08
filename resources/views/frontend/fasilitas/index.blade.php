@extends('layouts.app')
@section('title', 'Fasilitas - Roudhotul Ilmi')
@section('content')

<div class="bg-gradient-to-br from-primary to-tertiary text-white py-16 px-8">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center gap-2 text-sm opacity-70 mb-4">
            <a href="{{ route('home') }}" class="hover:text-white">Beranda</a><span>/</span><span>Fasilitas</span>
        </div>
        <h1 class="text-h2 font-bold mb-2">Fasilitas Sekolah</h1>
        <p class="opacity-80">Sarana dan prasarana pendukung proses belajar mengajar</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-8 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($fasilitas as $item)
        <a href="{{ route('fasilitas.detail', $item->id) }}" class="group block bg-white rounded-2xl shadow border border-surface-container overflow-hidden hover:shadow-xl transition-shadow">
            <div class="relative h-60 overflow-hidden bg-surface-container-low">
                @if($item->gambar)
                    <img src="{{ asset('storage/'.$item->gambar) }}" alt="{{ $item->nama }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"/>
                @else
                    <div class="w-full h-full flex items-center justify-center">
                        <span class="material-symbols-outlined text-7xl text-outline">{{ $item->ikon ?? 'school' }}</span>
                    </div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
            </div>
            <div class="p-6">
                <h3 class="font-label-md text-on-surface text-lg mb-2">{{ $item->nama }}</h3>
                @if($item->deskripsi)
                <p class="text-sm text-on-surface-variant leading-relaxed">{{ Str::limit($item->deskripsi, 120) }}</p>
                @endif
                <div class="flex items-center gap-2 mt-4 text-primary font-semibold text-sm">
                    <span>Lihat Detail</span>
                    <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </div>
            </div>
        </a>
        @empty
        <div class="col-span-3 text-center text-on-surface-variant py-16">
            <span class="material-symbols-outlined text-5xl text-outline mb-4 block">apartment</span>
            Data fasilitas belum tersedia.
        </div>
        @endforelse
    </div>
</div>
@endsection
