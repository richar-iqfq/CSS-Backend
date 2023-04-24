@extends('layouts.app')

@section('title', 'Search')

@section('content')
    <h1>Search</h1>
    <br/>

    <div>
        <form action="{{ url('/constants') }}" method="post">
            {{ csrf_field() }}
    
            <label>
                Substring: <input type="text" name="substring" id="substring" placeholder="methane" value="{{ ($oldRequest) ? $oldRequest->substring : '' }}">
            </label>
            <label><input type="checkbox" name="assessment" value="Uncertain"> Assessment</label>
            <br/>
            <button type="submit">Filtrar</button>
        </form>
        <br>
    </div>

    @if (! $constants->isEmpty())
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Entry #</th>
                    <th scope="col">IUPAC name</th>
                    <th scope="col">PKa type</th>
                    <th scope="col">Pka value</th>
                    <th scope="col">Assessment</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($constants as $constant)
                    <tr>
                        <th scope="row">{{ $constant->id }}</th>
                        <td>{{ $constant->entry }}</td>
                        <td><a href="{{ route('constants.show', ['id' => $constant->id]) }}">
                            {{ $constant->original_iupac_names }}</a>
                        </td>
                        <td>{{ $constant->pka_type }}</a></td>
                        <td>{{ $constant->pka_value }}</td>
                        <td>{{ $constant->assessment }}</td>    
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay constantes registradas.</p>
    @endif

@endsection