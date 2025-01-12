<?php

use App\Http\Controllers\Api\ProvinsiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::Resource('/provinsi', ProvinsiController::class);

Route::get('/provinsi/{provinsi}/edit', [ProvinsiController::class, 'edit'])->name('provinsi.edit');
// Route::put('/provinsi/{provinsi}', [ProvinsiController::class, 'update'])->name('provinsi.update');
Route::get('/provinsi', [ProvinsiController::class, 'index'])->name('provinsi.index');
// Route::get('/provinsi/create', [ProvinsiController::class, 'create'])->name('provinsi.create');
