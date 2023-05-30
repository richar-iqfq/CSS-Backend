<!-- Filters -->
<h1>Búsqueda</h1>

<div>
<form action="{{ url('/constantes') }}" method="post">
    {{ csrf_field() }}
    
    <div class="row">
        <div class="col">
            Nombre: <input type="text" class="form-control" name="substring" id="substring" placeholder="nitroso" value="{{$filters_applied['substring']}}">
        </div>
    </div>
    
    Clasificación:
    <select name="clase_acido" class="form-control">
        <option value="All" {{($filters_applied['clase_acido']=='All')?'selected':''}}>All</option>
        <option value=1 {{($filters_applied['clase_acido']==1)?'selected':''}}>ácido débil</option>
        <option value=2 {{($filters_applied['clase_acido']==2)?'selected':''}}>ácido fuerte</option>
        <option value=3 {{($filters_applied['clase_acido']==3)?'selected':''}}>base débil</option>
        <option value=4 {{($filters_applied['clase_acido']==4)?'selected':''}}>base fuerte</option>
    </select>

    Carga:
    <select name="clase_carga" class="form-control">
        <option value="All" {{($filters_applied['clase_carga']=='All')?'selected':''}}>All</option>
        <option value=1 {{($filters_applied['clase_carga']==1)?'selected':''}}>neutro</option>
        <option value=2 {{($filters_applied['clase_carga']==2)?'selected':''}}>anión</option>
        <option value=3 {{($filters_applied['clase_carga']==3)?'selected':''}}>catión</option>
    </select>

    Autor:
    <select name="autor" class="form-control">
        <option value="All" {{($filters_applied['autor']=='All')?'selected':''}}>All</option>
        <option value=1 {{($filters_applied['autor']==1)?'selected':''}}>Chang, R.</option>
        <option value=2 {{($filters_applied['autor']==2)?'selected':''}}>Skoog, D.</option>
        <option value=3 {{($filters_applied['autor']==3)?'selected':''}}>Speight, J.</option>
        <option value=4 {{($filters_applied['autor']==4)?'selected':''}}>Montuenga, C.</option>
    </select>

    <button type="submit" class="btn btn-secondary">Filtrar</button>
</form>
</div>
<br/>
<div class="mb-3">
    <form action="{{ url('/constantes') }}" method="get">
        <button type="submit" class="btn btn-secondary">Restablecer</button>
    </form>
</div>