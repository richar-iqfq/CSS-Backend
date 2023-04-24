@extends('layouts.app')

@section('title', 'Constant Details')

@section('content')

<h1>Details</h1>
<br/>

<table class="table">
    <thead class="table-light">
        <tr>
            <th scope="col"></th>
            <th scope="col">Value</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">id</th>
            <td>{{ $constant->id }}</td>    
        </tr>

        <tr>
            <th scope="row">Entry</th>
            <td>{{ $constant->entry }}</td>    
        </tr>

        <tr>
            <th scope="row">Smile</th>
            <td>{{ $constant->SMILES }}</td>    
        </tr>

        <tr>
            <th scope="row">Pka type</th>
            <td>{{ $constant->pka_type }}</td>    
        </tr>

        <tr>
            <th scope="row">Pka value</th>
            <td>{{ $constant->pka_value }}</td>    
        </tr>

        <tr>
            <th scope="row">IUPAC name</th>
            <td>{{ $constant->original_iupac_names }}</td>    
        </tr>

        <tr>
            <th scope="row">IUPAC nickname</th>
            <td>{{ $constant->original_iupac_nicknames }}</td>    
        </tr>

        <tr>
            <th scope="row">Acidity label</th>
            <td>{{ $constant->acidity_labels }}</td>    
        </tr>

        <tr>
            <th scope="row">Assessment</th>
            <td>{{ $constant->assessment }}</td>    
        </tr>

        <tr>
            <th scope="row">Reference</th>
            <td>{{ $constant->reference->name }}</td>    
        </tr>
    </tbody>
</table>

<a href="{{ url()->previous() }}">Regresar</a>

@endsection