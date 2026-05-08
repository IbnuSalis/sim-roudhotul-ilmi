@extends('admin.layouts.app')
@section('title','Tambah Agenda') @section('page-title','Tambah Agenda')
@section('content')
<div class="max-w-xl">
    @if($errors->any())<div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-5"><ul class="text-red-600 text-sm space-y-1">@foreach($errors->all() as $e)<li>• {{ $e }}</li>@endforeach</ul></div>@endif
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <form action="{{ route('admin.agenda.store') }}" method="POST" class="space-y-4">
            @csrf
            <div><label class="block text-sm font-semibold text-gray-700 mb-2">Judul Agenda *</label>
            <input type="text" name="judul" value="{{ old('judul') }}" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary" placeholder="Nama kegiatan/acara"></div>
            <div class="grid grid-cols-2 gap-4">
                <div><label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal *</label>
                <input type="date" name="tanggal" value="{{ old('tanggal') }}" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary"></div>
                <div><label class="block text-sm font-semibold text-gray-700 mb-2">Status *</label>
                <select name="status" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary">
                    <option value="akan_datang" {{ old('status')==='akan_datang'?'selected':'' }}>Akan Datang</option>
                    <option value="selesai" {{ old('status')==='selesai'?'selected':'' }}>Selesai</option>
                </select></div>
            </div>
            <div><label class="block text-sm font-semibold text-gray-700 mb-2">Lokasi</label>
            <input type="text" name="lokasi" value="{{ old('lokasi') }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary" placeholder="Aula, Lapangan, Online..."></div>
            <div><label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
            <textarea name="deskripsi" rows="4" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary" placeholder="Keterangan kegiatan...">{{ old('deskripsi') }}</textarea></div>
            <div class="flex justify-between pt-2">
                <a href="{{ route('admin.agenda.index') }}" class="text-gray-500 hover:text-gray-700 flex items-center gap-1 text-sm"><span class="material-symbols-outlined text-sm">arrow_back</span> Kembali</a>
                <button type="submit" class="bg-primary text-white px-7 py-2.5 rounded-xl font-semibold hover:bg-primary-dark shadow flex items-center gap-2"><span class="material-symbols-outlined">save</span> Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
