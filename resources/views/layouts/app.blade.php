<!DOCTYPE html>
<html lang="id" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'KBTK & Rumah Tahfid Roudhotul Ilmi')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Montserrat:wght@700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "background": "#f0fde8",
                        "surface-container-low": "#ebf8e3",
                        "outline-variant": "#c2c9b8",
                        "on-surface-variant": "#42493c",
                        "tertiary-container": "#8dc66f",
                        "secondary-container": "#b8ef95",
                        "on-primary-container": "#27520b",
                        "surface": "#f0fde8",
                        "surface-container-lowest": "#ffffff",
                        "secondary": "#3b6a20",
                        "on-error": "#ffffff",
                        "surface-container": "#e5f2dd",
                        "on-tertiary-container": "#205307",
                        "inverse-primary": "#a2d580",
                        "surface-container-highest": "#d9e6d2",
                        "on-secondary-container": "#3f6e24",
                        "error-container": "#ffdad6",
                        "on-surface": "#141e12",
                        "primary": "#3d6922",
                        "primary-container": "#93c572",
                        "tertiary": "#376a1f",
                        "surface-container-high": "#dfecd7",
                        "on-background": "#141e12",
                        "on-primary": "#ffffff",
                        "outline": "#73796b",
                        "secondary-fixed": "#bbf298",
                        "on-primary-fixed": "#092100",
                        "on-secondary-fixed": "#092100",
                        "surface-dim": "#d1deca",
                        "inverse-surface": "#283325",
                        "surface-bright": "#f0fde8",
                        "error": "#ba1a1a",
                        "surface-tint": "#3d6922",
                        "on-secondary": "#ffffff",
                        "surface-variant": "#d9e6d2",
                        "inverse-on-surface": "#e8f5e0",
                        "tertiary-fixed": "#b7f396",
                        "on-tertiary": "#ffffff",
                    },
                    fontFamily: {
                        "h3": ["Amiri"],
                        "h2": ["Amiri"],
                        "h1": ["Amiri"],
                        "body-lg": ["Plus Jakarta Sans"],
                        "body-md": ["Plus Jakarta Sans"],
                        "body-sm": ["Plus Jakarta Sans"],
                        "label-md": ["Plus Jakarta Sans"],
                        "label-sm": ["Plus Jakarta Sans"],
                        "montserrat": ["Montserrat"],
                    },
                    fontSize: {
                        "h1": ["48px", {"lineHeight": "1.2", "fontWeight": "700"}],
                        "h2": ["36px", {"lineHeight": "1.2", "fontWeight": "700"}],
                        "h3": ["28px", {"lineHeight": "1.3", "fontWeight": "600"}],
                        "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                        "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}],
                        "body-sm": ["14px", {"lineHeight": "1.5", "fontWeight": "400"}],
                        "label-md": ["14px", {"lineHeight": "1.2", "letterSpacing": "0.02em", "fontWeight": "600"}],
                        "label-sm": ["12px", {"lineHeight": "1.2", "letterSpacing": "0.05em", "fontWeight": "700"}],
                    }
                }
            }
        }
    </script>
    <style>
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        html { scroll-behavior: smooth; }
        .nav-dropdown:hover .dropdown-menu { display: block; }
    </style>
    @stack('styles')
</head>
<body class="bg-background text-on-background font-body-md">

<!-- Top Branding Bar -->
<header class="bg-surface-container-lowest border-b border-outline-variant py-4 px-8 flex justify-between items-center">
    <div class="flex items-center gap-4">
        <a href="{{ route('home') }}" class="flex bg-white p-2 rounded-xl shadow-sm border border-surface-container">
            <img alt="Roudhotul Ilmi Logo" class="h-16 w-auto object-contain" src="{{ asset('images/Logo.jpg') }}"/>
        </a>
    </div>
    <div class="flex items-center gap-6">
        <a class="flex items-center gap-2 font-label-md text-on-surface hover:text-primary transition-colors" href="mailto:{{ $profil->email ?? 'roudhotulilmi@gmail.com' }}">
            <span class="material-symbols-outlined text-primary">mail</span>
            {{ $profil->email ?? 'roudhotulilmi@gmail.com' }}
        </a>
        <div class="flex gap-2">
            <a class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center hover:bg-primary-container transition-all group" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profil->telepon ?? '') }}" target="_blank">
                <span class="material-symbols-outlined text-primary group-hover:text-on-primary-container">call</span>
            </a>
            <a class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center hover:bg-primary-container transition-all group" href="https://instagram.com/{{ $profil->instagram ?? 'roudhotulilmi' }}" target="_blank">
                <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                </svg>
            </a>
        </div>
    </div>
