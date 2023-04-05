@extends('layouts.app')

@section('title', 'New User')
@section('meta_description', 'New User')

@section('content')
    <h2>Crear Nuevo Usuario</h2>
    <br/>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <h5>Por favor corrige los errores:</h5>
            {{-- <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul> --}}
        </div>
    @endif

    <form action="{{ url('/usuarios') }}" method="post">
        {{ csrf_field() }}

        <label for="name">Nombre: </label>
        <input type="text" name="name" id="name" placeholder="Till Lindemann" value="{{ old('name') }}">
        @if ($errors->has('name'))
            <p>{{ $errors->first('name') }}</p>
        @endif
        <br/>
        <label for="email">Correo: </label>
        <input type="text" name="email" id="email" placeholder="Till@example.com" value="{{ old('email') }}">
        @if ($errors->has('email'))
            <p>{{ $errors->first('email') }}</p>
        @endif
        <br/>
        <label for="password">Contraseña: </label>
        <input type="text" name="password" id="password" placeholder="Mayor a 6 carácteres">
        @if ($errors->has('password'))
            <p>{{ $errors->first('password') }}</p>
        @endif
        <br/>
        <button type="submit">Crear Usuario</button>
    
    </form>

@endsection