<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // ── KB-TK ────────────────────────────────────────────
            [
                'judul'     => 'Kelompok Bermain (KB)',
                'kategori'  => 'kbtk',
                'deskripsi' => 'Program Kelompok Bermain untuk anak usia 2–4 tahun. Belajar sambil bermain dalam lingkungan islami.',
                'detail'    => "Usia: 2 – 4 Tahun\nWaktu: Senin – Jumat, 07.30 – 10.30 WIB\n\nFokus Program:\n• Stimulasi motorik halus dan kasar\n• Pengenalan huruf hijaiyah & iqro'\n• Hafalan surat-surat pendek dan doa harian\n• Pengembangan bahasa dan sosial-emosional\n• Seni dan kreativitas islami",
                'urutan'    => 1,
            ],
            [
                'judul'     => 'Taman Kanak-Kanak A (TK-A)',
                'kategori'  => 'kbtk',
                'deskripsi' => 'Program TK-A untuk anak usia 4–5 tahun dengan kurikulum terpadu berbasis nilai-nilai Islam.',
                'detail'    => "Usia: 4 – 5 Tahun\nWaktu: Senin – Jumat, 07.30 – 11.00 WIB\n\nFokus Program:\n• Iqro' jilid 1–3 & pengenalan Al-Qur'an\n• Hafalan 5–10 surat pendek\n• Calistung (Baca, Tulis, Hitung) dasar\n• Pembentukan kemandirian & karakter\n• Kegiatan proyek kreatif berbasis tema islami",
                'urutan'    => 2,
            ],
            [
                'judul'     => 'Taman Kanak-Kanak B (TK-B)',
                'kategori'  => 'kbtk',
                'deskripsi' => 'Program TK-B untuk anak usia 5–6 tahun sebagai persiapan masuk Sekolah Dasar.',
                'detail'    => "Usia: 5 – 6 Tahun\nWaktu: Senin – Jumat, 07.30 – 11.30 WIB\n\nFokus Program:\n• Iqro' jilid 4–6 hingga Al-Qur'an\n• Hafalan 15–20 surat + hafalan hadits pilihan\n• Persiapan literasi & numerasi SD\n• Pengembangan kecerdasan majemuk\n• Praktik ibadah: sholat, wudhu, adab islami",
                'urutan'    => 3,
            ],

            // ── TAHFID ───────────────────────────────────────────
            [
                'judul'     => 'Program Tahfid Intensif',
                'kategori'  => 'tahfid',
                'deskripsi' => 'Program menghafal Al-Qur\'an secara intensif dengan target hafalan yang terstruktur dan terukur.',
                'detail'    => "Usia: 4 – 12 Tahun\nWaktu: Senin – Sabtu, 07.30 – 12.00 WIB\n\nTarget Hafalan per Jenjang:\n• Level 1 (4–6 th): Juz 30 (surat-surat pendek)\n• Level 2 (6–8 th): Juz 29–30\n• Level 3 (8–10 th): Juz 27–30\n• Level 4 (10–12 th): 5 Juz (1, 2, 3, 29, 30)\n\nMetode: Talaqqi langsung dari guru, murojaah rutin, tasmi' berkala",
                'urutan'    => 1,
            ],
            [
                'judul'     => 'Program Tahfid Non-Intensif',
                'kategori'  => 'tahfid',
                'deskripsi' => 'Program menghafal Al-Qur\'an untuk anak yang masih bersekolah formal, dengan jadwal sore hari.',
                'detail'    => "Usia: 5 – 15 Tahun\nWaktu: Senin – Kamis, 14.00 – 16.00 WIB\n\nFokus:\n• Hafalan Al-Qur'an sesuai kemampuan\n• Tajwid dan makhorijul huruf yang benar\n• Tasmi' (setoran hafalan) mingguan\n• Murojaah hafalan lama\n• Adab terhadap Al-Qur'an",
                'urutan'    => 2,
            ],
            [
                'judul'     => 'Wisuda Tahfid',
                'kategori'  => 'tahfid',
                'deskripsi' => 'Program penghargaan dan wisuda bagi peserta didik yang telah menyelesaikan target hafalan Al-Qur\'an.',
                'detail'    => "Dilaksanakan setiap semester atau ketika peserta didik menyelesaikan target juz hafalan mereka.\n\nRangkaian Acara:\n• Tasmi' (Ujian Hafalan) di hadapan ustadz/ustadzah\n• Ijazah Sanad Qur'an\n• Prosesi wisuda bersama orang tua\n• Pemberian penghargaan dan hadiah",
                'urutan'    => 3,
            ],

            // ── TPA ──────────────────────────────────────────────
            [
                'judul'     => 'TPA (Taman Pendidikan Al-Qur\'an)',
                'kategori'  => 'tpa',
                'deskripsi' => 'Program pendidikan Al-Qur\'an sore hari untuk anak-anak usia sekolah dari berbagai lembaga pendidikan.',
                'detail'    => "Usia: 5 – 15 Tahun\nWaktu: Senin – Kamis, 15.30 – 17.00 WIB\n\nMateri:\n• Baca Al-Qur'an (Iqro' dan Al-Qur'an)\n• Ilmu Tajwid dasar\n• Hafalan Juz 30 & doa-doa harian\n• Akidah & akhlak dasar\n• Fiqh ibadah sehari-hari (thoharoh, sholat, puasa)\n• Sholat Ashar berjamaah",
                'urutan'    => 1,
            ],
            [
                'judul'     => 'Program Ramadhan TPA',
                'kategori'  => 'tpa',
                'deskripsi' => 'Program intensif selama bulan Ramadhan dengan kegiatan khusus memperbanyak ibadah dan hafalan.',
                'detail'    => "Dilaksanakan selama bulan Ramadhan dengan jadwal yang lebih intensif.\n\nKegiatan Khusus:\n• Tadarus Al-Qur'an bersama\n• Tarawih berjamaah (untuk yang mampu)\n• Buka puasa bersama\n• Lomba hafalan surat dan hadits\n• Pesantren kilat 3 hari\n• Bakti sosial & berbagi takjil",
                'urutan'    => 2,
            ],
        ];

        foreach ($data as $item) {
            Program::updateOrCreate(
                ['judul' => $item['judul'], 'kategori' => $item['kategori']],
                $item
            );
        }

        $this->command->info('✅ ' . count($data) . ' data program berhasil di-seed.');
    }
}