</header>

<!-- Sticky Navigation -->
<nav class="sticky top-0 z-50 bg-white shadow-sm border-b border-surface-container">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-8 h-16">
        <div class="flex gap-8 items-center h-full">
            <a href="{{ route('home') }}" class="@if(request()->routeIs('home')) text-primary border-b-2 border-primary @else text-on-surface-variant hover:text-primary @endif h-full flex items-center font-bold" style="font-family:Montserrat,sans-serif;font-size:14px;">Beranda</a>

            <div class="relative h-full nav-dropdown">
                <button class="flex items-center gap-1 text-on-surface-variant hover:text-primary h-full font-bold" style="font-family:Montserrat,sans-serif;font-size:14px;">
                    Profil Kami <span class="material-symbols-outlined text-sm">expand_more</span>
                </button>
                <div class="dropdown-menu hidden absolute top-full left-0 bg-white border border-surface-container shadow-xl min-w-[200px] rounded-b-xl overflow-hidden">
                    <a class="block px-4 py-3 text-sm text-on-surface-variant hover:bg-surface-container-low hover:text-primary border-b border-surface-container/50" href="{{ route('sambutan') }}">Profil Sekolah</a>
                    <a class="block px-4 py-3 text-sm text-on-surface-variant hover:bg-surface-container-low hover:text-primary border-b border-surface-container/50" href="{{ route('identitas') }}">Identitas Sekolah</a>
                    <a class="block px-4 py-3 text-sm text-on-surface-variant hover:bg-surface-container-low hover:text-primary border-b border-surface-container/50" href="{{ route('visimisi') }}">Visi &amp; Misi</a>
                    <a class="block px-4 py-3 text-sm text-on-surface-variant hover:bg-surface-container-low hover:text-primary border-b border-surface-container/50" href="{{ route('fasilitas') }}">Fasilitas</a>
                    <a class="block px-4 py-3 text-sm text-on-surface-variant hover:bg-surface-container-low hover:text-primary" href="{{ route('staf-pengajar') }}">Staf Pengajar</a>
                </div>
            </div>

            <div class="relative h-full nav-dropdown">
                <button class="flex items-center gap-1 text-on-surface-variant hover:text-primary h-full font-bold" style="font-family:Montserrat,sans-serif;font-size:14px;">
                    Program Sekolah <span class="material-symbols-outlined text-sm">expand_more</span>
                </button>
                <div class="dropdown-menu hidden absolute top-full left-0 bg-white border border-surface-container shadow-xl min-w-[220px] rounded-b-xl overflow-hidden">
                    <a class="block px-4 py-3 text-sm text-on-surface-variant hover:bg-surface-container-low hover:text-primary border-b border-surface-container/50" href="{{ route('program.kbtk') }}">KB-TK Roudhotul Ilmi</a>
                    <a class="block px-4 py-3 text-sm text-on-surface-variant hover:bg-surface-container-low hover:text-primary border-b border-surface-container/50" href="{{ route('program.tahfid') }}">Rumah Tahfid Roudhotul Ilmi</a>
                    <a class="block px-4 py-3 text-sm text-on-surface-variant hover:bg-surface-container-low hover:text-primary" href="{{ route('program.tpa') }}">TPA Roudhotul Ilmi</a>
                </div>
            </div>

            <a href="{{ route('galeri') }}" class="text-on-surface-variant hover:text-primary font-bold" style="font-family:Montserrat,sans-serif;font-size:14px;">Galeri</a>
            <a href="{{ route('agenda') }}" class="text-on-surface-variant hover:text-primary font-bold" style="font-family:Montserrat,sans-serif;font-size:14px;">Agenda</a>
            <a href="{{ route('home') }}#masukan" class="text-on-surface-variant hover:text-primary font-bold" style="font-family:Montserrat,sans-serif;font-size:14px;">Masukan &amp; Saran</a>
            <a href="{{ route('home') }}#kontak" class="text-on-surface-variant hover:text-primary font-bold" style="font-family:Montserrat,sans-serif;font-size:14px;">Kontak</a>
        </div>
        <div class="flex flex-col items-end">
            <a href="{{ route('spmb') }}" class="bg-primary text-on-primary px-6 py-2 rounded-full font-label-md shadow-md hover:bg-primary-container hover:text-on-primary-container transition-all">
                SPMB 2025/2026
            </a>
        </div>
    </div>
