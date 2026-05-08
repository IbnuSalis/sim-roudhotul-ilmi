<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'kategori', 'foto', 'deskripsi', 'detail', 'urutan'];

    public function getFotoUrlAttribute(): string
    {
        return $this->foto
            ? asset('storage/' . $this->foto)
            : asset('images/default-program.jpg');
    }

    public function scopeKategori($query, string $kategori)
    {
        return $query->where('kategori', $kategori)->orderBy('urutan');
    }

    public function getLabelKategoriAttribute(): string
    {
        return match ($this->kategori) {
            'kbtk'   => 'KB-TK Roudhotul Ilmi',
            'tahfid'  => 'Rumah Tahfid Roudhotul Ilmi',
            'tpa'    => 'TPA Roudhotul Ilmi',
            default  => $this->kategori,
        };
    }
}
