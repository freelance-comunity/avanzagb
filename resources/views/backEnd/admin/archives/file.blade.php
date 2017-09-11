<script type="text/javascript" language="javascript">
  function checkfile(sender) {
    var validExts = new Array(".pdf");
    var fileExt = sender.value;
    fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
    if (validExts.indexOf(fileExt) < 0) {
      alert("Archivo Seleccionado invalido, por favor selecciona un archivo con extensión " +
       validExts.toString());
      return false;
    }
    else return true;
  }
</script>

<div class="modal fade" id="file_{{ $archive->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CARGAR EXPEDIENTE LEGAL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{url('import-file')}}" enctype="multipart/form-data">
          {{csrf_field()}}
          <input type="file" name="file" onchange="checkfile(this);" class="form-control">
          <input type="hidden" name="archive_id" value="{{ $archive->id }}">
          <br><br>
          <input type="submit" value="CARGAR" class="btn btn-block btn-lg btn-success">
        </form>
      </div>
    </div>
  </div>
</div>
