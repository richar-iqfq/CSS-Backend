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
                    Etiquetas: <input type="text" class="form-control" name="etiquetas" id="etiquetas" placeholder="ácido débil, catión" value="{{$filters_applied['etiquetas']}}">
                </div>
            </div>

            Tipo de pka:
            <select name="tipo" class="form-control">
                <option value="All" {{($filters_applied['tipo']=='All')?'selected':''}}>All</option>
                <option value="Ka" {{($filters_applied['tipo']=='Ka')?'selected':''}}>Ka</option>
                <option value="Kb" {{($filters_applied['tipo']=='Kb')?'selected':''}}>Kb</option>
            </select>
            <br/>

            Etapa de disociación:
            <select name="paso" class="form-control">
                <option value='All' {{($filters_applied['paso']=='All')?'selected':''}}>All</option>
                <option value=1 {{($filters_applied['paso']==1)?'selected':''}}>1</option>
                <option value=2 {{($filters_applied['paso']==2)?'selected':''}}>2</option>
                <option value=3 {{($filters_applied['paso']==3)?'selected':''}}>3</option>
                <option value=4 {{($filters_applied['paso']==4)?'selected':''}}>4</option>
            </select>
            <br/>

            Autor:
            <select name="referencia" class="form-control">
                <option value='All' {{($filters_applied['referencia']=='All')?'selected':''}}>All</option>
                <option value=1 {{($filters_applied['referencia']==1)?'selected':''}}>Chang, R.</option>
                <option value=2 {{($filters_applied['referencia']==2)?'selected':''}}>Skoog, D.</option>
                <option value=3 {{($filters_applied['referencia']==3)?'selected':''}}>Speight, J.</option>
                <option value=4 {{($filters_applied['referencia']==4)?'selected':''}}>Montuenga, C.</option>
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

    Results: {{$especies->count()}} 

    @if (! $especies->isEmpty())
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fórmula</th>
                    <th scope="col">Clase Ácido</th>
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