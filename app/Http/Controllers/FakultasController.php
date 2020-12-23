<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fakultas;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $fakultas     = Fakultas::whereNotNull('nama')
                    -> get();
        return view('fakultas.index', compact('fakultas'));
    }

    public function create()
    {
        return view('fakultas.add');
    }

    public function store(Request $request)
    {
        $fakultas = new Fakultas;
        $fakultas->nama = $request->fakultas;
        $fakultas->save();
        return redirect('/fakultas')->with(['success' => 'Berhasil di input']);
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $fakultas = Fakultas::find($id);
        return view('fakultas.edit',['fakultas'=>$fakultas]);
    }

    public function update(Request $request, $id)
    {
        $fakultas = Fakultas::find($id);
        $fakultas->update($request->all());
        return redirect('/fakultas')->with(['success' => 'Berhasil di ubah']);
    }


    public function destroy($id)
    {
      $fakultas = Fakultas::find($id);
      $fakultas->delete();
      return redirect('/fakultas')->with(['success' => 'Berhasil di hapus']);
    }
}
