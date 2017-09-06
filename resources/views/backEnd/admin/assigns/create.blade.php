@extends('backLayout.app')
@section('title')
Create new Assign
@stop

@section('content')

    <h1>Create New Assign</h1>
    <hr/>

    {!! Form::open(['url' => 'admin/assigns', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('reason') ? 'has-error' : ''}}">
                {!! Form::label('reason', 'Reason: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('reason', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('reason', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('date_assign') ? 'has-error' : ''}}">
                {!! Form::label('date_assign', 'Date Assign: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('date_assign', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('date_assign', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('return_date') ? 'has-error' : ''}}">
                {!! Form::label('return_date', 'Return Date: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('return_date', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('return_date', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
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