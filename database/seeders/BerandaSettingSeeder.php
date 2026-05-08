<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BerandaSetting;

class BerandaSettingSeeder extends Seeder
{
    public function run(): void
    {
        BerandaSetting::updateOrCreate(
            ['id' => 1],
            [
                'nama_kepala'   => 'Ustadzah Nur Fadhilah, S.Pd.',
                'jabatan_kepala'=> 'Kepala Yayasan Roudhotul Ilmi',
                'quote_kepala'  => 'Bismillah, kami berkomitmen menjadi mitra terbaik bagi orang tua dalam mendidik tunas-tunas bangsa menjadi generasi Qur\'ani.',
                'sambutan'      => "Assalamu'alaikum Warahmatullahi Wabarakatuh,\n\nPuji syukur kehadirat Allah SWT yang senantiasa memberikan kita kekuatan dan kemudahan dalam menjalankan amanah pendidikan yang mulia ini.\n\nPendidikan di Roudhotul Ilmi bukan sekadar transfer ilmu, melainkan penanaman karakter dan kecintaan pada Al-Qur'an sejak dini. Kami percaya bahwa setiap anak lahir dalam keadaan fitrah yang suci, dan tugas kita bersama adalah memelihara serta mengembangkan potensi mereka.\n\nBersama seluruh jajaran guru dan staf, kami berkomitmen untuk memberikan lingkungan belajar yang islami, menyenangkan, dan penuh kasih sayang. Karena kami yakin, anak yang bahagia adalah anak yang belajar dengan sepenuh hati.\n\nTerima kasih kepada seluruh orang tua yang telah mempercayakan pendidikan putra-putri tercinta kepada kami. Kepercayaan Anda adalah amanah yang kami jaga sepenuh hati.\n\nWassalamu'alaikum Warahmatullahi Wabarakatuh.",
                'jumlah_guru'   => 8,
                'jumlah_siswa'  => 120,
                'jumlah_rombel' => 6,
                'label_guru'    => 'Guru & Staf Profesional',
                'label_siswa'   => 'Peserta Didik Aktif',
                'label_rombel'  => 'Rombongan Belajar',
            ]
        );

        $this->command->info('✅ Beranda setting seeded.');
    }
}
