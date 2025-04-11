<?php

use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\BahanController;
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

// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'show']);
//     Route::put('/profile', [ProfileController::class, 'update']);
// });


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

