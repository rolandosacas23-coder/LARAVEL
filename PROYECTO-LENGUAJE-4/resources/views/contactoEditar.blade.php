
@extends('plantilla_carpeta.madre_plantilla')
@section('titulo','Editar')
@section('contenido')

<h1>Editar Contacto</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form  method="post" action="{{ route('estudiante.update', ['id'=>$estudiante->id]) }}">
    @method('put')
    @csrf
    <div class="form-group">
        <label for="nombre">Nombre Del Contacto</label>
        <input type="text" class="form-control" name="nombre"  id="nombre" placeholder="Ingrese El Nombre Del Contacto" value="{{ $estudiante->nombre }}">
      </div>
      <div class="form-group">
        <label for="apellido">Apellido Del Contacto</label>
        <input type="text" class="form-control" name="apellido"  id="apellido" placeholder="Ingrese El Apellido Del Contacto" value="{{ $estudiante->apellido }}">
      </div>
      <div class="form-group">
        <label for="nota">Correo Electronico</label>
        <input type="number" class="form-control" name="nota"  id="nota" placeholder="Ingrese un Correo Electronico" value="{{ $estudiante->nota }}">
      </div>
      <div class="form-group">
        <label for="identidad">umero Telefonico</label>
        <input type="text" class="form-control" name="identidad"  id="identidad" placeholder="Ingrese un Numero Telefonico"  value="{{ $estudiante->identidad }}">
      </div>

      <button class="btn btn-primary" type="submit">Guardar</button>
      <input class="btn btn-danger" type="reset" value="Borrar">

</form>
@endsection
