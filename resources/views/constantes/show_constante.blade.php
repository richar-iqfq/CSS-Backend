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
            <td>{{ $constante->tipo_pka }}</td>    
        </tr>

        <tr>
            <th scope="row">Valor de Pka</th>
            <td>{{ $constante->valor_pk }}</td>    
        </tr>

        <tr>
            <th scope="row">Etiqueta</th>
            <td>{{ $constante->etiqueta }}</td>    
        </tr>

        <tr>
            <th scope="row">Ion</th>
            <td>{{ $constante->ion }}</td>    
        </tr>

        <tr>
            <th scope="row">Conjugado</th>
            <td><a href={{ route('constantes.show', ['id' => $constante->conjugado()->first()->id]) }}>{{ $constante->conjugado()->first()->formula }}</a></td>    
        </tr>

        <tr>
            <th scope="row">Referencia</th>
            <td>{{ $constante->referencia->nombre }}</td>    
        </tr>
    </tbody>
</table>

<a href="{{ url()->previous() }}">Regresar</a>

@endsection