@extends('plantilla_carpeta.madre_plantilla')
@section('titulo','Ver Nota')
@section('contenido')



<h1>Ver Nota Existente</h1>

<table class="table" class="pagination">
    <thead class="thead-light">
      <tr>
        <th scope="col">Datos</th>
        <th scope="col">Informacion</th>
      </tr>
    </thead>

        
    <tbody>
    <tr>
            <th scope="row">Id de la nota:</th>
            <td>{{ $nota->id }}</td>
          </tr>
        <tr>
            <th scope="row">Titulo de la Nota:</th>
            <td>{{ $nota->texto }}</td>
          </tr>
        <tr>
            <th scope="row">Descripcion De la Nota: </th>
            <td>{{ $nota->fecha }}</td>
        </tr>
        <tr>
            <th scope="row">id Contacto:</th>
            <td>{{ $nota->contacto_id }}</td>
        </tr>
      
    </tbody>

  </table>
  <a class="btn btn-primary" href="{{ route('nota.index') }}">Regresar</a>
  <br>
  <br>
@endsection