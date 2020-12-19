<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $redirectTo = '/dasbor';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        $messages = [
          // 'email.required' => 'Alamat surel wajib diisi.',
          // 'email.string' => 'Alamat surel wajib diisi dengan jenis teks.',
          // 'email.max' => 'Alamat surel diisi dengan batas maksimal :max karakter.',
          'password.required' => 'Kata sandi wajib diisi.',
          'password.string' => 'Kata sandi wajib diisi dengan jenis teks.',
          'password.min' => 'Kata sandi diisi dengan batas minimal :min karakter.',
          'id_lomba.required' => 'Lomba wajib dipilih/ diisi.',
          'dosen_pembimbing.required' => 'Dosen pembimbing wajib diisi.',
          'dosen_pembimbing.string' => 'Dosen pembimbing wajib diisi dengan jenis teks.',
          'nomor_induk_dosen.required' => 'Nomer Induk Dosen Pembimbing wajib diisi.',
          // 'nama.required' => 'Nama wajib diisi.',
          // 'nama.string' => 'Nama wajib diisi dengan jenis teks.',
          // 'no_telp.required' => 'Nomor telefon wajib diisi.',
          'no_telp.max' => 'Nomor telefon diisi dengan batas maksimal :max karakter.',
          'fakultas.required' => 'Fakultas wajib dipilih/ diisi.',
        ];
        $validator = [
          // "email" =>  ['required', 'string', 'email', 'max:64',],
          "password"  =>  ['required', 'string', 'min:4'],
          "id_lomba"  =>  ['required'],
          "judul_proposal"  =>  ['nullable'],
          "abstrak"  =>  ['nullable'],
          "dosen_pembimbing"  =>  ['required', 'string'],
          "nomor_induk_dosen" =>  ['required'],
          // "nama"  =>  ['required', 'string'],
          "no_telp" =>  ['nullable', 'max:16'],
          "fakultas"  =>  ['required'],
        ];

        return Validator::make($data,$validator,$messages);
    }

    public function register(Request $request)
    {
        $input = $request->all();
        $validation = $this->validator($input);
         if ($validation->fails()) {
             $error = $validation->errors()->all();
             $error = implode('<br>	• ', $error);
             return redirect()->back()->with(['error' => 'Gagal melakukan pendaftaran. Harap memenuhi ketentuan berikut: <br> • '.$error]);
         }
        #bikin user
        $user= \App\User::create([
          'nama'    =>  $input['nama'][0],
          'email'   =>  $input['email'][0],
          'password'=>  Hash::make($input['password']),
          'role'    =>  "peserta",
        ]);

        #bikin tim
        $insert = [
            'id_user'          =>  $user->id,
            'no_telp'          =>  $input['no_telp'][0],
            'id_lomba'         =>  $input['id_lomba'],
            'dosen_pembimbing' =>  $input['dosen_pembimbing'],
            'nomor_induk_dosen'=>  $input['nomor_induk_dosen'],
        ];
        if(isset($input['judul_proposal'])){
            $insert ['judul_proposal'] = $input['judul_proposal'];
        }
        if(isset($input['abstrak'])){
            $insert ['abstrak'] = $input['abstrak'];
        }
        $tim= \App\Tim::create($insert);
        #set anggota tim
        for($idx = 0; $idx <= count($input['nama']); $idx++){
            if( isset($input['nama'][$idx]) && isset($input['nim'][$idx]) && isset($input['no_telp'][$idx]) && isset($input['email'][$idx]) ){
                $member= \App\Anggota::create([
                  'id_tim'      => $tim->id,
                  'id_fakultas' => $input['fakultas'][$idx],
                  'nama'        => $input['nama'][$idx],
                  'nim'         => $input['nim'][$idx],
                  'no_telp'     => $input['no_telp'][$idx],
                  'email'       => $input['email'][$idx],
                ]);
            }
        }
        auth()->login($user);
        return redirect()->route('front.dasbor')->with('success', 'Berhasil mendaftarkan tim, selamat berkompetisi!');
    }

    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }
}
