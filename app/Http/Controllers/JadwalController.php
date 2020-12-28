<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use App\Tim;
use Carbon\Carbon;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $jadwal     = Jadwal::whereNotNull('waktu_mulai')
                    ->whereNotNull('waktu_berakhir')
                    ->get();

      return view('jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        $tims = Tim::all();
        return view('jadwal.add', compact('tims'));
    }

    public function store(Request $request)
    {
        //
    }

    public function setupbulk(Request $request)
    {
        $input = $request->all();
        $tims = Tim::all();
        // dd($input);
        if(!isset($input['tujuan'])){
          $input['tujuan'] = 'nonjadwal';
        }
        $tujuan = $input['tujuan'];
        $pstart = Carbon::parse($input['pdate'])->addHour( explode(":", $input['pstart'])[0] )->addMinute( explode(":", $input['pstart'])[1] );
        $pend   = Carbon::parse($input['pdate'])->addHour( explode(":", $input['pend'])[0] )->addMinute( explode(":", $input['pend'])[1] );
        $ptime  = $input['ptime'];
        return view('jadwal.bulkadd', compact('pstart', 'pend', 'ptime', 'tims', 'tujuan'));
    }

    public function bulkstore(Request $request)
    {
        if(count($request->all()) <=2){
            return redirect()->route('jadwal.index')->with('error', 'Tim tidak valid/ tidak ada tim target!');
        }
        foreach ($request->id_tim as $key => $value) {
            Jadwal::create([
              'id_tim'    =>  $value,
              'waktu_mulai'   =>  $request->waktu_mulai[$key],
              'waktu_berakhir'=>  $request->waktu_berakhir[$key]
            ]);
        }
        return redirect()->route('jadwal.index');
    }

    public function edit($id)
    {
        $jadwal = Jadwal::find($id);
        if(is_null($jadwal)){
            return redirect()->back()->with(['error' => 'Jadwal tidak ditemukan']);
        }
        return view('jadwal.edit',compact('jadwal'));
    }


    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::find($id);
        if(is_null($jadwal)){
            return redirect()->back()->with(['error' => 'Jadwal tidak ditemukan']);
        }
        if($request->status == 'on'){
          $status = 1;
        }else{
          $status = 0;
        }
        $jadwal->update([
          'waktu_mulai'     => $request->waktu_mulai,
          'waktu_berakhir'  => $request->waktu_berakhir,
          'status'          => $status
        ]);
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui!');
    }


    public function destroy($id)
    {
        $jadwal = Jadwal::find($id);
        if(is_null($jadwal)){
          return redirect()->back()->with('error', 'Jadwal tidak ditemukan!');
        }else{
          $jadwal->delete();
        }
        return redirect()->back()->with(['success' => 'Jadwal berhasil di hapus']);
    }
}
