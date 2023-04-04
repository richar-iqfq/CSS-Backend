@extends('layouts.app')

@section('title', 'New User')
@section('meta_description', 'New User')

@section('content')
    <h2>Crear Nuevo Usuario</h2>
    <br/>
    
    <form action="{{ url('/usuarios') }}" method="post">
        {{ csrf_field() }}

        <label for="name">Nombre: </label>
        <input type="text" name="name" id="name" placeholder="Till Lindemann">
        <br/>
        <br/>
        <label for="email">Correo: </label>
        <input type="text" name="email" id="email" placeholder="Till@example.com">
        <br/>
        <br/>
        <label for="password">Contraseña: </label>
        <input type="text" name="password" id="password" placeholder="Mayor a 6 carácteres">
        <br/>
        <br/>
        <button type="submit">Crear Usuario</button>
    
    </form>

@endsection