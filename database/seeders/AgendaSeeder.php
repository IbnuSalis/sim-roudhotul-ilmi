<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agenda;
use Carbon\Carbon;

class AgendaSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $data = [
            [
                'judul'     => 'SPMB Tahun Ajaran 2025/2026',
                'deskripsi' => 'Pembukaan penerimaan peserta didik baru untuk semua program: KB-TK, Rumah Tahfid, dan TPA. Segera daftarkan putra-putri Anda.',
                'tanggal'   => $now->copy()->addDays(7)->format('Y-m-d'),
                'lokasi'    => 'Kantor Yayasan Roudhotul Ilmi',
                'status'    => 'akan_datang',
            ],
            [
                'judul'     => 'Peringatan Isra\' Mi\'raj 1447 H',
                'deskripsi' => 'Peringatan Isra\' Mi\'raj Nabi Muhammad SAW bersama seluruh peserta didik, guru, dan wali murid.',
                'tanggal'   => $now->copy()->addDays(14)->format('Y-m-d'),
                'lokasi'    => 'Aula Yayasan Roudhotul Ilmi',
                'status'    => 'akan_datang',
            ],
            [
                'judul'     => 'Wisuda Tahfid Semester Genap 2024/2025',
                'deskripsi' => 'Prosesi wisuda bagi peserta didik Rumah Tahfid yang telah menyelesaikan target hafalan semester ini.',
                'tanggal'   => $now->copy()->addDays(30)->format('Y-m-d'),
                'lokasi'    => 'Aula Utama Yayasan Roudhotul Ilmi',
                'status'    => 'akan_datang',
            ],
            [
                'judul'     => 'Outbound & Fun Learning Day',
                'deskripsi' => 'Kegiatan outing sekolah bertemakan "Alam Ciptaan Allah" untuk seluruh peserta didik KB-TK.',
                'tanggal'   => $now->copy()->addDays(45)->format('Y-m-d'),
                'lokasi'    => 'Taman Kota Surabaya',
                'status'    => 'akan_datang',
            ],
            [
                'judul'     => 'Pertemuan Wali Murid Semester Genap',
                'deskripsi' => 'Pertemuan rutin wali murid untuk membahas perkembangan peserta didik dan program semester genap.',
                'tanggal'   => $now->copy()->subDays(30)->format('Y-m-d'),
                'lokasi'    => 'Aula Yayasan Roudhotul Ilmi',
                'status'    => 'selesai',
            ],
            [
                'judul'     => 'Peringatan Maulid Nabi Muhammad SAW 1446 H',
                'deskripsi' => 'Rangkaian kegiatan Maulid Nabi: Pembacaan Maulid Barzanji, lomba islami, dan pengajian bersama.',
                'tanggal'   => $now->copy()->subDays(60)->format('Y-m-d'),
                'lokasi'    => 'Masjid & Halaman Yayasan',
                'status'    => 'selesai',
            ],
            [
                'judul'     => 'Pesantren Kilat Ramadhan 1446 H',
                'deskripsi' => 'Kegiatan pesantren kilat selama 3 hari untuk memperdalam ilmu agama dan meningkatkan kualitas ibadah.',
                'tanggal'   => $now->copy()->subDays(90)->format('Y-m-d'),
                'lokasi'    => 'Yayasan Roudhotul Ilmi',
                'status'    => 'selesai',
            ],
            [
                'judul'     => 'Pentas Seni & Kenaikan Kelas',
                'deskripsi' => 'Penampilan seni peserta didik dan prosesi kenaikan kelas tahun ajaran 2024/2025.',
                'tanggal'   => $now->copy()->subDays(15)->format('Y-m-d'),
                'lokasi'    => 'Aula Yayasan Roudhotul Ilmi',
                'status'    => 'selesai',
            ],
        ];

        foreach ($data as $item) {
            Agenda::create($item);
        }

        $this->command->info('✅ ' . count($data) . ' data agenda berhasil di-seed.');
    }
}
