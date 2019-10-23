<div class="modal fade" id="modalEliminarDocumento">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">¿Estás absolutamente seguro?</h4>
      </div>
      <div class="modal-body">
        <p>Esta acción no se puede deshacer. Esto eliminará permanentemente el documento.</p><!-- &hellip;-->
        <h4><span id="documento_tipo"></span></h4>
        <!--<p>Escriba el nombre del repositorio para confirmar.</p>-->
      </div>
      <div class="modal-footer">
        <form id="documento_url" action="" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Entiendo las consecuencias, eliminar este documento</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->