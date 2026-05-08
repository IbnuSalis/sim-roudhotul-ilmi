@extends('admin.layouts.app')
@section('title','Detail Pendaftaran') @section('page-title','Detail Pendaftaran')
@section('content')
<div class="max-w-3xl space-y-5">
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.spmb.index') }}" class="text-gray-500 hover:text-primary flex items-center gap-1 text-sm"><span class="material-symbols-outlined text-sm">arrow_back</span> Kembali ke Daftar</a>
        <a href="{{ route('admin.spmb.edit', $pendaftaran) }}" class="bg-primary text-white px-4 py-2 rounded-xl text-sm font-semibold hover:bg-primary-dark flex items-center gap-2"><span class="material-symbols-outlined text-sm">edit</span> Edit</a>
    </div>

    <!-- Header Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-start justify-between mb-4">
            <div>
                <p class="text-xs text-gray-400 font-mono mb-1">{{ $pendaftaran->kode_daftar }}</p>
                <h2 class="text-xl font-bold text-on-surface">{{ $pendaftaran->nama_lengkap }}</h2>
                <p class="text-gray-500 text-sm mt-1">{{ $pendaftaran->label_program }} | {{ $pendaftaran->tahun_ajaran }}</p>
            </div>
            <span class="px-3 py-1.5 rounded-full text-sm font-bold {{ $pendaftaran->badge_class }}">{{ $pendaftaran->label_status }}</span>
        </div>

        <!-- Update Status Form -->
        <form action="{{ route('admin.spmb.status', $pendaftaran) }}" method="POST" class="mt-4 pt-4 border-t border-gray-100 flex flex-wrap gap-3 items-end">
            @csrf @method('PATCH')
            <div class="flex-1 min-w-40">
                <label class="block text-xs font-bold text-gray-500 mb-1">Ubah Status</label>
                <select name="status" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-primary">
                    <option value="pending" {{ $pendaftaran->status==='pending'?'selected':'' }}>Menunggu</option>
                    <option value="diterima" {{ $pendaftaran->status==='diterima'?'selected':'' }}>Diterima</option>
                    <option value="ditolak" {{ $pendaftaran->status==='ditolak'?'selected':'' }}>Ditolak</option>
                </select>
            </div>
            <div class="flex-1 min-w-60">
                <label class="block text-xs font-bold text-gray-500 mb-1">Catatan Admin</label>
                <input type="text" name="catatan_admin" value="{{ $pendaftaran->catatan_admin }}" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-primary" placeholder="Alasan penolakan / keterangan...">
            </div>
            <button type="submit" class="bg-primary text-white px-5 py-2 rounded-lg text-sm font-semibold hover:bg-primary-dark">Update Status</button>
        </form>
    </div>

    <!-- Data Anak -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <h3 class="font-bold text-on-surface mb-4 flex items-center gap-2"><span class="material-symbols-outlined text-primary">child_care</span> Data Calon Peserta Didik</h3>
        <div class="grid grid-cols-2 gap-4 text-sm">
            @php $fields = [
                ['Nama Lengkap', $pendaftaran->nama_lengkap],
                ['Nama Panggilan', $pendaftaran->nama_panggilan],
                ['Jenis Kelamin', $pendaftaran->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan'],
                ['Tempat Lahir', $pendaftaran->tempat_lahir],
                ['Tanggal Lahir', $pendaftaran->tanggal_lahir?->format('d M Y')],
                ['Agama', $pendaftaran->agama],
                ['Anak ke-', $pendaftaran->anak_ke],
                ['Jumlah Saudara', $pendaftaran->jumlah_saudara],
                ['Asal Sekolah', $pendaftaran->asal_sekolah ?? '-'],
            ]; @endphp
            @foreach($fields as $f)
            <div class="border-b border-gray-50 pb-3">
                <p class="text-xs text-gray-400 font-semibold">{{ $f[0] }}</p>
                <p class="text-on-surface font-medium mt-0.5">{{ $f[1] ?? '-' }}</p>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Data Orang Tua -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <h3 class="font-bold text-on-surface mb-4 flex items-center gap-2"><span class="material-symbols-outlined text-primary">family_restroom</span> Data Orang Tua / Wali</h3>
        <div class="grid grid-cols-2 gap-4 text-sm">
            @php $pFields = [
                ['Nama Ayah', $pendaftaran->nama_ayah],
                ['Nama Ibu', $pendaftaran->nama_ibu],
                ['Pekerjaan Ayah', $pendaftaran->pekerjaan_ayah ?? '-'],
                ['Pekerjaan Ibu', $pendaftaran->pekerjaan_ibu ?? '-'],
                ['Telepon / WA', $pendaftaran->telepon],
                ['Email', $pendaftaran->email ?? '-'],
            ]; @endphp
            @foreach($pFields as $f)
            <div class="border-b border-gray-50 pb-3">
                <p class="text-xs text-gray-400 font-semibold">{{ $f[0] }}</p>
                <p class="text-on-surface font-medium mt-0.5">{{ $f[1] }}</p>
            </div>
            @endforeach
            <div class="col-span-2 border-b border-gray-50 pb-3">
                <p class="text-xs text-gray-400 font-semibold">Alamat</p>
                <p class="text-on-surface font-medium mt-0.5">{{ $pendaftaran->alamat }}</p>
            </div>
        </div>
    </div>

    @if($pendaftaran->foto_anak)
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <h3 class="font-bold text-on-surface mb-4">Foto Anak</h3>
        <img src="{{ asset('storage/'.$pendaftaran->foto_anak) }}" alt="Foto Anak" class="h-48 rounded-xl border border-gray-200 object-cover">
    </div>
    @endif
</div>
@endsection