</nav>

@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-800 px-6 py-3 flex items-center gap-3 max-w-7xl mx-auto mt-4 rounded-xl">
    <span class="material-symbols-outlined">check_circle</span>
    {{ session('success') }}
</div>
@endif

@yield('content')

<!-- Footer -->
<footer class="bg-on-primary-fixed text-surface-container-lowest pt-20 pb-8 px-8" id="footer">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-12 mb-16">
        <div class="md:col-span-1">
            <h3 class="font-h3 text-secondary-fixed mb-4">Roudhotul Ilmi</h3>
            <p class="text-sm opacity-80 leading-relaxed mb-6">Membentuk karakter islami sejak dini melalui pendidikan yang terintegrasi dengan Al-Qur'an dan Sunnah, menyiapkan generasi masa depan yang tangguh.</p>
            <div class="flex gap-4">
                <a class="w-10 h-10 rounded-full border border-white/20 flex items-center justify-center hover:bg-primary transition-colors" href="{{ route('home') }}">
                    <span class="material-symbols-outlined text-sm">public</span>
                </a>
                <a class="w-10 h-10 rounded-full border border-white/20 flex items-center justify-center hover:bg-primary transition-colors" href="https://instagram.com/{{ $profil->instagram ?? '' }}" target="_blank">
                    <span class="material-symbols-outlined text-sm">photo_camera</span>
                </a>
            </div>
        </div>
        <div>
            <h4 class="font-label-md text-white mb-6 border-b border-white/10 pb-2">Tautan Cepat</h4>
            <ul class="space-y-3 text-sm opacity-80">
                <li><a class="hover:text-secondary-fixed transition-colors" href="{{ route('sambutan') }}">Profil Sekolah</a></li>
                <li><a class="hover:text-secondary-fixed transition-colors" href="{{ route('program.tahfid') }}">Kurikulum Tahfidz</a></li>
                <li><a class="hover:text-secondary-fixed transition-colors" href="{{ route('spmb') }}">Penerimaan Siswa Baru</a></li>
                <li><a class="hover:text-secondary-fixed transition-colors" href="{{ route('galeri') }}">Galeri Kegiatan</a></li>
            </ul>
        </div>
        <div>
            <h4 class="font-label-md text-white mb-6 border-b border-white/10 pb-2">Kontak</h4>
            <ul class="space-y-4 text-sm opacity-80">
                <li class="flex gap-3">
                    <span class="material-symbols-outlined text-secondary-fixed">location_on</span>
                    <span>{{ $profil->alamat ?? 'Jl. Jetis Kulon VIII No.19B, Surabaya' }}, {{ $profil->provinsi ?? 'Jawa Timur' }}</span>
                </li>
                <li class="flex gap-3">
                    <span class="material-symbols-outlined text-secondary-fixed">call</span>
                    <span>{{ $profil->telepon ?? '+62 812-3456-7890' }}</span>
                </li>
                <li class="flex gap-3">
                    <span class="material-symbols-outlined text-secondary-fixed">mail</span>
                    <span>{{ $profil->email ?? 'roudhotulilmi@gmail.com' }}</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="max-w-7xl mx-auto border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs opacity-60">
        <p>© {{ date('Y') }} Yayasan Pendidikan Islam Roudhotul Ilmi Surabaya. Seluruh Hak Cipta Dilindungi.</p>
        <div class="flex gap-6">
            <a class="hover:underline" href="#">Kebijakan Privasi</a>
            <a class="hover:underline" href="#">Syarat &amp; Ketentuan</a>
        </div>
    </div>
</footer>

@stack('scripts')
</body>
</html>
