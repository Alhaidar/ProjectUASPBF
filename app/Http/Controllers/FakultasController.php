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
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return view('fakultas.edit');
    }

    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {
        //
    }
}
