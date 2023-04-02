@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
    <h1>{{ $title }}</h1> <?php // sintaxis alternativa de php?>

    @if (! empty($users))
            @foreach ($users as $user)
                > {{ $user->name }}
                <br/>
            @endforeach
    @else
        <p>No hay usuarios registrados.</p>
    @endif

    <br/>
    <a href="/usuarios/nuevo">Crear Nuevo Usuario</a>
@endsection