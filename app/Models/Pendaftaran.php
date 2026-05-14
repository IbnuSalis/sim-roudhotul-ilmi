<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

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

    public static function createWithGeneratedCode(array $attributes): self
    {
        $attributes['tahun_ajaran'] ??= self::currentTahunAjaran();

        for ($attempt = 1; $attempt <= 3; $attempt++) {
            try {
                return DB::transaction(function () use ($attributes) {
                    $attributes['kode_daftar'] = self::generateKode(true);

                    return self::create($attributes);
                });
            } catch (QueryException $exception) {
                if ($attempt === 3 || ! self::isDuplicateCodeException($exception)) {
                    throw $exception;
                }
            }
        }

        throw new \RuntimeException('Gagal membuat kode pendaftaran.');
    }

    public static function currentTahunAjaran(): string
    {
        $year = (int) now()->format('Y');
        $startYear = (int) now()->format('n') >= 7 ? $year : $year - 1;

        return $startYear . '/' . ($startYear + 1);
    }

    public static function generateKode(bool $lock = false): string
    {
        $prefix = 'SPMB' . now()->format('Y');
        $query = self::where('kode_daftar', 'like', $prefix . '%')
            ->orderByDesc('kode_daftar');

        if ($lock) {
            $query->lockForUpdate();
        }

        $last = $query->value('kode_daftar');
        $next = $last ? (intval(substr($last, -4)) + 1) : 1;

        return $prefix . str_pad($next, 4, '0', STR_PAD_LEFT);
    }

    private static function isDuplicateCodeException(QueryException $exception): bool
    {
        return str_contains($exception->getMessage(), 'pendaftarans_kode_daftar_unique')
            || str_contains($exception->getMessage(), 'Duplicate entry')
            || $exception->getCode() === '23000';
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
