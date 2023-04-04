@extends('layouts.app')

@section('title', 'New User')
@section('meta_description', 'New User')

@section('content')
    <h2>Crear Nuevo Usuario</h2>
    <br/>
    
    <form action="{{ url('/usuarios') }}" method="post">
        {{ csrf_field() }}

        <button type="submit">Crear Usuario</button>
    
    </form>

@endsection