@extends('backLayout.app')

@section('content')
<div class="container-fluid">
  @php
  $archives = App\Archive::all();
  $tuxtla = $archives->where('brach', 'TUXTLA');
  $sc = $archives->where('brach', 'SAN CRISTOBAL DE LAS CASAS');
  $tabasco = $archives->where('brach', 'TABASCO');
  $tlaxcala = $archives->where('brach', 'TLAXCALA');
  $queretaro = $archives->where('brach', 'QUERETARO');
  $tula = $archives->where('brach', 'TULA DE ALLENDE');
  $misantla = $archives->where('brach', 'MISANTLA');
  @endphp
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">INICIO</div>

        <div class="panel-body">
          @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
          @endif
          <!--<img src="{{ asset('/img/avanza.png') }}" class="img-responsive" alt="">-->
          <h3>TOTAL DE EXPEDIENTES: {{ $archives->count() }}</h3>
        </div>

      </div>
    </div>
    <div class="row">
      <div class="col-sm-3">
        <div class="card">
          <div class="card-block">
            <h3 class="card-title">FINAFIM</h3>

            <a href="#" class="btn btn-block btn-lg btn-warning">{{ number_format(1283) }}</a>
          </div>
        </div>
      </div>
       <div class="col-sm-3">
        <div class="card">
          <div class="card-block">
            <h3 class="card-title">FOMMUR</h3>

            <a href="#" class="btn btn-block btn-lg btn-info">{{ number_format(1402) }}</a>
          </div>
        </div>
      </div>
       <div class="col-sm-3">
        <div class="card">
          <div class="card-block">
            <h3 class="card-title">ABC CAPITAL LINEA 1</h3>

            <a href="#" class="btn btn-block btn-lg btn-success">{{ number_format(327) }}</a>
          </div>
        </div>
      </div>
        <div class="col-sm-3">
        <div class="card">
          <div class="card-block">
            <h3 class="card-title">ABC CAPITAL LINEA 2</h3>

            <a href="#" class="btn btn-block btn-lg btn-primary">{{ number_format(557) }}</a>
          </div>
        </div>
      </div>
    </div>
   {{--  <div class="row">
      <div class="col-sm-3">
        <div class="card">
          <div class="card-block">
            <h3 class="card-title">TUXTLA GUTIÉRREZ</h3>

            <a href="#" class="btn btn-block btn-lg btn-success">{{ $tuxtla->count() }}</a>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="card">
          <div class="card-block">
            <h3 class="card-title">SAN CRISTOBAL</h3>
            <a href="#" class="btn btn-block btn-lg btn-success">{{ $sc->count() }}</a>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="card">
          <div class="card-block">
            <h3 class="card-title">TABASCO</h3>
            <a href="#" class="btn btn-block btn-lg btn-success">{{ $tabasco->count() }}</a>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="card">
          <div class="card-block">
            <h3 class="card-title">TLAXCALA</h3>
            <a href="#" class="btn btn-block btn-lg btn-success">{{ $tlaxcala->count() }}</a>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="card">
          <div class="card-block">
            <h3 class="card-title">QUERETARO</h3>
            <a href="#" class="btn btn-block btn-lg btn-success">{{ $queretaro->count() }}</a>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="card">
          <div class="card-block">
            <h3 class="card-title">TULA</h3>
            <a href="#" class="btn btn-block btn-lg btn-success">{{ $tula->count() }}</a>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="card">
          <div class="card-block">
            <h3 class="card-title">MISANTLA</h3>
            <a href="#" class="btn btn-block btn-lg btn-success">{{ $misantla->count() }}</a>
          </div>
        </div>
      </div>
    </div> --}}
  </div>
  <hr>
  <div class="row">
    @php
    $now = Carbon\Carbon::today()->toDateString();
    $collection = App\Archive::all();
    $archives = $collection->where('status', 'ASIGNADO');

    $collection2 = App\Assign::all();
    $assigns = $collection2->where('return_date', $now);

    @endphp
    <div class="col-md-6">
      EXPEDIENTES ASIGNADOS
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
          <thead>
            <tr>
              <th>ID CLIENTE</th> 
              <th>ID CRÉDITO</th>
              <th>NOMBRE A QUIEN SE ASIGNO</th>
              <th>MOTIVO</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($archives as $archive)
            <tr class="info">
              <td><a href="{{ url('admin/archives', $archive->id) }}">{{ $archive->client_id }}</a></td>
              <td>{{ $archive->credit_id }}</td>
              <td>{{ $archive->assign['name'] }}</td>
              <td>{{ $archive->assign['reason'] }}</td>
            </tr>
            @endforeach
          </tbody>    
        </table>
      </div>
    </div>
    <div class="col-md-6">
      EXPEDIENTES PARA RECEPCIÓN EN FECHA <strong>[{{ $now }}]</strong> 
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
          <thead>
            <tr>
              <th>ID CLIENTE</th> 
              <th>ID CRÉDITO</th>
              <th>NOMBRE A QUIEN SE ASIGNO</th>
              <th>MOTIVO</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($assigns as $assign)
            <tr class="success">
              <td><a href="{{ url('admin/archives', $assign->archive['id']) }}">{{ $assign->archive['client_id'] }}</a></td>
              <td>{{ $assign->archive['credit_id'] }}</td>
              <td>{{ $assign->name }}</td>
              <td>{{ $assign->reason }}</td>
            </tr>
            @endforeach
          </tbody>    
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
