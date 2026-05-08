<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BerandaSetting;
use App\Models\ProfilSekolah;
use App\Models\Guru;
use App\Models\Fasilitas;
use App\Models\Program;
use App\Models\Agenda;
use App\Models\Galeri;
use App\Http\Requests\Frontend\SpmbRequest;
use App\Http\Requests\Frontend\SaranRequest;
use App\Models\Pendaftaran;
use App\Models\Saran;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private function getCommonData(): array
    {
        return [
            'beranda'  => BerandaSetting::getInstance(),
            'profil'   => ProfilSekolah::getInstance(),
        ];
    }

    public function index()
    {
        $data = $this->getCommonData();
        $data['gurus']      = Guru::aktif()->take(4)->get();
        $data['fasilitas']  = Fasilitas::orderBy('urutan')->take(3)->get();
        $data['programs']   = Program::orderBy('urutan')->take(6)->get();
        $data['agendas']    = Agenda::orderBy('tanggal', 'desc')->take(4)->get();
        return view('frontend.home.index', $data);
    }

    public function identitas()
    {
        return view('frontend.profil.identitas', $this->getCommonData());
    }

    public function visimisi()
    {
        return view('frontend.profil.visimisi', $this->getCommonData());
    }

    public function sambutan()
    {
        return view('frontend.profil.sambutan', $this->getCommonData());
    }

    public function stafPengajar()
    {
        $data = $this->getCommonData();
        $data['gurus'] = Guru::aktif()->get();
        return view('frontend.staf.index', $data);
    }

    public function fasilitas()
    {
        $data = $this->getCommonData();
        $data['fasilitas'] = Fasilitas::orderBy('urutan')->get();
        return view('frontend.fasilitas.index', $data);
    }

    public function fasilitasDetail($id)
    {
        $data = $this->getCommonData();
        $data['item'] = Fasilitas::findOrFail($id);
        return view('frontend.fasilitas.detail', $data);
    }

    public function programKbtk()
    {
        $data = $this->getCommonData();
        $data['programs'] = Program::kategori('kbtk')->get();
        $data['kategori'] = 'kbtk';
        return view('frontend.program.index', $data);
    }

    public function programTahfid()
    {
        $data = $this->getCommonData();
        $data['programs'] = Program::kategori('tahfid')->get();
        $data['kategori'] = 'tahfid';
        return view('frontend.program.index', $data);
    }

    public function programTpa()
    {
        $data = $this->getCommonData();
        $data['programs'] = Program::kategori('tpa')->get();
        $data['kategori'] = 'tpa';
        return view('frontend.program.index', $data);
    }

    public function agenda()
    {
        $data = $this->getCommonData();
        $data['akanDatang'] = Agenda::akanDatang()->get();
        $data['selesai']    = Agenda::selesai()->get();
        return view('frontend.agenda.index', $data);
    }

    public function galeri()
    {
        $data = $this->getCommonData();
        $data['galeris'] = Galeri::orderBy('urutan')->get();
        return view('frontend.galeri.index', $data);
    }

    public function spmb()
    {
        return view('frontend.spmb.index', $this->getCommonData());
    }

    public function storeSpmb(SpmbRequest $request)
    {
        $validated = $request->validated();
        $validated['kode_daftar'] = Pendaftaran::generateKode();

        if ($request->hasFile('foto_anak')) {
            $validated['foto_anak'] = $request->file('foto_anak')->store('pendaftaran', 'public');
        }

        $pendaftaran = Pendaftaran::create($validated);

        return redirect()->route('spmb.sukses', $pendaftaran->kode_daftar)
            ->with('success', 'Pendaftaran berhasil! Kode pendaftaran Anda: ' . $pendaftaran->kode_daftar);
    }

    public function spmbSukses($kode)
    {
        $pendaftaran = Pendaftaran::where('kode_daftar', $kode)->firstOrFail();
        $beranda = \App\Models\BerandaSetting::getInstance();
        $profil  = \App\Models\ProfilSekolah::getInstance();
        return view('frontend.spmb.sukses', compact('pendaftaran', 'beranda', 'profil'));
    }

    public function storeSaran(SaranRequest $request)
    {
        Saran::create($request->validated());
        return redirect()->route('home')->with('success', 'Terima kasih! Saran & masukan Anda telah kami terima.');
    }
}
