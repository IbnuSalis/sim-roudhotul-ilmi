<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\ProfilSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function editIdentitas() {
        $profil = ProfilSekolah::getInstance();
        return view('admin.profil.identitas', compact('profil'));
    }

    public function updateIdentitas(Request $request) {
        $validated = $request->validate([
            'nama_sekolah'  => 'required|string|max:300',
            'npsn'          => 'nullable|string|max:20',
            'nss'           => 'nullable|string|max:20',
            'akreditasi'    => 'nullable|string|max:10',
            'kepala_sekolah'=> 'required|string|max:200',
            'tahun_berdiri' => 'nullable|string|max:10',
            'status'        => 'nullable|string|max:50',
            'jenjang'       => 'nullable|string|max:100',
            'alamat'        => 'required|string',
            'kelurahan'     => 'nullable|string|max:100',
            'kecamatan'     => 'nullable|string|max:100',
            'kabupaten_kota'=> 'nullable|string|max:100',
            'provinsi'      => 'nullable|string|max:100',
            'kode_pos'      => 'nullable|string|max:10',
            'telepon'       => 'nullable|string|max:30',
            'email'         => 'nullable|email|max:200',
            'website'       => 'nullable|string|max:200',
            'instagram'     => 'nullable|string|max:100',
            'nama_yayasan'  => 'nullable|string|max:300',
            'ketua_yayasan' => 'nullable|string|max:200',
            'foto_gedung'   => 'nullable|image|max:4096',
        ]);

        $profil = ProfilSekolah::getInstance();
        if ($request->hasFile('foto_gedung')) {
            if ($profil->foto_gedung) Storage::disk('public')->delete($profil->foto_gedung);
            $validated['foto_gedung'] = $request->file('foto_gedung')->store('profil', 'public');
        } else { unset($validated['foto_gedung']); }

        $profil->update($validated);
        return redirect()->route('admin.profil.identitas')->with('success', 'Identitas sekolah berhasil diperbarui.');
    }

    public function editVisimisi() {
        $profil = ProfilSekolah::getInstance();
        return view('admin.profil.visimisi', compact('profil'));
    }

    public function updateVisimisi(Request $request) {
        $validated = $request->validate([
            'visi'   => 'required|string',
            'misi'   => 'required|string',
            'tujuan' => 'nullable|string',
        ]);
        ProfilSekolah::getInstance()->update($validated);
        return redirect()->route('admin.profil.visimisi')->with('success', 'Visi & Misi berhasil diperbarui.');
    }
}
