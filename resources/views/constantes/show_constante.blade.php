@extends('layouts.app')

@section('title', 'Detalles')

@section('content')

<h1>Detalles</h1>
<br/>

<table class="table">
    <thead class="table-light">
        <tr>
            <th scope="col"></th>
            <th scope="col">Valor</th>
            <th scope="col">Fuerza Ionica</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col">1</th>
            <th scope="col">2</th>
            <th scope="col">3</th>
            <th scope="col">4</th>
            <th scope="col">5</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">id</th>
            <td>{{ $especie->id }}</td>    
        </tr>

        <tr>
            <th scope="row">Nombre</th>
            <td>{{ $especie->nombre }}</td>    
        </tr>

        <tr>
            <th scope="row">Fórmula</th>
            <td>{{ $especie->formula }}</td>    
        </tr>

        <tr>
            <th scope="row">Ácido</th>
            <td>{{ $especie->clase_acido->clase }}</td>    
        </tr>

        <tr>
            <th scope="row">Carga</th>
            <td>{{ $especie->clase_carga->clase }}</td>    
        </tr>
        
        <tr>
            <th scope="row"></th>
            <td colspan="10"><b>Constantes</b></td>
        </tr>

        @foreach ($especie->constantes as $constante)
            <tr>
                <th scope="row">Referencia</th>
                <td>{{ $constante->referencia->autor }}</td>
                <td>{{ $constante->fuerza_ionica }}</td>
                <td><b>Ka</b></td>
                <td>{{ $constante->valor_reportado=='ka'?'valor reportado':'' }}</td>
                @foreach ($constante->ka_values() as $ka_value)
                    <td>{{ $ka_value }}</td>
                @endforeach
            </tr>

            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td><b>pKa</b></td>
                <td>{{ $constante->valor_reportado=='pka'?'valor reportado':'' }}</td>
                @foreach ($constante->pka_values() as $pka_value)
                    <td>{{ $pka_value }}</td>    
                @endforeach
            </tr>
        @endforeach
        {{-- <tr>
            <th scope="row">Valor Reportado</th>
            <td>{{ $especie->reportado }}</td>    
        </tr> --}}

        {{-- <tr>
            <th scope="row">Valor Ka</th>
            <td>{{ $constante->ka }}</td>    
        </tr>

        <tr>
            <th scope="row">Valor pKa</th>
            <td>{{ $constante->pka }}</td>    
        </tr>

        <tr>
            <th scope="row">Referencia</th>
            <td>{{ $constante->referencia->cita }}</td>    
        </tr> --}}
    </tbody>
</table>

<a href="{{ url()->previous() }}">Regresar</a>

@endsection