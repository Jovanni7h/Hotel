<!-- Modal login-->
<div class="modal fade" id="ModalLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header d-flex justify-content-center">
        <img class="img-fluid" src="images/login.png" alt="" style="max-width: 100%; height: auto;">
      </div>

      <div class="modal-body bg-light" style="font-weight:bold">
        <form  action="login.php" method="POST" class="needs-validation " novalidate>
          <div class="form-group">
            <label for="exampleInputEmail1">Usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario" required>
             <div class="valid-tooltip">
              Muy Bien!
            </div>
            <div class="invalid-feedback">
              Por favor ingresa el nombre de usuario
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Contraseña</label>
            <input type="password" class="form-control" id="contraseña" name="contraseña" required>
             <div class="valid-tooltip">
              Muy Bien!
            </div>
            <div class="invalid-feedback">
              Por favor ingresa la contraseña
            </div>
          </div>
          <div class="form-group text-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success">Aceptar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/Modal -->


