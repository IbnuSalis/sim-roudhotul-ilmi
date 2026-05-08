@extends('layouts.app')
@section('title', 'SPMB 2025/2026 - Roudhotul Ilmi')
@section('content')

<!-- Page Header -->
<div class="bg-gradient-to-br from-primary to-tertiary text-white py-16 px-8">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center gap-2 text-sm opacity-70 mb-4">
            <a href="{{ route('home') }}" class="hover:text-white">Beranda</a>
            <span>/</span>
            <span>SPMB 2025/2026</span>
        </div>
        <h1 class="text-h2 font-bold mb-2">Penerimaan Peserta Didik Baru</h1>
        <p class="opacity-80">Tahun Ajaran 2025/2026 | Roudhotul Ilmi</p>
    </div>
</div>

<div class="max-w-4xl mx-auto px-8 py-12">
    @if($errors->any())
    <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6">
        <p class="font-semibold text-red-700 mb-2">Terdapat kesalahan:</p>
        <ul class="text-red-600 text-sm space-y-1">
            @foreach($errors->all() as $error)
            <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="bg-white rounded-2xl shadow-xl border border-surface-container p-8">
        <div class="mb-8 p-4 bg-primary/10 border border-primary/20 rounded-xl">
            <div class="flex items-start gap-3">
                <span class="material-symbols-outlined text-primary">info</span>
                <div>
                    <p class="font-label-md text-primary">Informasi Pendaftaran</p>
                    <p class="text-sm text-on-surface-variant mt-1">Isi formulir di bawah dengan lengkap dan benar. Kode pendaftaran akan diberikan setelah formulir terkirim.</p>
                </div>
            </div>
        </div>

        <form action="{{ route('spmb.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- DATA ANAK -->
            <h3 class="font-h3 text-on-surface border-b border-surface-container pb-3 mb-6">Data Calon Peserta Didik</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">
                <div class="md:col-span-2">
                    <label class="block font-label-md text-on-surface mb-2">Nama Lengkap *</label>
                    <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required
                           class="w-full border border-outline-variant rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Nama lengkap anak">
                </div>
                <div>
                    <label class="block font-label-md text-on-surface mb-2">Nama Panggilan *</label>
                    <input type="text" name="nama_panggilan" value="{{ old('nama_panggilan') }}" required
                           class="w-full border border-outline-variant rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary" placeholder="Nama panggilan">
                </div>
                <div>
                    <label class="block font-label-md text-on-surface mb-2">Jenis Kelamin *</label>
                    <select name="jenis_kelamin" required class="w-full border border-outline-variant rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary">
                        <option value="">-- Pilih --</option>
                        <option value="L" {{ old('jenis_kelamin') === 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jenis_kelamin') === 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div>
                    <label class="block font-label-md text-on-surface mb-2">Tempat Lahir *</label>
                    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required
                           class="w-full border border-outline-variant rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary" placeholder="Kota lahir">
                </div>
                <div>
                    <label class="block font-label-md text-on-surface mb-2">Tanggal Lahir *</label>
                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required
                           class="w-full border border-outline-variant rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="block font-label-md text-on-surface mb-2">Agama</label>
                    <input type="text" name="agama" value="{{ old('agama', 'Islam') }}"
                           class="w-full border border-outline-variant rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="block font-label-md text-on-surface mb-2">Anak ke-</label>
                    <input type="number" name="anak_ke" value="{{ old('anak_ke') }}" min="1"
                           class="w-full border border-outline-variant rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary" placeholder="1">
                </div>
                <div>
                    <label class="block font-label-md text-on-surface mb-2">Jumlah Saudara</label>
                    <input type="number" name="jumlah_saudara" value="{{ old('jumlah_saudara') }}" min="0"
                           class="w-full border border-outline-variant rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary" placeholder="0">
                </div>
            </div>

            <!-- DATA ORANG TUA -->
            <h3 class="font-h3 text-on-surface border-b border-surface-container pb-3 mb-6 mt-8">Data Orang Tua / Wali</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">
                <div>
                    <label class="block font-label-md text-on-surface mb-2">Nama Ayah *</label>
                    <input type="text" name="nama_ayah" value="{{ old('nama_ayah') }}" required
                           class="w-full border border-outline-variant rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary" placeholder="Nama lengkap ayah">
                </div>
                <div>
                    <label class="block font-label-md text-on-surface mb-2">Nama Ibu *</label>
                    <input type="text" name="nama_ibu" value="{{ old('nama_ibu') }}" required
                           class="w-full border border-outline-variant rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary" placeholder="Nama lengkap ibu">
                </div>
                <div>
                    <label class="block font-label-md text-on-surface mb-2">Pekerjaan Ayah</label>
                    <input type="text" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}"
                           class="w-full border border-outline-variant rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary" placeholder="Pekerjaan ayah">
                </div>
                <div>
                    <label class="block font-label-md text-on-surface mb-2">Pekerjaan Ibu</label>
                    <input type="text" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}"
                           class="w-full border border-outline-variant rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary" placeholder="Pekerjaan ibu">
                </div>
                <div>
                    <label class="block font-label-md text-on-surface mb-2">Nomor Telepon / WA *</label>
                    <input type="text" name="telepon" value="{{ old('telepon') }}" required
                           class="w-full border border-outline-variant rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary" placeholder="08xxxxxxxxxx">
                </div>
                <div>
                    <label class="block font-label-md text-on-surface mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                           class="w-full border border-outline-variant rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary" placeholder="email@contoh.com">
                </div>
                <div class="md:col-span-2">
                    <label class="block font-label-md text-on-surface mb-2">Alamat Lengkap *</label>
                    <textarea name="alamat" rows="3" required
                              class="w-full border border-outline-variant rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary" placeholder="Alamat rumah lengkap">{{ old('alamat') }}</textarea>
                </div>
            </div>

            <!-- PROGRAM -->
            <h3 class="font-h3 text-on-surface border-b border-surface-container pb-3 mb-6 mt-8">Program yang Dipilih</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                @php $programs = ['kbtk' => 'KB-TK Roudhotul Ilmi', 'tahfid' => 'Rumah Tahfid Roudhotul Ilmi', 'tpa' => 'TPA Roudhotul Ilmi']; @endphp
                @foreach($programs as $val => $label)
                <label class="flex items-center gap-4 p-4 rounded-xl border-2 border-outline-variant cursor-pointer hover:border-primary transition-colors {{ old('program') === $val ? 'border-primary bg-primary/5' : '' }}">
                    <input type="radio" name="program" value="{{ $val }}" {{ old('program') === $val ? 'checked' : '' }} required class="accent-primary w-5 h-5">
                    <div>
                        <p class="font-label-md text-on-surface">{{ $label }}</p>
                    </div>
                </label>
                @endforeach
            </div>

            <!-- FOTO ANAK -->
            <div class="mb-8">
                <label class="block font-label-md text-on-surface mb-2">Foto Anak (opsional)</label>
                <input type="file" name="foto_anak" accept="image/*"
                       class="w-full border border-outline-variant rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary">
                <p class="text-xs text-outline mt-1">Format: JPG, PNG. Maks 2MB.</p>
            </div>

            <button type="submit" class="w-full bg-primary text-on-primary py-4 rounded-xl font-label-md text-lg hover:bg-primary/90 transition-colors shadow-lg">
                <span class="material-symbols-outlined align-middle mr-2">send</span>
                Kirim Formulir Pendaftaran
            </button>
        </form>
    </div>
</div>

@endsection
