@extends('backLayout.app')
@section('title')
Archive
@stop

@section('content')

    <h1>Expedientes <a href="{{ url('admin/archives/create') }}" class="btn btn-primary pull-right btn-sm">Crear Nuevo</a></h1>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tbladmin/archives">
            <thead>
                <tr>
                    <th>ID</th><th>ID CRÉDITO</th><th>ID CLIENTE</th><th>GRUPO</th><th>ACCIÓN</th>
                </tr>
            </thead>
            <tbody>
            @foreach($archives as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="{{ url('admin/archives', $item->id) }}">{{ $item->credit_id }}</a></td><td>{{ $item->client_id }}</td><td>{{ $item->group }}</td>
                    <td>
                        <a href="{{ url('admin/archives/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">ACTUALIZAR</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/archives', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('ELIMINAR', ['class' => 'btn btn-danger btn-xs']) !!}
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
        $('#tbladmin/archives').DataTable({
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