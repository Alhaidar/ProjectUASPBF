<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $jadwal     = Jadwal::whereNotNull('waktu_mulai')
                    ->whereNotNull('waktu_berakhir')
                    ->get();

      return view('jadwal.index', compact('jadwal'));
    }



    public function create()
    {
        return view('jadwal.add');
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return view('jadwal.edit');
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
