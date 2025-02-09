<?php

namespace App\Http\Controllers;

use App\Lomba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LombaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $lomba       = Lomba::whereNotNull('batas_waktu')
                    ->get();
      return view('lomba.index', compact('lomba'));
    }


    public function create()
    {
        return view('lomba.add');
    }


    public function store(Request $request)
    {
      $validation = Validator::make($request->all(),[
                    'bidang_lomba' => 'required',
                    'batas_waktu' => 'required',
                  ]);
      if($validation->fails()){
          $error = $validation->errors()->all();
          $error = implode('<br>	• ', $error);
          return redirect()->back()->with('error', 'Harap memenuhi ketentuan berikut: <br> • '.$error);
      }
      $lomba = new Lomba;
      $lomba->nama = $request->bidang_lomba;
      $lomba->batas_waktu = $request->batas_waktu;
      $lomba->save();
      return redirect('/lomba')->with(['success' => 'Berhasil di input']);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
      $lomba = Lomba::find($id);
      return view('lomba.edit',['lomba'=>$lomba]);
    }


    public function update(Request $request, $id)
    {
      $lomba = Lomba::find($id);
      $lomba->update($request->all());
      return redirect('/lomba')->with(['success' => 'Berhasil di ubah']);
    }


    public function destroy($id)
    {
      $lomba = Lomba::find($id);
      $lomba->delete();
      return redirect('/lomba')->with(['success' => 'Berhasil di hapus']);
    }
}
