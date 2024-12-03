<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if(!session()->has('client')) {
        return redirect()->route('pin.show');
    }
    return view('welcome');
})->name('home');

Route::get('/pin', [\App\Http\Controllers\PinController::class, 'show'])->name('pin.show');
Route::post('/pin/verify', [\App\Http\Controllers\PinController::class, 'verify'])->name('verify.pin');

Route::get('/login', [\App\Http\Controllers\LoginController::class, 'show'])->name('login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login.post');
Route::get('/logout', function () {
return redirect()->route('pin.show');
});
