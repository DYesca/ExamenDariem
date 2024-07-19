<!-- resources/views/apuestas/checkTotalMoney.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-5">Comparación de Dinero en Apuestas</h1>
        <p class="mb-3">Total dinero en juegos de cartas: {{ $totalCartas }}</p>
        <p class="mb-3">Total dinero en juegos que no son de cartas: {{ $totalNoCartas }}</p>
        <p class="mb-3">El total dinero en juegos de cartas es {{ $comparison }} que en juegos que no son de cartas.</p>
    </div>

    <a href="{{ route('apuestas.index') }}" class="btn btn-primary">Regresar
    </a>
@endsection