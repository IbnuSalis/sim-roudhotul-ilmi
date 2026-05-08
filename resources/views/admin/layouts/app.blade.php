<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') | Roudhotul Ilmi</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'] },
                    colors: {
                        primary: '#3d6922', 'primary-dark': '#2d5018',
                        secondary: '#3b6a20', surface: '#f0fde8',
                        'surface-container': '#e5f2dd', 'outline-variant': '#c2c9b8',
                        'on-surface': '#141e12', 'on-surface-variant': '#42493c',
                        'on-primary': '#ffffff',
                    }
                }
            }
        }
    </script>
    <style>
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; vertical-align: middle; }
        .sidebar-link.active, .sidebar-link:hover { background: rgba(255,255,255,0.15); }
        .sidebar-link.active { background: rgba(255,255,255,0.2); font-weight: 600; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-50 text-on-surface">

<div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <aside class="w-64 flex-shrink-0 bg-gradient-to-b from-primary-dark to-primary flex flex-col overflow-y-auto" id="sidebar">
        <!-- Logo -->
        <div class="p-6 border-b border-white/10">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center flex-shrink-0">
                    <span class="material-symbols-outlined text-white text-xl">school</span>
                </div>
                <div>
                    <p class="text-white font-bold text-sm leading-tight">Roudhotul Ilmi</p>
                    <p class="text-white/60 text-xs">Panel Admin</p>
                </div>
            </a>
        </div>

        <!-- Nav -->
        <nav class="flex-1 p-4 space-y-1">
            <p class="text-white/40 text-xs uppercase font-bold tracking-widest px-3 py-2 mt-2">Utama</p>

            <a href="{{ route('admin.dashboard') }}"
               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-xl text-white/90 text-sm transition-all {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <span class="material-symbols-outlined text-xl">dashboard</span> Dashboard
            </a>

            <p class="text-white/40 text-xs uppercase font-bold tracking-widest px-3 py-2 mt-4">Konten Website</p>

            <a href="{{ route('admin.beranda.edit') }}"
               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-xl text-white/90 text-sm transition-all {{ request()->routeIs('admin.beranda*') ? 'active' : '' }}">
                <span class="material-symbols-outlined text-xl">home</span> Manajemen Beranda
            </a>
            <a href="{{ route('admin.profil.identitas') }}"
               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-xl text-white/90 text-sm transition-all {{ request()->routeIs('admin.profil*') ? 'active' : '' }}">
                <span class="material-symbols-outlined text-xl">info</span> Profil Sekolah
            </a>
            <a href="{{ route('admin.guru.index') }}"
               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-xl text-white/90 text-sm transition-all {{ request()->routeIs('admin.guru*') ? 'active' : '' }}">
                <span class="material-symbols-outlined text-xl">group</span> Staf Pengajar
            </a>
            <a href="{{ route('admin.fasilitas.index') }}"
               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-xl text-white/90 text-sm transition-all {{ request()->routeIs('admin.fasilitas*') ? 'active' : '' }}">
                <span class="material-symbols-outlined text-xl">apartment</span> Fasilitas
            </a>
            <a href="{{ route('admin.program.index') }}"
               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-xl text-white/90 text-sm transition-all {{ request()->routeIs('admin.program*') ? 'active' : '' }}">
                <span class="material-symbols-outlined text-xl">menu_book</span> Program Sekolah
            </a>
            <a href="{{ route('admin.galeri.index') }}"
               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-xl text-white/90 text-sm transition-all {{ request()->routeIs('admin.galeri*') ? 'active' : '' }}">
               <span class="material-symbols-outlined text-xl">photo_library</span> Galeri
            </a>
            <a href="{{ route('admin.agenda.index') }}"
               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-xl text-white/90 text-sm transition-all {{ request()->routeIs('admin.agenda*') ? 'active' : '' }}">
                <span class="material-symbols-outlined text-xl">event</span> Agenda
            </a>

            <p class="text-white/40 text-xs uppercase font-bold tracking-widest px-3 py-2 mt-4">Pendaftaran & Saran</p>

            <a href="{{ route('admin.spmb.index') }}"
               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-xl text-white/90 text-sm transition-all {{ request()->routeIs('admin.spmb*') ? 'active' : '' }}">
                <span class="material-symbols-outlined text-xl">how_to_reg</span> Manajemen SPMB
                @php $pendingSpmb = \App\Models\Pendaftaran::where('status','pending')->count(); @endphp
                @if($pendingSpmb > 0)
                <span class="ml-auto bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center font-bold">{{ $pendingSpmb }}</span>
                @endif
            </a>
            <a href="{{ route('admin.saran.index') }}"
               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-xl text-white/90 text-sm transition-all {{ request()->routeIs('admin.saran*') ? 'active' : '' }}">
                <span class="material-symbols-outlined text-xl">forum</span> Saran &amp; Masukan
                @php $unreadSaran = \App\Models\Saran::where('sudah_dibaca',false)->count(); @endphp
                @if($unreadSaran > 0)
                <span class="ml-auto bg-yellow-400 text-gray-900 text-xs rounded-full w-5 h-5 flex items-center justify-center font-bold">{{ $unreadSaran }}</span>
                @endif
            </a>
        </nav>

        <!-- User Info -->
        <div class="p-4 border-t border-white/10">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-9 h-9 rounded-full bg-white/20 flex items-center justify-center">
                    <span class="material-symbols-outlined text-white">person</span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-white text-sm font-semibold truncate">{{ Auth::user()->name }}</p>
                    <p class="text-white/60 text-xs truncate">{{ Auth::user()->email }}</p>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-2 rounded-xl bg-white/10 hover:bg-white/20 text-white text-sm transition-all">
                    <span class="material-symbols-outlined text-lg">logout</span> Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top Bar -->
        <header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between flex-shrink-0">
            <div class="flex items-center gap-4">
                <button onclick="document.getElementById('sidebar').classList.toggle('-translate-x-full')" class="text-gray-500 hover:text-primary lg:hidden">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <div>
                    <h1 class="text-lg font-bold text-on-surface">@yield('page-title', 'Dashboard')</h1>
                    <p class="text-xs text-gray-500">@yield('page-subtitle', 'Panel Administrasi Roudhotul Ilmi')</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-2 text-sm text-gray-500 hover:text-primary transition-colors px-3 py-2 rounded-lg hover:bg-surface-container">
                    <span class="material-symbols-outlined text-sm">open_in_new</span> Lihat Website
                </a>
            </div>
        </header>

        <!-- Flash Messages -->
        @if(session('success'))
        <div class="mx-6 mt-4 bg-green-50 border border-green-200 text-green-800 px-5 py-3 rounded-xl flex items-center gap-3">
            <span class="material-symbols-outlined text-green-600">check_circle</span>
            {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="mx-6 mt-4 bg-red-50 border border-red-200 text-red-800 px-5 py-3 rounded-xl flex items-center gap-3">
            <span class="material-symbols-outlined text-red-600">error</span>
            {{ session('error') }}
        </div>
        @endif

        <!-- Page Content -->
        <main class="flex-1 overflow-y-auto p-6">
            @yield('content')
        </main>
    </div>
</div>

@stack('scripts')
</body>
</html>
