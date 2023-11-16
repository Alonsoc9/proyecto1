<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\EncryptController;
use App\Http\Controllers\DecryptController;
use App\Http\Controllers\HomeController;

Route::post('/encrypt', [EncryptController::class, 'encrypt'])->name('encrypt');
Route::post('/decrypt', [DecryptController::class, 'decrypt'])->name('decrypt');

//donde staran mis vistas
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/historial', [EncryptController::class, 'historial'])->name('historial');
Route::get('/download/{id}', [EncryptController::class, 'download'])->name('download');

// VISTAS
Route::get('/', function () {
    return view('welcome');
});




// VISTAS QUE REQUIERAN AUTENTICACION
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');  
});


Route::middleware(['auth'])->group(function () {
    Route::get('/encriptar', function () {
        return view('encriptar');
    })->name('encriptar');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/desencriptar', function () {
        return view('desencriptar');
    })->name('desencriptar');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/historial', function () {
        return view('historial');
    })->name('historial');
});




// GOOGLE
Route::get('auth/google',[GoogleAuthController::class,'redirect'])->name('google-auth');
Route::get('auth/google/call-back',[GoogleAuthController::class,'callbackGoogle']);
 