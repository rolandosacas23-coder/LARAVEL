@extends('plantilla_carpeta.madre_plantilla')
@section('titulo','Crear Nota')
@section('contenido')

<h1>Crear Una Nueva Nota: </h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


      

<form  method="POST" action="{{ isset($nota_form) ? route("nota.update", ["nota_form"=> $nota_form->id]): route("nota.guardar") }}">

        @csrf
        @if(isset($nota_form))
            @method('put')
        @endif
        <br>
    <div class="form-group">
        <label for="textoN">Nombre Nota</label>
        <input type="text" class="form-control" name="textoN"  id="textoN" placeholder="Ingrese El Nombre de la Nota:"  >
      </div>
      <br>
      
      <div class="form-group">
        <label for="fechaN">Fecha de Inicio</label>
        <input type="text" class="form-control" name="fechaN"  id="fechaN" placeholder="Ingrese La Fecha de la Nota |Ejemplo 2000-03-27 17:34:05 :" >
      </div>
      <br>
     
      <div class="form-group">
        <label for="contacto_id">Ingrese Id Contacto</label>
        <input type="text" class="form-control" name="contacto_id"  id="contacto_id" placeholder="Ingrese el Id Del Contacto"  >
      </div>
      <br>
      
      <button class="btn btn-primary" type="submit">Registrar La Nota</button>
      <input class="btn btn-danger" type="reset" value="Borrar">

  
      <a class="btn btn-primary" href="{{ route('nota.index') }}">Regresar</a>

</form>
<br>
<br>
@endsection