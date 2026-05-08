<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Pendaftaran;
use App\Models\Agenda;
use App\Models\Saran;
use App\Models\Fasilitas;
use App\Models\Program;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_guru'        => Guru::where('aktif', true)->count(),
            'total_pendaftaran' => Pendaftaran::count(),
            'pending_spmb'      => Pendaftaran::where('status', 'pending')->count(),
            'diterima_spmb'     => Pendaftaran::where('status', 'diterima')->count(),
            'ditolak_spmb'      => Pendaftaran::where('status', 'ditolak')->count(),
            'total_agenda'      => Agenda::count(),
            'agenda_akan_datang'=> Agenda::where('status', 'akan_datang')->count(),
            'total_saran'       => Saran::count(),
            'saran_belum_baca'  => Saran::where('sudah_dibaca', false)->count(),
            'total_fasilitas'   => Fasilitas::count(),
            'total_program'     => Program::count(),
        ];

        $pendaftaran_terbaru = Pendaftaran::latest()->take(5)->get();
        $saran_terbaru       = Saran::where('sudah_dibaca', false)->latest()->take(5)->get();
        $agenda_upcoming     = Agenda::where('status', 'akan_datang')->orderBy('tanggal')->take(3)->get();

        return view('admin.dashboard.index', compact(
            'stats', 'pendaftaran_terbaru', 'saran_terbaru', 'agenda_upcoming'
        ));
    }
}
