<?php

use App\Http\Controllers\Api\ProvinsiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('/provinsi', ProvinsiController::class);

Route::get('/provinsi/{provinsi}/edit', [ProvinsiController::class, 'edit'])->name('provinsi.edit');
