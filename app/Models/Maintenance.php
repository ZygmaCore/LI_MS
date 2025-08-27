<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_id',
        'deskripsi_kerusakan',
        'tanggal_maintenance',
        'status',
        'catatan',
    ];

    // Relasi: maintenance milik 1 barang
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
