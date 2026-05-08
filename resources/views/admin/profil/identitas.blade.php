@extends('admin.layouts.app')
@section('title','Identitas Sekolah') @section('page-title','Identitas Sekolah')
@section('content')
<div class="max-w-3xl">
    @if($errors->any())<div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-5"><ul class="text-red-600 text-sm space-y-1">@foreach($errors->all() as $e)<li>• {{ $e }}</li>@endforeach</ul></div>@endif
    <div class="flex gap-4 mb-5">
        <a href="{{ route('admin.profil.identitas') }}" class="px-4 py-2 rounded-xl text-sm font-semibold bg-primary text-white">Identitas</a>
        <a href="{{ route('admin.profil.visimisi') }}" class="px-4 py-2 rounded-xl text-sm font-semibold bg-white border border-gray-200 text-gray-600 hover:border-primary hover:text-primary">Visi &amp; Misi</a>
    </div>
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <form action="{{ route('admin.profil.identitas.update') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="md:col-span-2"><label class="block text-sm font-semibold text-gray-700 mb-2">Nama Sekolah *</label>
                <input type="text" name="nama_sekolah" value="{{ old('nama_sekolah', $profil->nama_sekolah) }}" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary"></div>
                <div><label class="block text-sm font-semibold text-gray-700 mb-2">NPSN</label>
                <input type="text" name="npsn" value="{{ old('npsn', $profil->npsn) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary"></div>
                <div><label class="block text-sm font-semibold text-gray-700 mb-2">Akreditasi</label>
                <input type="text" name="akreditasi" value="{{ old('akreditasi', $profil->akreditasi) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary"></div>
                <div><label class="block text-sm font-semibold text-gray-700 mb-2">Kepala Sekolah *</label>
                <input type="text" name="kepala_sekolah" value="{{ old('kepala_sekolah', $profil->kepala_sekolah) }}" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary"></div>
                <div><label class="block text-sm font-semibold text-gray-700 mb-2">Tahun Berdiri</label>
                <input type="text" name="tahun_berdiri" value="{{ old('tahun_berdiri', $profil->tahun_berdiri) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary"></div>
                <div class="md:col-span-2"><label class="block text-sm font-semibold text-gray-700 mb-2">Alamat *</label>
                <textarea name="alamat" rows="2" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary">{{ old('alamat', $profil->alamat) }}</textarea></div>
                <div><label class="block text-sm font-semibold text-gray-700 mb-2">Kelurahan</label>
                <input type="text" name="kelurahan" value="{{ old('kelurahan', $profil->kelurahan) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary"></div>
                <div><label class="block text-sm font-semibold text-gray-700 mb-2">Kecamatan</label>
                <input type="text" name="kecamatan" value="{{ old('kecamatan', $profil->kecamatan) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary"></div>
                <div><label class="block text-sm font-semibold text-gray-700 mb-2">Kota/Kabupaten</label>
                <input type="text" name="kabupaten_kota" value="{{ old('kabupaten_kota', $profil->kabupaten_kota) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary"></div>
                <div><label class="block text-sm font-semibold text-gray-700 mb-2">Provinsi</label>
                <input type="text" name="provinsi" value="{{ old('provinsi', $profil->provinsi) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary"></div>
                <div><label class="block text-sm font-semibold text-gray-700 mb-2">Telepon</label>
                <input type="text" name="telepon" value="{{ old('telepon', $profil->telepon) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary"></div>
                <div><label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email', $profil->email) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary"></div>
                <div><label class="block text-sm font-semibold text-gray-700 mb-2">Instagram</label>
                <input type="text" name="instagram" value="{{ old('instagram', $profil->instagram) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary" placeholder="username tanpa @"></div>
                <div><label class="block text-sm font-semibold text-gray-700 mb-2">Nama Yayasan</label>
                <input type="text" name="nama_yayasan" value="{{ old('nama_yayasan', $profil->nama_yayasan) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary"></div>
                <div class="md:col-span-2"><label class="block text-sm font-semibold text-gray-700 mb-2">Foto Gedung</label>
                @if($profil->foto_gedung)<div class="mb-2"><img src="{{ asset('storage/'.$profil->foto_gedung) }}" class="h-32 rounded-xl border border-gray-200 object-cover"></div>@endif
                <input type="file" name="foto_gedung" accept="image/*" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm"></div>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-primary text-white px-7 py-2.5 rounded-xl font-semibold hover:bg-primary-dark shadow flex items-center gap-2"><span class="material-symbols-outlined">save</span> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
