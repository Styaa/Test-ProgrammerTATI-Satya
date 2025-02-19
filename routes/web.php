<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\LogHarianController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'home']);
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('profile', function () {
        return view('profile');
    })->name('profile');

    Route::get('user-management', function () {
        return view('laravel-examples/user-management');
    })->name('user-management');

    Route::resource('log-harian', LogHarianController::class);
    Route::get('/review-logs', [LogHarianController::class, 'reviewLogs'])->name('review-logs');
    Route::get('/log-harian/approve/{id}', [LogHarianController::class, 'approveLog'])->name('log-harian.approve');
    Route::get('/log-harian/reject/{id}', [LogHarianController::class, 'rejectLog'])->name('log-harian.reject');

    Route::get('/pegawai/penilaian/{id}', [PegawaiController::class, 'penilaian'])->name('pegawai.penilaian');
    Route::post('/pegawai/storepenilaian/{id}', [PegawaiController::class, 'storePredikat'])->name('pegawai.storePredikat');
    Route::resource('pegawai', PegawaiController::class);

    Route::get('/helloworld', [HelloWorldController::class, 'showHelloworldForm'])->name('helloworld.form');
    Route::post('/helloworld', [HelloWorldController::class, 'processHelloworld'])->name('helloworld.process');

    Route::get('/logout', [SessionsController::class, 'destroy']);
    Route::get('/user-profile', [InfoUserController::class, 'create']);
    Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::post('/update-atasan', [InfoUserController::class, 'updateAtasan'])->name('update-atasan');
    Route::get('/login', function () {
        return view('dashboard');
    })->name('sign-up');
});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');
