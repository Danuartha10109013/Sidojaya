<?php

namespace App\Http\Controllers;

use App\Models\M_event;
use App\Models\M_fasilitas;
use App\Models\M_gambar;
use App\Models\M_kategori;
use App\Models\M_wisata;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SuperController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $data_wisata = M_wisata::all();
            return view('admin.wisata.wisatasuper', [
                'data_wisata' => $data_wisata,
            ]);
        } else {
            return view('auth.login');
        }
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $wisata = M_wisata::where('nama_wisata', 'like', '%' . $keyword . '%')
                         ->orWhere('alamat', 'like', '%' . $keyword . '%')
                         ->get();

        $data_kategori_id = 6; 
        
        return view('nama_view', compact('wisata', 'data_kategori_id'));
    }

    public function add()
    {
        $kategori_wisata = M_kategori::all();
        $fasilitas_wisata = M_fasilitas::all();
        $latestUserId = User::orderBy('id', 'desc')->value('id');
        $id_user = $latestUserId + 1;
        
        return view('auth.registeradmin', [
            'kategori_wisata' => $kategori_wisata,
            'fasilitas_wisata' => $fasilitas_wisata,
            'id'=>$id_user
        ]);
    }
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'nama_wisata' => 'required|string|max:155',
        'harga_tiket' => 'required|numeric',
        'alamat' => 'required|string',
        'kontak_pengelola' => 'required|string|max:13',
        'fasilitas' => 'required|array',
        'deskripsi' => 'required|string',
        'gmaps' => 'required|string',
        'bukti_pengelola' =>'nullable|file|mimes:pdf,jpg,png',
        'id_kategori' => 'required|int',
        'id_user' => 'required|int',
        
    ]);

    $validatedData = $request->all();
    if ($request->hasFile('bukti_pengelola')) {
        $file = $request->file('bukti_pengelola');
        $filename = $file->getClientOriginalName();
        $file->move(public_path('upload/file'), $filename);
        $validatedData['bukti_pengelola'] = $filename;
    }

    // if ($request->hasFile('bukti_pengelola')) {
    //     $resorce       = $request->file('bukti_pengelola');
    //     $name   = $resorce->getClientOriginalName();
    //     $resorce->move(\base_path() . "/public/dokumen", $name);
    // } else {
    //     return redirect()
    //             ->back()
    //             ->withInput()
    //             ->with([
    //                 'error' => 'Some problem occurred, please try again'
    //             ]);
    // }
        
        
    
    

    $data_fasilitas = $request->fasilitas;
    $data_fasilitas_join = join(',', $data_fasilitas);

    $wisata = M_wisata::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'nama_wisata' => $request->nama_wisata,
        'harga_tiket' => $request->harga_tiket,
        'alamat' => $request->alamat,
        'kontak_pengelola' => $request->kontak_pengelola,
        'fasilitas' => $data_fasilitas_join,
        'deskripsi' => $request->deskripsi,
        'gmaps' => $request->gmaps,
        'bukti_pengelola' => $validatedData['bukti_pengelola'] ?? null,
        'id_kategori' => $request->id_kategori,
        'id_user' => $request->id_user, // This was missing in the original code
    ]);

    if ($wisata) {
        return redirect()
            ->route('home')
            ->with('success', 'Successfully registered');
    } else {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Some problem occurred, please try again');
    }
}


    public function delete($id)
    {
        $wisata = M_wisata::find($id);
        
        $wisata->delete();
        if ($wisata) {
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
        // $wisata = DB::table('wisata')
        //     ->leftJoin('kategori_wisata', 'wisata.id_kategori', '=', 'kategori_wisata.id')
        //     ->get();
        return view('admin.wisata.wisata_detail', [
            'data_wisata' => $wisata,
            
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
                ->route('wisatasuper')
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
    public function file_upload($id)
    {
        $wisata = M_wisata::findOrFail($id);
        return view('admin.wisata.foto_upload', [
            'data_wisata' => $wisata,

        ]);
    }
    public function foto_upload($id)
    {
        $wisata = M_wisata::findOrFail($id);
        return view('admin.wisata.foto_upload', [
            'data_wisata' => $wisata,

        ]);
    }
    public function file_save(Request $request, $id)
    {
        $this->validate($request, [
            'bukti_lampiran' => 'required',

        ]);
        if ($request->hasFile('bukti_lampiran')) {
            $resorce       = $request->file('bukti_lampiran');
            $name   = $resorce->getClientOriginalName();
            $resorce->move(\base_path() . "/public/dokumen", $name);

            $gambar = M_gambar::create([
                'id_wisata' => $id,
                'nama_gambar' => $name,

            ]);
            if ($gambar) {
                return redirect()
                    ->route('wisatasuper')
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
                    ->route('wisatasuper')
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
                ->route('wisatasuper')
                ->with([
                    'success' => 'New barang has been created successfully'
                ]);
        } else {
            unlink("img/galeri/" . $gambar->nama_gambar);
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
                    ->route('wisatasuper')
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
        }
    }

}
