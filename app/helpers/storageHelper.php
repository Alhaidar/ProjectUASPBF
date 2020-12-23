<?php
namespace App\helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class storageHelper {
    public static function upload(Request $request, $kind){
      $fileName = date('YmdHis'). '-' . $request->judul . ".".$request->file($kind)->getClientOriginalExtension();
      $request->file($kind)->storeAs('public/'.$kind, $fileName);
      $path = 'storage/'.$kind.'/'.$fileName;
      return $path;
    }
}
