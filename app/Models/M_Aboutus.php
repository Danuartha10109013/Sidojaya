<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Aboutus extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "aboutus";

    protected $fillable = [
        'nama',
        'sub_judul',
        'keterangan',
        'visi',
        'misi',
        'no_telpon',
        'peta',
        'ket_wilayah',
        'monografi',
        'gambar_monografi',
        'gambar_struktur',
        'link_wa',
        'link_ig',
        'link_fb',
    ];
    

    public function getData(){{
            return self::all();
        }
        
    }
}
