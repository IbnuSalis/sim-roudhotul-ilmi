<?php
// app/Models/BerandaSetting.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BerandaSetting extends Model
{
    protected $fillable = [
        'nama_kepala', 'jabatan_kepala', 'foto_kepala',
        'quote_kepala', 'sambutan',
        'jumlah_guru', 'jumlah_siswa', 'jumlah_rombel',
        'label_guru', 'label_siswa', 'label_rombel',
        'hero_slide_1', 'hero_slide_2', 'hero_slide_3',
    ];

    public static function getInstance(): self
    {
        return self::firstOrCreate(['id' => 1]);
    }
}
