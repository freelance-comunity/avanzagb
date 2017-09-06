@extends('backLayout.app')
@section('title')
CREAR NUEVO EXPEDIENTE
@stop

@section('content')

<h1>CREAR EXPEDIENTE</h1>
<hr/>

{!! Form::open(['url' => 'admin/archives', 'class' => 'form-horizontal']) !!}

<div class="form-group {{ $errors->has('credit_id') ? 'has-error' : ''}}">
    {!! Form::label('credit_id', 'ID CRÉDITO: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('credit_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('credit_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('client_id') ? 'has-error' : ''}}">
    {!! Form::label('client_id', 'ID CLIENTE: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('client_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('client_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('group') ? 'has-error' : ''}}">
    {!! Form::label('group', 'GRUPO: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('group', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('group', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('product') ? 'has-error' : ''}}">
    {!! Form::label('product', 'PRODUCTO: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('product', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('product', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('client') ? 'has-error' : ''}}">
    {!! Form::label('client', 'NOMBRE CLIENTE: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('client', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('client', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('start_date') ? 'has-error' : ''}}">
    {!! Form::label('start_date', 'FECHA DE INICIO: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::date('start_date', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('start_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('brach') ? 'has-error' : ''}}">
    {!! Form::label('brach', 'SUCURSAL: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('brach', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('brach', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('source_of_funding') ? 'has-error' : ''}}">
    {!! Form::label('source_of_funding', 'FUENTE DE FONDEO: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('source_of_funding', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('source_of_funding', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
        {!! Form::submit('CREAR', ['class' => 'btn btn-primary form-control']) !!}
    </div>
</div>
{!! Form::close() !!}

@if ($errors->any())
<ul class="alert alert-danger">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

@endsection