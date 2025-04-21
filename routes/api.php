<?php

use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\BahanController;
use App\Http\Controllers\Api\DataPegawaiController;
use App\Http\Controllers\Api\DataQcController;
use App\Http\Controllers\Api\PotongController;
use App\Http\Controllers\Api\JahitController;
use App\Http\Controllers\Api\QcController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('bahan')->group(function () {
    Route::get('/', [BahanController::class, 'index']);
    Route::post('/', [BahanController::class, 'store']);
    Route::get('/{id}', [BahanController::class, 'show']);
    Route::put('/{id}', [BahanController::class, 'update']);
    Route::delete('/{id}', [BahanController::class, 'destroy']);
});

Route::prefix('data_pegawai')->group(function () {
    Route::get('/', [DataPegawaiController::class, 'index']);
    Route::post('/', [DataPegawaiController::class, 'store']);
    Route::get('/{id}', [DataPegawaiController::class, 'show']);
    Route::put('/{id}', [DataPegawaiController::class, 'update']);
    Route::delete('/{id}', [DataPegawaiController::class, 'destroy']);
});

Route::prefix('data_qc')->group(function () {
    Route::get('/', [DataQcController::class, 'index']);
    Route::post('/', [DataQcController::class, 'store']);
    Route::get('/{id}', [DataQcController::class, 'show']);
    Route::put('/{id}', [DataQcController::class, 'update']);
    Route::delete('/{id}', [DataQcController::class, 'destroy']);
});

Route::prefix('potong')->group(function () {
    Route::get('/', [PotongController::class, 'index']);
    Route::post('/', [PotongController::class, 'store']);
    Route::get('/{id}', [PotongController::class, 'show']);
    Route::put('/{id}', [PotongController::class, 'update']);
    Route::delete('/{id}', [PotongController::class, 'destroy']);
});

Route::prefix('jahit')->group(function () {
    Route::get('/', [JahitController::class, 'index']);
    Route::post('/', [JahitController::class, 'store']);
    Route::get('/{id}', [JahitController::class, 'show']);
    Route::put('/{id}', [JahitController::class, 'update']);
    Route::delete('/{id}', [JahitController::class, 'destroy']);
});

Route::prefix('qc')->group(function () {
    Route::get('/', [QcController::class, 'index']);
    Route::post('/', [QcController::class, 'store']);
    Route::get('/{id}', [QcController::class, 'show']);
    Route::put('/{id}', [QcController::class, 'update']);
    Route::delete('/{id}', [QcController::class, 'destroy']);
});



Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);


    // Route::get('/bahan', [BahanController::class, 'index']);
    // Route::post('/bahan', [BahanController::class, 'store']);
    // Route::get('/bahan', [BahanController::class, 'show']);
    // Route::put('/bahan', [BahanController::class, 'update']);
    // Route::delete('/bahan', [BahanController::class, 'destroy']);

    // Route::resource('bahan', BahanController::class)->except('create', 'edit');

});

Route::middleware('auth:sanctum')->get('/profile', [ProfileController::class, 'profile']);

