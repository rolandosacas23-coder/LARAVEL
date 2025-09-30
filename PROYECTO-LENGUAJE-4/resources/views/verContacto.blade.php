@extends('plantilla_carpeta.madre_plantilla')
@section('titulo','Contacto')
@section('contenido')



<h1>Ver Contacto Existente</h1>

<table class="table" class="pagination">
    <thead class="thead-light">
      <tr>
        <th scope="col">Datos</th>
        <th scope="col">Informacion</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">Nombre Contacto</th>
            <td>{{ $contacto->nombre }}</td>
          </tr>
        <tr>
            <th scope="row">Apellido Contacto </th>
            <td>{{ $contacto->apellido }}</td>
        </tr>
        <tr>
            <th scope="row">Correo Electronico </th>
            <td>{{ $contacto->correo_electronico }}</td>
        </tr>
        <tr>
            <th scope="row">Telefono</th>
            <td>{{ $contacto->telefono }}</td>
        </tr>
    </tbody>

  </table>
  <a class="btn btn-primary" href="{{ route('contacto.index') }}">Volver</a>
  <br>
  <br>
@endsection