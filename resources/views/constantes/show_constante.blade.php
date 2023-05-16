@extends('layouts.app')

@section('title', 'Detailles')

@section('content')

<h1>Detalles</h1>
<br/>

<table class="table">
    <thead class="table-light">
        <tr>
            <th scope="col"></th>
            <th scope="col">Valor</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">id</th>
            <td>{{ $constante->id }}</td>    
        </tr>

        <tr>
            <th scope="row">Nombre</th>
            <td>{{ $constante->nombre }}</td>    
        </tr>

        <tr>
            <th scope="row">Fórmula</th>
            <td>{{ $constante->formula }}</td>    
        </tr>

        <tr>
            <th scope="row">Tipo de PKa</th>
            <td>{{ $constante->tipo }}</td>    
        </tr>

        <tr>
            <th scope="row">Disociación</th>
            <td>{{ $constante->paso }}</td>    
        </tr>

        <tr>
            <th scope="row">Valor Ka</th>
            <td>{{ $constante->valor_ka }}</td>    
        </tr>

        <tr>
            <th scope="row">Valor pKa</th>
            <td>{{ $constante->valor_pka }}</td>    
        </tr>

        <tr>
            <th scope="row">Etiquetas</th>
            <td>{{ $constante->etiquetas }}</td>    
        </tr>

        <tr>
            <th scope="row">Referencia</th>
            <td>{{ $constante->referencia->cita }}</td>    
        </tr>
    </tbody>
</table>

<a href="{{ url()->previous() }}">Regresar</a>

@endsection