@extends('admin.layouts.app')
@section('title', 'Staf Pengajar')
@section('page-title', 'Staf Pengajar')
@section('page-subtitle', 'Kelola data guru dan staf pengajar')

@section('content')
<div class="flex justify-end mb-5">
    <a href="{{ route('admin.guru.create') }}" class="bg-primary text-white px-5 py-2.5 rounded-xl font-semibold hover:bg-primary-dark transition-colors flex items-center gap-2 shadow">
        <span class="material-symbols-outlined">add</span> Tambah Guru
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="px-5 py-3.5 text-left text-xs font-bold text-gray-500 uppercase">Foto</th>
                <th class="px-5 py-3.5 text-left text-xs font-bold text-gray-500 uppercase">Nama</th>
                <th class="px-5 py-3.5 text-left text-xs font-bold text-gray-500 uppercase">Jabatan</th>
                <th class="px-5 py-3.5 text-left text-xs font-bold text-gray-500 uppercase">Pendidikan</th>
                <th class="px-5 py-3.5 text-left text-xs font-bold text-gray-500 uppercase">Status</th>
                <th class="px-5 py-3.5 text-left text-xs font-bold text-gray-500 uppercase">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($gurus as $g)
            <tr class="hover:bg-gray-50">
                <td class="px-5 py-3">
                    @if($g->foto)
                        <img src="{{ asset('storage/'.$g->foto) }}" alt="{{ $g->nama }}" class="w-12 h-12 object-cover rounded-xl border border-gray-200">
                    @else
                        <div class="w-12 h-12 rounded-xl bg-gray-100 flex items-center justify-center"><span class="material-symbols-outlined text-gray-300">person</span></div>
                    @endif
                </td>
                <td class="px-5 py-3 font-semibold text-on-surface">{{ $g->nama }}</td>
                <td class="px-5 py-3 text-gray-500">{{ $g->jabatan }}</td>
                <td class="px-5 py-3 text-gray-500">{{ $g->pendidikan ?? '-' }}</td>
                <td class="px-5 py-3">
                    <span class="px-2.5 py-1 rounded-full text-xs font-bold {{ $g->aktif ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                        {{ $g->aktif ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </td>
                <td class="px-5 py-3">
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.guru.edit', $g) }}" class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-100 transition-colors">
                            <span class="material-symbols-outlined text-sm">edit</span>
                        </a>
                        <form action="{{ route('admin.guru.destroy', $g) }}" method="POST" onsubmit="return confirm('Hapus data guru ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-100 transition-colors">
                                <span class="material-symbols-outlined text-sm">delete</span>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="text-center py-10 text-gray-400">Belum ada data guru.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
