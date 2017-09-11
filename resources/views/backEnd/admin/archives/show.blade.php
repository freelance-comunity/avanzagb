@extends('backLayout.app')
@section('title')
EXPEDIENTE
@stop

@section('content')
@php
$assign = $archive->assign;
@endphp
@include('backEnd.admin.archives.file')
@include('backEnd.admin.archives.assign')
@include('backEnd.admin.archives.assign_details')
@include('backEnd.admin.archives.guard')
<h1>EXPEDIENTE</h1>
@if(session()->has('message'))
<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  {{ session()->get('message') }}
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<div class="table-responsive">
 <table class="table table-bordered table-striped table-hover">
  <thead>
    <tr>
      <th>EXPEDIENTE DIGITAL</th>
      <th>ASIGNAR</th>
      <th>EDITAR</th>
      <th>ELIMINAR</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     <td>
       @if ($archive->file == 'example.pdf')
       <a data-toggle="modal" data-target="#file_{{ $archive->id }}" class="btn btn-info btn-xs"><i class="fa fa-upload fa-3x"></i></a>
       @else
       <h3>Archivo ya existente</h3>
       @endif
     </td>
     <td>
       @if ($archive->status == "EN RESGUARDO")
       <a data-toggle="modal" data-target="#assign_{{ $archive->id }}" class="btn btn-info btn-xs"><i class="fa fa-folder-open fa-3x"></i></a>
       @elseif($archive->status = "ASIGNADO")
       <a data-toggle="modal" data-target="#assign_details_{{ $archive->id }}" class="btn btn-info btn-xs">VER ASIGNACIÓN</a>
       <a data-toggle="modal" data-target="#guard_{{ $archive->id }}" class="btn btn-success btn-xs">RESGUARDAR</a>
       @endif
     </td>
     <td>
       <a href="{{ url('admin/archives/' . $archive->id . '/edit') }}" class="btn btn-default btn-xs">ACTUALIZAR</a>
     </td>
     <td>
       {!! Form::open([
        'method'=>'DELETE',
        'url' => ['admin/archives', $archive->id],
        'style' => 'display:inline'
        ]) !!}
        {!! Form::submit('ELIMINAR', ['class' => 'btn btn-danger btn-xs']) !!}
        {!! Form::close() !!}
      </td>
    </tr>
  </tbody>    
</table>
</div>
<div class="table-responsive">
  <table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>ID CRÉDITO</th>
        <th>ID CLIENTE</th>
        <th>GRUPO</th>
        <th>NOMBRE CLIENTE</th>
        <th>FECHA DE INICIO</th>
        <th>SUCURSAL</th>
        <th>FUENTE DE FONDEO</th>
        <th>ESTATUS</th>
        <th>ARCHIVERO</th>
        <th>CAJÓN</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{ $archive->id }}</td>
        <td>{{ $archive->credit_id }} </td>
        <td>{{ $archive->client_id }} </td>
        <td>{{ $archive->group }} </td>
        <td>{{ $archive->client }}</td>
        <td>{{ $archive->start_date }}</td>
        <td>{{ $archive->brach }}</td>
        <td>{{ $archive->source_of_funding }}</td>
        <td>{{ $archive->status }}</td> 
        <td>{{ $archive->archivist }}</td>
        <td>{{ $archive->drawer }}</td>
      </tr>
    </tbody>    
  </table>
  @if ($archive->file == 'example.pdf')
  <h3>Expediente digital no disponible.</h3>
  @else
  <embed src="{{ asset('/uploads/documents/') }}/{{ $archive->file }}" width="100%" height="500" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">
    @endif
  </div>

  @endsection