<?php

namespace App\Http\Controllers;

use App\Models\M_wisata;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class kelolaakunController extends Controller
{
    public function index(){
        $data_akun = M_wisata::all();
        return view('admin.kelolaakun.akun_index', [
            'data_akun' => $data_akun
        ]);
    }

    public function accept($id)
    {
        $yes = "ya";
        
        M_wisata::where('id', $id)->update(['status' => $yes]);

        $data_wisata = M_wisata::findOrFail($id);

        $user = new User();
        $user->name = strtolower(str_replace(' ', '_', $data_wisata->name)); 
        $user->email = $data_wisata->email;
        $user->password = $data_wisata->password; 
        $user->role = 'adminwisata'; 
        $user->acces_wisata = $data_wisata->nama_wisata;

        $user->save();

        return redirect('adm/manajemen-akun')->with('success', 'Adminwisata disetujui dan pengguna baru telah dibuat!');
    }
}
