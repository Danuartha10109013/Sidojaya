<?php
namespace App\Http\Controllers;

use App\Models\M_Aboutus;
use App\Models\M_event;
use App\Models\M_kategori;
use App\Models\M_wisata;
use App\Models\ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data_kategori = M_kategori::all();
        $data_wisata = M_wisata::all();
        $data_aboutus = M_Aboutus::all();
        $data_ulasan = ulasan::all();
        return view('home', [
            'data_kategori' => $data_kategori,
            'data_wisata' => $data_wisata,
            'data_aboutus' => $data_aboutus,
            'data_ulasan' => $data_ulasan,
        ]); 
    }
    public function kategori(Request $request)
    {
        $keyword = $request->id;
        $data_kategori = M_kategori::all();
        $data_kategori_id = M_kategori::find($keyword);
        $wisata = M_wisata::where('id_kategori', $keyword)
        ->where('status', 'ya')
        ->paginate(15);

        return view('kategori', [
            'data_kategori' => $data_kategori,
            'data_kategori_id' => $data_kategori_id,
            'wisata' => $wisata,
        ]);
    }

    public function kategoripengunjung(Request $request)
    {
        $keyword = $request->id;
        $data_kategori = M_kategori::all();
        $data_kategori_id = M_kategori::find($keyword);
        $wisata = M_wisata::where('id_kategori', $keyword)->paginate(15);
        return view('kategoripengunjung', [
            'data_kategori' => $data_kategori,
            'data_kategori_id' => $data_kategori_id,
            'wisata' => $wisata,
        ]);
    }

    public function event()
    {
        $data_kategori = M_kategori::all();
        //$data_event = M_event::all();
        $data_event = DB::table('event')
            ->leftJoin('wisata', 'wisata.id', '=', 'event.id_wisata')
            ->get();
        return view('event', [
            'data_kategori' => $data_kategori,
            'data_event' => $data_event,
        ]);
    }

    public function eventpengunjung()
    {
        $data_kategori = M_kategori::all();
        //$data_event = M_event::all();
        $data_event = DB::table('event')
            ->leftJoin('wisata', 'wisata.id', '=', 'event.id_wisata')
            ->get();
        return view('eventpengunjung', [
            'data_kategori' => $data_kategori,
            'data_event' => $data_event,
        ]);
    }

    public function detail($id)
    {
        $data_kategori = M_kategori::all();
        $data_wisata = M_wisata::findOrFail($id);
        $data_ulasan = ulasan::where('id_wisata', $id)->get();
        return view('wisata_detail',[
            'data_kategori' => $data_kategori,
            'data_wisata' => $data_wisata,
            'data_ulasan' => $data_ulasan

        ]);
    }

    public function detailpengunjung($id)
    {
        $data_kategori = M_kategori::all();
        $data_wisata = M_wisata::findOrFail($id);
        $data_ulasan = ulasan::where('id_wisata', $id)->get();
        return view('wisata_detailpengunjung',[
            'data_kategori' => $data_kategori,
            'data_wisata' => $data_wisata,
            'data_ulasan' => $data_ulasan

        ]);
    }
}
