<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeckController;

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pokemon/{id}', [App\Http\Controllers\PokemonController::class, 'pokemon'])->name('pokemon');

Route::middleware('auth')->group(function () {
    Route::resource('decks', DeckController::class);
    Route::post('/decks/{id}/slots/{slot}', [DeckController::class, 'assign'])->name('decks.slot.assign');
});
