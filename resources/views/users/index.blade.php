@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
    <h1>{{ $title }}</h1> <?php // sintaxis alternativa de php?>

    @if (! $users->isEmpty())
        </ul>
            @foreach ($users as $user)
                <li>

                    {{ $user->name }}
                    <a href="{{ route('users.show', ['id' => $user->id]) }}"> Ver detalles</a>

                </li>
            @endforeach
        <ul>
    @else
        <p>No hay usuarios registrados.</p>
    @endif

    <br/>
    <a href="{{ route('users.create') }}">Crear Nuevo Usuario</a>
@endsection