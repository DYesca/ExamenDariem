<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Apuesta extends Model
{
    use HasFactory;

    protected $fillable = ['id_juego', 'fecha', 'monto'];

    public function juego()
    {
        return $this->belongsTo(Juego::class , 'id_juego');
    }
}
//La importación de la clase Carbon se realiza para poder utilizar la clase Carbon en la creación de la fecha de la apuesta. 
//Lo que esta impotación hace es manejar la biblioteca Carbon, que es una extensión de la clase DateTime de PHP. 

/*
Esto lo use para meter datos a la base de datos más rápido

Apuesta::create(['id_juego' => 1, 'fecha' => Carbon::now(), 'monto' => 100]);
Apuesta::create(['id_juego' => 2, 'fecha' => Carbon::now(), 'monto' => 150]);
Apuesta::create(['id_juego' => 3, 'fecha' => Carbon::now(), 'monto' => 200]);
Apuesta::create(['id_juego' => 4, 'fecha' => Carbon::now(), 'monto' => 250]);

*/