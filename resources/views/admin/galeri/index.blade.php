@extends('admin.layouts.app')
@section('title','Galeri') @section('page-title','Manajemen Galeri')
@section('content')
<div class="flex justify-end mb-5">
    <a href="{{ route('admin.galeri.create') }}" class="bg-primary text-white px-5 py-2.5 rounded-xl font-semibold hover:bg-primary-dark flex items-center gap-2 shadow">
        <span class="material-symbols-outlined">add</span> Tambah Foto
    </a>
</div>
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    @forelse($galeris as $g)
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="h-40 overflow-hidden bg-gray-100">
            <img src="{{ asset('storage/'.$g->gambar) }}" class="w-full h-full object-cover">
        </div>
        <div class="p-3">
            <p class="font-semibold text-sm text-on-surface truncate">{{ $g->judul }}</p>
            @if($g->kategori)
            <span class="text-xs px-2 py-0.5 bg-primary/10 text-primary rounded-full">{{ $g->kategori }}</span>
            @endif
            <div class="flex gap-2 mt-3">
                <a href="{{ route('admin.galeri.edit', $g) }}" class="flex-1 flex items-center justify-center gap-1 py-1.5 bg-blue-50 text-blue-600 rounded-lg text-xs font-semibold hover:bg-blue-100">
                    <span class="material-symbols-outlined text-sm">edit</span> Edit
                </a>
                <form action="{{ route('admin.galeri.destroy', $g) }}" method="POST" onsubmit="return confirm('Hapus foto ini?')" class="flex-1">
                    @csrf @method('DELETE')
                    <button class="w-full flex items-center justify-center gap-1 py-1.5 bg-red-50 text-red-600 rounded-lg text-xs font-semibold hover:bg-red-100">
                        <span class="material-symbols-outlined text-sm">delete</span> Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-4 py-16 text-center text-gray-400">Belum ada foto galeri.</div>
    @endforelse
</div>
@endsection