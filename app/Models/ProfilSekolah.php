<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilSekolah extends Model
{
    protected $fillable = [
        'nama_sekolah', 'npsn', 'nss', 'akreditasi',
        'kepala_sekolah', 'tahun_berdiri', 'status', 'jenjang',
        'alamat', 'kelurahan', 'kecamatan', 'kabupaten_kota',
        'provinsi', 'kode_pos', 'telepon', 'email', 'website',
        'instagram', 'nama_yayasan', 'ketua_yayasan', 'foto_gedung',
        'visi', 'misi', 'tujuan',
    ];

    public static function getInstance(): self
    {
        return self::firstOrCreate(['id' => 1]);
    }
}
