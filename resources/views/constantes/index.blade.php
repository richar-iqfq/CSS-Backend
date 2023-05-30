@extends('layouts.app')

@section('title', 'Constantes')

@section('content')

    @include('partials.filters', $filters_applied)

    Results: {{$especies->count()}} 

    @if (! $especies->isEmpty())
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fórmula</th>
                    <th scope="col">Clasificación</th>
                    <th scope="col">Carga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($especies as $especie)
                    <tr>
                        <th scope="row">{{ $especie->id }}</th>
                        <td>{{ $especie->nombre }}</td>
                        <td><a href="{{ route('constantes.show', ['id' => $especie->id]) }}">
                            {{ $especie->formula }}</a>
                        </td>
                        <td>{{ $especie->clase_acido->clase }}</a></td>
                        <td>{{ $especie->clase_carga->clase }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay constantes registradas.</p>
    @endif

@endsection