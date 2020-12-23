<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengumuman;
use Illuminate\Support\Facades\Storage;
use App\helpers\storageHelper as SH;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $pengumuman   = Pengumuman::whereNotNull('created_at')
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
        $images = 'image/default_tumbnail.png';
        $filekind = 'thumbnail';
        $pengumuman = new Pengumuman;
        $pengumuman->judul = $request->judul;
        $pengumuman->konten = $request->konten;
        if ($request->file($filekind)) {
            $images = SH::upload($request, $filekind);
        }
        $pengumuman->thumbnail = $images;
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
        if(is_null($pengumuman)){
            return redirect('/pengumuman')->with(['error' => 'Pengumuman tidak ditemukan']);
        }
        return view('pengumuman.edit',['pengumuman'=>$pengumuman]);
    }


    public function update(Request $request, $id)
    {
        $images = 'image/default_tumbnail.png';
        $filekind = 'thumbnail';
        $pengumuman = Pengumuman::find($id);
        if ($request->file('thumbnail')) {
            $images = SH::upload($request, $filekind);
        }
        $pengumuman->update([
          'judul'      => $request->judul,
          'konten'     => $request->konten,
          'thumbnail'  => $images
        ]);
        return redirect('/pengumuman')->with(['success' => 'Berhasil di ubah']);
    }


    public function destroy($id)
    {
      $pengumuman = Pengumuman::find($id);
      $pengumuman->delete();
      return redirect('/pengumuman')->with(['success' => 'Berhasil di hapus']);
    }
}
