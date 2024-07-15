<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Reservasi;
use App\Models\M_wisata;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class LaporanPenginapanController extends Controller
{
    public function index(){
        $id = Auth::user()->id; 
        $wisata = M_wisata::where('id_user', $id)->first(); 
    
        if($wisata) {
            $data_reservasi = M_Reservasi::where('id_wisata', $wisata->id)->paginate(10); 
        } else {
            $data_reservasi = []; 
        }
        return view('admin.laporanpenginapan.laporan_index',[
            'data_reservasi' => $data_reservasi 

        ]);
    }

    public function cetakpenginapan()
    {
        $data_reservasi = M_Reservasi::all();
        return view('admin.laporanpenginapan.laporan_cetak', compact('data_reservasi',),[
            'data_reservasi' => $data_reservasi 
    ]);
    }
}
