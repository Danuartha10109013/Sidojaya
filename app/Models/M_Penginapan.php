<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_Penginapan extends Model
{
    public $timestamps = false;
    protected $table = 'penginapan';

    protected $fillable = [
        'nama_penginapan',
        'harga',
        'id_wisata'
    ];

    public function get_table()
    {
        return self::all();
    }

    public function get_harga($id_penginapan)
    {
        $penginapan = self::find($id_penginapan);
        return $penginapan->harga;
    }

    public function get_jenis_penginapan($id_penginapan)
    {   
        $penginapan = DB::table('reservasi')->join('penginapan', 'penginapan.id', '=','reservasi.id_penginapan')->select('penginapan.nama_penginapan')->where('reservasi.id_penginapan', $id_penginapan)->first();
        return $penginapan->nama_penginapan;
    }

    public function get_harga_penginapan($id_penginapan)
    {   
        $penginapan = DB::table('reservasi')->join('penginapan', 'penginapan.id', '=','reservasi.id_penginapan')->select('penginapan.harga')->where('reservasi.id_penginapan', $id_penginapan)->first();
        return $penginapan->harga;
    }
}
