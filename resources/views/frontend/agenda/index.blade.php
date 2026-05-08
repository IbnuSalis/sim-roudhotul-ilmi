{{-- resources/views/frontend/agenda/index.blade.php --}}
@extends('layouts.app')
@section('title', 'Agenda - Roudhotul Ilmi')
@section('content')
<div class="bg-gradient-to-br from-primary to-tertiary text-white py-16 px-8">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center gap-2 text-sm opacity-70 mb-4">
            <a href="{{ route('home') }}" class="hover:text-white">Beranda</a><span>/</span><span>Agenda</span>
        </div>
        <h1 class="text-h2 font-bold mb-2">Agenda Kegiatan</h1>
        <p class="opacity-80">Jadwal dan kegiatan sekolah Roudhotul Ilmi</p>
    </div>
</div>
<div class="max-w-7xl mx-auto px-8 py-12">
    <h2 class="font-h3 text-primary mb-6">Akan Datang</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
        @forelse($akanDatang as $item)
        <div class="bg-white rounded-2xl shadow border border-surface-container p-6">
            <div class="flex items-center justify-between mb-3">
                <span class="px-3 py-1 rounded-full text-xs font-bold bg-primary text-white">Akan Datang</span>
                <span class="text-xs text-outline">{{ $item->tanggal->format('d M Y') }}</span>
            </div>
            <h3 class="font-label-md text-on-surface text-lg mb-2">{{ $item->judul }}</h3>
            @if($item->deskripsi)<p class="text-sm text-on-surface-variant mb-3">{{ Str::limit($item->deskripsi, 120) }}</p>@endif
            @if($item->lokasi)
            <div class="flex items-center gap-2 text-outline text-sm">
                <span class="material-symbols-outlined text-sm">location_on</span>{{ $item->lokasi }}
            </div>
            @endif
        </div>
        @empty
        <div class="col-span-3 bg-surface-container rounded-2xl p-10 text-center text-on-surface-variant">Tidak ada agenda yang akan datang.</div>
        @endforelse
    </div>
    <h2 class="font-h3 text-on-surface-variant mb-6">Sudah Selesai</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($selesai as $item)
        <div class="bg-surface-container rounded-2xl border border-outline-variant p-6 opacity-75">
            <div class="flex items-center justify-between mb-3">
                <span class="px-3 py-1 rounded-full text-xs font-bold bg-gray-200 text-gray-600">Selesai</span>
                <span class="text-xs text-outline">{{ $item->tanggal->format('d M Y') }}</span>
            </div>
            <h3 class="font-label-md text-on-surface text-lg mb-2">{{ $item->judul }}</h3>
            @if($item->deskripsi)<p class="text-sm text-on-surface-variant">{{ Str::limit($item->deskripsi, 120) }}</p>@endif
        </div>
        @empty
        <div class="col-span-3 text-center text-on-surface-variant py-8">Belum ada agenda selesai.</div>
        @endforelse
    </div>
</div>
@endsection
