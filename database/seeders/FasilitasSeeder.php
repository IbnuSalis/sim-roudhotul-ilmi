<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fasilitas;

class FasilitasSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama'      => 'Ruang Kelas Ber-AC',
                'ikon'      => 'class',
                'deskripsi' => 'Ruang kelas yang nyaman, bersih, dan dilengkapi AC untuk mendukung suasana belajar yang kondusif. Setiap kelas dilengkapi dengan meja dan kursi yang ergonomis sesuai ukuran anak, papan tulis interaktif, serta berbagai media pembelajaran visual yang menarik dan edukatif.',
                'urutan'    => 1,
            ],
            [
                'nama'      => 'Playground & Area Bermain Outdoor',
                'ikon'      => 'sports_gymnastics',
                'deskripsi' => 'Area bermain outdoor yang luas dan aman dengan peralatan bermain modern seperti ayunan, perosotan, jungkat-jungkit, dan climbing wall. Dirancang untuk mengembangkan kemampuan motorik kasar anak sekaligus menjadi sarana bermain yang menyenangkan dan aman.',
                'urutan'    => 2,
            ],
            [
                'nama'      => 'Ruang Tahfid',
                'ikon'      => 'menu_book',
                'deskripsi' => 'Ruang khusus untuk kegiatan hafalan Al-Qur\'an yang dilengkapi dengan karpet nyaman, sound system berkualitas, dan suasana yang tenang dan kondusif. Ruangan ini dirancang untuk memaksimalkan konsentrasi anak dalam menghafal dan murojaah ayat-ayat Al-Qur\'an.',
                'urutan'    => 3,
            ],
            [
                'nama'      => 'Mushola & Area Sholat',
                'ikon'      => 'mosque',
                'deskripsi' => 'Mushola yang bersih dan nyaman untuk kegiatan sholat berjamaah dan pembelajaran praktik ibadah. Dilengkapi dengan perlengkapan sholat, Al-Qur\'an, dan iqro\' untuk kegiatan mengaji sehari-hari. Menjadi pusat pembinaan spiritual para peserta didik.',
                'urutan'    => 4,
            ],
            [
                'nama'      => 'Ruang UKS',
                'ikon'      => 'medical_services',
                'deskripsi' => 'Unit Kesehatan Sekolah (UKS) yang dilengkapi dengan peralatan P3K lengkap, tempat tidur istirahat, timbangan, dan alat pengukur tinggi badan. Siap menangani kebutuhan kesehatan anak selama berada di sekolah dengan penanganan yang cepat dan tepat.',
                'urutan'    => 5,
            ],
            [
                'nama'      => 'Kantin Sehat',
                'ikon'      => 'restaurant',
                'deskripsi' => 'Kantin sekolah yang menyediakan makanan dan minuman sehat, halal, dan bergizi untuk peserta didik. Seluruh menu diawasi dan dipilih dengan cermat untuk memastikan nutrisi yang optimal bagi tumbuh kembang anak. Bebas dari jajanan tidak sehat dan bahan berbahaya.',
                'urutan'    => 6,
            ],
        ];

        foreach ($data as $item) {
            Fasilitas::updateOrCreate(['nama' => $item['nama']], $item);
        }

        $this->command->info('✅ ' . count($data) . ' data fasilitas berhasil di-seed.');
    }
}
