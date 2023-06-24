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
            <td>{{ $specie->id }}</td>    
        </tr>

        <tr>
            <th scope="row">Nombre</th>
            <td>{{ $specie->name }}</td>    
        </tr>

        <tr>
            <th scope="row">Fórmula</th>
            <td>{{ $specie->formula }}</td>    
        </tr>

        <tr>
            <th scope="row">Masa Molar</th>
            <td>{{ $specie->molarWeight }} g/mol</td>    
        </tr>

        <tr>
            <th scope="row">Densidad</th>
            <td>{{ $specie->density }} g/cm3</td>    
        </tr>

        <tr>
            <th scope="row">P. Fusión</th>
            <td>{{ $specie->meltingPoint }} °C</td>    
        </tr>

        <tr>
            <th scope="row">P. Ebullición</th>
            <td>{{ $specie->boilingPoint }} °C</td>    
        </tr>

        <tr>
            <th scope="row">Clasificación</th>
            <td>{{ $specie->acidType->type }}</td>    
        </tr>

        <tr>
            <th scope="row">Carga</th>
            <td>{{ $specie->chargeType->type }}</td>    
        </tr>
       
        @foreach ($specie->constants as $constante)
            <tr>
                <th scope="row">Referencia</th>
                <td>{{ $constante->reference->author }}</td>
                <td>{{ $constante->reportedValue=='ka'?'Valor Reportado':'Valor Calculado' }}</td>
                <td><b>Ka</b></td>
                @foreach ($constante->ka_values() as $ka_value)
                    <td>{{ $ka_value ? sprintf("%1.2e", $ka_value) : "" }}</td>
                @endforeach
            </tr>

            <tr>
                <th scope="row"></th>
                <td></td>
                <td>{{ $constante->reportedValue=='pka'?'Valor Reportado':'Valor Calculado' }}</td>
                <td><b>pKa</b></td>
                @foreach ($constante->pka_values() as $pka_value)
                    <td>{{ $pka_value ? sprintf("%01.3f", $pka_value) : "" }}</td>    
                @endforeach
            </tr>
        @endforeach
        {{-- <tr>
            <th scope="row">Valor Reportado</th>
            <td>{{ $specie->reportado }}</td>    
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