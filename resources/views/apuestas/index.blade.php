<!-- resources/views/apuestas/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Apuestas</h1>
    <a href="{{ route('apuestas.create') }}" class="btn btn-primary">Crear Apuesta</a>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('apuestas.index') }}" method="GET" class="form-inline">
                <div class="form-group">
                    <label for="juego">Buscar por juego:</label>
                    <input type="text" name="juego" id="juego" value="{{ request('juego') }}" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Juego</th>
                <th>Fecha</th>
                <th>Monto</th>
                <th>Tipo de Juego</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($apuestas as $apuesta)
                <tr>
                    <td>{{ $apuesta->juego->nombre }}</td>
                    <td>{{ $apuesta->fecha }}</td>
                    <td>{{ $apuesta->monto }}</td>
                    <td>{{ $apuesta->juego_de_cartas ? 'Juego de Cartas' : 'No es Juego de Cartas' }}</td>
                </tr>
            @endforeach


        </tbody>
    </table>
    <a href="{{ route('apuestas.checkTotalMoney') }}" class="btn btn-primary mt-2">Verificar Total</a>
    <form action="{{ route('apuestas.mayoresTresJugadores') }}" method="GET">
        <button type="submit" class="btn btn-primary mt-2">Apuesta de Juegos con más de 3 jugadores</button>
    </form>

    <!-- Esto sinceramente descubrí como hacerlo con IA, no sabía que se podía hacer tan facil con un if   -->
    @if(request()->has('juego'))
        <form action="{{ route('apuestas.index') }}" method="GET">
            <button type="submit" class="btn btn-primary mt-2">Regresar a la pantalla principal</button>
        </form>
        
    @elseif(request()->routeIs('apuestas.mayoresTresJugadores'))
        <form action="{{ route('apuestas.index') }}" method="GET">
            <button type="submit" class="btn btn-primary mt-2">Regresar a la pantalla principal</button>
        </form>
    @endif
</div>
@endsection