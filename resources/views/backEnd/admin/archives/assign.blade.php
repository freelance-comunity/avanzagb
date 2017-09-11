<div class="modal fade" id="assign_{{ $archive->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ASIGNAR EXPEDIENTE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => 'admin/assigns', 'class' => 'form-horizontal']) !!}
          {{csrf_field()}}
          <div class="form-group">
          <input type="text" name="name" placeholder="NOMBRE COMPLETO A QUIEN SE ASIGNA" class="form-control">
          </div>     
          <div class="form-group">
            <input type="text" name="reason" placeholder="MOTIVO DE ASIGNACIÓN" class="form-control">
          </div>
          <div class="form-group">
          <label for="date_assign">FECHA DE ENTREGA</label>
            <input type="date" name="date_assign" class="form-control">
          </div>
          <div class="form-group">
          <label for="return_date">FECHA DE RECEPCIÓN</label>
            <input type="date" name="return_date" class="form-control">
          </div>
          <input type="hidden" name="archive_id" value="{{ $archive->id }}">
          <input type="submit" value="ASIGNAR" class="btn btn-block btn-lg btn-success">
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
