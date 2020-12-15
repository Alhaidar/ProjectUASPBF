<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class FrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index()
    {
        $jadwal     = Jadwal::whereNotNull('waktu_mulai')
                      ->whereNotNull('waktu_berakhir')
                      ->get();
        $pengumuman = Pengumuman::all()
                      ->sortByDesc("created_at")
                      ->take(20);
        if (\Auth::check()) {
          return redirect()->route('front.dasbor');
        }
        return view('front.index', compact('jadwal','pengumuman'));
    }
    public function dasbor()
    {

        return view('front.dasbor');
    }
}
