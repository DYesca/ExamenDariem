<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Juego extends Model
{
    use HasFactory;

    

    protected $fillable = ['nombre', 'cantidad_jugadores', 'juego_de_cartas'];

    public function apuestas()
    {
        return $this->hasMany(Apuesta::class, 'id_juego');
    }
}
/*
Esto lo use tambíen para meter datos a la base de datos más rápido

Juego::create(['nombre' => 'Poker', 'cantidad_jugadores' => 5, 'juego_de_cartas' => true]);
Juego::create(['nombre' => 'Blackjack', 'cantidad_jugadores' => 7, 'juego_de_cartas' => true]);
Juego::create(['nombre' => 'Ruleta', 'cantidad_jugadores' => 1, 'juego_de_cartas' => false]);
Juego::create(['nombre' => 'Bingo', 'cantidad_jugadores' => 20, 'juego_de_cartas' => false]);

*/
