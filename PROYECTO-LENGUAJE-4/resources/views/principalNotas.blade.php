@extends('plantilla_carpeta.madre_plantilla')
@section('titulo','Notas')
@section('contenido')

@if (session('mensaje'))
<div class="alert alert-success">
    {{session('mensaje')}}
</div>
@endif



<div class="container">
   
    <div class="row" ALIGN="right"> 
      <h5>Buscar Notas</h2>
      <div class="col-xl-12" ALIGN="right">
        <form action="{{ route('nota.index')}}" method="get">
          <div class="form-row">
            <div class="col-sm-4">
              <input type="text" class="form-control" name="buscarDato" value="{{$textoBuscar}}">
            </div>
            <div class="col-auto">
              <br>
              <input type="submit" class="btn btn-primary" value="Buscar">
              <a class="btn btn-warning" href="{{ route('nota.index') }}">Volver</a>
            </div>
          </div>
        </form>
      </div>
      <div class="col-xl-12">
      </div>
    </div>
  </div>
  <br>
  <h1><strong> Lista De Notas</strong></h1> 

<a class="btn btn-outline-dark" href="{{ route('nota.create') }}"><strong> Agregar Una Nota </strong></a>
<br>
<br>
<table class="table table-dark" >

<thead >
<tr>
    <th scope="col">Id Notas</th>
    <th scope="col">Descripcion De la Nota</th>
    <th Scope="col"> Fecha de la Nota</th>
    <th scope="col"> contacto_id</th>
    <th scope="col">Eliminar</th>
    <th scope="col">Editar</th>
    <th scope="col">Ver</th>
</tr>

<tbody>
    @forelse($notas_cont as $nota_vista)
    <tr> 
        <th scope="row">{{ $nota_vista->id }} </th>
        <td> {{ $nota_vista->texto }}</td>
        <td> {{ $nota_vista->fecha }}</td>
        <td> {{ $nota_vista->contacto_id }}</td>
      
        <td>
            <form method="POST" action="{{ route('nota.borrar', ['id'=>$nota_vista->id]) }}" >
                    @csrf
                    @method('delete')
                    <input type="submit" value="Eliminar" class="btn btn-danger">
                </form>
            </td>
            <td> <a class="btn btn-warning" href="{{route('nota.edit',['id'=>$nota_vista->id])}}  ">Editar</a></td>
        <td> <a class="btn btn-light" href="{{ route('nota.show',['id'=>$nota_vista->id ])}}">Ver</a></td>
       
    </tr>
    @empty
    <tr>
        <td colspan="4">No Hay Notas Registradas</td>
    </tr>
    @endforelse

</tbody>
</thead>
</table>
{{$notas_cont->render('pagination::bootstrap-4')}}
@endsection