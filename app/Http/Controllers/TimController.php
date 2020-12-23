<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TimController extends Controller
{

    public function getTimbyId($id)
    {
        $tim = \App\Tim::where('id_user', $id)->first();
        if(!is_null($tim)){
          return $tim;
        }
        return false;
    }

    public function update(Request $request, $id)
    {
        $uid =  Auth::user()->id;
        $input = $request->all();
        $tim = $this->getTimbyId($uid);
        $validation =  $this->validator($input);
        if ($validation->fails()) {
            $error = $validation->errors()->all();
            $error = implode('<br>	• ', $error);
            return redirect()->back()->with(['error' => 'Gagal melakukan pembaharuan. Harap memenuhi ketentuan berikut: <br> • '.$error]);
        }
        $insert = [
          'id_lomba'          =>  $input['id_lomba'],
          'dosen_pembimbing'  =>  $input['dosen_pembimbing'],
          'nomor_induk_dosen' =>  $input['nomor_induk_dosen'],
        ];
        if(isset($input['judul_proposal'])){
            $insert ['judul_proposal'] = $input['judul_proposal'];
        }
        if(isset($input['abstrak'])){
            $insert ['abstrak'] = $input['abstrak'];
        }
        $tim->update($insert);

        $anggota = $tim->anggotas()->get();
        foreach ($anggota as $key => $value) {
          $obj = \App\Anggota::findOrFail($value->id);
          $obj->delete();
        }
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
        return redirect()->back()->with('success', 'Data tim dan anggota berhasil diperbarui');
    }

    protected function validator(array $data)
    {
        $messages = [
          'id_lomba.required' => 'Lomba wajib dipilih/ diisi.',
          'dosen_pembimbing.required' => 'Dosen pembimbing wajib diisi.',
          'dosen_pembimbing.string' => 'Dosen pembimbing wajib diisi dengan jenis teks.',
          'nomor_induk_dosen.required' => 'Nomer Induk Dosen Pembimbing wajib diisi.',
          'no_telp.max' => 'Nomor telefon diisi dengan batas maksimal :max karakter.',
          'fakultas.required' => 'Fakultas wajib dipilih/ diisi.',
        ];
        $validator = [
          "id_lomba"  =>  ['required'],
          "judul_proposal"  =>  ['nullable'],
          "abstrak"  =>  ['nullable'],
          "dosen_pembimbing"  =>  ['required', 'string'],
          "nomor_induk_dosen" =>  ['required'],
          "no_telp" =>  ['nullable', 'max:16'],
          "fakultas"  =>  ['required'],
        ];
        return Validator::make($data,$validator,$messages);
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
