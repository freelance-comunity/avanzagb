<script type="text/javascript" language="javascript">
  function checkfile(sender) {
    var validExts = new Array(".xlsx", ".xls");
    var fileExt = sender.value;
    fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
    if (validExts.indexOf(fileExt) < 0) {
      alert("Archivo Seleccionado invalido, por favor selecciona uno de los siguientes tipos de archivos " +
       validExts.toString());
      return false;
    }
    else return true;
  }
</script>

<div class="modal fade" id="charge_excel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CARGAR EXCEL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{url('import-excel')}}" enctype="multipart/form-data">
          {{csrf_field()}}
          <input type="file" name="excel" onchange="checkfile(this);" class="form-control">
          <br><br>
          <input type="submit" value="CARGAR" class="btn btn-block btn-lg btn-success">
        </form>
      </div>
    </div>
  </div>
</div>
