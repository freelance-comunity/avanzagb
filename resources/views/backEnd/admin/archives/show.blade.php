@extends('backLayout.app')
@section('title')
Archive
@stop

@section('content')

    <h1>Archive</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Credit Id</th><th>Client Id</th><th>Group</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $archive->id }}</td> <td> {{ $archive->credit_id }} </td><td> {{ $archive->client_id }} </td><td> {{ $archive->group }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection