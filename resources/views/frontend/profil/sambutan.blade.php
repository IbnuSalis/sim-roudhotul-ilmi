@extends('layouts.app')
@section('title', 'Sambutan Kepala - Roudhotul Ilmi')
@section('content')

<div class="bg-gradient-to-br from-primary to-tertiary text-white py-16 px-8">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center gap-2 text-sm opacity-70 mb-4">
            <a href="{{ route('home') }}" class="hover:text-white">Beranda</a><span>/</span><span>Profil Sekolah</span>
        </div>
        <h1 class="text-h2 font-bold">Profil Sekolah</h1>
    </div>
</div>

<div class="max-w-5xl mx-auto px-8 py-12">
    <div class="bg-white rounded-2xl shadow-xl border border-surface-container p-8 flex flex-col md:flex-row gap-10">
        <div class="w-full md:w-72 flex-shrink-0">
            <div class="aspect-[3/4] rounded-2xl overflow-hidden shadow bg-surface-container-low">
                @if($beranda->foto_kepala)
                    <img src="{{ asset('storage/'.$beranda->foto_kepala) }}" alt="{{ $beranda->nama_kepala }}" class="w-full h-full object-cover"/>
                @else
                    <img src="{{ asset('images/guru new 9.jpg') }}" alt="{{ $beranda->nama_kepala }}" class="w-full h-full object-cover"/>
                @endif
            </div>
            <div class="text-center mt-4">
                <p class="font-label-md text-on-surface text-lg">{{ $beranda->nama_kepala }}</p>
                <p class="font-body-sm text-outline mt-1">{{ $beranda->jabatan_kepala }}</p>
            </div>
        </div>
        <div class="flex-1">
            <span class="text-primary font-label-sm uppercase tracking-widest">Sambutan</span>
            <h2 class="font-h3 text-on-surface mt-2 mb-6 italic">"{{ $beranda->quote_kepala }}"</h2>
            <div class="text-on-surface-variant leading-relaxed whitespace-pre-line">
                {{ $beranda->sambutan ?? 'Assalamu\'alaikum Warahmatullahi Wabarakatuh,

Puji syukur kehadirat Allah SWT yang senantiasa memberikan kita kekuatan dan kemudahan dalam menjalankan amanah pendidikan ini.

Pendidikan di Roudhotul Ilmi bukan sekadar transfer ilmu, melainkan penanaman karakter dan kecintaan pada Al-Qur\'an sejak dini. Kami berkomitmen untuk mendampingi setiap anak dalam tumbuh kembang mereka, baik secara intelektual, emosional, maupun spiritual.

Bersama orang tua, kami membangun sinergi yang kuat demi mewujudkan generasi Qur\'ani yang berakhlak mulia dan siap menjadi pemimpin masa depan.

Wassalamu\'alaikum Warahmatullahi Wabarakatuh.' }}
            </div>
        </div>
    </div>

    <!-- Info Sekolah singkat -->
    <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-primary/10 rounded-2xl p-6 text-center border border-primary/20">
            <span class="material-symbols-outlined text-primary text-4xl mb-3 block">school</span>
            <p class="font-label-md text-on-surface">{{ $profil->nama_sekolah }}</p>
        </div>
        <div class="bg-surface-container rounded-2xl p-6 text-center border border-outline-variant">
            <span class="material-symbols-outlined text-primary text-4xl mb-3 block">location_on</span>
            <p class="font-body-sm text-on-surface-variant">{{ $profil->alamat }}</p>
        </div>
        <div class="bg-surface-container rounded-2xl p-6 text-center border border-outline-variant">
            <span class="material-symbols-outlined text-primary text-4xl mb-3 block">call</span>
            <p class="font-label-md text-on-surface">{{ $profil->telepon }}</p>
        </div>
    </div>
</div>
@endsection
