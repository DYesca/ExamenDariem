<!-- resources/views/apuestas/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Apuesta</h1>
        <form action="{{ route('apuestas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="id_juego">Juego:</label>
                <select class="form-control" name="id_juego" id="id_juego">
                    @foreach ($juegos as $juego)
                        <option value="{{ $juego->id }}">{{ $juego->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input class="form-control" type="datetime-local" name="fecha" id="fecha">
            </div>
            <div class="form-group">
                <label for="monto">Monto:</label>
                <input class="form-control" type="number" name="monto" id="monto">
            </div>
            <button class="btn btn-primary" type="submit">Crear</button>
            <a href="{{ route('apuestas.index') }}" class="btn btn-primary">Regresar
            </a>
        </form>
    </div>
@endsection
