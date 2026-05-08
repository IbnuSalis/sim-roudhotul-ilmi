<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_daftar', 'nama_lengkap', 'nama_panggilan',
        'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir',
        'agama', 'anak_ke', 'jumlah_saudara', 'asal_sekolah',
        'nama_ayah', 'nama_ibu', 'pekerjaan_ayah', 'pekerjaan_ibu',
        'telepon', 'email', 'alamat', 'program', 'tahun_ajaran',
        'status', 'catatan_admin', 'foto_anak',
    ];

    protected $casts = ['tanggal_lahir' => 'date'];

    public static function generateKode(): string
    {
        $prefix = 'SPMB' . date('Y');
        $last = self::where('kode_daftar', 'like', $prefix . '%')->max('kode_daftar');
        $next = $last ? (intval(substr($last, -4)) + 1) : 1;
        return $prefix . str_pad($next, 4, '0', STR_PAD_LEFT);
    }

    public function getLabelStatusAttribute(): string
    {
        return match ($this->status) {
            'pending'  => 'Menunggu',
            'diterima' => 'Diterima',
            'ditolak'  => 'Ditolak',
            default    => $this->status,
        };
    }

    public function getBadgeClassAttribute(): string
    {
        return match ($this->status) {
            'pending'  => 'bg-yellow-100 text-yellow-800',
            'diterima' => 'bg-green-100 text-green-800',
            'ditolak'  => 'bg-red-100 text-red-800',
            default    => 'bg-gray-100 text-gray-800',
        };
    }

    public function getLabelProgramAttribute(): string
    {
        return match ($this->program) {
            'kbtk'   => 'KB-TK Roudhotul Ilmi',
            'tahfid'  => 'Rumah Tahfid Roudhotul Ilmi',
            'tpa'    => 'TPA Roudhotul Ilmi',
            default  => $this->program,
        };
    }
}
