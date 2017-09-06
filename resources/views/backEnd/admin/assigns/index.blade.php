@extends('backLayout.app')
@section('title')
Assign
@stop

@section('content')

    <h1>Assigns <a href="{{ url('admin/assigns/create') }}" class="btn btn-primary pull-right btn-sm">Add New Assign</a></h1>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tbladmin/assigns">
            <thead>
                <tr>
                    <th>ID</th><th>Name</th><th>Reason</th><th>Date Assign</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($assigns as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="{{ url('admin/assigns', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->reason }}</td><td>{{ $item->date_assign }}</td>
                    <td>
                        <a href="{{ url('admin/assigns/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/assigns', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
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
        $('#tbladmin/assigns').DataTable({
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