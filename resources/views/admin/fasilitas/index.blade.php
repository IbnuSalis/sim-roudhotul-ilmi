{{-- resources/views/admin/fasilitas/index.blade.php --}}
@extends('admin.layouts.app')
@section('title','Manajemen Fasilitas') @section('page-title','Fasilitas Sekolah')
@section('content')
<div class="flex justify-end mb-5">
    <a href="{{ route('admin.fasilitas.create') }}" class="bg-primary text-white px-5 py-2.5 rounded-xl font-semibold hover:bg-primary-dark flex items-center gap-2 shadow">
        <span class="material-symbols-outlined">add</span> Tambah Fasilitas
    </a>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
    @forelse($fasilitas as $f)
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="h-44 bg-gray-100 overflow-hidden">
            @if($f->gambar)<img src="{{ asset('storage/'.$f->gambar) }}" class="w-full h-full object-cover">
            @else<div class="w-full h-full flex items-center justify-center"><span class="material-symbols-outlined text-5xl text-gray-300">{{ $f->ikon ?? 'school' }}</span></div>@endif
        </div>
        <div class="p-4">
            <h3 class="font-bold text-on-surface">{{ $f->nama }}</h3>
            <p class="text-sm text-gray-500 mt-1">{{ Str::limit($f->deskripsi, 80) }}</p>
            <div class="flex gap-2 mt-4">
                <a href="{{ route('admin.fasilitas.edit', $f) }}" class="flex-1 flex items-center justify-center gap-1 py-2 bg-blue-50 text-blue-600 rounded-lg text-sm font-semibold hover:bg-blue-100">
                    <span class="material-symbols-outlined text-sm">edit</span> Edit
                </a>
                <form action="{{ route('admin.fasilitas.destroy', $f) }}" method="POST" onsubmit="return confirm('Hapus fasilitas ini?')" class="flex-1">
                    @csrf @method('DELETE')
                    <button type="submit" class="w-full flex items-center justify-center gap-1 py-2 bg-red-50 text-red-600 rounded-lg text-sm font-semibold hover:bg-red-100">
                        <span class="material-symbols-outlined text-sm">delete</span> Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
    @empty<div class="col-span-3 py-16 text-center text-gray-400">Belum ada fasilitas.</div>@endforelse
</div>
@endsection
