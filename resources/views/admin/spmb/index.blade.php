@extends('admin.layouts.app')
@section('title','Manajemen SPMB') @section('page-title','Manajemen SPMB')
@section('page-subtitle','Data pendaftaran peserta didik baru')
@section('content')

<!-- Filter Bar -->
<form method="GET" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 mb-5 flex flex-wrap gap-3 items-end">
    <div>
        <label class="block text-xs font-bold text-gray-500 mb-1">Status</label>
        <select name="status" class="border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-primary">
            <option value="">Semua Status</option>
            <option value="pending" {{ request('status')==='pending'?'selected':'' }}>Menunggu</option>
            <option value="diterima" {{ request('status')==='diterima'?'selected':'' }}>Diterima</option>
            <option value="ditolak" {{ request('status')==='ditolak'?'selected':'' }}>Ditolak</option>
        </select>
    </div>
    <div>
        <label class="block text-xs font-bold text-gray-500 mb-1">Program</label>
        <select name="program" class="border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-primary">
            <option value="">Semua Program</option>
            <option value="kbtk" {{ request('program')==='kbtk'?'selected':'' }}>KB-TK</option>
            <option value="tahfid" {{ request('program')==='tahfid'?'selected':'' }}>Tahfid</option>
            <option value="tpa" {{ request('program')==='tpa'?'selected':'' }}>TPA</option>
        </select>
    </div>
    <div class="flex-1 min-w-48">
        <label class="block text-xs font-bold text-gray-500 mb-1">Cari</label>
        <input type="text" name="search" value="{{ request('search') }}" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-primary" placeholder="Nama / Kode / Telepon">
    </div>
    <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-primary-dark flex items-center gap-2">
        <span class="material-symbols-outlined text-sm">search</span> Filter
    </button>
    @if(request()->hasAny(['status','program','search']))
    <a href="{{ route('admin.spmb.index') }}" class="px-4 py-2 rounded-lg text-sm border border-gray-200 text-gray-500 hover:border-primary hover:text-primary">Reset</a>
    @endif
</form>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="px-4 py-3.5 text-left text-xs font-bold text-gray-500 uppercase">Kode</th>
                <th class="px-4 py-3.5 text-left text-xs font-bold text-gray-500 uppercase">Nama</th>
                <th class="px-4 py-3.5 text-left text-xs font-bold text-gray-500 uppercase">Program</th>
                <th class="px-4 py-3.5 text-left text-xs font-bold text-gray-500 uppercase">Telepon</th>
                <th class="px-4 py-3.5 text-left text-xs font-bold text-gray-500 uppercase">Tanggal Daftar</th>
                <th class="px-4 py-3.5 text-left text-xs font-bold text-gray-500 uppercase">Status</th>
                <th class="px-4 py-3.5 text-left text-xs font-bold text-gray-500 uppercase">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($pendaftarans as $p)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-3 font-mono text-xs text-gray-500">{{ $p->kode_daftar }}</td>
                <td class="px-4 py-3 font-semibold text-on-surface">{{ $p->nama_lengkap }}</td>
                <td class="px-4 py-3">
                    @php $pc = ['kbtk'=>'bg-blue-100 text-blue-700','tahfid'=>'bg-green-100 text-green-700','tpa'=>'bg-orange-100 text-orange-700']; @endphp
                    <span class="px-2 py-0.5 rounded-full text-xs font-bold {{ $pc[$p->program] ?? 'bg-gray-100 text-gray-500' }}">{{ strtoupper($p->program) }}</span>
                </td>
                <td class="px-4 py-3 text-gray-500">{{ $p->telepon }}</td>
                <td class="px-4 py-3 text-gray-500 whitespace-nowrap">{{ $p->created_at->format('d M Y') }}</td>
                <td class="px-4 py-3"><span class="px-2.5 py-1 rounded-full text-xs font-bold {{ $p->badge_class }}">{{ $p->label_status }}</span></td>
                <td class="px-4 py-3">
                    <div class="flex items-center gap-1">
                        <a href="{{ route('admin.spmb.show', $p) }}" class="w-8 h-8 rounded-lg bg-gray-50 text-gray-600 flex items-center justify-center hover:bg-gray-100" title="Detail"><span class="material-symbols-outlined text-sm">visibility</span></a>
                        <a href="{{ route('admin.spmb.edit', $p) }}" class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-100" title="Edit"><span class="material-symbols-outlined text-sm">edit</span></a>
                        <form action="{{ route('admin.spmb.destroy', $p) }}" method="POST" onsubmit="return confirm('Hapus data pendaftaran ini?')">
                            @csrf @method('DELETE')
                            <button class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-100" title="Hapus"><span class="material-symbols-outlined text-sm">delete</span></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="py-10 text-center text-gray-400">Belum ada data pendaftaran.</td></tr>
            @endforelse
        </tbody>
    </table>
    @if($pendaftarans->hasPages())
    <div class="px-5 py-4 border-t border-gray-100">{{ $pendaftarans->links() }}</div>
    @endif
</div>
@endsection
