@extends('layouts.app')
@section('title', 'Galeri - Roudhotul Ilmi')
@section('content')

<div class="bg-gradient-to-br from-primary to-tertiary text-white py-16 px-8">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center gap-2 text-sm opacity-70 mb-4">
            <a href="{{ route('home') }}" class="hover:text-white">Beranda</a><span>/</span><span>Galeri</span>
        </div>
        <h1 class="text-h2 font-bold mb-2">Galeri Kegiatan</h1>
        <p class="opacity-80">Dokumentasi aktivitas dan kegiatan Roudhotul Ilmi</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-8 py-12">
    @if($galeris->isEmpty())
        <div class="text-center py-20 text-on-surface-variant">
            <span class="material-symbols-outlined text-6xl text-outline mb-4 block">photo_library</span>
            <p>Galeri belum tersedia.</p>
        </div>
    @else
    <div class="columns-2 md:columns-3 lg:columns-4 gap-4 space-y-4">
        @foreach($galeris as $foto)
        <div class="break-inside-avoid rounded-2xl overflow-hidden shadow border border-surface-container group cursor-pointer relative"
             onclick="openLightbox(@js(asset('storage/'.$foto->gambar)), @js($foto->judul))">
            <img src="{{ asset('storage/'.$foto->gambar) }}" alt="{{ $foto->judul }}"
                 class="w-full object-cover group-hover:scale-105 transition-transform duration-500"/>
            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-colors flex items-end">
                <div class="p-4 text-white opacity-0 group-hover:opacity-100 transition-opacity">
                    <p class="font-label-md text-sm">{{ $foto->judul }}</p>
                    @if($foto->kategori)<p class="text-xs opacity-80">{{ $foto->kategori }}</p>@endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>

<!-- Lightbox -->
<div id="lightbox" class="fixed inset-0 bg-black/80 z-50 hidden flex items-center justify-center p-8" onclick="closeLightbox()">
    <button class="absolute top-6 right-6 text-white" onclick="closeLightbox()">
        <span class="material-symbols-outlined text-4xl">close</span>
    </button>
    <div onclick="event.stopPropagation()" class="max-w-4xl max-h-[85vh] overflow-auto rounded-2xl">
        <img id="lightbox-img" src="" alt="" class="max-w-full max-h-[75vh] object-contain rounded-2xl"/>
        <p id="lightbox-caption" class="text-white text-center mt-4 font-label-md"></p>
    </div>
</div>

@push('scripts')
<script>
function openLightbox(src, caption) {
    document.getElementById('lightbox-img').src = src;
    document.getElementById('lightbox-caption').textContent = caption;
    document.getElementById('lightbox').classList.remove('hidden');
    document.getElementById('lightbox').classList.add('flex');
    document.body.style.overflow = 'hidden';
}
function closeLightbox() {
    document.getElementById('lightbox').classList.add('hidden');
    document.getElementById('lightbox').classList.remove('flex');
    document.body.style.overflow = '';
}
document.addEventListener('keydown', function(e) { if (e.key === 'Escape') closeLightbox(); });
</script>
@endpush
@endsection
