@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
    <h1>{{ $title }}</h1> <?php // sintaxis alternativa de php?>

    @if (! $users->isEmpty())
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Profesión</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td><a href="{{ route('users.show', ['id' => $user->id]) }}">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>

                        @if ($user->profession_id == null)
                            <td>Sin profesión</td>    
                        @else
                            <td>{{ $user->profession->title }}</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay usuarios registrados.</p>
    @endif

    <br/>
    <a href="{{ route('users.create') }}">Crear Nuevo Usuario</a>
@endsection