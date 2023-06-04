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
            <th scope="row">Masa Molar [g/mol]</th>
            <td>{{ $especie->masa_molar }}</td>    
        </tr>

        <tr>
            <th scope="row">Densidad [g/cm3]</th>
            <td>{{ $especie->densidad }}</td>    
        </tr>

        <tr>
            <th scope="row">Fusión [°C]</th>
            <td>{{ $especie->fusion }}</td>    
        </tr>

        <tr>
            <th scope="row">Ebullición [°C]</th>
            <td>{{ $especie->ebullicion }}</td>    
        </tr>

        <tr>
            <th scope="row">Ácido</th>
            <td>{{ $especie->clase_acido->clase }}</td>    
        </tr>

        <tr>
            <th scope="row">Carga</th>
            <td>{{ $especie->clase_carga->clase }}</td>    
        </tr>
       
        @foreach ($especie->constantes as $constante)
            <tr>
                <th scope="row">Referencia</th>
                <td>{{ $constante->referencia->autor }}</td>
                <td>{{ $constante->valor_reportado=='ka'?'Valor Reportado':'Valor Calculado' }}</td>
                <td><b>Ka</b></td>
                @foreach ($constante->ka_values() as $ka_value)
                    <td>{{ sprintf("%1.2e", $ka_value) }}</td>
                @endforeach
            </tr>

            <tr>
                <th scope="row"></th>
                <td></td>
                <td>{{ $constante->valor_reportado=='pka'?'Valor Reportado':'Valor Calculado' }}</td>
                <td><b>pKa</b></td>
                @foreach ($constante->pka_values() as $pka_value)
                    <td>{{ sprintf("%01.3f", $pka_value) }}</td>    
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