 <!-- Modal delete-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="alert alert-danger" style="width:100%" role="alert">
            Advertencia
          </div>
        </div>
        <div class="modal-body" style="font-weight:bold">
          ¿Esta seguro de que desea eliminar este cliente?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <a type="button" href="delete.php?numCliente=<?php echo $row['numCliente']?>"  class="btn btn-primary">Eliminar</a>
        </div>
      </div>
    </div>
  </div>
<!--/Modal -->