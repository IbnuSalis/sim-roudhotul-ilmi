@extends('admin.layouts.app')
@section('title','Edit Pendaftaran') @section('page-title','Edit Data Pendaftaran')
@section('content')
<div class="max-w-2xl">
    @if($errors->any())<div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-5"><ul class="text-red-600 text-sm space-y-1">@foreach($errors->all() as $e)<li>• {{ $e }}</li>@endforeach</ul></div>@endif
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <form action="{{ route('admin.spmb.update', $pendaftaran) }}" method="POST" class="space-y-4">
            @csrf @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="md:col-span-2"><label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap *</label>
                <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $pendaftaran->nama_lengkap) }}" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary"></div>
                <div><label class="block text-sm font-semibold text-gray-700 mb-2">Program *</label>
                <select name="program" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary">
                    <option value="kbtk" {{ old('program',$pendaftaran->program)==='kbtk'?'selected':'' }}>KB-TK</option>
                    <option value="tahfid" {{ old('program',$pendaftaran->program)==='tahfid'?'selected':'' }}>Tahfid</option>
                    <option value="tpa" {{ old('program',$pendaftaran->program)==='tpa'?'selected':'' }}>TPA</option>
                </select></div>
                <div><label class="block text-sm font-semibold text-gray-700 mb-2">Telepon *</label>
                <input type="text" name="telepon" value="{{ old('telepon', $pendaftaran->telepon) }}" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary"></div>
                <div><label class="block text-sm font-semibold text-gray-700 mb-2">Status *</label>
                <select name="status" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary">
                    <option value="pending" {{ old('status',$pendaftaran->status)==='pending'?'selected':'' }}>Menunggu</option>
                    <option value="diterima" {{ old('status',$pendaftaran->status)==='diterima'?'selected':'' }}>Diterima</option>
                    <option value="ditolak" {{ old('status',$pendaftaran->status)==='ditolak'?'selected':'' }}>Ditolak</option>
                </select></div>
                <div class="md:col-span-2"><label class="block text-sm font-semibold text-gray-700 mb-2">Catatan Admin</label>
                <textarea name="catatan_admin" rows="3" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary" placeholder="Catatan untuk pendaftar...">{{ old('catatan_admin', $pendaftaran->catatan_admin) }}</textarea></div>
            </div>
            <div class="flex justify-between pt-2">
                <a href="{{ route('admin.spmb.show', $pendaftaran) }}" class="text-gray-500 hover:text-gray-700 flex items-center gap-1 text-sm"><span class="material-symbols-outlined text-sm">arrow_back</span> Kembali</a>
                <button type="submit" class="bg-primary text-white px-7 py-2.5 rounded-xl font-semibold hover:bg-primary-dark shadow flex items-center gap-2"><span class="material-symbols-outlined">save</span> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
