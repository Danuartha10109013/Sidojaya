<?php

namespace App\Http\Controllers;

use App\Models\M_Reservasi;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\M_wisata;
use App\Models\M_Penginapan;

class ReservasiController extends Controller
{
    protected $M_Penginapan;
    public function __construct()
    {
        $this->M_Penginapan = new M_Penginapan();
    }



    public function penginapan($id)
    
    {
        
        $wisata = M_wisata::findOrFail($id);
        $id_penginapan = $wisata->id_penginapan;
        $penginapan = $this->M_Penginapan->get_table();
        // $wisata = DB::table('wisata')
        //     ->leftJoin('kategori_wisata', 'wisata.id_kategori', '=', 'kategori_wisata.id')
        //     ->get();
        return view('penginapan', [
            'data_wisata' => $wisata,
            'data_penginapan' => $penginapan,

            
        ]);
    }
    public function checkoutpeng(Request $request){
        
        // $harga_per_hari = 10000;
        // // Hitung total harga
        $harga_per_penginapan = $this->M_Penginapan->get_harga($request->id_penginapan);
        // $total_bayar = $request->jumlah_hari * $harga_per_hari;
        // $request->request->add(['total_bayar' => $total_bayar]);
    
        // Buat reservasi
        $total_bayar = $request->jumlah_hari * $harga_per_penginapan;
        $request->request->add(['total_bayar' => $total_bayar,]);
        $reservasi = M_Reservasi::create($request->all());
        $nama_penginapan=$this->M_Penginapan->get_jenis_penginapan($request->id_penginapan);
        
    
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
    
        // Buat order_id unik
        $order_id = $reservasi->id . '-' . time(); // Kombinasi id reservasi dan timestamp
    
        $params = array(
            'transaction_details' => array(
                'order_id' => $order_id,
                'gross_amount' => $reservasi->total_bayar,
            ),
            'customer_details' => array(
                'nama' => $request->nama,
                'phone' => $request->phone,
            ),
        );
    
        $snapToken = \Midtrans\Snap::getSnapToken($params);
    
        return view('checkoutpenginapan', compact('snapToken', 'reservasi', 'nama_penginapan'));
    }
    
    public function callback2(Request $request){
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){    
            if($request->transaction_status == 'capture'){
                $reservasi = M_Reservasi::find($request->order_id);
                $reservasi->update(['status' => 'Paid']);
            }
        }    
    }
    public function invoicepeng($id){
        
        $reservasi = M_Reservasi::find($id);
        $wisata = M_wisata::where('id', $reservasi->id_wisata)->first();
        return view('invoicepeng', compact('reservasi', 'wisata')
      
    );
    }
    
    // public function payment($id)
    // {
        
    //     $wisata = M_wisata::findOrFail($id);
    //     // $wisata = DB::table('wisata')
    //     //     ->leftJoin('kategori_wisata', 'wisata.id_kategori', '=', 'kategori_wisata.id')
    //     //     ->get();
    //     return view('payment', [
    //         'data_wisata' => $wisata,
            
    //     ]);
    // }

    

    
}
