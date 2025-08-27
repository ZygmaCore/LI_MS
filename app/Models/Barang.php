<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'jumlah_total',
        'lab_id',
    ];

    // Relasi: Barang milik satu Lab
    public function lab()
    {
        return $this->belongsTo(Lab::class);
    }

    // Relasi: Barang bisa dipinjam berkali-kali
    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class);
    }

    // Relasi: Barang bisa diperbaiki berkali-kali
    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }
}
