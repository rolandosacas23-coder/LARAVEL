@extends('plantilla_carpeta.madre_plantilla')
@section('titulo','Actualizar Evento')
@section('contenido')

<h1>Actualizar Evento</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form  method="POST" action="{{ route('evento.update',['id'=>$eventoE->id])}}">
      
        @csrf
            @method('put')
        
        <br>
    <div class="form-group">
        <label for="titulo">Titulo</label>
        <input type="text" class="form-control" name="tituloE"  id="nombreC" placeholder="Ingrese El Nuevo Titulo" value="{{$eventoE->titulo}}" >
      </div>
      
      <br>

      <div class="form-group">
        <label for="Descripcion">Descripcion</label>
        <input type="text" class="form-control" name="descripcionE"  id="descripcionE" placeholder="Ingrese La Nueva Descripcion Del Evento:" value="{{$eventoE->descripcion}}">
      </div>
      
      <br>
      
      <div class="form-group">
        <label for="fecha_inicioE">Fecha Inicio</label>
        <input type="text" class="form-control" name="fecha_inicioE"  id="fecha_inicioE" placeholder="Ingrese La Nueva Fecha de Inicio |Ejemplo 1998-05-16 08:18:00:" value="{{$eventoE->fecha_inicio}}">
      </div>
      
      <br>
      
      <div class="form-group">
        <label for="fecha_finE">Fecha Final</label>
        <input type="text" class="form-control" name="fecha_finE"  id="fecha_finE" placeholder="Ingrese La Nueva  Fecha final |Ejemplo 1998-05-16 08:18:00:" value="{{$eventoE->fecha_fin}}">
      </div>
      
      <br>
      <div class="form-group">
        <label for="contacto_id">Ingrese Id Contacto</label>
        <input type="text" class="form-control" name="contacto_id"  id="contacto_id" placeholder="Ingrese el Id Del Contacto" value="{{$eventoE->contacto_id}} ">
      </div>
   
<br>
<br>


<button class="btn btn-primary" type="submit">Registrar Evento</button>

      <input class="btn btn-danger" type="reset" value="Borrar">

  
      <a class="btn btn-primary" href="{{ route('contacto.index') }}">Volver</a>

</form>
<br>
<br>
@endsection