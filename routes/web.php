<?php

use App\Http\Controllers\BahanController;
use App\Http\Controllers\DataPegawaiController;
use App\Http\Controllers\DataQcController;
use App\Http\Controllers\JahitController;
use App\Http\Controllers\PotongController;
use App\Http\Controllers\QcController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('bahan', BahanController::class);
Route::resource('data_pegawai', DataPegawaiController::class);
Route::resource('data_Qc', DataQcController::class);
Route::resource('jahit', JahitController::class);
Route::resource('potong', PotongController::class);
Route::resource('Qc', QcController::class);
Route::resource('laporan', LaporanController::class);



Route::post('laporan', [LaporanController::class, 'report'])->name('report');
Route::post('print-laporan', [LaporanController::class, 'printReport'])->name('printReport');
