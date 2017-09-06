@extends('backLayout.app')

@section('content')
<div class="container">
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
                <h3 class="card-title">TUXTLA GUTIÉRREZ</h3>

                <a href="#" class="btn btn-block btn-lg btn-warning">{{ $tuxtla->count() }}</a>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card">
          <div class="card-block">
            <h3 class="card-title">SAN CRISTOBAL</h3>
            <a href="#" class="btn btn-block btn-lg btn-warning">{{ $sc->count() }}</a>
        </div>
    </div>
</div>
<div class="col-sm-3">
        <div class="card">
          <div class="card-block">
            <h3 class="card-title">TABASCO</h3>
            <a href="#" class="btn btn-block btn-lg btn-warning">{{ $tabasco->count() }}</a>
        </div>
    </div>
</div>
<div class="col-sm-3">
        <div class="card">
          <div class="card-block">
            <h3 class="card-title">TLAXCALA</h3>
            <a href="#" class="btn btn-block btn-lg btn-warning">{{ $tlaxcala->count() }}</a>
        </div>
    </div>
</div>
<div class="col-sm-3">
        <div class="card">
          <div class="card-block">
            <h3 class="card-title">QUERETARO</h3>
            <a href="#" class="btn btn-block btn-lg btn-warning">{{ $queretaro->count() }}</a>
        </div>
    </div>
</div>
<div class="col-sm-3">
        <div class="card">
          <div class="card-block">
            <h3 class="card-title">TULA</h3>
            <a href="#" class="btn btn-block btn-lg btn-warning">{{ $tula->count() }}</a>
        </div>
    </div>
</div>
<div class="col-sm-3">
        <div class="card">
          <div class="card-block">
            <h3 class="card-title">MISANTLA</h3>
            <a href="#" class="btn btn-block btn-lg btn-warning">{{ $misantla->count() }}</a>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection
