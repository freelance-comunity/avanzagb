<div class="modal fade" id="assign_details_{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DETALLES DE ASIGNACIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
        {!! Form::label('name', 'NOMBRE COMPLETO: ', ['class' => 'col-sm-3 control-label']) !!}
          <div class="col-sm-6">
            <p>
              {{ $item->assign['name'] }}
            </p>
          </div>
          <br>
          <br>
          <br>
        </div>
        <div class="form-group">
        {!! Form::label('name', 'MOTIVO: ', ['class' => 'col-sm-3 control-label']) !!}
          <div class="col-sm-6">
            <p>
              {{ $item->assign['reason'] }}
            </p>
          </div>
          <br>
          <br>
          <br>
        </div>
        <div class="form-group">
        {!! Form::label('name', 'FECHA DE ASIGNACIÓN: ', ['class' => 'col-sm-3 control-label']) !!}
          <div class="col-sm-6">
            <p>
              {{ $item->assign['date_assign'] }}
            </p>
          </div>
          <br>
          <br>
          <br>
        </div>
        <div class="form-group">
        {!! Form::label('name', 'FECHA DE DEVOLUCIÓN: ', ['class' => 'col-sm-3 control-label']) !!}
          <div class="col-sm-6">
            <p>
              {{ $item->assign['return_date'] }}
            </p>
          </div>
          <br>
          <br>
          <br>
        </div>
      </div>
    </div>
  </div>
</div>
