<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lomba;

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
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
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
