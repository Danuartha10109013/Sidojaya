<?php

namespace App\Http\Controllers;

use App\Models\M_Aboutus;
use App\Models\M_wisata;
use Illuminate\Http\Request;

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
        echo $id;
        $this->validate($request, [
            'nama_aboutus' => 'required|string|max:155',
            'no_telpon' => 'required',
            'nama_perusahaan' => 'required',
            'keterangan' => 'required',
        ]);
        $aboutus = M_Aboutus::findOrFail($id);
        $aboutus->update([
            'nama_aboutus' => $request->nama_aboutus,
            'no_telpon' => $request->no_telpon,
            'nama_perusahaan' => $request->nama_perusahaan,
            'keterangan' => $request->keterangan,
        ]);
        if ($aboutus) {
            return redirect()
                ->route('manajemen-aboutus-wisata')
                ->with([
                    'success' => 'New event has been updated successfully'
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
