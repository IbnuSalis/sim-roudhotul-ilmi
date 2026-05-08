<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = 'fasilitas';
    protected $fillable = ['nama', 'gambar', 'deskripsi', 'ikon', 'urutan'];

    public function getGambarUrlAttribute(): string
    {
        return $this->gambar
            ? asset('storage/' . $this->gambar)
            : asset('images/default-fasilitas.jpg');
    }
}
