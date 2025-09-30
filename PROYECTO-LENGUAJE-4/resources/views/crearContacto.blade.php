@extends('plantilla_carpeta.madre_plantilla')
@section('titulo','Crear_contacto')
@section('contenido')

<h1>Crear Un Nuevo Contacto </h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form  method="POST" action="{{ isset($contacto_form) ? route("contacto.update", ["contacto_form"=> $contacto_form->id]): route("contacto.guardar") }}">

        @csrf
        @if(isset($contacto_form))
            @method('put')
        @endif
        <br>
    <div class="form-group">
        <label for="Nombre">Nombre</label>
        <input type="text" class="form-control" name="nombreC"  id="nombreC" placeholder="Ingrese El Nombre Del Contacto"  >
      </div>
      <br>
      <div class="form-group">
        <label for="Apellido">Apellido</label>
        <input type="text" class="form-control" name="apellidoC"  id="apellidoC" placeholder="Ingrese El Apellido Del Contacto" >
      </div>
      <br>
      <div class="form-group">
        <label for="Correo">Correo Electronico</label>
        <input type="email" class="form-control" name="correoC"  id="correoC" placeholder="Ingrese un Correo Electronico" >
      </div>
      <br>
      <div class="form-group">
        <label for="existencia">telefono</label>
        <input type="text" class="form-control" name="telefonoC"  id="telefonoC" placeholder="Ingrese un Numero Telefonico"  >
      </div>
      <br>
      <button class="btn btn-primary" type="submit">Registrar Contacto</button>
      <input class="btn btn-danger" type="reset" value="Borrar">

  
      <a class="btn btn-primary" href="{{ route('contacto.index') }}">Volver</a>

</form>
<br>
<br>
@endsection