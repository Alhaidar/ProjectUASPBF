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
Route::get('/akun', 'AkunController@index')->name('akun.index')->middleware('auth');
Route::patch('/akun/{id}/update', 'AkunController@update')->name('akun.update')->middleware('auth');
Route::get('/jadwal', 'JadwalController@index')->name('jadwal.index')->middleware('auth');
Route::get('/pengumuman', 'PengumumanController@index')->name('pengumuman.index')->middleware('auth');
Route::get('/fakultas', 'FakultasController@index')->name('fakultas.index')->middleware('auth');
Route::get('/lomba', 'LombaController@index')->name('lomba.index')->middleware('auth');
// JURI //
Route::resource('submisi',"SubmisiController")->middleware(['auth', 'CekRole:juri']);
// PESERTA //
Route::group(['middleware' => ['auth','CekRole:peserta']],function(){
  Route::resource('tim',"TimController");
  Route::resource('pengumpulan',"PengumpulanController");
  Route::get('/pengumpulan/{id}/batal', 'PengumpulanController@batal')->name('pengumpulan.batal');
});
// ADMIN //
Route::group(['middleware' => ['auth','CekRole:admin']],function(){
    Route::group(['as' => 'fakultas.' , 'prefix' => 'fakultas'], function () {
        Route::get('/tambah',        'FakultasController@create')->name('create')->middleware(['auth', 'CekRole:admin']);
        Route::post('/tambah',       'FakultasController@store')->name('store')->middleware(['auth', 'CekRole:admin']);
        Route::get('/{id}/edit',     'FakultasController@edit')->name('edit')->middleware(['auth', 'CekRole:admin']);
        Route::post('/{id}/edit',   'FakultasController@update')->name('update')->middleware(['auth', 'CekRole:admin']);
        Route::get('/{id}/hapus', 'FakultasController@destroy')->name('destroy')->middleware(['auth', 'CekRole:admin']);
    });
    Route::group(['as' => 'lomba.' , 'prefix' => 'lomba'], function () {
        Route::get('/tambah',        'LombaController@create')->name('create')->middleware(['auth', 'CekRole:admin']);
        Route::post('/tambah',       'LombaController@store')->name('store')->middleware(['auth', 'CekRole:admin']);
        Route::get('/{id}/edit',     'LombaController@edit')->name('edit')->middleware(['auth', 'CekRole:admin']);
        Route::post('/{id}/edit',   'LombaController@update')->name('update')->middleware(['auth', 'CekRole:admin']);
        Route::get('/{id}/hapus', 'LombaController@destroy')->name('destroy')->middleware(['auth', 'CekRole:admin']);
    });
    Route::group(['as' => 'jadwal.' , 'prefix' => 'jadwal'], function () {
        Route::get('/tambah',        'JadwalController@create')->name('create')->middleware(['auth', 'CekRole:admin']);
        Route::post('/setup-masal',  'JadwalController@setupbulk')->name('setupbulk')->middleware(['auth', 'CekRole:admin']);
        // Route::get('/tambah-masal',  'JadwalController@bulkcreate')->name('bulkcreate')->middleware(['auth', 'CekRole:admin']);
        Route::post('/tambah-masal', 'JadwalController@bulkstore')->name('bulkstore')->middleware(['auth', 'CekRole:admin']);
        Route::post('/tambah',       'JadwalController@store')->name('store')->middleware(['auth', 'CekRole:admin']);
        Route::get('/{id}/edit',     'JadwalController@edit')->name('edit')->middleware(['auth', 'CekRole:admin']);
        Route::post('/{id}/edit',   'JadwalController@update')->name('update')->middleware(['auth', 'CekRole:admin']);
        Route::get('/{id}/hapus', 'JadwalController@destroy')->name('destroy')->middleware(['auth', 'CekRole:admin']);
    });
    Route::group(['as' => 'pengumuman.' , 'prefix' => 'pengumuman'], function () {
        Route::get('/tambah',        'PengumumanController@create')->name('create')->middleware(['auth', 'CekRole:admin']);
        Route::post('/tambah',       'PengumumanController@store')->name('store')->middleware(['auth', 'CekRole:admin']);
        Route::get('/{id}/edit',     'PengumumanController@edit')->name('edit')->middleware(['auth', 'CekRole:admin']);
        Route::post('/{id}/edit',   'PengumumanController@update')->name('update')->middleware(['auth', 'CekRole:admin']);
        Route::get('/{id}/hapus', 'PengumumanController@destroy')->name('destroy')->middleware(['auth', 'CekRole:admin']);
    });
    Route::get('/akun/kelola', 'AkunController@kelola')->name('akun.create')->middleware(['auth', 'CekRole:admin']);
    Route::post('/akun/store', 'AkunController@store')->name('akun.store')->middleware(['auth', 'CekRole:admin']);
    Route::get('/akun/{id}/edit', 'AkunController@edit')->name('akun.edit')->middleware(['auth', 'CekRole:admin']);
    Route::patch('/akun/{id}/save', 'AkunController@manage')->name('akun.manage')->middleware(['auth', 'CekRole:admin']);
    Route::get('/akun/{id}/hapus', 'AkunController@destroy')->name('akun.destroy')->middleware(['auth', 'CekRole:admin']);
});
// Route::resource('jadwal',"JadwalController"); //Partial
// Route::resource('pengumuman',"PengumumanController"); //Partial
// Route::resource('fakultas',"FakultasController"); //Partial
// Route::resource('lomba',"LombaController"); //Partial
