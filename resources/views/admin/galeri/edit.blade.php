@extends('admin.layouts.app')
@section('title','Edit Foto') @section('page-title','Edit Foto Galeri')
@section('content')
<div class="max-w-xl">
    @if($errors->any())
    <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-5">
        <ul class="text-red-600 text-sm space-y-1">@foreach($errors->all() as $e)<li>• {{ $e }}</li>@endforeach</ul>
    </div>
    @endif
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <form action="{{ route('admin.galeri.update', $galeri) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf @method('PUT')
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Foto *</label>
                <input type="text" name="judul" value="{{ old('judul', $galeri->judul) }}" required
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
                <input type="text" name="kategori" value="{{ old('kategori', $galeri->kategori) }}"
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Gambar</label>
                @if($galeri->gambar)
                <div class="mb-3">
                    <img src="{{ asset('storage/'.$galeri->gambar) }}" class="h-36 rounded-xl border border-gray-200 object-cover">
                </div>
                @endif
                <input type="file" name="gambar" accept="image/*"
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm"
                       onchange="previewGambar(this)">
                <p class="text-xs text-gray-400 mt-1">Kosongkan jika tidak ingin mengganti gambar.</p>
                <div id="preview-box" class="hidden mt-3">
                    <img id="preview-img" class="h-36 rounded-xl border border-gray-200 object-cover">
                </div>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                <textarea name="deskripsi" rows="3"
                          class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Urutan</label>
                <input type="number" name="urutan" value="{{ old('urutan', $galeri->urutan) }}" min="0"
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary">
            </div>
            <div class="flex justify-between pt-2">
                <a href="{{ route('admin.galeri.index') }}" class="text-gray-500 hover:text-gray-700 flex items-center gap-1 text-sm">
                    <span class="material-symbols-outlined text-sm">arrow_back</span> Kembali
                </a>
                <button type="submit" class="bg-primary text-white px-7 py-2.5 rounded-xl font-semibold hover:bg-primary-dark shadow flex items-center gap-2">
                    <span class="material-symbols-outlined">save</span> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@push('scripts')
<script>
function previewGambar(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-img').src = e.target.result;
            document.getElementById('preview-box').classList.remove('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
@endsection