@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Ringkasan data Sistem Informasi Manajemen')

@section('content')

<!-- Stat Cards Row 1 -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-5 mb-6">
    @php
    $cards = [
        ['label'=>'Staf Pengajar', 'val'=>$stats['total_guru'], 'icon'=>'group', 'color'=>'bg-blue-50 text-blue-600', 'border'=>'border-blue-100'],
        ['label'=>'Total Pendaftar', 'val'=>$stats['total_pendaftaran'], 'icon'=>'how_to_reg', 'color'=>'bg-green-50 text-green-600', 'border'=>'border-green-100'],
        ['label'=>'Menunggu Verifikasi', 'val'=>$stats['pending_spmb'], 'icon'=>'pending', 'color'=>'bg-yellow-50 text-yellow-600', 'border'=>'border-yellow-100'],
        ['label'=>'Saran Belum Dibaca', 'val'=>$stats['saran_belum_baca'], 'icon'=>'mark_chat_unread', 'color'=>'bg-red-50 text-red-600', 'border'=>'border-red-100'],
    ];
    @endphp
    @foreach($cards as $c)
    <div class="bg-white rounded-2xl border {{ $c['border'] }} p-5 shadow-sm">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">{{ $c['label'] }}</p>
                <p class="text-3xl font-bold text-on-surface">{{ $c['val'] }}</p>
            </div>
            <div class="w-11 h-11 rounded-xl {{ $c['color'] }} flex items-center justify-center">
                <span class="material-symbols-outlined">{{ $c['icon'] }}</span>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-6">
    <div class="bg-white rounded-2xl border border-gray-100 p-5 shadow-sm">
        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Status SPMB</p>
        <div class="space-y-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-yellow-400"></span><span class="text-sm">Menunggu</span></div>
                <span class="font-bold">{{ $stats['pending_spmb'] }}</span>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-green-500"></span><span class="text-sm">Diterima</span></div>
                <span class="font-bold text-green-600">{{ $stats['diterima_spmb'] }}</span>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-red-500"></span><span class="text-sm">Ditolak</span></div>
                <span class="font-bold text-red-600">{{ $stats['ditolak_spmb'] }}</span>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-2xl border border-gray-100 p-5 shadow-sm">
        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Agenda</p>
        <div class="space-y-3">
            <div class="flex items-center justify-between">
                <span class="text-sm">Total Agenda</span>
                <span class="font-bold">{{ $stats['total_agenda'] }}</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-sm text-primary">Akan Datang</span>
                <span class="font-bold text-primary">{{ $stats['agenda_akan_datang'] }}</span>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-2xl border border-gray-100 p-5 shadow-sm">
        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Konten</p>
        <div class="space-y-3">
            <div class="flex items-center justify-between">
                <span class="text-sm">Fasilitas</span>
                <span class="font-bold">{{ $stats['total_fasilitas'] }}</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-sm">Program</span>
                <span class="font-bold">{{ $stats['total_program'] }}</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-sm">Total Saran</span>
                <span class="font-bold">{{ $stats['total_saran'] }}</span>
            </div>
        </div>
    </div>
</div>

<!-- Tables -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Pendaftaran Terbaru -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <h3 class="font-bold text-on-surface">Pendaftaran Terbaru</h3>
            <a href="{{ route('admin.spmb.index') }}" class="text-xs text-primary font-semibold hover:underline">Lihat semua</a>
        </div>
        <div class="divide-y divide-gray-50">
            @forelse($pendaftaran_terbaru as $p)
            <div class="px-6 py-4 flex items-center gap-4 hover:bg-gray-50">
                <div class="w-9 h-9 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0">
                    <span class="material-symbols-outlined text-primary text-sm">person</span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="font-semibold text-sm truncate">{{ $p->nama_lengkap }}</p>
                    <p class="text-xs text-gray-400">{{ $p->label_program }} &bull; {{ $p->created_at->format('d M Y') }}</p>
                </div>
                <span class="px-2.5 py-1 rounded-full text-xs font-bold {{ $p->badge_class }}">{{ $p->label_status }}</span>
            </div>
            @empty
            <div class="px-6 py-8 text-center text-gray-400 text-sm">Belum ada pendaftaran.</div>
            @endforelse
        </div>
    </div>

    <!-- Saran & Agenda -->
    <div class="space-y-6">
        <!-- Saran Baru -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <h3 class="font-bold text-on-surface">Saran Belum Dibaca</h3>
                <a href="{{ route('admin.saran.index') }}" class="text-xs text-primary font-semibold hover:underline">Lihat semua</a>
            </div>
            <div class="divide-y divide-gray-50">
                @forelse($saran_terbaru as $s)
                <a href="{{ route('admin.saran.show', $s) }}" class="px-6 py-4 flex items-start gap-4 hover:bg-gray-50 block">
                    <div class="w-9 h-9 rounded-full bg-yellow-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                        <span class="material-symbols-outlined text-yellow-600 text-sm">forum</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-semibold text-sm">{{ $s->nama }}</p>
                        <p class="text-xs text-gray-400 truncate">{{ Str::limit($s->pesan, 60) }}</p>
                        <p class="text-xs text-gray-300 mt-1">{{ $s->created_at->diffForHumans() }}</p>
                    </div>
                </a>
                @empty
                <div class="px-6 py-6 text-center text-gray-400 text-sm">Semua saran sudah dibaca.</div>
                @endforelse
            </div>
        </div>

        <!-- Agenda Upcoming -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <h3 class="font-bold text-on-surface">Agenda Akan Datang</h3>
                <a href="{{ route('admin.agenda.index') }}" class="text-xs text-primary font-semibold hover:underline">Kelola</a>
            </div>
            <div class="divide-y divide-gray-50">
                @forelse($agenda_upcoming as $a)
                <div class="px-6 py-4 flex items-center gap-4 hover:bg-gray-50">
                    <div class="w-12 h-12 rounded-xl bg-primary/10 flex flex-col items-center justify-center flex-shrink-0">
                        <span class="text-xs font-bold text-primary">{{ $a->tanggal->format('M') }}</span>
                        <span class="text-lg font-extrabold text-primary leading-tight">{{ $a->tanggal->format('d') }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-semibold text-sm truncate">{{ $a->judul }}</p>
                        @if($a->lokasi)<p class="text-xs text-gray-400">{{ $a->lokasi }}</p>@endif
                    </div>
                </div>
                @empty
                <div class="px-6 py-6 text-center text-gray-400 text-sm">Tidak ada agenda mendatang.</div>
                @endforelse
            </div>
        </div>
    </div>
</div>

@endsection
