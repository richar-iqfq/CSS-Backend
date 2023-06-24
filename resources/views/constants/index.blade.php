@extends('layouts.app')

@section('title', 'Constantes')

@section('content')

    @include('partials.filters', $filters_applied)

    Results: {{$species->count()}} 

    @if (! $species->isEmpty())
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
                @foreach ($species as $specie)
                    <tr>
                        <th scope="row">{{ $specie->id }}</th>
                        <td>{{ $specie->name }}</td>
                        <td><a href="{{ route('constants.show', ['id' => $specie->id]) }}">
                            {{ $specie->formula }}</a>
                        </td>
                        <td>{{ $specie->molarWeight }}</a></td>
                        <td>{{ $specie->density }}</a></td>
                        <td>{{ $specie->meltingPoint }}</a></td>
                        <td>{{ $specie->boilingPoint }}</a></td>
                        <td>{{ $specie->acidType->type }}</a></td>
                        <td>{{ $specie->chargeType->type }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay constantes registradas.</p>
    @endif

@endsection