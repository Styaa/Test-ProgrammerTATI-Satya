<?php

use App\Http\Controllers\ProvinsiController;
use Illuminate\Support\Facades\Route;

Route::get('/provinsi', [ProvinsiController::class, 'index']);
Route::get('/provinsi/{id}', [ProvinsiController::class, 'show']);
Route::post('/provinsi', [ProvinsiController::class, 'store']);
Route::put('/provinsi/{id}', [ProvinsiController::class, 'update']);
Route::delete('/provinsi/{id}', [ProvinsiController::class, 'destroy']);
