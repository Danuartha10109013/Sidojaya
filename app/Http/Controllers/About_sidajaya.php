<?php

namespace App\Http\Controllers;

use App\Models\M_Aboutus;
use App\Models\M_kategori;
use App\Models\M_wisata;
use Illuminate\Http\Request;

class About_sidajaya extends Controller
{
    public function index (){
        $data_aboutus = M_Aboutus::all();
        $data_kategori = M_kategori::all();
        $data_wisata = M_wisata::all();
        return view('about-sidajaya.index', [
            'data_kategori' => $data_kategori,
            'data_wisata' => $data_wisata,
            'data_aboutus' => $data_aboutus
        ]); 
    }
}
