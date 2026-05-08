<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jabatan',
        'pendidikan',
        'foto',
        'posisi_foto',
        'deskripsi',
        'urutan',
        'aktif',
    ];

    protected $casts = ['aktif' => 'boolean'];

    public function getFotoUrlAttribute(): string
    {
        return $this->foto
            ? asset('storage/' . $this->foto)
            : asset('images/default-guru.png');
    }

    public function scopeAktif($query)
    {
        return $query->where('aktif', true)->orderBy('urutan');
    }
}