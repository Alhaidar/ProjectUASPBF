<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\helpers\storageHelper as SH;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

use App\Tim;
use App\Lomba;
use App\Pengumpulan;

class PengumpulanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $lomba = Lomba::all();
      if(Auth::user()->role == "peserta"){
          $uid = Auth::user()->id;
          $tim = Tim::where('id_user',$uid)->get()->first();
      }
      $pengumpulan  = Pengumpulan::whereNotNull('id_tim')
                    ->whereNotNull('subjek')
                    ->whereNotNull('file')
                    ->get();
      return view('pengumpulan.index', compact('pengumpulan', 'tim'));
    }

    public function store(Request $request)
    {
        $uid = Auth::user()->id;
        $tim = Tim::where('id_user',$uid)->get()->first();
        $validation = Validator::make($request->all(),[
                        'subjek' => 'required',
                        'submisi' => 'required | mimes:zip,rar,pdf,jpg,jpeg,ppt,pptx'
                      ]);
        if($validation->fails()){
            $error = $validation->errors()->all();
            $error = implode('<br>	• ', $error);
            return redirect()->back()->with('error', 'Harap memenuhi ketentuan berikut: <br> • '.$error);
        }
        $filekind = 'submisi';
        if(Carbon::now()->isAfter($tim->lomba->batas_waktu)){
            return redirect()->back()->with('error', 'Waktu sudah melebihi batas waktu unggah!');
        }
        if ($request->file($filekind)) {
            $file = SH::upload($request, $filekind);
        }else{
            return redirect()->back()->with('error', 'File tidak dapat diunggah!');
        }
        $pengumpulan = Pengumpulan::create([
          'id_tim' =>  $tim->id,
          'subjek' =>  $request->subjek,
          'file'   =>  $file,
        ]);
        return redirect()->back()->with(['success' => 'Berkas berhasil di diunggah']);
    }
    public function batal($id)
    {
        $uid = Auth::user()->id;
        $tim = Tim::where('id_user',$uid)->get()->first();
        $pengumpulan = Pengumpulan::where('id_tim', $tim->id)->where('id', $id);
        if(is_null($pengumpulan)){
          return redirect()->back()->with('error', 'Tidak memiliki akses untuk membatalkan submisi!');
        }else{
          $pengumpulan->delete();
        }
        return redirect()->back()->with(['success' => 'Berhasil membatalkan submisi']);
    }
}
