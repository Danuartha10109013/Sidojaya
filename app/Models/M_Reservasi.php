<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Reservasi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "reservasi";

    protected $fillable = [
        'nama',
        'tanggal',
        'jumlah_hari',
        'phone',
        'total_bayar',
        'id_penginapan',
        'id_wisata'
    ];
}
