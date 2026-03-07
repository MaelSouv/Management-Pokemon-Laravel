<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pokemon/{id}', [App\Http\Controllers\PokemonController::class, 'pokemon'])->name('pokemon');
