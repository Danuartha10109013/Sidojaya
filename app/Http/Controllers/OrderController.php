<?php

namespace App\Http\Controllers;

use App\Models\M_tiket;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\M_wisata;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{   
    protected $M_tiket;
    public function __construct()
    {
        $this->M_tiket = new M_tiket();
    }

    public function payment($id)
    {
        
        $wisata = M_wisata::findOrFail($id);
        $id_tiket = $wisata->id_tiket;
        // $wisata = M_wisata::where('id_tiket', $id)=>
        $tiket = M_tiket::where('id_wisata', $id)->get();

        // $wisata = DB::table('wisata')
        //     ->leftJoin('kategori_wisata', 'wisata.id_kategori', '=', 'kategori_wisata.id')
        //     ->get();
        return view('payment', [
            'data_wisata' => $wisata,
            'data_tiket' => $tiket,
        ]);
    }
    public function checkout(Request $request  ){
        // $id = $request->id;
        // $wisata = M_wisata::findOrFail($id);
        $harga_per_tiket = $this->M_tiket->get_harga($request->id_tiket);
        // if ($request->jenis_tiket == 'anak-anak') {
        //     $harga_per_tiket = 10000;
        // } else if ($request->jenis_tiket == 'dewasa') {
        //     $harga_per_tiket = 15000;
        // }
    
        // Hitung total harga
        $total_price = $request->qty * $harga_per_tiket;
        $request->request->add(['total_price' => $total_price, 'status' => 'Unpaid']);
        $orders = Order::create($request->all());
        $wisata = M_wisata::where('id', $orders->id_wisata)->first();
        $nama_tiket=$this->M_tiket->get_jenis_tiket($request->id_tiket);
        
        

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $orders->id,
                'gross_amount' => $orders->total_price,
            ),
            'customer_details' => array(
                'name' => $request->name,
                'phone' => $request->phone,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('checkout', compact('snapToken', 'orders', 'nama_tiket', 'wisata'),
        );
    }

    public function callback(Request $request){
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){    
            if($request->transaction_status == 'capture'){
                $orders = Order::find($request->order_id);
                $orders->update(['status' => 'Paid']);
            }
        }    
    }
    public function invoice($id){
        $orders = Order::find($id);
        $wisata = M_wisata::where('id', $orders->id_wisata)->first(); 
        return view('invoice', compact('orders', 'wisata')); 
    }    
    public function store(Request $request)
    {
        $this->validate($request, [
            'jenis_tiket' => 'required|string|max:155',
            'name' => 'required',
            'address' => 'required',
            'phone'=> 'required',
            'qty'=> 'required',
            'total_price' => 'required',
            'id_tiket' => 'required',
            'id_wisata' => 'required'
            
        ]);
        // $data_fasilitas = $request->fasilitas;
        // $data_fasilitas_join = join(',',$data_fasilitas);            
      
        $orders = Order::create([
            'jenis_tiket' => $request->jenis_tiket,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            // 'fasilitas' => $data_fasilitas_join,
            'qty' => $request->qty,
            'total_price' => $request->total_price,
            'id_tiket' => $request->id_tiket,
            'id_wisata' => $request->id_wisata
        ]);
        if ($orders) {
            if (Auth::user()->role == "superadmin") {
                return redirect()
                    ->route('wisatasuper')
                    ->with([
                        'success' => 'New wisata has been created successfully'
                    ]);
            } else {
                return redirect()
                    ->route('manajemen-wisata')
                    ->with([
                        'success' => 'New wisata has been created successfully'
                    ]);
            }
        } else {
            return redirect()->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
        
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
