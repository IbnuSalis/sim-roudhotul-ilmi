@extends('layouts.app')
@section('title', 'Identitas Sekolah - Roudhotul Ilmi')
@section('content')

<div class="bg-gradient-to-br from-primary to-tertiary text-white py-16 px-8">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center gap-2 text-sm opacity-70 mb-4">
            <a href="{{ route('home') }}" class="hover:text-white">Beranda</a><span>/</span><span>Identitas Sekolah</span>
        </div>
        <h1 class="text-h2 font-bold">Identitas Sekolah</h1>
    </div>
</div>

<div class="max-w-5xl mx-auto px-8 py-12">
    <div class="bg-white rounded-2xl shadow-xl border border-surface-container overflow-hidden">
        @if($profil->foto_gedung)
        <div class="h-72 overflow-hidden">
            <img src="{{ asset('storage/'.$profil->foto_gedung) }}" alt="Gedung Sekolah" class="w-full h-full object-cover"/>
        </div>
        @endif
        <div class="p-8">
            <h2 class="font-h2 text-primary mb-8">{{ $profil->nama_sekolah }}</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @php
                $rows = [
                    ['Nama Sekolah',     $profil->nama_sekolah],
                    ['NPSN',             $profil->npsn],
                    ['NSS',              $profil->nss],
                    ['Akreditasi',       $profil->akreditasi],
                    ['Kepala Sekolah',   $profil->kepala_sekolah],
                    ['Tahun Berdiri',    $profil->tahun_berdiri],
                    ['Status',           $profil->status],
                    ['Jenjang',          $profil->jenjang],
                    ['Alamat',           $profil->alamat],
                    ['Kelurahan',        $profil->kelurahan],
                    ['Kecamatan',        $profil->kecamatan],
                    ['Kota/Kabupaten',   $profil->kabupaten_kota],
                    ['Provinsi',         $profil->provinsi],
                    ['Kode Pos',         $profil->kode_pos],
                    ['Telepon',          $profil->telepon],
                    ['Email',            $profil->email],
                    ['Instagram',        $profil->instagram ? '@'.$profil->instagram : null],
                    ['Nama Yayasan',     $profil->nama_yayasan],
                ];
                @endphp
                @foreach($rows as $row)
                @if($row[1])
                <div class="border-b border-surface-container pb-4">
                    <p class="text-xs text-outline uppercase tracking-wider font-semibold mb-1">{{ $row[0] }}</p>
                    <p class="text-on-surface font-medium">{{ $row[1] }}</p>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
