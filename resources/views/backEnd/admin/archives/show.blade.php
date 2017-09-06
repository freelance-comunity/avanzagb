@extends('backLayout.app')
@section('title')
EXPEDIENTE
@stop

@section('content')

<h1>EXPEDIENTE</h1>
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th> <th>ID CRÉDITO</th><th>ID CLIENTE</th><th>GRUPO</th><th>NOMBRE CLIENTE</th><th>FECHA DE INICIO</th><th>SUCURSAL</th><th>FUENTE DE FONDEO</th><th>ESTATUS</th><th>ARCHIVERO</th>
                <th>CAJÓN</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $archive->id }}</td> <td> {{ $archive->credit_id }} </td><td> {{ $archive->client_id }} </td><td> {{ $archive->group }} </td><td>{{ $archive->client }}</td><td>{{ $archive->start_date }}</td><td>{{ $archive->brach }}</td><td>{{ $archive->source_of_funding }}</td><td>{{ $archive->status }}</td><td>{{ $archive->archivist }}</td>
                <td>{{ $archive->drawer }}</td>
            </tr>
        </tbody>    
    </table>
</div>

@endsection