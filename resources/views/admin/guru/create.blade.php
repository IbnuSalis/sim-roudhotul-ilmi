@extends('admin.layouts.app')
@section('title', 'Tambah Guru')
@section('page-title', 'Tambah Staf Pengajar')
@section('page-subtitle', 'Masukkan data guru baru')

@section('content')
<div class="max-w-2xl">
    @if($errors->any())
    <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-5">
        <ul class="text-red-600 text-sm space-y-1">@foreach($errors->all() as $e)<li>• {{ $e }}</li>@endforeach</ul>
    </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <form action="{{ route('admin.guru.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap *</label>
                    <input type="text" name="nama" value="{{ old('nama') }}" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary" placeholder="Nama lengkap guru">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Jabatan *</label>
                    <input type="text" name="jabatan" value="{{ old('jabatan') }}" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary" placeholder="Guru Kelas / Kepala Sekolah">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Pendidikan</label>
                    <input type="text" name="pendidikan" value="{{ old('pendidikan') }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary" placeholder="S1 PGSD / S1 PAI">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Urutan Tampil</label>
                    <input type="number" name="urutan" value="{{ old('urutan', 0) }}" min="0" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary">
                </div>
                <div class="flex items-center gap-3 pt-6">
                    <input type="checkbox" name="aktif" id="aktif" value="1" {{ old('aktif', true) ? 'checked' : '' }} class="accent-primary w-4 h-4">
                    <label for="aktif" class="text-sm font-semibold text-gray-700">Tampilkan di website</label>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Guru</label>
                    <input type="file" name="foto" accept="image/*" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm">
                    <p class="text-xs text-gray-400 mt-1">JPG/PNG, maks 2MB. Disarankan rasio 3:4.</p>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi / Bio Singkat</label>
                    <textarea name="deskripsi" rows="4" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary" placeholder="Bio singkat atau keterangan guru...">{{ old('deskripsi') }}</textarea>
                </div>
            </div>
            <div class="flex items-center justify-between pt-2">
                <a href="{{ route('admin.guru.index') }}" class="text-gray-500 hover:text-gray-700 flex items-center gap-1 text-sm">
                    <span class="material-symbols-outlined text-sm">arrow_back</span> Kembali
                </a>
                <button type="submit" class="bg-primary text-white px-7 py-2.5 rounded-xl font-semibold hover:bg-primary-dark transition-colors shadow flex items-center gap-2">
                    <span class="material-symbols-outlined">save</span> Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
