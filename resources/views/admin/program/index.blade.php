@extends('admin.layouts.app')
@section('title','Program Sekolah') @section('page-title','Program Sekolah')
@section('content')
<div class="flex justify-end mb-5">
    <a href="{{ route('admin.program.create') }}" class="bg-primary text-white px-5 py-2.5 rounded-xl font-semibold hover:bg-primary-dark flex items-center gap-2 shadow">
        <span class="material-symbols-outlined">add</span> Tambah Program
    </a>
</div>
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="px-5 py-3.5 text-left text-xs font-bold text-gray-500 uppercase">Foto</th>
                <th class="px-5 py-3.5 text-left text-xs font-bold text-gray-500 uppercase">Judul</th>
                <th class="px-5 py-3.5 text-left text-xs font-bold text-gray-500 uppercase">Kategori</th>
                <th class="px-5 py-3.5 text-left text-xs font-bold text-gray-500 uppercase">Urutan</th>
                <th class="px-5 py-3.5 text-left text-xs font-bold text-gray-500 uppercase">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($programs as $p)
            <tr class="hover:bg-gray-50">
                <td class="px-5 py-3">
                    @if($p->foto)<img src="{{ asset('storage/'.$p->foto) }}" class="w-14 h-10 object-cover rounded-lg border border-gray-200">
                    @else<div class="w-14 h-10 bg-gray-100 rounded-lg flex items-center justify-center"><span class="material-symbols-outlined text-gray-300 text-sm">image</span></div>@endif
                </td>
                <td class="px-5 py-3 font-semibold text-on-surface">{{ $p->judul }}</td>
                <td class="px-5 py-3">
                    @php $catColors = ['kbtk'=>'bg-blue-100 text-blue-700','tahfid'=>'bg-green-100 text-green-700','tpa'=>'bg-orange-100 text-orange-700']; @endphp
                    <span class="px-2.5 py-1 rounded-full text-xs font-bold {{ $catColors[$p->kategori] ?? 'bg-gray-100 text-gray-600' }}">{{ strtoupper($p->kategori) }}</span>
                </td>
                <td class="px-5 py-3 text-gray-500">{{ $p->urutan }}</td>
                <td class="px-5 py-3">
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.program.edit', $p) }}" class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-100"><span class="material-symbols-outlined text-sm">edit</span></a>
                        <form action="{{ route('admin.program.destroy', $p) }}" method="POST" onsubmit="return confirm('Hapus program ini?')">
                            @csrf @method('DELETE')
                            <button class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-100"><span class="material-symbols-outlined text-sm">delete</span></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty<tr><td colspan="5" class="py-10 text-center text-gray-400">Belum ada program.</td></tr>@endforelse
        </tbody>
    </table>
</div>
@endsection
