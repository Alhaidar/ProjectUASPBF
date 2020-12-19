<?php
Route::get('/test', function () {
    return view('layouts.base');
});

Route::group(['as' => 'front.'], function () {
    Route::get('/', 'FrontController@index')->name('index');
    Route::get('/dasbor', 'FrontController@dasbor')->name('dasbor')->middleware('auth');
});
Route::get('/pengumuman/{id}/show','PengumumanController@show')->name('pengumuman.show');

Auth::routes();
Route::resource('akun',"AkunController")->middleware('auth');
Route::get('/jadwal', 'JadwalController@index')->name('jadwal.index')->middleware('auth');
Route::get('/pengumuman', 'PengumumanController@index')->name('pengumuman.index')->middleware('auth');
// JURI //
Route::resource('submisi',"SubmisiController")->middleware(['auth', 'CekRole:juri']);
// ADMIN //
Route::group(['middleware' => ['auth','CekRole:peserta']],function(){
  Route::resource('tim',"TimController");
  Route::resource('pengumpulan',"PengumpulanController");
});
// ADMIN //
Route::group(['middleware' => ['auth','CekRole:admin']],function(){
    Route::resource('fakultas',"FakultasController");
    Route::resource('lomba',"LombaController");
    Route::group(['as' => 'jadwal.' , 'prefix' => 'jadwal'], function () {
        Route::get('/tambah',        'JadwalController@create')->name('create')->middleware(['auth', 'CekRole:admin']);
        Route::post('/tambah',       'JadwalController@store')->name('store')->middleware(['auth', 'CekRole:admin']);
        Route::get('/{id}/edit',     'JadwalController@edit')->name('edit')->middleware(['auth', 'CekRole:admin']);
        Route::patch('/{id}/edit',   'JadwalController@update')->name('update')->middleware(['auth', 'CekRole:admin']);
        Route::delete('/{id}/hapus', 'JadwalController@destroy')->name('destroy')->middleware(['auth', 'CekRole:admin']);
    });
    Route::group(['as' => 'pengumuman.' , 'prefix' => 'pengumuman'], function () {
        Route::get('/tambah',        'PengumumanController@create')->name('create')->middleware(['auth', 'CekRole:admin']);
        Route::post('/tambah',       'PengumumanController@store')->name('store')->middleware(['auth', 'CekRole:admin']);
        Route::get('/{id}/edit',     'PengumumanController@edit')->name('edit')->middleware(['auth', 'CekRole:admin']);
        Route::patch('/{id}/edit',   'PengumumanController@update')->name('update')->middleware(['auth', 'CekRole:admin']);
        Route::delete('/{id}/hapus', 'PengumumanController@destroy')->name('destroy')->middleware(['auth', 'CekRole:admin']);
    });
});
// Route::resource('jadwal',"JadwalController"); //Partial
// Route::resource('pengumuman',"PengumumanController"); //Partial
