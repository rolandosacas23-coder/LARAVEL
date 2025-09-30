@extends('plantilla_carpeta.madre_plantilla')
@section('titulo','Ver Evento')
@section('contenido')



<h1>Ver Evento Existente</h1>

<table class="table" class="pagination">
    <thead class="thead-light">
      <tr>
        <th scope="col">Datos</th>
        <th scope="col">Informacion</th>
      </tr>
    </thead>

        
    <tbody>
    <tr>
            <th scope="row">Id del Evento:</th>
            <td>{{ $evento->id }}</td>
          </tr>
        <tr>
            <th scope="row">Titulo del Evento:</th>
            <td>{{ $evento->titulo }}</td>
          </tr>
        <tr>
            <th scope="row">Descripcion Del Evento: </th>
            <td>{{ $evento->descripcion }}</td>
        </tr>
        <tr>
            <th scope="row">Fecha De Inicio Del Evento:</th>
            <td>{{ $evento->fecha_inicio }}</td>
        </tr>
        <tr>
            <th scope="row">Fecha Final Del Evento:</th>
            <td>{{ $evento->fecha_fin }}</td>
        </tr>
        <tr>
            <th scope="row">id Contacto:</th>
            <td>{{ $evento->contacto_id }}</td>
        </tr>
       
    </tbody>

  </table>
  <a class="btn btn-primary" href="{{ route('evento.index') }}">Regresar</a>
  <br>
  <br>
@endsection