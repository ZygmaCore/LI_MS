<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lab extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lab',
        'lokasi',
    ];

    // Relasi: 1 lab punya banyak barangs
    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }
}
