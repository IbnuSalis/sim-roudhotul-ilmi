@extends('admin.layouts.app')
@section('title','Agenda') @section('page-title','Manajemen Agenda')
@section('content')
<div class="flex justify-end mb-5">
    <a href="{{ route('admin.agenda.create') }}" class="bg-primary text-white px-5 py-2.5 rounded-xl font-semibold hover:bg-primary-dark flex items-center gap-2 shadow">
        <span class="material-symbols-outlined">add</span> Tambah Agenda
    </a>
</div>
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="px-5 py-3.5 text-left text-xs font-bold text-gray-500 uppercase">Tanggal</th>
                <th class="px-5 py-3.5 text-left text-xs font-bold text-gray-500 uppercase">Judul</th>
                <th class="px-5 py-3.5 text-left text-xs font-bold text-gray-500 uppercase">Lokasi</th>
                <th class="px-5 py-3.5 text-left text-xs font-bold text-gray-500 uppercase">Status</th>
                <th class="px-5 py-3.5 text-left text-xs font-bold text-gray-500 uppercase">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($agendas as $a)
            <tr class="hover:bg-gray-50">
                <td class="px-5 py-3 text-gray-600 whitespace-nowrap">{{ $a->tanggal->format('d M Y') }}</td>
                <td class="px-5 py-3 font-semibold text-on-surface">{{ $a->judul }}</td>
                <td class="px-5 py-3 text-gray-500">{{ $a->lokasi ?? '-' }}</td>
                <td class="px-5 py-3">
                    <span class="px-2.5 py-1 rounded-full text-xs font-bold {{ $a->status==='akan_datang' ? 'bg-blue-100 text-blue-700' : 'bg-gray-100 text-gray-500' }}">
                        {{ $a->label_status }}
                    </span>
                </td>
                <td class="px-5 py-3">
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.agenda.edit', $a) }}" class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-100"><span class="material-symbols-outlined text-sm">edit</span></a>
                        <form action="{{ route('admin.agenda.destroy', $a) }}" method="POST" onsubmit="return confirm('Hapus agenda ini?')">
                            @csrf @method('DELETE')
                            <button class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-100"><span class="material-symbols-outlined text-sm">delete</span></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty<tr><td colspan="5" class="py-10 text-center text-gray-400">Belum ada agenda.</td></tr>@endforelse
        </tbody>
    </table>
</div>
@endsection
