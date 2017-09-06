@extends('backLayout.app')
@section('title')
Assign
@stop

@section('content')

    <h1>Assign</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Name</th><th>Reason</th><th>Date Assign</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $assign->id }}</td> <td> {{ $assign->name }} </td><td> {{ $assign->reason }} </td><td> {{ $assign->date_assign }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection