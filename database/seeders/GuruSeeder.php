<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guru;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        $gurus = [
            [
                'nama'       => 'Ustadzah Nur Fadhilah, S.Pd.',
                'jabatan'    => 'Kepala Yayasan & Pengajar',
                'pendidikan' => 'S1 Pendidikan Islam',
                'deskripsi'  => 'Pendiri dan Kepala Yayasan Roudhotul Ilmi. Berpengalaman lebih dari 10 tahun di bidang pendidikan anak usia dini berbasis Al-Qur\'an.',
                'urutan'     => 1,
                'aktif'      => true,
            ],
            [
                'nama'       => 'Ustadzah Aini Rahmawati, S.Pd.',
                'jabatan'    => 'Kepala Sekolah TK',
                'pendidikan' => 'S1 PGPAUD',
                'deskripsi'  => 'Kepala Sekolah KB-TK Roudhotul Ilmi. Ahli dalam pengembangan kurikulum PAUD berbasis karakter islami.',
                'urutan'     => 2,
                'aktif'      => true,
            ],
            [
                'nama'       => 'Ustadzah Siti Maryam',
                'jabatan'    => 'Koordinator Rumah Tahfid',
                'pendidikan' => 'S1 Ilmu Al-Qur\'an & Tafsir',
                'deskripsi'  => 'Koordinator Program Rumah Tahfid. Hafidzhah 30 Juz dengan sanad bersambung. Berpengalaman mengajarkan tahfidz kepada anak-anak.',
                'urutan'     => 3,
                'aktif'      => true,
            ],
            [
                'nama'       => 'Ustadzah Fatimah Zahra, S.Pd.',
                'jabatan'    => 'Guru Kelas A',
                'pendidikan' => 'S1 PGSD',
                'deskripsi'  => 'Guru Kelas A dengan keahlian khusus dalam stimulasi motorik dan perkembangan kognitif anak usia dini.',
                'urutan'     => 4,
                'aktif'      => true,
            ],
            [
                'nama'       => 'Ustadzah Khadijah Putri',
                'jabatan'    => 'Guru Kelas B',
                'pendidikan' => 'S1 Psikologi',
                'deskripsi'  => 'Guru Kelas B dengan latar belakang psikologi anak. Spesialis dalam pendekatan bermain sambil belajar.',
                'urutan'     => 5,
                'aktif'      => true,
            ],
            [
                'nama'       => 'Ustadzah Halimah, S.Pd.',
                'jabatan'    => 'Guru KB & Pengajar TPA',
                'pendidikan' => 'S1 PGPAUD',
                'deskripsi'  => 'Guru Kelompok Bermain (KB) yang berpengalaman dalam penanganan anak-anak berkebutuhan khusus ringan.',
                'urutan'     => 6,
                'aktif'      => true,
            ],
            [
                'nama'       => 'Ustadz Ahmad Fauzi, S.Pd.I.',
                'jabatan'    => 'Pengajar Tahfid & TPQ',
                'pendidikan' => 'S1 Pendidikan Agama Islam',
                'deskripsi'  => 'Pengajar Tahfidz dan TPQ. Hafidz 30 Juz, aktif membimbing hafalan dengan metode yang menyenangkan bagi anak-anak.',
                'urutan'     => 7,
                'aktif'      => true,
            ],
            [
                'nama'       => 'Ustadzah Zulfa Nur Aini',
                'jabatan'    => 'Staf Administrasi & Pengajar',
                'pendidikan' => 'D3 Manajemen Pendidikan',
                'deskripsi'  => 'Staf administrasi sekolah sekaligus pengajar ekstrakurikuler seni dan kreativitas anak.',
                'urutan'     => 8,
                'aktif'      => true,
            ],
        ];

        foreach ($gurus as $guru) {
            Guru::updateOrCreate(['nama' => $guru['nama']], $guru);
        }

        $this->command->info('✅ ' . count($gurus) . ' data guru berhasil di-seed.');
    }
}
