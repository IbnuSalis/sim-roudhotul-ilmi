@extends('admin.layouts.app')
@section('title', 'Edit Guru')
@section('page-title', 'Edit Staf Pengajar')
@section('page-subtitle', 'Perbarui data guru')

@section('content')
<div class="max-w-2xl">
    @if($errors->any())
    <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-5">
        <ul class="text-red-600 text-sm space-y-1">@foreach($errors->all() as $e)<li>• {{ $e }}</li>@endforeach</ul>
    </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <form action="{{ route('admin.guru.update', $guru) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                {{-- Nama --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap *</label>
                    <input type="text" name="nama" value="{{ old('nama', $guru->nama) }}" required
                           class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary">
                </div>

                {{-- Jabatan --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Jabatan *</label>
                    <input type="text" name="jabatan" value="{{ old('jabatan', $guru->jabatan) }}" required
                           class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary">
                </div>

                {{-- Pendidikan --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Pendidikan</label>
                    <input type="text" name="pendidikan" value="{{ old('pendidikan', $guru->pendidikan) }}"
                           class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary">
                </div>

                {{-- Urutan --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Urutan Tampil</label>
                    <input type="number" name="urutan" value="{{ old('urutan', $guru->urutan) }}" min="0"
                           class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary">
                </div>

                {{-- Aktif --}}
                <div class="flex items-center gap-3 pt-6">
                    <input type="hidden" name="aktif" value="0">
                    <input type="checkbox" name="aktif" id="aktif" value="1"
                           {{ old('aktif', $guru->aktif) ? 'checked' : '' }}
                           class="accent-primary w-4 h-4">
                    <label for="aktif" class="text-sm font-semibold text-gray-700">Tampilkan di website</label>
                </div>

                {{-- Foto --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Guru</label>
                    @if($guru->foto)
                    <div class="mb-3 flex items-center gap-4">
                        <img src="{{ asset('storage/'.$guru->foto) }}"
                             class="w-20 h-24 object-cover rounded-xl border border-gray-200"
                             style="object-position: {{ $guru->posisi_foto ?? 'center top' }}">
                        <p class="text-xs text-gray-400">Foto saat ini. Upload baru untuk mengganti.</p>
                    </div>
                    @endif
                    <input type="file" name="foto" accept="image/*"
                           class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm">
                </div>

                {{-- Posisi Foto Bebas --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Posisi Foto
                        <span class="text-xs font-normal text-gray-400 ml-1">(geser slider untuk atur fokus foto)</span>
                    </label>

                    @php
                        $currentPosisi = old('posisi_foto', $guru->posisi_foto ?? '50% 20%');
                        // Parse "X% Y%" jadi angka
                        preg_match('/(\d+)%\s+(\d+)%/', $currentPosisi, $matches);
                        $initX = $matches[1] ?? 50;
                        $initY = $matches[2] ?? 20;
                    @endphp

                    {{-- Hidden input yang dikirim ke server --}}
                    <input type="hidden" name="posisi_foto" id="posisi_foto_value" value="{{ $currentPosisi }}">

                    <div class="bg-gray-50 rounded-xl border border-gray-200 p-5">
                        <div class="flex flex-col md:flex-row gap-6 items-start">

                            {{-- Slider Controls --}}
                            <div class="flex-1 space-y-5">
                                {{-- Slider X --}}
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <label class="text-xs font-semibold text-gray-600">⬅️ Posisi Horizontal ➡️</label>
                                        <span id="label-x" class="text-xs font-bold text-primary bg-primary/10 px-2 py-0.5 rounded-full">{{ $initX }}%</span>
                                    </div>
                                    <input type="range" id="slider-x" min="0" max="100" value="{{ $initX }}"
                                           class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-primary"
                                           oninput="updatePosition()">
                                    <div class="flex justify-between text-xs text-gray-400 mt-1">
                                        <span>Kiri</span>
                                        <span>Tengah</span>
                                        <span>Kanan</span>
                                    </div>
                                </div>

                                {{-- Slider Y --}}
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <label class="text-xs font-semibold text-gray-600">⬆️ Posisi Vertikal ⬇️</label>
                                        <span id="label-y" class="text-xs font-bold text-primary bg-primary/10 px-2 py-0.5 rounded-full">{{ $initY }}%</span>
                                    </div>
                                    <input type="range" id="slider-y" min="0" max="100" value="{{ $initY }}"
                                           class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-primary"
                                           oninput="updatePosition()">
                                    <div class="flex justify-between text-xs text-gray-400 mt-1">
                                        <span>Atas</span>
                                        <span>Tengah</span>
                                        <span>Bawah</span>
                                    </div>
                                </div>

                                {{-- Tombol Reset --}}
                                <div class="flex gap-2 flex-wrap">
                                    <button type="button" onclick="resetPos(50,0)"
                                            class="text-xs px-3 py-1.5 rounded-lg border border-gray-200 hover:border-primary hover:text-primary transition-colors">
                                        Tengah Atas
                                    </button>
                                    <button type="button" onclick="resetPos(50,50)"
                                            class="text-xs px-3 py-1.5 rounded-lg border border-gray-200 hover:border-primary hover:text-primary transition-colors">
                                        Tengah
                                    </button>
                                    <button type="button" onclick="resetPos(50,20)"
                                            class="text-xs px-3 py-1.5 rounded-lg border border-gray-200 hover:border-primary hover:text-primary transition-colors">
                                        Default
                                    </button>
                                    <button type="button" onclick="resetPos(50,10)"
                                            class="text-xs px-3 py-1.5 rounded-lg border border-gray-200 hover:border-primary hover:text-primary transition-colors">
                                        Atas 10%
                                    </button>
                                </div>

                                {{-- Nilai saat ini --}}
                                <div class="flex items-center gap-2 p-2 bg-white rounded-lg border border-gray-200">
                                    <span class="text-xs text-gray-400">Nilai:</span>
                                    <code id="posisi-display" class="text-xs font-mono text-primary font-bold">{{ $currentPosisi }}</code>
                                </div>
                            </div>

                            {{-- Preview Foto --}}
                            @if($guru->foto)
                            <div class="flex flex-col items-center gap-2 flex-shrink-0">
                                <p class="text-xs font-semibold text-gray-500">Preview</p>
                                <div class="w-32 h-40 overflow-hidden rounded-xl border-2 border-primary/30 shadow-md">
                                    <img id="foto-preview"
                                         src="{{ asset('storage/'.$guru->foto) }}"
                                         class="w-full h-full object-cover"
                                         style="object-position: {{ $currentPosisi }}">
                                </div>
                                <p class="text-xs text-gray-400 text-center">Preview realtime</p>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>

                {{-- Deskripsi --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi / Bio Singkat</label>
                    <textarea name="deskripsi" rows="4"
                              class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary">{{ old('deskripsi', $guru->deskripsi) }}</textarea>
                </div>

            </div>

            <div class="flex items-center justify-between pt-2">
                <a href="{{ route('admin.guru.index') }}" class="text-gray-500 hover:text-gray-700 flex items-center gap-1 text-sm">
                    <span class="material-symbols-outlined text-sm">arrow_back</span> Kembali
                </a>
                <button type="submit" class="bg-primary text-white px-7 py-2.5 rounded-xl font-semibold hover:bg-primary-dark transition-colors shadow flex items-center gap-2">
                    <span class="material-symbols-outlined">save</span> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
function updatePosition() {
    var x = document.getElementById('slider-x').value;
    var y = document.getElementById('slider-y').value;
    var val = x + '% ' + y + '%';

    // Update label angka
    document.getElementById('label-x').textContent = x + '%';
    document.getElementById('label-y').textContent = y + '%';

    // Update display teks
    document.getElementById('posisi-display').textContent = val;

    // Update hidden input (yang dikirim ke server)
    document.getElementById('posisi_foto_value').value = val;

    // Update preview foto
    var preview = document.getElementById('foto-preview');
    if (preview) {
        preview.style.objectPosition = val;
    }
}

function resetPos(x, y) {
    document.getElementById('slider-x').value = x;
    document.getElementById('slider-y').value = y;
    updatePosition();
}
</script>
@endpush

@endsection
