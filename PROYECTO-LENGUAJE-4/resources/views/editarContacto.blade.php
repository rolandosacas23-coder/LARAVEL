@extends('plantilla_carpeta.madre_plantilla')
@section('titulo','Actualizar contacto')
@section('contenido')

<h1>Actualizar Contactos</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form  method="POST" action="{{ route('contacto.update',['id'=>$contactoE->id])}}">
      
        @csrf
            @method('put')
        
        <br>
    <div class="form-group">
        <label for="descripcion">Nombre</label>
        <input type="text" class="form-control" name="nombreC"  id="nombreC" placeholder="Ingrese El Nombre Del Contacto" value="{{$contactoE->nombre}}" >
      </div>
      
      <br>

      <div class="form-group">
        <label for="precio">Apellido</label>
        <input type="text" class="form-control" name="apellidoC"  id="apellidoC" placeholder="Ingrese El Apellido Del Contacto" value="{{$contactoE->apellido}}">
      </div>
      
      <br>
      
      <div class="form-group">
        <label for="existencia">Correo Electronico</label>
        <input type="text" class="form-control" name="correoC"  id="correoC" placeholder="Ingrese un Correo Electronico" value="{{$contactoE->correo_electronico}}">
      </div>
      
      <br>
      
      <div class="form-group">
        <label for="existencia">Telefono</label>
        <input type="text" class="form-control" name="telefonoC"  id="telefonoC" placeholder="Ingrese un Numero Telefonico" value="{{$contactoE->telefono}}">
      </div>
      
      <br>
      
      <button class="btn btn-primary" type="submit">Registrar Contacto</button>
      <input class="btn btn-danger" type="reset" value="Borrar">

  
      <a class="btn btn-primary" href="{{ route('contacto.index') }}">Volver</a>

</form>
<br>
<br>
@endsection