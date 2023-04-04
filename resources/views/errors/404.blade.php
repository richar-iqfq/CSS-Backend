@extends('layouts.app')

@section('title', '404')

@section('content')
    <h1>Página no encontrada</h1>

    <a href="{{ url()->previous() }}">Regresar</a>

@endsection