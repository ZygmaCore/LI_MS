<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'barang_id',
        'jumlah',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
    ];

    // Relasi: peminjaman dilakukan oleh 1 user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: peminjaman terkait 1 barang
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
