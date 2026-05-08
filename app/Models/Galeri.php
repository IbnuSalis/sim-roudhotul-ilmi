<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $fillable = ['judul', 'gambar', 'kategori', 'deskripsi', 'urutan'];

    public function getGambarUrlAttribute(): string
    {
        return $this->gambar ? asset('storage/' . $this->gambar) : asset('images/default.jpg');
    }
}
