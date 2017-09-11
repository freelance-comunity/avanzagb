<div class="modal fade" id="guard_{{ $archive->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">RESGUARDAR EXPEDIENTE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => 'returnArchive', 'class' => 'form-horizontal']) !!}
          {{csrf_field()}}
          <div class="form-group">
          <label for="name">ENTREGA:</label>
          <input type="text" name="name" value="{{ $archive->assign['name'] }}" class="form-control" readonly="">
          </div>     
          <div class="form-group">
            <label for="reason">MOTIVO:</label>
            <input type="text" name="reason" value="{{ $archive->assign['reason'] }}" class="form-control" readonly="">
          </div>
          <div class="form-group">
          <label for="return_date">FECHA DE RECEPCIÓN</label>
            <input type="date" name="date_assign" class="form-control">
          </div>
          <input type="hidden" name="archive_id" value="{{ $archive->id }}">
          <input type="submit" value="RESGUARDAR" class="btn btn-block btn-lg btn-success">
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
