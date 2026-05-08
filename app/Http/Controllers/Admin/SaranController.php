<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Saran;
use Illuminate\Http\Request;

class SaranController extends Controller
{
    public function index(Request $request) {
        $query = Saran::query();
        if ($request->filled('dibaca')) $query->where('sudah_dibaca', $request->dibaca === 'ya');
        $sarans = $query->latest()->paginate(15);
        return view('admin.saran.index', compact('sarans'));
    }

    public function show(Saran $saran) {
        if (!$saran->sudah_dibaca) $saran->update(['sudah_dibaca' => true]);
        return view('admin.saran.show', compact('saran'));
    }

    public function destroy(Saran $saran) {
        $saran->delete();
        return redirect()->route('admin.saran.index')->with('success', 'Pesan berhasil dihapus.');
    }

    public function tandaiBaca(Saran $saran) {
        $saran->update(['sudah_dibaca' => true]);
        return redirect()->route('admin.saran.index')->with('success', 'Pesan ditandai sudah dibaca.');
    }
}
