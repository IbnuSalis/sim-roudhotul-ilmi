<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class SpmbController extends Controller
{
    public function index(Request $request) {
        $query = Pendaftaran::query();
        if ($request->filled('status')) $query->where('status', $request->status);
        if ($request->filled('program')) $query->where('program', $request->program);
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('nama_lengkap', 'like', '%'.$request->search.'%')
                  ->orWhere('kode_daftar', 'like', '%'.$request->search.'%')
                  ->orWhere('telepon', 'like', '%'.$request->search.'%');
            });
        }
        $pendaftarans = $query->latest()->paginate(15);
        return view('admin.spmb.index', compact('pendaftarans'));
    }

    public function show(Pendaftaran $pendaftaran) {
        return view('admin.spmb.show', compact('pendaftaran'));
    }

    public function edit(Pendaftaran $pendaftaran) {
        return view('admin.spmb.edit', compact('pendaftaran'));
    }

    public function update(Request $request, Pendaftaran $pendaftaran) {
        $validated = $request->validate([
            'status'         => 'required|in:pending,diterima,ditolak',
            'catatan_admin'  => 'nullable|string',
            'nama_lengkap'   => 'required|string|max:200',
            'program'        => 'required|in:kbtk,tahfid,tpa',
            'telepon'        => 'required|string|max:20',
        ]);
        $pendaftaran->update($validated);
        return redirect()->route('admin.spmb.show', $pendaftaran)
            ->with('success', 'Data pendaftaran berhasil diperbarui.');
    }

    public function updateStatus(Request $request, Pendaftaran $pendaftaran) {
        $request->validate(['status' => 'required|in:pending,diterima,ditolak']);
        $pendaftaran->update([
            'status'        => $request->status,
            'catatan_admin' => $request->catatan_admin,
        ]);
        return redirect()->route('admin.spmb.index')
            ->with('success', 'Status pendaftaran berhasil diperbarui.');
    }

    public function destroy(Pendaftaran $pendaftaran) {
        $pendaftaran->delete();
        return redirect()->route('admin.spmb.index')->with('success', 'Data pendaftaran berhasil dihapus.');
    }
}
