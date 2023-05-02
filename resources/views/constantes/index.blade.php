@extends('layouts.app')

@section('partials.navigation')

@section('title', 'Constantes')

@section('content')
    <h1>Búsqueda</h1>

    <div>
        <form action="{{ url('/constantes') }}" method="post">
            {{ csrf_field() }}
            
            <div class="row">
                <div class="col">
                    Nombre: <input type="text" class="form-control" name="substring" id="substring" placeholder="nitroso" value="{{$filters_applied['substring']}}">
                </div>
            </div>
            
            <div class="row">
                <div class="col">
                    Etiqueta:
                    <select name="etiqueta" class="form-control">
                        <option value="All" {{($filters_applied['etiqueta']=='All')?'selected':''}}>All</option>
                        <option value="ácido fuerte" {{($filters_applied['etiqueta']=='ácido fuerte')?'selected':''}}>ácido fuerte</option>
                        <option value="ácido débil" {{($filters_applied['etiqueta']=='ácido débil')?'selected':''}}>ácido débil</option>
                        <option value="base débil" {{($filters_applied['etiqueta']=='base débil')?'selected':''}}>base débil</option>
                        <option value="base fuerte" {{($filters_applied['etiqueta']=='base fuerte')?'selected':''}}>base fuerte</option>
                    </select>
                </div>
            </div>

            Tipo de pka:
            <select name="tipo_pka" class="form-control">
                <option value="All" {{($filters_applied['tipo_pka']=='All')?'selected':''}}>All</option>
                <option value="pKB1" {{($filters_applied['tipo_pka']=='pKB1')?'selected':''}}>pKB1</option>
                <option value="pKB2" {{($filters_applied['tipo_pka']=='pKB2')?'selected':''}}>pKB2</option>
                <option value="pKB3" {{($filters_applied['tipo_pka']=='pKB3')?'selected':''}}>pKB3</option>
                <option value="pKAH1" {{($filters_applied['tipo_pka']=='pKAH1')?'selected':''}}>pKAH1</option>
                <option value="pKAH2" {{($filters_applied['tipo_pka']=='pKAH2')?'selected':''}}>pKAH2</option>
                <option value="pKAH3" {{($filters_applied['tipo_pka']=='pKAH3')?'selected':''}}>pKAH3</option>
            </select>
            <br/>
            <button type="submit" class="btn btn-secondary">Filtrar</button>
        </form>
    </div>
    <br/>
    <div class="mb-3">
        <form action="{{ url('/constantes') }}" method="get">
            <button type="submit" class="btn btn-secondary">Restablecer</button>
        </form>
    </div>

    Results: {{$constantes->count()}} 

    @if (! $constantes->isEmpty())
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fórmula</th>
                    <th scope="col">Tipo de PKa</th>
                    <th scope="col">Valor de Pk</th>
                    <th scope="col">Etiqueta</th>
                    <th scope="col">Ion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($constantes as $constante)
                    <tr>
                        <th scope="row">{{ $constante->id }}</th>
                        <td>{{ $constante->nombre }}</td>
                        <td><a href="{{ route('constantes.show', ['id' => $constante->id]) }}">
                            {{ $constante->formula }}</a>
                        </td>
                        <td>{{ $constante->tipo_pka }}</a></td>
                        <td>{{ $constante->valor_pk }}</td>
                        <td>{{ $constante->etiqueta }}</td>
                        <td>{{ $constante->ion }}</td>    
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay constantes registradas.</p>
    @endif

@endsection