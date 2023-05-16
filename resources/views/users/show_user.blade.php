@extends('layouts.app')

@section('title', 'Details')

@section('content')
    <h1>Usuario #{{ $user->id }}</h1>
    
    <p>Nombre del usuario: {{ $user->name }}</p>
    <p>Correo del usuario: {{ $user->email }}</p>

    @if ($user->profession_id == null)
        <p>Profesion del usuario: Sin profesión</p>    
    @else
        <p>Profesion del usuario: {{ $user->profession->title }}</p>    
    @endif

    <a href="{{ url()->previous() }}">Regresar</a> |
    <a href="{{ route('users.edit', $user) }}">Editar</a> |
    
    <form action="{{ route('users.delete', $user) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('delete') }}

        <button type="submit">Eliminar</button>
    </form>

@endsection