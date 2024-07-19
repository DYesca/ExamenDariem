<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



use App\Http\Controllers\ApuestaController;


Route::get('/apuestas', [ApuestaController::class, 'index'])->name('apuestas.index');
Route::get('/apuestas/juego/{idJuego}', [ApuestaController::class, 'showByJuego'])->name('apuestas.showByJuego');
Route::get('/apuestas/create', [ApuestaController::class, 'create'])->name('apuestas.create');
Route::post('/apuestas', [ApuestaController::class, 'store'])->name('apuestas.store');
Route::get('/apuestas/mayores-tres-jugadores', [ApuestaController::class, 'apuestasMayoresTresJugadores'])->name('apuestas.mayoresTresJugadores');
Route::get('/apuestas/check-total-money', [ApuestaController::class, 'checkTotalMoney'])->name('apuestas.checkTotalMoney');


