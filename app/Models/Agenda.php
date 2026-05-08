<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'deskripsi', 'tanggal', 'lokasi', 'status'];
    protected $casts = ['tanggal' => 'date'];

    public function getLabelStatusAttribute(): string
    {
        return $this->status === 'akan_datang' ? 'Akan Datang' : 'Selesai';
    }

    public function getBadgeClassAttribute(): string
    {
        return $this->status === 'akan_datang'
            ? 'bg-primary text-white'
            : 'bg-gray-300 text-gray-700';
    }

    public function scopeAkanDatang($query)
    {
        return $query->where('status', 'akan_datang')->orderBy('tanggal', 'asc');
    }

    public function scopeSelesai($query)
    {
        return $query->where('status', 'selesai')->orderBy('tanggal', 'desc');
    }
}
