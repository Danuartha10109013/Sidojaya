<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "orders";

    protected $fillable = [
        'jenis_tiket',
        'name',
        'address',
        'phone',
        'qty',
        'total_price',
        'id_tiket',
        'id_wisata',
        'id_user'
    ];

    public function wisata()
{
    return $this->belongsTo(M_wisata::class, 'id_wisata');
}

}
