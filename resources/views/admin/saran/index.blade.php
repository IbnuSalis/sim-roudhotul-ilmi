@extends('admin.layouts.app')
@section('title','Saran & Masukan') @section('page-title','Saran & Masukan')
@section('page-subtitle','Pesan dari pengunjung dan wali murid')
@section('content')

<!-- Filter -->
<form method="GET" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 mb-5 flex gap-3 items-end">
    <div>
        <label class="block text-xs font-bold text-gray-500 mb-1">Status Baca</label>
        <select name="dibaca" class="border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-primary">
            <option value="">Semua</option>
            <option value="tidak" {{ request('dibaca')==='tidak'?'selected':'' }}>Belum Dibaca</option>
            <option value="ya" {{ request('dibaca')==='ya'?'selected':'' }}>Sudah Dibaca</option>
        </select>
    </div>
    <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-primary-dark flex items-center gap-2"><span class="material-symbols-outlined text-sm">filter_list</span> Filter</button>
    @if(request()->has('dibaca'))<a href="{{ route('admin.saran.index') }}" class="px-4 py-2 rounded-lg text-sm border border-gray-200 text-gray-500 hover:border-primary hover:text-primary">Reset</a>@endif
</form>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="px-5 py-3.5 text-left text-xs font-bold text-gray-500 uppercase">Pengirim</th>
                <th class="px-5 py-3.5 text-left text-xs font-bold text-gray-500 uppercase">Subjek</th>
                <th class="px-5 py-3.5 text-left text-xs font-bold text-gray-500 uppercase">Pesan</th>
                <th class="px-5 py-3.5 text-left text-xs font-bold text-gray-500 uppercase">Tanggal</th>
                <th class="px-5 py-3.5 text-left text-xs font-bold text-gray-500 uppercase">Status</th>
                <th class="px-5 py-3.5 text-left text-xs font-bold text-gray-500 uppercase">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($sarans as $s)
            <tr class="hover:bg-gray-50 {{ !$s->sudah_dibaca ? 'bg-yellow-50/50' : '' }}">
                <td class="px-5 py-3">
                    <p class="font-semibold text-on-surface">{{ $s->nama }}</p>
                    @if($s->email)<p class="text-xs text-gray-400">{{ $s->email }}</p>@endif
                </td>
                <td class="px-5 py-3 text-gray-600">{{ $s->subjek ?? '-' }}</td>
                <td class="px-5 py-3 text-gray-500">{{ Str::limit($s->pesan, 60) }}</td>
                <td class="px-5 py-3 text-gray-400 whitespace-nowrap text-xs">{{ $s->created_at->format('d M Y H:i') }}</td>
                <td class="px-5 py-3">
                    <span class="px-2 py-0.5 rounded-full text-xs font-bold {{ $s->sudah_dibaca ? 'bg-gray-100 text-gray-500' : 'bg-yellow-100 text-yellow-700' }}">
                        {{ $s->sudah_dibaca ? 'Dibaca' : 'Baru' }}
                    </span>
                </td>
                <td class="px-5 py-3">
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.saran.show', $s) }}" class="w-8 h-8 rounded-lg bg-gray-50 text-gray-600 flex items-center justify-center hover:bg-gray-100"><span class="material-symbols-outlined text-sm">visibility</span></a>
                        @if(!$s->sudah_dibaca)
                        <form action="{{ route('admin.saran.baca', $s) }}" method="POST">
                            @csrf @method('PATCH')
                            <button class="w-8 h-8 rounded-lg bg-green-50 text-green-600 flex items-center justify-center hover:bg-green-100" title="Tandai dibaca"><span class="material-symbols-outlined text-sm">mark_email_read</span></button>
                        </form>
                        @endif
                        <form action="{{ route('admin.saran.destroy', $s) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')">
                            @csrf @method('DELETE')
                            <button class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-100"><span class="material-symbols-outlined text-sm">delete</span></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="py-10 text-center text-gray-400">Belum ada pesan masuk.</td></tr>
            @endforelse
        </tbody>
    </table>
    @if($sarans->hasPages())
    <div class="px-5 py-4 border-t border-gray-100">{{ $sarans->links() }}</div>
    @endif
</div>
@endsection
