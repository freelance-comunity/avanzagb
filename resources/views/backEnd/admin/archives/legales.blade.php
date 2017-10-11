@extends('backLayout.app')
@section('title')
EXPEDIENTES
@stop

@section('content')
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
@include('backEnd.admin.archives.charge_excel')
<h1>Expedientes Legales <div class="btn-group"><a href="{{ url('admin/archives/create') }}" class="btn btn-primary pull-right btn-sm">CREAR NUEVO</a> <a data-toggle="modal" data-target="#charge_excel" class="btn btn-info pull-right btn-sm"><i class="fa fa-file-excel-o" aria-hidden="true"></i> CARGAR EXCEL</a></div> </h1>
{{-- <form class="form-inline">
    <div class="form-group">
      <label for="fromdate">&emsp;FONDEADOR : </label>
      <select id="table-filter" class="form-control">
        <option value="">TODOS</option>
        <option>FINAFIM</option>
        <option>FOMMUR</option>
        <option>ABC CAPITAL LINEA 1</option>
        <option>ABC CAPITAL LINEA 2</option>
    </select>
</div>    
</form>  --}}
<div class="table table-responsive">
    <table class="table table-inverse" id="archiveslegales">
        <thead>
            <tr class="bg-success">
                <th>NO. EXPEDIENTE</th><th>ID CLIENTE</th><th>ID CRÉDITO</th><th>GRUPO</th><th>ESTATUS</th><th>FONDEADOR</th><th>SUCURSAL</th><th>ACCIÓN</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>NO. EXPEDIENTE</th><th>ID CLIENTE</th><th>ID CRÉDITO</th><th>GRUPO</th><th>ESTATUS</th><th>FONDEADOR</th><th>SUCURSAL</th><th>ACCIÓN</th>
            </tr>
        </tfoot>
    </table>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('#archiveslegales').DataTable({
           "processing": true,
           "serverSide": true,
           "ajax": "{{ url('api/legales') }}",
           "columns":[
           {data: 'id', name: 'id'},
           {data: 'client_id', name: 'client_id' },
           {data: 'credit_id', name: 'credit_id'},
           {data: 'group', name: 'group'},
           {data: 'status', name: 'status'},
           {data: 'source_of_funding', name: 'source_of_funding'},
           {data: 'brach', name: 'brach'},
           {data: 'actions', name: 'actions', orderable: false, searchable: false},
           ],
           "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
          },
          columnDefs: [{
            targets: [0],
            visible: false,
            searchable: true,
        },
        ],
        order: [[0, "asc"]],
    });
    });
</script>
@endsection