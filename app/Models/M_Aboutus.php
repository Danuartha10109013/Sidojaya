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
        'nama_aboutus',
        'no_telpon',
        'nama_perusahaan',
        'keterangan',
    ];

    public function getData(){{
            return self::all();
        }
        
    }
}
