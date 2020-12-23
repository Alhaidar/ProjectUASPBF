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
        $pengumuman = new Pengumuman;
        $pengumuman->judul = $request->judul;
        $pengumuman->konten = $request->konten;
        $pengumuman->thumbnail = $request->thumbnail;
        $pengumuman->save();
        return redirect('/pengumuman')->with(['success' => 'Berhasil di input']);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $pengumuman = Pengumuman::find($id);
        return view('pengumuman.edit',['pengumuman'=>$pengumuman]);
    }


    public function update(Request $request, $id)
    {
        $pengumuman = Pengumuman::find($id);
        $pengumuman->update($request->all());
        return redirect('/pengumuman')->with(['success' => 'Berhasil di ubah']);
    }


    public function destroy($id)
    {
      $pengumuman = Pengumuman::find($id);
      $pengumuman->delete();
      return redirect('/pengumuman')->with(['success' => 'Berhasil di hapus']);
    }
}
