<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_tiket;
use App\Models\M_wisata;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $wisata = M_wisata::where('id_user', $id)->first(); 
        if($wisata) {
            $data_order = Order::where('id_wisata', $wisata->id)->paginate(10); 
        } else {
            $data_order = []; 
        }
        
        return view('admin.laporanadmin.laporan_index', [
            'data_order' => $data_order
        ]);
    }
    

    public function cetaktiket()
    {
        $data_order = Order::all();
        return view('admin.laporanadmin.laporan_cetak', compact('data_order',),[
            'data_order' => $data_order 
    ]);
    }

    


}
