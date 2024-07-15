<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    // public function index()
    // {
    //     $ulasan = Review::all();
    //     return view('ulasan', compact('ulasan'));
    // }

    // public function create()
    // {
    //     return view('v_tambahUlasan');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'review' => 'required',
    //         'id_wisata' => 'required',
    //         'id_user' => 'required',
    //         'id_rating' => 'required|integer',
    //     ]);

    //     Review::create($request->all());

    //     return redirect()->route('ulasan.create')
    //         ->with('success', 'Ulasan berhasil ditambahkan.');
    //     }

}
