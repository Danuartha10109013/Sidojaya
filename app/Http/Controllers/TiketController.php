<?php

namespace App\Http\Controllers;

use App\Models\M_tiket;
use App\Models\M_wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TiketController extends Controller
{
    public function index()
    {
        $wisata = M_wisata::where('id_user', Auth::user()->id)->first();
    
        if (!$wisata) {
            return view('admin.orders.tiket_index', [
                'data_tiket' => [] 
            ]);
        }
    
        $data_tiket = M_tiket::where('id_wisata', $wisata->id)->get();
    
        return view('admin.orders.tiket_index', [
            'data_tiket' => $data_tiket
        ]);
    }
    

    public function add()
    {
        
        $tik = M_wisata::where('id_user', Auth::user()->id)->first();
        return view('admin.orders.tiket_add', compact('tik'));
    }

    public function edit($id)
    {   
        $tiket = M_tiket::findOrFail($id);
        return view('admin.orders.tiket_edit', [
            'data_tiket' => $tiket,
        ]);
    }

    

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_tiket' => 'required|string|max:155',
            'harga' => 'required|numeric',
            'id_wisata' => 'required', 
        ]);
    
        $wisata = M_wisata::where('id_user', Auth::user()->id)->first();
    
        if (!$wisata) {
            return redirect()->back()->with('error', 'Anda belum memiliki wisata. Silakan tambahkan wisata terlebih dahulu.');
        }
    
        $tiket = M_tiket::create([
            'nama_tiket' => $request->nama_tiket,
            'harga' => $request->harga,
            'id_wisata' => $request->id_wisata,
            
        ]);

        if ($tiket) {
            return redirect()
                ->route('manajemen-tiket')
                ->with([
                    'success' => 'Tiket baru telah berhasil dibuat'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Terjadi masalah, silakan coba lagi'
                ]);
        }
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_tiket' => 'required|string|max:155',
            'harga' => 'required|numeric',
        ]);
    
        $tiket = M_tiket::findOrFail($id);
    
        // Debugging: cek data yang dikirim
        // dd($request->all());
    
        $tiket->update([
            'nama_tiket' => $request->nama_tiket,
            'harga' => $request->harga,
        ]);
    
        if ($tiket) {
            return redirect()
                ->route('manajemen-tiket')
                ->with([
                    'success' => 'Tiket telah berhasil diperbarui'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Terjadi masalah, silakan coba lagi'
                ]);
        }
    }

    public function delete($id)
    {
        $tiket = M_tiket::findOrFail($id);
        $tiket->delete();

        if ($tiket) {
            return redirect()
                ->route('manajemen-tiket')
                ->with([
                    'success' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('manajemen-tiket')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
        
    }
    
    
}
