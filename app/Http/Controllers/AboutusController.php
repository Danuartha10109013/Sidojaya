<?php

namespace App\Http\Controllers;

use App\Models\M_Aboutu;
use App\Models\M_Aboutus;
use App\Models\M_wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutusController extends Controller
{
    public function index()
    {
        $data_aboutus = M_Aboutus::all();
        return view('admin.aboutus.aboutus_index', [
            'data_aboutus' => $data_aboutus
        ]);
    }
    // public function add()
    // {
    //     $wisata = M_wisata::all();
    //     return view('admin.aboutus.aboutus_add', [
    //         'wisata' => $wisata,
    //     ]);
    // }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_aboutus' => 'required|string|max:155',
            'no_telpon' => 'required',
            'nama_perusahaan' => 'required',
            'keterangan' => 'required',
        ]);
        $aboutus = M_Aboutus::create([
            'nama_aboutus' => $request->nama_aboutus,
            'no_telpon' => $request->no_telpon,
            'nama_perusahaan' => $request->nama_perusahaan,
            'keterangan' => $request->keterangan,
        ]);
        if ($aboutus) {
            return redirect()
                ->route('manajemen-event')
                ->with([
                    'success' => 'New event has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }
    public function delete($id)
    {
        $aboutus = M_Aboutus::find($id);
        $aboutus->delete();
        if ($aboutus) {
            return redirect()
                ->route('wisatasuper')
                ->with([
                    'success' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('wisatasuper')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        };
    }
    public function edit($id)
    {   
        $aboutus = M_Aboutus::findOrFail($id);
        return view('admin.aboutus.aboutus_edit', [
            'data_aboutus' => $aboutus,
        ]);
    }
    public function update(Request $request, $id)
    {
        // Validasi input
        $this->validate($request, [
            'nama' => 'required|string|max:155',
            'sub_judul' => 'required|string|max:155',
            'keterangan' => 'required|string',
            'visi' => 'required|string|max:255',
            'misi' => 'required|string|max:2048',
            'no_telpon' => 'required|numeric|digits_between:1,12',
            'peta' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'ket_wilayah' => 'nullable|string',
            'monografi' => 'nullable|string',
            'gambar_monografi' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_struktur' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'link_wa' => 'nullable|url',
            'link_ig' => 'nullable|url',
            'link_fb' => 'nullable|url',
        ]);
    
        // Temukan record berdasarkan ID
        $aboutus = M_Aboutus::findOrFail($id);
    
        // Handle file uploads
        if ($request->hasFile('peta')) {
            if ($aboutus->peta) {
                Storage::disk('public_upload')->delete($aboutus->peta);
            }
            $filePath = $request->file('peta')->storeAs('', $request->file('peta')->getClientOriginalName(), 'public_upload');
            $aboutus->peta = $filePath;
        }
    
        if ($request->hasFile('gambar_monografi')) {
            if ($aboutus->gambar_monografi) {
                Storage::disk('public_upload')->delete($aboutus->gambar_monografi);
            }
            $filePath = $request->file('gambar_monografi')->storeAs('', $request->file('gambar_monografi')->getClientOriginalName(), 'public_upload');
            $aboutus->gambar_monografi = $filePath;
        }
    
        if ($request->hasFile('gambar_struktur')) {
            if ($aboutus->gambar_struktur) {
                Storage::disk('public_upload')->delete($aboutus->gambar_struktur);
            }
            $filePath = $request->file('gambar_struktur')->storeAs('', $request->file('gambar_struktur')->getClientOriginalName(), 'public_upload');
            $aboutus->gambar_struktur = $filePath;
        }
    
        // Update data di database
    $aboutus->nama = $request->nama;
    $aboutus->sub_judul = $request->sub_judul;
    $aboutus->keterangan = $request->keterangan;
    $aboutus->visi = $request->visi;
    $aboutus->misi = $request->misi;
    $aboutus->no_telpon = $request->no_telpon;
    $aboutus->ket_wilayah = $request->ket_wilayah;
    $aboutus->monografi = $request->monografi;
    $aboutus->link_wa = $request->link_wa;
    $aboutus->link_ig = $request->link_ig;
    $aboutus->link_fb = $request->link_fb;

    // Save changes
    $aboutus->save();
    
        return redirect()
            ->route('manajemen-aboutus-wisata')
            ->with([
                'success' => 'Data About Us telah berhasil diperbarui'
            ]);
    }
    
    
}
