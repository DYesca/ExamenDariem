<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apuesta;
use App\Models\Juego;

class ApuestaController extends Controller
{
    //


    //INDEX DE JUEGO
    public function index(Request $request)
    {
        $query = Apuesta::join('juegos', 'apuestas.id_juego', '=', 'juegos.id')
            ->select('apuestas.*', 'juegos.nombre', 'juegos.juego_de_cartas');
    
        if ($request->has('juego')) {
            $query->where('juegos.nombre', 'like', '%' . $request->get('juego') . '%');
        }
    
        $apuestas = $query->get();
    
        return view('apuestas.index', compact('apuestas'));
    }
    

    // SHOW DE JUEGO
    public function showByJuego($idJuego)
    {
        $apuestas = Apuesta::where('id_juego', $idJuego)->with('juego')->get();
        return view('apuestas.index', compact('apuestas'));
    }

    // CREATE DE JUEGO
    public function create()
    {
        $juegos = Juego::all();
        return view('apuestas.create', compact('juegos'));
    }

    // STORE DE JUEGO
    public function store(Request $request)
    {
        $request->validate([
            'id_juego' => 'required|exists:juegos,id',
            'fecha' => 'required|date',
            'monto' => 'required|integer'
        ]);

        Apuesta::create($request->all());
        return redirect()->route('apuestas.index');
    }

    // FUNCION APUESTAS MAYOR A 3 JUGADORES

    public function apuestasMayoresTresJugadores()
    {
     
        $juegosIds = Juego::where('cantidad_jugadores', '>', 3)->pluck('id');
        $apuestas = Apuesta::whereIn('id_juego', $juegosIds)->with('juego')->get();

        return view('apuestas.index', compact('apuestas'));
    }

    // FUNCION APUESTAS CHECK TOTAL DE LA MONEDA

    public function checkTotalMoney()
    {
        $totalCartas = Apuesta::whereIn('id_juego', function ($query) {
            $query->select('id')->from('juegos')->where('juego_de_cartas', true);
        })->sum('monto');

        $totalNoCartas = Apuesta::whereIn('id_juego', function ($query) {
            $query->select('id')->from('juegos')->where('juego_de_cartas', false);
        })->sum('monto');

        $comparison = $totalCartas > $totalNoCartas ? 'mayor' : 'menor';
     

        return view('apuestas.checkTotalMoney', compact('totalCartas', 'totalNoCartas', 'comparison'));
    }

    
}
