<?php

namespace App\Http\Controllers;

use App\Models\M_event;
use App\Models\M_fasilitas;
use App\Models\M_gambar;
use App\Models\M_kategori;
use App\Models\M_wisata;
use App\Models\ulasan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WisataController extends Controller
{
    public function index()
{
    if (Auth::check()) {
        // Get the current authenticated user
        $user = Auth::user();

        // Perform a join between the users and wisata tables
        $data_wisata = DB::table('wisata')
            ->join('users', 'users.acces_wisata', '=', 'wisata.nama_wisata')
            ->where('users.id', $user->id)
            ->select('wisata.*')
            ->get();

        return view('admin.wisata.wisata_index', [
            'data_wisata' => $data_wisata,
        ]);
    } else {
        return view('auth.login');
    }
}


    public function wisata()
    {
        return $this->belongsTo(M_Wisata::class, 'access_wisata', 'nama_wisata');
    }

    // App\Models\Wisata.php
    public function users()
    {
        return $this->hasMany(User::class, 'access_wisata', 'nama_wisata');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $wisata = M_wisata::where('nama_wisata', 'like', '%' . $keyword . '%')
                         ->orWhere('alamat', 'like', '%' . $keyword . '%')
                         ->get();

        $data_kategori_id = 6; // Misalnya Anda ingin mengambil data kategori tertentu
        
        return view('nama_view', compact('wisata', 'data_kategori_id'));
    }

    public function checkAccess()
    {
        $user = Auth::user();
        $accessWisata = $user->access_wisata;

        $dataWisata = DB::table('wisata')->where('nama_wisata', $accessWisata)->first();

        if ($dataWisata) {
            // User has access to the wisata
            return view('wisata.detail', ['data_wisata' => $dataWisata]);
        } else {
            // User does not have access
            return redirect()->route('noAccess')->with('error', 'You do not have access to this wisata');
        }
    }

    public function add()
    {
        $kategori_wisata = M_kategori::all();
        $fasilitas_wisata = M_fasilitas::all();
        return view('auth.password.registeradmin', [
            'kategori_wisata' => $kategori_wisata,
            'fasilitas_wisata' => $fasilitas_wisata,
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_wisata' => 'required|string|max:155',
            'harga_tiket' => 'required',
            'alamat' => 'required',
            'kontak_pengelola' => 'required',
            'fasilitas' => 'required',
            'deskripsi' => 'required|string',
            'gmaps' => 'required|string',
            'id_kategori' => 'required|int'
            
        ]);
        $data_fasilitas = $request->fasilitas;
        $data_fasilitas_join = join(',',$data_fasilitas);       
         
      
        $wisata = M_wisata::create([
            'nama_wisata' => $request->nama_wisata,
            'harga_tiket' => $request->harga_tiket,
            'alamat' => $request->alamat,
            'kontak_pengelola' => $request->kontak_pengelola,
            'fasilitas' => $data_fasilitas_join,
            'deskripsi' => $request->deskripsi,
            'gmaps' => $request->gmaps,
            'id_kategori' => $request->id_kategori
        ]);
        if ($wisata) {
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
    public function delete($id)
    {
        $wisata = M_wisata::find($id);
        
        $wisata->delete();
        if ($wisata) {
            return redirect()
                ->route('manajemen-wisata')
                ->with([
                    'success' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('manajemen-wisata')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
    public function edit($id)
    {
        $kategori_wisata = M_kategori::all();
        $fasilitas_wisata = M_fasilitas::all();
        $wisata = M_wisata::findOrFail($id);
        return view('admin.wisata.wisata_edit', [
            'data_wisata' => $wisata,
            'kategori_wisata' => $kategori_wisata,
            'fasilitas_wisata' => $fasilitas_wisata,
        ]);
    }
    public function detail($id)
    {
        
        $wisata = M_wisata::findOrFail($id);
        $data_ulasan = ulasan::all();
        // $wisata = DB::table('wisata')
        //     ->leftJoin('kategori_wisata', 'wisata.id_kategori', '=', 'kategori_wisata.id')
        //     ->get();
        return view('admin.wisata.wisata_detail', [
            'data_wisata' => $wisata,
            'data_ulasan' => $data_ulasan,
            
        ]);
    }
    public function update(Request $request, $id)
    {
        echo $id;
        
        $wisata = M_wisata::findOrFail($id);
        $data_fasilitas = $request->fasilitas;
        $data_fasilitas_join = join(',',$data_fasilitas);        
        $wisata->update([
            'nama_wisata' => $request->nama_wisata,
            'harga_tiket' => $request->harga_tiket,
            'alamat' => $request->alamat,
            'kontak_pengelola' => $request->kontak_pengelola,
            'fasilitas' => $data_fasilitas_join,
            'deskripsi' => $request->deskripsi,
            'gmaps' => $request->gmaps,
            'id_kategori' => $request->id_kategori
        ]);
        if ($wisata) {
            return redirect()
                ->route('manajemen-wisata')
                ->with([
                    'success' => 'New wisata has been updated successfully'
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
    public function foto_upload($id)
    {
        $wisata = M_wisata::findOrFail($id);
        return view('admin.wisata.foto_upload', [
            'data_wisata' => $wisata,

        ]);
    }
    public function foto_save(Request $request, $id)
    {
        $this->validate($request, [
            'gambar' => 'required',

        ]);
        if ($request->hasFile('gambar')) {
            $resorce       = $request->file('gambar');
            $name   = $resorce->getClientOriginalName();
            $resorce->move(\base_path() . "/public/img/galeri", $name);

            $gambar = M_gambar::create([
                'id_wisata' => $id,
                'nama_gambar' => $name,

            ]);
            if ($gambar) {
                return redirect()
                    ->route('manajemen-wisata')
                    ->with([
                        'success' => 'New barang has been created successfully'
                    ]);
            } else {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with([
                        'error' => 'Some problem occurred, please try again'
                    ]);
            };
        }
    }
    public function foto_edit(Request $request, $id)
    {
        $wisata = M_wisata::findOrFail($id);
        return view('admin.wisata.foto_edit', [
            'data_wisata' => $wisata,

        ]);
    }
    public function foto_update(Request $request, $id)
    {

        $gambar = M_gambar::where('id_wisata', '=', $id)->firstOrFail();
        if ($request->file('gambar') == "") {
            return redirect()
                ->route('manajemen-wisata')
                ->with([
                    'success' => 'New barang has been created successfully'
                ]);
        } else {
            // unlink("img/galeri/" . $gambar->nama_gambar);
            $gambar->delete();

            $resorce       = $request->file('gambar');
            $name   = $resorce->getClientOriginalName();
            $resorce->move(\base_path() . "/public/img/galeri", $name);

            $gambar =M_gambar::create([
                'id_wisata' => $id,
                'nama_gambar' => $name,

            ]);

            if ($gambar) {
                return redirect()
                    ->route('manajemen-wisata')
                    ->with([
                        'success' => 'New barang has been created successfully'
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
    }
    public function foto_hapus($id)
    {
        $foto = M_gambar::find($id);
        unlink("img/galeri/" . $foto->nama_gambar);
        $foto->delete();
        if ($foto) {
            return redirect()
                ->route('manajemen-wisata')
                ->with([
                    'success' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('manajemen-wisata')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }

    public function ulasan(){
        $data_ulasan = ulasan::all();
        ['data_ulasan' => $data_ulasan,];

    }


}
