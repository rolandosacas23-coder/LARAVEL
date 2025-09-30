@extends('plantilla_carpeta.madre_plantilla')
@section('titulo','Actualizar Evento')
@section('contenido')

<h1>Actualizar Nota</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form  method="POST" action="{{ route('nota.update',['id'=>$notaE->id])}}">
      
        @csrf
            @method('put')
        
        <br>
    <div class="form-group">
        <label for="titulo">Nombre Nota</label>
        <input type="text" class="form-control" name="nombreE"  id="nombreE" placeholder="Ingrese El Nuevo Nombre de la Nota:" value="{{$notaE->texto}}" >
      </div>
      
      <br>

      <div class="form-group">
        <label for="Descripcion">Descripcion</label>
        <input type="text" class="form-control" name="fechaE"  id="fechaE" placeholder="Ingrese La nueva Fecha de la Nota |Ejemplo 2000-03-27 17:34:05:" value="{{$notaE->fecha}}">
      </div>
      
      <br>
      
      
     
      
      <br>
      <div class="form-group">
        <label for="contacto_id">Ingrese Id Contacto</label>
        <input type="text" class="form-control" name="contacto_id"  id="contacto_id" placeholder="Ingrese el nuevo Id Del Contacto" value="{{$notaE->contacto_id}} ">
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