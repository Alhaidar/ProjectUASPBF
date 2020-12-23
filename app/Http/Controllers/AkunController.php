<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AkunController extends Controller
{
    public function index()
    {
        $fakultas = \App\Fakultas::all();
        $lomba = \App\Lomba::all();
        if(Auth::user()->role == "peserta"){
            $uid = Auth::user()->id;
            $tim = \App\Tim::where('id_user',$uid)->get()->first();
            return view('akun.index',compact('fakultas', 'lomba', 'tim'));
        }else{
            return view('akun.index',compact('fakultas', 'lomba'));
        }
    }
    // UPDATE AKUN
    public function update(Request $request, $id)
    {
        $uid =  Auth::user()->id;
        $input = $request->all();
        $user = \App\User::where('id', $id)->first();
        $message = [
            'password.required'  => 'Kata sandi wajib diisi',
            'password.string'    => 'Kata sandi harus terdiri dari teks',
            'password.min'       => 'Kata sandi minimal terdiri sebanyak :min karakter',
            'old_passwd.required'  => 'Kata sandi wajib diisi',
            'old_passwd.string'    => 'Kata sandi harus terdiri dari teks',
            'old_passwd.min'       => 'Kata sandi minimal terdiri sebanyak :min karakter',
        ];
        $validator = [
            'nama'  => ['required', 'string', 'min:4','max:128'],
            'old_passwd' => ['required', 'string', 'min:5'],
        ];
        if(isset($request->password)) {
            $validator['password'] = ['required', 'string', 'min:5'];
        }
        $validation = Validator::make($request->all(), $validator, $message);
        if($validation->fails()){
            $error = $validation->errors()->all();
            $error = implode('<br>	• ', $error);
            return redirect()->back()->with('error', 'Kesalahan saat memperbarui informasi akun! Harap memenuhi ketentuan berikut: <br> • '.$error);
        }
        // $request->password = Hash::make($request->password);
        // $user->update($request->all());
        if(Hash::check($request->old_passwd, $user->password)){
          unset( $input['old_passwd'] );
          if(isset($request->password)){
            $input['password'] = Hash::make($request->password);
          }else{
            unset( $input['password'] );
          }
          $user->update($input);
          return redirect()->back()->with('success', 'Informasi akun berhasil diperbarui!');
        }else{
          return redirect()->back()->with('error', 'Kata Sandi konfirmasi tidak sesuai');
        }
    }

    public function create()
    {
        //
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

    public function destroy($id)
    {
        //
    }
}
