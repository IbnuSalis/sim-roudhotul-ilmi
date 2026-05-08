@extends('admin.layouts.app')
@section('title','Tambah Program') @section('page-title','Tambah Program Sekolah')
@section('content')
<div class="max-w-xl">
    @if($errors->any())<div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-5"><ul class="text-red-600 text-sm space-y-1">@foreach($errors->all() as $e)<li>• {{ $e }}</li>@endforeach</ul></div>@endif
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <form action="{{ route('admin.program.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div><label class="block text-sm font-semibold text-gray-700 mb-2">Judul Program *</label>
            <input type="text" name="judul" value="{{ old('judul') }}" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary"></div>
            <div><label class="block text-sm font-semibold text-gray-700 mb-2">Kategori *</label>
            <select name="kategori" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary">
                <option value="">-- Pilih Kategori --</option>
                <option value="kbtk" {{ old('kategori')==='kbtk'?'selected':'' }}>KB-TK Roudhotul Ilmi</option>
                <option value="tahfid" {{ old('kategori')==='tahfid'?'selected':'' }}>Rumah Tahfid Roudhotul Ilmi</option>
                <option value="tpa" {{ old('kategori')==='tpa'?'selected':'' }}>TPA Roudhotul Ilmi</option>
            </select></div>
            <div><label class="block text-sm font-semibold text-gray-700 mb-2">Foto Program</label>
            <input type="file" name="foto" accept="image/*" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm"><p class="text-xs text-gray-400 mt-1">JPG/PNG, maks 4MB</p></div>
            <div><label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Singkat</label>
            <textarea name="deskripsi" rows="3" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary">{{ old('deskripsi') }}</textarea></div>
            <div><label class="block text-sm font-semibold text-gray-700 mb-2">Detail Program</label>
            <textarea name="detail" rows="5" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary" placeholder="Detail lengkap program, kurikulum, dll...">{{ old('detail') }}</textarea></div>
            <div><label class="block text-sm font-semibold text-gray-700 mb-2">Urutan</label>
            <input type="number" name="urutan" value="{{ old('urutan',0) }}" min="0" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary"></div>
            <div class="flex justify-between pt-2">
                <a href="{{ route('admin.program.index') }}" class="text-gray-500 hover:text-gray-700 flex items-center gap-1 text-sm"><span class="material-symbols-outlined text-sm">arrow_back</span> Kembali</a>
                <button type="submit" class="bg-primary text-white px-7 py-2.5 rounded-xl font-semibold hover:bg-primary-dark shadow flex items-center gap-2"><span class="material-symbols-outlined">save</span> Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
