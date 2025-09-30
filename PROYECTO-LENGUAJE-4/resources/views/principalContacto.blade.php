@extends('plantilla_carpeta.madre_plantilla')
@section('titulo','Contacto')
@section('contenido')

@if (session('mensaje'))
<div class="alert alert-success">
    {{session('mensaje')}}
</div>
@endif












<div class="container">

    <div class="row" ALIGN="right"> 
         <h5>Buscar Contactos</h5>
      <div class="col-xl-12" ALIGN="right">
        <form action="{{ route('contacto.index')}}" method="get">
          <div class="form-row">
            <div class="col-sm-4">
              <input type="text" class="form-control" name="buscarDato" value="{{$textoBuscar}}">
            </div>
            <div class="col-auto">
              <br>
              <input type="submit" class="btn btn-primary" value="Buscar">
              <a class="btn btn-warning" href="{{ route('contacto.index') }}">Volver</a>
            </div>
          </div>
        </form>
      </div>
      <div class="col-xl-12">
      </div>
    </div>
  </div>
  <br>
  
<h1><strong> Lista De Contactos</strong></h1> 

<a class="btn btn-outline-dark" href="{{ route('contacto.create') }}"><strong> Agregar Contacto</strong></a>
<br>
<br>
<table class="table table-dark" >

<thead >
<tr>
    <th scope="col">Id Contacto</th>
    <th scope="col">Nombre</th>
    <th scope="col">Apellido</th>
    <th Scope="col">Correo Electronico</th>
    <th scope="col">Telefono</th>
    <th scope="col">Eliminar</th>
    <th scope="col">Editar</th>
    <th scope="col">Ver</th>
</tr>



<tbody>
  
    @forelse($contactos_cont as $contacto_vista)
    <tr> 
        <th scope="row">{{ $contacto_vista->id }} </th>
        <td> {{ $contacto_vista->nombre }}</td>
        <td> {{ $contacto_vista->apellido }}</td>
        <td> {{ $contacto_vista->correo_electronico }}</td>
        <td> {{ $contacto_vista->telefono }}</td>
        <td>
                <form method="POST" action="{{ route('contacto.borrar', ['id'=>$contacto_vista->id]) }}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Eliminar" class="btn btn-danger">
                </form>
            </td>
        <td> <a class="btn btn-warning" href="{{route('contacto.edit',['id'=>$contacto_vista->id])}}  ">Editar</a></td>
        <td> <a class="btn btn-light" href="{{route('contacto.show',['id'=>$contacto_vista->id])}}">Ver</a></td>
       
    </tr>
    @empty
    <tr>
        <td colspan="4">No Hay Contactos Registrados</td>
    </tr>
    @endforelse

</tbody>
</thead>
</table>
{{$contactos_cont->render('pagination::bootstrap-4')}}
@endsection