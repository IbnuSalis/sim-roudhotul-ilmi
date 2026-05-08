@extends('admin.layouts.app')
@section('title','Visi & Misi') @section('page-title','Visi & Misi')
@section('content')
<div class="max-w-3xl">
    @if($errors->any())<div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-5"><ul class="text-red-600 text-sm space-y-1">@foreach($errors->all() as $e)<li>• {{ $e }}</li>@endforeach</ul></div>@endif
    <div class="flex gap-4 mb-5">
        <a href="{{ route('admin.profil.identitas') }}" class="px-4 py-2 rounded-xl text-sm font-semibold bg-white border border-gray-200 text-gray-600 hover:border-primary hover:text-primary">Identitas</a>
        <a href="{{ route('admin.profil.visimisi') }}" class="px-4 py-2 rounded-xl text-sm font-semibold bg-primary text-white">Visi &amp; Misi</a>
    </div>
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <form action="{{ route('admin.profil.visimisi.update') }}" method="POST" class="space-y-5">
            @csrf @method('PUT')
            <div><label class="block text-sm font-semibold text-gray-700 mb-2">Visi Sekolah *</label>
            <textarea name="visi" rows="4" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary" placeholder="Visi sekolah...">{{ old('visi', $profil->visi) }}</textarea></div>
            <div><label class="block text-sm font-semibold text-gray-700 mb-2">Misi Sekolah *</label>
            <p class="text-xs text-gray-400 mb-2">Gunakan enter untuk memisahkan poin-poin misi.</p>
            <textarea name="misi" rows="8" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary" placeholder="1. Poin misi pertama...&#10;2. Poin misi kedua...">{{ old('misi', $profil->misi) }}</textarea></div>
            <div><label class="block text-sm font-semibold text-gray-700 mb-2">Tujuan Sekolah</label>
            <textarea name="tujuan" rows="4" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary" placeholder="Tujuan sekolah (opsional)...">{{ old('tujuan', $profil->tujuan) }}</textarea></div>
            <div class="flex justify-end">
                <button type="submit" class="bg-primary text-white px-7 py-2.5 rounded-xl font-semibold hover:bg-primary-dark shadow flex items-center gap-2"><span class="material-symbols-outlined">save</span> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
