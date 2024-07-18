<?php

namespace App\Http\Controllers;

use App\Models\M_Aboutus;
use App\Models\M_kategori;
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
            $data_order = Order::where('id_wisata', $wisata->id)
                   ->where('active', 1)
                   ->paginate(10);
        } else {
            $data_order = []; 
        }
        
        return view('admin.laporanadmin.laporan_index', [
            'data_order' => $data_order
        ]);
    }
    

    public function cetaktiket()
    {
        $id = Auth::user()->id;
        $wisata = M_wisata::where('id_user', $id)->first(); 
        if($wisata) {
            $data_order = Order::where('id_wisata', $wisata->id)
                   ->where('active', 1)
                   ->get();
        } else {
            $data_order = []; 
        }
        return view('admin.laporanadmin.laporan_cetak', compact('data_order',),[
            'data_order' => $data_order 
    ]);
    }

    public function history()
    {
        $data_aboutus = M_Aboutus::all();
        $data_kategori = M_kategori::all();
        $data_wisata = M_wisata::all();

        $id = Auth::user()->id;

        // Retrieve paginated orders for the authenticated user
        $data_order = Order::where('id_user', $id)->paginate(10);
        
        // Retrieve ids of 'id_wisata' from the orders of the authenticated user
        $same = Order::where('id_user', $id)->pluck('id_wisata');
        
        // Retrieve 'M_wisata' records where 'id_wisata' matches the collected ids
        $wisata = M_wisata::whereIn('id', $same)->get();
        
    
        return view('historypengunjung', compact('data_order','wisata','data_aboutus','data_kategori','data_wisata'));
    }

    public function pemesanan(){
        $id = Auth::user()->id;
        $wisata = M_wisata::where('id_user', $id)->first(); 
        if($wisata) {
            $data_order = Order::where('id_wisata', $wisata->id)->paginate(10); 
        } else {
            $data_order = []; 
        }
        
        return view('admin.pemesanantiket.pemesanan', [
            'data_order' => $data_order
        ]);
    }

    public function use($id)
    {
        // Cari order berdasarkan id
        $order = Order::find($id);
    
        // Periksa apakah order ditemukan
        if ($order) {
            // Perbarui kolom 'active' menjadi 1
            $order->active = 1;
    
            // Simpan perubahan ke database
            $order->save();
    
            return redirect()->back();
        } else {
            return response()->json(['message' => 'Order not found'], 404);
        }
    }

    


}
