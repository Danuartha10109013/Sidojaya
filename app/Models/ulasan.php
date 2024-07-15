<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ulasan extends Model
{
    public $timestamps = false;
    protected $table = 'ulasan';

    protected $fillable = [
        'nama',
        'deskripsi',
        'rating',
        'id_wisata'
    ];
}
