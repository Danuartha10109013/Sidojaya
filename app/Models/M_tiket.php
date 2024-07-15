<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class M_tiket extends Model
{
    public $timestamps = false;
    protected $table = 'tiket';

    protected $fillable = [
        'nama_tiket',
        'harga',
        'id_wisata'
    ];

    public function get_table()
    {
        return self::all();
    }

    public function get_harga($id_tiket)
    {
        $tiket = self::find($id_tiket);
        return $tiket->harga;
    }

    public function get_jenis_tiket($id_tiket)
    {   
        $tiket = DB::table('orders')->join('tiket', 'tiket.id', '=','orders.id_tiket')->select('tiket.nama_tiket')->where('orders.id_tiket', $id_tiket)->first();
        return $tiket->nama_tiket;
    }

    public function get_harga_tiket($id_tiket)
    {   
        $tiket = DB::table('orders')->join('tiket', 'tiket.id', '=','orders.id_tiket')->select('tiket.harga')->where('orders.id_tiket', $id_tiket)->first();
        return $tiket->harga;
    }

    // public function get_tiket() 
    // {
    //     return DB::table('orders')->Join('tiket', 'orders.id_tiket', '=', 'tiket.id')->get();
    // }
}
