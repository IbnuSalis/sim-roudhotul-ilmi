@extends('layouts.app')
@section('title', 'Staf Pengajar - Roudhotul Ilmi')
@section('content')

<div class="bg-gradient-to-br from-primary to-tertiary text-white py-16 px-8">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center gap-2 text-sm opacity-70 mb-4">
            <a href="{{ route('home') }}" class="hover:text-white">Beranda</a><span>/</span><span>Staf Pengajar</span>
        </div>
        <h1 class="text-h2 font-bold mb-2">Staf Pengajar</h1>
        <p class="opacity-80">Tenaga pendidik profesional dan berpengalaman di Roudhotul Ilmi</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-8 py-12">
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($gurus as $guru)
        <div class="bg-white rounded-2xl shadow border border-surface-container overflow-hidden group hover:shadow-xl transition-shadow">
            <div class="aspect-square overflow-hidden bg-surface-container-low">
                @if($guru->foto)
                    <img src="{{ asset('storage/'.$guru->foto) }}"
                         alt="{{ $guru->nama }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                         style="object-position: {{ $guru->posisi_foto ?? '50% 20%' }}"/>
                @else
                    <div class="w-full h-full flex items-center justify-center">
                        <span class="material-symbols-outlined text-6xl text-outline">person</span>
                    </div>
                @endif
            </div>
            <div class="p-5 text-center">
                <h3 class="font-label-md text-on-surface text-base">{{ $guru->nama }}</h3>
                <p class="font-body-sm text-primary mt-1 font-semibold">{{ $guru->jabatan }}</p>
                @if($guru->pendidikan)
                <p class="font-body-sm text-outline mt-1">{{ $guru->pendidikan }}</p>
                @endif
                @if($guru->deskripsi)
                <p class="text-xs text-on-surface-variant mt-3 leading-relaxed">{{ Str::limit($guru->deskripsi, 100) }}</p>
                @endif
            </div>
        </div>
        @empty
        <div class="col-span-4 text-center text-on-surface-variant py-16">
            <span class="material-symbols-outlined text-5xl text-outline mb-4 block">group</span>
            Data staf pengajar belum tersedia.
        </div>
        @endforelse
    </div>
</div>
@endsection