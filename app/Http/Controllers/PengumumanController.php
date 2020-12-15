<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengumuman;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $pengumuman     = Pengumuman::whereNotNull('created_at')
                    ->whereNotNull('konten')
                    ->whereNotNull('judul')
                    ->get();

      return view('pengumuman.index', compact('pengumuman'));
    }


    public function create()
    {
        return view('pengumuman.add');
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
        return view('pengumuman.edit');
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
