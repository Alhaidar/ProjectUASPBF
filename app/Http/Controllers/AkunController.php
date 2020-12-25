<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Lomba;
use App\Fakultas;

class AkunController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::all();
        $lomba = Lomba::all();
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
        $user = User::where('id', $id)->first();
        $message = [
            'password.required'  => 'Kata sandi wajib diisi',
            'password.string'    => 'Kata sandi harus terdiri dari teks',
            'password.min'       => 'Kata sandi minimal terdiri sebanyak :min karakter',
            'old_passwd.required'  => 'Kata sandi konfirmasi wajib diisi',
            'old_passwd.string'    => 'Kata sandi konfirmasi harus terdiri dari teks',
            'old_passwd.min'       => 'Kata sandi konfirmasi minimal terdiri sebanyak :min karakter',
        ];
        $validator = [
            'nama'  => ['required', 'string', 'min:4','max:128'],
            'old_passwd' => ['required', 'string', 'min:4'],
        ];
        if(isset($request->password)) {
            $validator['password'] = ['required', 'string', 'min:4'];
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

    public function kelola()
    {
        $users = User::all();
        return view('akun.create', compact('users'));
    }

    public function store(Request $request)
    {
        $message = [
            'nama.required'      => 'Nama lengkap wajib diisi',
            'nama.min'           => 'Nama lengkap minimal terdiri sebanyak :min karakter',
            'nama.max'           => 'Nama lengkap maksimal terdiri sebanyak :max karakter',
            'email.required'     => 'Alamat surel wajib diisi.',
            'email.unique'       => 'Email yang anda masukan telah terdaftar, silahkan gunakan email lain',
            'email.string'       => 'Alamat surel wajib diisi dengan jenis teks.',
            'email.max'          => 'Alamat surel diisi dengan batas maksimal :max karakter.',
            'password.required'  => 'Kata sandi wajib diisi',
            'password.string'    => 'Kata sandi harus terdiri dari teks',
            'password.min'       => 'Kata sandi minimal terdiri sebanyak :min karakter',
        ];
        $validator = [
            'nama'      => ['required', 'string', 'min:4','max:128'],
            "email"     => ['required', 'string', 'email', 'max:64','email', 'unique:user'],
            'password'  => ['required', 'string', 'min:4'],
            'role'      => ['required']
        ];
        $validation = Validator::make($request->all(), $validator, $message);
        if($validation->fails()){
            $error = $validation->errors()->all();
            $error = implode('<br>	• ', $error);
            return redirect()->back()->with('error', 'Kesalahan saat memperbarui informasi akun! Harap memenuhi ketentuan berikut: <br> • '.$error);
        }
        $user= User::create([
          'nama'    =>  $request->nama,
          'email'   =>  $request->email,
          'password'=>  Hash::make($request->password),
          'role'    =>  $request->role,
        ]);
        return redirect()->back()->with('success', 'Pengguna '.$request->nama.' ('.$request->role.') berhasil ditambahkan!');
    }

    public function manage(Request $request, $id)
    {
        $user = User::find($id);
        $input = $request->all();
        if(is_null($user)){
            return redirect()->back()->with(['error' => 'Pengguna tidak ditemukan']);
        }
        $message = [
            'nama.required'      => 'Nama lengkap wajib diisi',
            'nama.min'           => 'Nama lengkap minimal terdiri sebanyak :min karakter',
            'nama.max'           => 'Nama lengkap maksimal terdiri sebanyak :max karakter',
            'password.required'  => 'Kata sandi wajib diisi',
            'password.string'    => 'Kata sandi harus terdiri dari teks',
            'password.min'       => 'Kata sandi minimal terdiri sebanyak :min karakter',
        ];
        $validator = [
            'nama'  => ['required', 'string', 'min:4','max:128'],
            'role'  => ['required']
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
        if(isset($request->password)){
          $input['password'] = Hash::make($request->password);
        }else{
          unset( $input['password'] );
        }
        $user->update($input);
        return redirect()->route('akun.create')->with('success', 'Informasi akun berhasil diperbarui!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        if(is_null($user)){
            return redirect()->back()->with(['error' => 'Pengguna tidak ditemukan']);
        }
        return view('akun.edit', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with(['success' => 'Pengguna berhasil dihapus']);
    }
}
