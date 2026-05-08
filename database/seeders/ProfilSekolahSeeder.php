<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProfilSekolah;

class ProfilSekolahSeeder extends Seeder
{
    public function run(): void
    {
        ProfilSekolah::updateOrCreate(
            ['id' => 1],
            [
                'nama_sekolah'   => 'KBTK & Rumah Tahfid Roudhotul Ilmi',
                'npsn'           => '69987654',
                'akreditasi'     => 'B',
                'kepala_sekolah' => 'Ustadzah Nur Fadhilah, S.Pd.',
                'tahun_berdiri'  => '2010',
                'status'         => 'Swasta',
                'jenjang'        => 'PAUD / TK / Rumah Tahfid',
                'alamat'         => 'Jl. Jetis Kulon VIII No.19B',
                'kelurahan'      => 'Jetis Kulon',
                'kecamatan'      => 'Wonocolo',
                'kabupaten_kota' => 'Kota Surabaya',
                'provinsi'       => 'Jawa Timur',
                'kode_pos'       => '60162',
                'telepon'        => '+62 812-3456-7890',
                'email'          => 'roudhotulilmi@gmail.com',
                'instagram'      => 'roudhotulilmi',
                'nama_yayasan'   => 'Yayasan Pendidikan Islam Roudhotul Ilmi',
                'visi'           => 'Menjadi lembaga pendidikan Islam terpadu yang melahirkan generasi Qur\'ani, berakhlak mulia, cerdas, mandiri, dan siap menghadapi tantangan zaman dengan berlandaskan Al-Qur\'an dan As-Sunnah.',
                'misi'           => "1. Menyelenggarakan pendidikan berbasis Al-Qur'an dan nilai-nilai Islam yang komprehensif.\n2. Membangun karakter islami, akhlak mulia, dan kepribadian yang kuat sejak usia dini.\n3. Menyediakan lingkungan belajar yang aman, nyaman, menyenangkan, dan kondusif.\n4. Mengembangkan potensi peserta didik secara holistik mencakup aspek kognitif, afektif, dan psikomotorik.\n5. Bermitra aktif dan sinergis dengan orang tua dalam mendidik generasi penerus bangsa.\n6. Menerapkan metode pembelajaran inovatif yang sesuai dengan perkembangan anak.",
                'tujuan'         => "1. Menghasilkan peserta didik yang hafal dan mencintai Al-Qur'an sejak dini.\n2. Membentuk karakter anak yang berakhlak mulia berdasarkan tuntunan Islam.\n3. Menyiapkan peserta didik untuk melanjutkan ke jenjang pendidikan berikutnya dengan pondasi yang kuat.\n4. Membangun kepercayaan masyarakat terhadap pendidikan Islam berkualitas.",
            ]
        );

        $this->command->info('✅ Profil sekolah seeded.');
    }
}
