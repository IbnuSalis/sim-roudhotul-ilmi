@extends('admin.layouts.app')
@section('title','Edit Fasilitas') @section('page-title','Edit Fasilitas')
@section('content')
<div class="max-w-xl">
    @if($errors->any())<div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-5"><ul class="text-red-600 text-sm space-y-1">@foreach($errors->all() as $e)<li>• {{ $e }}</li>@endforeach</ul></div>@endif
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <form action="{{ route('admin.fasilitas.update', $fasilitas) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf @method('PUT')
            <div><label class="block text-sm font-semibold text-gray-700 mb-2">Nama Fasilitas *</label>
            <input type="text" name="nama" value="{{ old('nama', $fasilitas->nama) }}" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary"></div>
            <div><label class="block text-sm font-semibold text-gray-700 mb-2">Ikon</label>
            <input type="text" name="ikon" value="{{ old('ikon', $fasilitas->ikon) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary"></div>
            <div><label class="block text-sm font-semibold text-gray-700 mb-2">Gambar Fasilitas</label>
            @if($fasilitas->gambar)<div class="mb-2"><img src="{{ asset('storage/'.$fasilitas->gambar) }}" class="h-32 w-full object-cover rounded-xl border border-gray-200"></div>@endif
            <input type="file" name="gambar" accept="image/*" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm"><p class="text-xs text-gray-400 mt-1">Kosongkan jika tidak ingin mengubah gambar.</p></div>
            <div><label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
            <textarea name="deskripsi" rows="4" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary">{{ old('deskripsi', $fasilitas->deskripsi) }}</textarea></div>
            <div><label class="block text-sm font-semibold text-gray-700 mb-2">Urutan</label>
            <input type="number" name="urutan" value="{{ old('urutan', $fasilitas->urutan) }}" min="0" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary"></div>
            <div class="flex justify-between pt-2">
                <a href="{{ route('admin.fasilitas.index') }}" class="text-gray-500 hover:text-gray-700 flex items-center gap-1 text-sm"><span class="material-symbols-outlined text-sm">arrow_back</span> Kembali</a>
                <button type="submit" class="bg-primary text-white px-7 py-2.5 rounded-xl font-semibold hover:bg-primary-dark shadow flex items-center gap-2"><span class="material-symbols-outlined">save</span> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
