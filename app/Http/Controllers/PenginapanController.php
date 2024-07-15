<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Penginapan;
use App\Models\M_wisata;
use Illuminate\Support\Facades\Auth;

class PenginapanController extends Controller
{
    public function index()
    {
        $wisata = M_wisata::where('id_user', Auth::user()->id)->first();
        if (!$wisata) {
            return view('admin.penginapan.penginapan_index', [
                'data_penginapan' => [] 
            ]);
        }

        $data_penginapan = M_Penginapan::where('id_wisata', $wisata->id)->get();
        return view('admin.penginapan.penginapan_index',[
            'data_penginapan' => $data_penginapan 

        ]);
    }

    public function add()
    {
        $wisata = M_wisata::where('id_user', Auth::user()->id)->first();
        if (!$wisata) {
            return redirect()->route('manajemen-penginapan')->with([
                'error' => 'Anda tidak memiliki data wisata'
            ]);
        }

        $penginapan = new M_Penginapan();

        return view('admin.penginapan.penginapan_add', [
            'penginapan' => $penginapan,
            'wisata' => $wisata
        ]);
    }

    public function edit($id)
    {   
        $penginapan = M_Penginapan::findOrFail($id);
        return view('admin.penginapan.penginapan_edit', [
            'data_penginapan' => $penginapan,
        ]);
    }

    

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_penginapan' => 'required|string|max:155',
            'harga' => 'required|numeric',
            'id_wisata' => 'required',
        ]);

        $penginapan = M_Penginapan::create([
            'nama_penginapan' => $request->nama_penginapan,
            'harga' => $request->harga,
            'id_wisata' => $request->id_wisata,
        ]);

        if ($penginapan) {
            return redirect()
                ->route('manajemen-penginapan')
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
            'nama_penginapan' => 'required|string|max:155',
            'harga' => 'required|numeric',
        ]);
    
        $penginapan = M_Penginapan::findOrFail($id);
    
        // Debugging: cek data yang dikirim
        // dd($request->all());
    
        $penginapan->update([
            'nama_penginapan' => $request->nama_penginapan,
            'harga' => $request->harga,
        ]);
    
        if ($penginapan) {
            return redirect()
                ->route('manajemen-penginapan')
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
        $penginapan = M_Penginapan::findOrFail($id);
        $penginapan->delete();

        if ($penginapan) {
            return redirect()
                ->route('manajemen-penginapan')
                ->with([
                    'success' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('manajemen-penginapan')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
        
    }
}
