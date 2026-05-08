@extends('admin.layouts.app')
@section('title','Detail Saran') @section('page-title','Detail Saran & Masukan')
@section('content')
<div class="max-w-2xl space-y-5">
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.saran.index') }}" class="text-gray-500 hover:text-primary flex items-center gap-1 text-sm">
            <span class="material-symbols-outlined text-sm">arrow_back</span> Kembali
        </a>
        <form action="{{ route('admin.saran.destroy', $saran) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')">
            @csrf @method('DELETE')
            <button type="submit" class="flex items-center gap-1 text-red-500 hover:text-red-700 text-sm font-semibold">
                <span class="material-symbols-outlined text-sm">delete</span> Hapus Pesan
            </button>
        </form>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-start justify-between mb-5">
            <div>
                <h2 class="text-lg font-bold text-on-surface">{{ $saran->nama }}</h2>
                <div class="flex items-center gap-4 mt-1 text-sm text-gray-500">
                    @if($saran->email)<span class="flex items-center gap-1"><span class="material-symbols-outlined text-xs">mail</span>{{ $saran->email }}</span>@endif
                    @if($saran->telepon)<span class="flex items-center gap-1"><span class="material-symbols-outlined text-xs">call</span>{{ $saran->telepon }}</span>@endif
                </div>
            </div>
            <span class="px-3 py-1 rounded-full text-xs font-bold {{ $saran->sudah_dibaca ? 'bg-gray-100 text-gray-500' : 'bg-yellow-100 text-yellow-700' }}">
                {{ $saran->sudah_dibaca ? 'Sudah Dibaca' : 'Baru' }}
            </span>
        </div>

        @if($saran->subjek)
        <div class="mb-4 pb-4 border-b border-gray-100">
            <p class="text-xs font-bold text-gray-400 uppercase mb-1">Subjek</p>
            <p class="font-semibold text-on-surface">{{ $saran->subjek }}</p>
        </div>
        @endif

        <div class="mb-4">
            <p class="text-xs font-bold text-gray-400 uppercase mb-2">Pesan</p>
            <div class="bg-gray-50 rounded-xl p-4 text-on-surface leading-relaxed whitespace-pre-line">{{ $saran->pesan }}</div>
        </div>

        <p class="text-xs text-gray-400">Diterima: {{ $saran->created_at->format('d F Y, H:i') }} WIB</p>

        @if($saran->email)
        <div class="mt-5 pt-5 border-t border-gray-100">
            <a href="mailto:{{ $saran->email }}?subject=Re: {{ $saran->subjek ?? 'Balasan dari Roudhotul Ilmi' }}"
               class="inline-flex items-center gap-2 bg-primary text-white px-5 py-2.5 rounded-xl text-sm font-semibold hover:bg-primary-dark transition-colors">
                <span class="material-symbols-outlined text-sm">reply</span> Balas via Email
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
