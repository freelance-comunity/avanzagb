@extends('backLayout.app')
@section('title')
EXPEDIENTES
@stop

@section('content')
@include('backEnd.admin.archives.charge_excel')
<h1>Expedientes <div class="btn-group"><a href="{{ url('admin/archives/create') }}" class="btn btn-primary pull-right btn-sm">CREAR NUEVO</a> <a data-toggle="modal" data-target="#charge_excel" class="btn btn-info pull-right btn-sm"><i class="fa fa-file-excel-o" aria-hidden="true"></i> CARGAR EXCEL</a></div> </h1>
<div class="table table-responsive">
    <table class="table table-bordered table-striped table-hover" id="archives">
        <thead>
            <tr>
                <th>ID</th><th>ID CRÉDITO</th><th>ID CLIENTE</th><th>GRUPO</th><th>ESTATUS</th><th>ACCIÓN</th>
            </tr>
        </thead>
        <tbody>
            @foreach($archives as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td><a href="{{ url('admin/archives', $item->id) }}">{{ $item->credit_id }}</a></td><td>{{ $item->client_id }}</td><td>{{ $item->group }}</td><td>{{ $item->status }}</td>
                <td>
                    <a href="{{ url('admin/archives/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">ACTUALIZAR</a> 
                    {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['admin/archives', $item->id],
                        'style' => 'display:inline'
                        ]) !!}
                        {!! Form::submit('ELIMINAR', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/archives', $item->id],
                            'style' => 'display:inline'
                            ]) !!}
                            {!! Form::submit('ASIGNAR', ['class' => 'btn btn-warning btn-xs']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @endsection

        @section('scripts')
        <script type="text/javascript">
            $(document).ready(function(){
                $('#archives').DataTable({
                    "language": {
                      "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                  },
                  columnDefs: [{
                    targets: [0],
                    visible: false,
                    searchable: false
                },
                ],
                order: [[0, "asc"]],
            });
            });
        </script>
        @endsection