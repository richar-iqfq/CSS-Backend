@extends('layouts.app')

@section('title', 'New User')
@section('meta_description', 'New User')

@section('content')
    <div class="card">
        <h4 class="card-header">Crear Nuevo Usuario</h4>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <h5>Por favor corrige los siguientes errores:</h5>
                    {{-- <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul> --}}
                </div>
            @endif
        
            <form action="{{ url('/usuarios') }}" method="post">
                {{ csrf_field() }}
        
                <div class="mb-3">
                    <label for="name">Nombre: </label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Till Lindemann" value="{{ old('name') }}">
                    
                    @if ($errors->has('name'))
                        <p>{{ $errors->first('name') }}</p>
                    @endif
                </div>
        
                <div class="mb-3">
                    <label for="email">Correo: </label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Till@example.com" value="{{ old('email') }}">
                    
                    @if ($errors->has('email'))
                        <p>{{ $errors->first('email') }}</p>
                    @endif
                </div>
        
                <div class="mb-3">
                    <label for="password">Contraseña: </label>
                    <input type="text" class="form-control" name="password" id="password" placeholder="Mayor a 6 carácteres">
                    
                    @if ($errors->has('password'))
                        <p>{{ $errors->first('password') }}</p>
                    @endif
                </div>
        
                <button type="submit" class="btn btn_primary">Crear Usuario</button>
            
            </form>
        </div>
    </div>

@endsection