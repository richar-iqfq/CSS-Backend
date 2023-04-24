@extends('layouts.app')

@section('title', 'Search')

@section('content')
    <h1>Search</h1>
    <br/>

    <div>
        <form action="{{ url('/constants') }}" method="post">
            {{ csrf_field() }}
    
            <label>
                Name: <input type="text" name="substring" id="substring" placeholder="methane" value="{{$filters_applied['substring']}}">
            </label>
            <br/>
            <label>
                Entry: <input type="text" name="entry" id="entry" placeholder="1" value="{{$filters_applied['entry']}}">
            </label>
            <br/>
            <label>Assesment: </label>
            
            <input type="checkbox" name="assessment[]" value="Uncertain" {{ (in_array('Uncertain', $filters_applied['assessment']))?'checked':''}}> Uncertain
            <input type="checkbox" name="assessment[]" value="Approximate" {{ (in_array('Approximate', $filters_applied['assessment']))?'checked':''}}> Approximate
            <input type="checkbox" name="assessment[]" value="Reliable"  {{ (in_array('Reliable', $filters_applied['assessment']))?'checked':''}}> Reliable
            <br/>
            
            <label>PKa Type:</label>
            <select name="pka_type">
                <option value="All" {{($filters_applied['pka_type']=='All')?'selected':''}}>All</option>
                <option value="pKB" {{($filters_applied['pka_type']=='pKB')?'selected':''}}>pKB</option>
                <option value="pKAH1" {{($filters_applied['pka_type']=='pKAH1')?'selected':''}}>pKAH1</option>
                <option value="pKAH2" {{($filters_applied['pka_type']=='pKAH2')?'selected':''}}>pKAH2</option>
                <option value="pKAH3" {{($filters_applied['pka_type']=='pKAH3')?'selected':''}}>pKAH3</option>
                <option value="pKAH4" {{($filters_applied['pka_type']=='pKAH4')?'selected':''}}>pKAH4</option>
                <option value="pKAH5" {{($filters_applied['pka_type']=='pKAH5')?'selected':''}}>pKAH5</option>
                <option value="pKAH6" {{($filters_applied['pka_type']=='pKAH6')?'selected':''}}>pKAH6</option>
                <option value="pK1" {{($filters_applied['pka_type']=='pK1')?'selected':''}}>pK1</option>
                <option value="pK2" {{($filters_applied['pka_type']=='pK2')?'selected':''}}>pK2</option>
                <option value="pK3" {{($filters_applied['pka_type']=='pK3')?'selected':''}}>pK3</option>
                <option value="pK4" {{($filters_applied['pka_type']=='pK4')?'selected':''}}>pK4</option>
                <option value="pK5" {{($filters_applied['pka_type']=='pK5')?'selected':''}}>pK5</option>
                <option value="pK6" {{($filters_applied['pka_type']=='pK6')?'selected':''}}>pK6</option>
                <option value="pK7" {{($filters_applied['pka_type']=='pK7')?'selected':''}}>pK7</option>
                <option value="pK8" {{($filters_applied['pka_type']=='pK8')?'selected':''}}>pK8</option>
            </select>
            <br/>
            <button type="submit">Filtrar</button>
        </form>

        <form action="/constants" method="get">
            <button type="submit">Restore</button>
        </form>
        <br>
    </div>

    <div>
        Results: {{$constants->count()}}
    </div>
    <br/>

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