<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_wisata extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "wisata";

    protected $fillable = [
        'name',
        'email',
        'password',
        'nama_wisata',
        'harga_tiket',
        'alamat',
        'kontak_pengelola',
        'fasilitas',
        'deskripsi',
        'gmaps',
        'id_kategori',
        'id_galeri',
        'id_user',
        'bukti_pengelola'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class, 'wisata_id');
    }


    
}
