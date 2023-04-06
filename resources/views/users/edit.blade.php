@extends('layouts.app')

@section('title', 'Edit')

@section('content')
    <h1>Editar Usuario</h1>
    <br/>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <h5>Por favor corrige los errores:</h5>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url("usuarios/{$user->id}") }}" method="post">
        {{ method_field('put') }}        
        {{ csrf_field() }}

        <label for="name">Nombre: </label>
        <input type="text" name="name" id="name" placeholder="Till Lindemann" value="{{ old('name', $user->name) }}">
        <br/>
        <label for="email">Correo: </label>
        <input type="text" name="email" id="email" placeholder="Till@example.com" value="{{ old('email', $user->email) }}">
        <br/>
        <label for="password">Contraseña: </label>
        <input type="text" name="password" id="password" placeholder="Mayor a 6 carácteres">
        <br/>
        <button type="submit">Actualizar Usuario</button>
    
    </form>
@endsection