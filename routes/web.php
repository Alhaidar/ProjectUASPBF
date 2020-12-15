<?php
Route::get('/test', function () {
    return view('layouts.base');
});

// AMRI TEST
// Route::get('/jadwal', function () {
//     return view('jadwal.index');
// });


Route::group(['as' => 'front.'], function () {
    Route::get('/', 'FrontController@index')->name('index');

    // //Amri test
    // Route::get('/jadwal', 'JadwalController@index')->name('index');


    Route::get('/dasbor', 'FrontController@dasbor')->name('dasbor')->middleware('auth'); //dikasih middleware auth
});
Auth::routes();
Route::group(['middleware' => ['auth','CekRole:admin']],function(){
Route::resource('akun',"AkunController");
Route::resource('fakultas',"FakultasController");
Route::resource('jadwal',"JadwalController");
Route::resource('lomba',"LombaController");
Route::resource('pengumpulan',"PengumpulanController");
Route::resource('pengumuman',"PengumumanController");
Route::resource('submisi',"SubmisiController");
Route::resource('tim',"TimController");
});
