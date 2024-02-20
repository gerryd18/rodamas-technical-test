<?php

use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProvinsiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(ProvinsiController::class)->group(function(){
    Route::get('/provinsi', 'AllProvinsi')->name('all.provinsi');
    Route::get('/add/provinsi', 'AddProvinsi')->name('add.provinsi');
    Route::post('/post/provinsi','PostProvinsi')->name('post.provinsi');
    Route::get('/delete/provinsi/{id}','DeleteProvinsi')->name('delete.provinsi');
    Route::get('/edit/provinsi/{id}','EditProvinsi')->name('edit.provinsi');  
    Route::post('/update/provinsi/{id}','UpdateProvinsi')->name('update.provinsi');  

});

Route::controller(KecamatanController::class)->group(function(){
    Route::get('/kecamatan', 'AllKecamatan')->name('all.kecamatan');
    Route::get('/add/kecamatan', 'AddKecamatan')->name('add.kecamatan');
    Route::post('/post/kecamatan','PostKecamatan')->name('post.kecamatan');
    Route::get('/delete/kecamatan/{id}','DeleteKecamatan')->name('delete.kecamatan');
    Route::get('/edit/kecamatan/{id}','EditKecamatan')->name('edit.kecamatan'); 
    Route::post('/update/kecamatan/{id}','Updatekecamatan')->name('update.kecamatan');   
});

Route::controller(KelurahanController::class)->group(function(){
    Route::get('/kelurahan', 'AllKelurahan')->name('all.kelurahan');
     Route::get('/add/kelurahan', 'AddKelurahan')->name('add.kelurahan');
    Route::post('/post/kelurahan','PostKelurahan')->name('post.kelurahan');
     Route::get('/delete/kelurahan/{id}','DeleteKelurahan')->name('delete.kelurahan');
      Route::get('/edit/kelurahan/{id}','EditKelurahan')->name('edit.kelurahan');
      Route::post('/update/kelurahan/{id}','Updatekelurahan')->name('update.kelurahan');   
});

Route::controller(PegawaiController::class)->group(function(){
    Route::get('/pegawai', 'AllPegawai')->name('all.pegawai');
     Route::get('/add/pegawai', 'AddPegawai')->name('add.pegawai');
    Route::post('/post/pegawai','PostPegawai')->name('post.pegawai');
     Route::get('/delete/pegawai/{id}','DeletePegawai')->name('delete.pegawai');
      Route::get('/edit/pegawai/{id}','EditPegawai')->name('edit.pegawai');
    Route::post('/update/pegawai/{id}','Updatepegawai')->name('update.pegawai');    
});


