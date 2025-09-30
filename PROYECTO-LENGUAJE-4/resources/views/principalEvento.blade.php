@extends('plantilla_carpeta.madre_plantilla')
@section('titulo','Eventos')
@section('contenido')

@if (session('mensaje'))
<div class="alert alert-success">
    {{session('mensaje')}}
</div>
@endif



<div class="container">
   
    <div class="row" ALIGN="right"> 
      <h5>Buscar Evento</h5>
      <div class="col-xl-12" ALIGN="right">
        <form action="{{ route('evento.index')}}" method="get">
          <div class="form-row">
            <div class="col-sm-4">
              <input type="text" class="form-control" name="buscarDato" value="{{$textoBuscar}}">
            </div>
            <div class="col-auto">
              <br>
              <input type="submit" class="btn btn-primary" value="Buscar">
              <a class="btn btn-warning" href="{{ route('evento.index') }}">Volver</a>
            </div>
          </div>
        </form>
      </div>
      <div class="col-xl-12">
      </div>
    </div>
  </div>
  <br>

  <h1><strong> Lista De Eventos</strong></h1> 

<a class="btn btn-outline-dark" href="{{ route('evento.create') }}"><strong> Agregar Un Evento </strong></a>
<br>
<br>
<table class="table table-dark" >

<thead >
<tr>
    <th scope="col">Id Evento</th>
    <th scope="col">Titulo Del Evento</th>
    <th scope="col">Descripcion  Del Evento </th>
    <th Scope="col"> Fecha inicio  Del Evento</th>
    <th scope="col"> Fecha Fin  Del Evento</th>
    <th scope="col"> contacto_id</th>
    <th scope="col">Eliminar</th>
    <th scope="col">Editar</th>
    <th scope="col">Ver</th>
</tr>

<tbody>
    @forelse($eventos_cont as $evento_vista)
    <tr> 
        <th scope="row">{{ $evento_vista->id }} </th>
        <td> {{ $evento_vista->titulo }}</td>
        <td> {{ $evento_vista->descripcion }}</td>
        <td> {{ $evento_vista->fecha_inicio }}</td>
        <td> {{ $evento_vista->fecha_fin }}</td>
     <td> {{ $evento_vista->contacto_id}}</td>  
  
        <td>
                <form method="POST" action="{{ route('evento.borrar', ['id'=>$evento_vista->id]) }}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Eliminar" class="btn btn-danger">
                </form>
            </td>
        <td> <a class="btn btn-warning" href="{{route('evento.edit',['id'=>$evento_vista->id])}}  ">Editar</a></td>
        <td> <a class="btn btn-light" href="{{route('evento.show',['id'=>$evento_vista->id])}}">Ver</a></td>
       
    </tr>
    @empty
    <tr>
        <td colspan="4">No Hay Eventos Registrados</td>
    </tr>
    @endforelse

</tbody>
</thead>
</table>
{{$eventos_cont->render('pagination::bootstrap-4')}}
@endsection