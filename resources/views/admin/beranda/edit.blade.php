@extends('admin.layouts.app')
@section('title', 'Manajemen Beranda')
@section('page-title', 'Manajemen Beranda')
@section('page-subtitle', 'Edit sambutan kepala sekolah, statistik, dan hero slider')

@section('content')
<form action="{{ route('admin.beranda.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf @method('PUT')

    @if($errors->any())
    <div class="bg-red-50 border border-red-200 rounded-xl p-4">
        <ul class="text-red-600 text-sm space-y-1">
            @foreach($errors->all() as $e)<li>• {{ $e }}</li>@endforeach
        </ul>
    </div>
    @endif

    <!-- Sambutan Kepala -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <h3 class="font-bold text-on-surface mb-5 flex items-center gap-2"><span class="material-symbols-outlined text-primary">person</span> Data Kepala Sekolah / Yayasan</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Kepala *</label>
                <input type="text" name="nama_kepala" value="{{ old('nama_kepala', $beranda->nama_kepala) }}" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Jabatan *</label>
                <input type="text" name="jabatan_kepala" value="{{ old('jabatan_kepala', $beranda->jabatan_kepala) }}" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-primary text-sm">
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Quote / Sambutan Singkat *</label>
                <input type="text" name="quote_kepala" value="{{ old('quote_kepala', $beranda->quote_kepala) }}" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-primary text-sm">
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Sambutan Lengkap</label>
                <textarea name="sambutan" rows="6" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-primary text-sm">{{ old('sambutan', $beranda->sambutan) }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Kepala Sekolah</label>
                @if($beranda->foto_kepala)
                <div class="mb-3"><img src="{{ asset('storage/'.$beranda->foto_kepala) }}" class="h-24 w-20 object-cover rounded-xl border border-gray-200"></div>
                @endif
                <input type="file" name="foto_kepala" accept="image/*" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm">
                <p class="text-xs text-gray-400 mt-1">JPG/PNG, maks 2MB</p>
            </div>
        </div>
    </div>

    <!-- Statistik -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <h3 class="font-bold text-on-surface mb-5 flex items-center gap-2"><span class="material-symbols-outlined text-primary">bar_chart</span> Statistik Sekolah</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            @foreach([['jumlah_guru','label_guru','Jumlah Guru'],['jumlah_siswa','label_siswa','Jumlah Siswa'],['jumlah_rombel','label_rombel','Rombongan Belajar']] as $s)
            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">{{ $s[2] }}</label>
                <div class="space-y-2">
                    <input type="number" name="{{ $s[0] }}" value="{{ old($s[0], $beranda->{$s[0]}) }}" min="0" required class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-primary" placeholder="Jumlah">
                    <input type="text" name="{{ $s[1] }}" value="{{ old($s[1], $beranda->{$s[1]}) }}" required class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-primary" placeholder="Label">
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Hero Sliders -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <h3 class="font-bold text-on-surface mb-5 flex items-center gap-2"><span class="material-symbols-outlined text-primary">slideshow</span> Hero Slider (3 Gambar)</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            @foreach([1,2,3] as $n)
            <div class="border border-dashed border-gray-200 rounded-xl p-4">
                <p class="text-xs font-bold text-gray-500 mb-2">Slide {{ $n }}</p>
                @if($beranda->{"hero_slide_$n"})
                <img src="{{ asset('storage/'.$beranda->{"hero_slide_$n"}) }}" class="h-28 w-full object-cover rounded-lg border border-gray-200 mb-2">
                @else
                <div class="h-28 bg-gray-100 rounded-lg flex items-center justify-center mb-2">
                    <span class="material-symbols-outlined text-gray-300 text-4xl">image</span>
                </div>
                @endif
                <input type="file" name="hero_slide_{{ $n }}" accept="image/*" class="w-full text-xs border border-gray-200 rounded-lg px-2 py-1.5">
                <p class="text-xs text-gray-400 mt-1">JPG/PNG, maks 4MB</p>
            </div>
            @endforeach
        </div>
    </div>

    <div class="flex justify-end">
        <button type="submit" class="bg-primary text-white px-8 py-3 rounded-xl font-semibold hover:bg-primary-dark transition-colors shadow flex items-center gap-2">
            <span class="material-symbols-outlined">save</span> Simpan Perubahan
        </button>
    </div>
</form>
@endsection
