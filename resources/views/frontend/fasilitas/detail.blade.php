@extends('layouts.app')
@section('title', $item->nama . ' - Roudhotul Ilmi')
@section('content')

<div class="bg-gradient-to-br from-primary to-tertiary text-white py-16 px-8">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center gap-2 text-sm opacity-70 mb-4">
            <a href="{{ route('home') }}" class="hover:text-white">Beranda</a>
            <span>/</span>
            <a href="{{ route('fasilitas') }}" class="hover:text-white">Fasilitas</a>
            <span>/</span>
            <span>{{ $item->nama }}</span>
        </div>
        <h1 class="text-h2 font-bold">{{ $item->nama }}</h1>
    </div>
</div>

<div class="max-w-5xl mx-auto px-8 py-12">
    <div class="bg-white rounded-2xl shadow-xl border border-surface-container overflow-hidden">
        @if($item->gambar)
        <div class="h-96 overflow-hidden">
            <img src="{{ asset('storage/'.$item->gambar) }}" alt="{{ $item->nama }}" class="w-full h-full object-cover"/>
        </div>
        @endif
        <div class="p-8">
            <h2 class="font-h3 text-on-surface mb-4">{{ $item->nama }}</h2>
            @if($item->deskripsi)
            <div class="prose max-w-none text-on-surface-variant leading-relaxed">
                {!! nl2br(e($item->deskripsi)) !!}
            </div>
            @endif
            <div class="mt-8">
                <a href="{{ route('fasilitas') }}" class="inline-flex items-center gap-2 text-primary font-semibold hover:gap-3 transition-all">
                    <span class="material-symbols-outlined">arrow_back</span>
                    Kembali ke Fasilitas
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
