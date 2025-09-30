@extends('plantilla_carpeta.madre_plantilla')
@section('titulo','Crear Evento')
@section('contenido')

<h1>Crear Un Nuevo Evento: </h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form  method="POST" action="{{ isset($evento_form) ? route("evento.update", ["evento_form"=> $evento_form->id]): route("evento.guardar") }}">

        @csrf
        @if(isset($evento_form))
            @method('put')
        @endif
        <br>
    <div class="form-group">
        <label for="Titulo">Titulo</label>
        <input type="text" class="form-control" name="tituloE"  id="tituloE" placeholder="Ingrese El Titulo:"  >
      </div>
      <br>
      <div class="form-group">
        <label for="Descripcion">Descripcion</label>
        <input type="text" class="form-control" name="descripcionE"  id="descripcionE" placeholder="Ingrese La Descripcion Del Evento:" >
      </div>
      <br>
      <div class="form-group">
        <label for="InicioF">Fecha de Inicio</label>
        <input type="text" class="form-control" name="fecha_inicioE"  id="fecha_inicioE" placeholder="Ingrese La Fecha de Inicio |Ejemplo 2000-03-27 17:34:05 :" >
      </div>
      <br>
      <div class="form-group">
        <label for="FinalF">Fecha de Final</label>
        <input type="text" class="form-control" name="fecha_finE"  id="fecha_finE" placeholder="Ingrese La Fecha de Inicio |Ejemplo 1998-05-16 08:18:00:"  >
      </div>
      <div class="form-group">
        <label for="contacto_id">Ingrese Id Contacto</label>
        <input type="text" class="form-control" name="contacto_id"  id="contacto_id" placeholder="Ingrese el Id Del Contacto"  >
      </div>
      <br>
      
      <button class="btn btn-primary" type="submit">Registrar Evento</button>
      <input class="btn btn-danger" type="reset" value="Borrar">

  
      <a class="btn btn-primary" href="{{ route('evento.index') }}">Regresar</a>

</form>
<br>
<br>
@endsection