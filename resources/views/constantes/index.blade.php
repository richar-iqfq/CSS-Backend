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
                    <th scope="col">Masa Molar [g/mol]</th>
                    <th scope="col">Densidad [g/cm3]</th>
                    <th scope="col">Fusión [°C]</th>
                    <th scope="col">Ebullición [°C]</th>
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
                        <td>{{ $especie->masa_molar }}</a></td>
                        <td>{{ $especie->densidad }}</a></td>
                        <td>{{ $especie->fusion }}</a></td>
                        <td>{{ $especie->ebullicion }}</a></td>
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