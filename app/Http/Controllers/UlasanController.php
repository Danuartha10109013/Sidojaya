<?php

namespace App\Http\Controllers;

use App\Models\M_wisata;
use App\Models\ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    public function index($id)
    {
        
        $data_ulasan = M_wisata::where('id', $id);
        return view('review.create', [
            'data_ulasan' => $data_ulasan
        ]);
    }

    // public function create()
    // {
    //     return view('tambahulasan');
    // }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'deskripsi' => 'required|string|max:1000',
            'id_wisata' => 'required'
        ]);

        $ulasan = new ulasan();
        $ulasan->nama = $request->nama;
        $ulasan->rating = $request->rating;
        $ulasan->deskripsi = $request->deskripsi;
        $ulasan->id_wisata = $request->id_wisata;
        $ulasan->save();

        return redirect()->route('pengunjung')->with('success', 'Ulasan berhasil ditambahkan.');
    }

}
