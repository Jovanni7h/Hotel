<?php 
include ("database/db.php");
include ('includes/footer.php');
include ('includes/header.php');
// include ('includes/modaldelete.php');
include ('modalLogin.php');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
     <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
  </head>
  <body>

    <div class="container mt-2">
      <?php if(isset($_SESSION['message'])) { ?> 
        <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['message'] ?>
           <div class="row">
             <div class="col-12">
               <div class="progress">
                 <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">100%</div>
                </div>
              </div>
            </div>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php session_unset(); }?>
    </div>
    

<div class="container mt-5 shadow-none p-3 mb-5 bg-light rounded ">
        <div class="row">
          <div class="col-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active text-success" aria-current="page">Instrucciones:</li>
              </ol>
            </nav>
          </div>
        </div>
        <p> <strong>1.-</strong> Llene el campo <strong>(Reservacion)</strong> con el numero de reservacion que se le fue asignado.</p>
        <p> <strong>2.-</strong> Llene el campo <strong>(Nombre)</strong> con el nombre que quiera que tenga su imagen, ejemplo: "Comporbante_Juan".</p>
        <p> <strong>2.-</strong> Llene el campo <strong>(Comprobante)</strong> con la foto o captura.</p>
<!--Form-->
      <form action='saveConfirmacionReserv.php' method='POST' class="needs-validation" autocomplete="off" enctype="multipart/form-data" novalidate>
        <!-- <div class="form-row mb-3">
          <div class="col-2">
            <label for="id">N.Cliente</label>
            <input type="text" class='form-control' id='id'>
          </div>
        </div> -->
        <div class="form-row mb-3 d-flex justify-content-around">
          <div class="col-3">
            <label for="numero">Reservacion</label>
            <input type="text" class="form-control" name='numero'  placeholder="Numero de reservacion" required>
            <div class="valid-tooltip">
              Muy Bien!
            </div>
            <div class="invalid-feedback">
              Por favor ingresa el numero
            </div>
          </div>
        </div>
        <div class="form-row mb-3 d-flex justify-content-around">
          <div class="col-4">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name='nombre' placeholder="Nombre de imagen" required>
            <div class="valid-tooltip">
              Muy Bien!
            </div>
            <div class="invalid-feedback">
              Por favor ingresa el nombre
            </div>
          </div>
        </div>
        <div class="form-row mb-3 d-flex justify-content-around">
          <div class="col-4">
            <label for="imagen">Comprobante</label>
            <input type="file" class="form-control" name='imagen' accept="image/*" required>
            <div class="valid-tooltip">
              Muy Bien!
            </div>
            <div class="invalid-feedback">
              Por favor ingresa el comprobante
            </div>
          </div>
        </div>

        <div class="form-row d-flex justify-content-center">
          <!-- <input type="submit" class="btn btn-block btn-outline-success mt-4" name='save-info'></input> -->
          <button type="submit" class="btn btn-outline-success" name="save-info">Enviar</button>
        </div>
      </form>
<!--Form-->
      <div class="row d-flex justify-content-center">
        <a class="text-decoration-none" href="formularioNumero.php">
          ¿Has olvidado tu numero de reservacion?
        </a>
      </div>
    </div>



<!-- Modal -->
<div class="modal fade" id="modalAlerta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="alert alert-danger w-100 text-center" role="alert">
          ¡Atencion!
        </div>
      </div>
      <div class="modal-body">
        <p>
          <strong>
            Para poder llenar este formaulario primero debe tener una reservacion ya hecha.
          </strong>
        </p>
          Si ya cuenta con una haga click en el boton <span class="text-success">Continuar</span>. Sino, haga click en el botón <span class="text-info">Reservar</span>
      </div>
      <div class="modal-footer d-flex justify-content-around">
        <a class="btn btn-outline-info" href="reservacion.php">Reservar</a>
        <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Continuar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->





<!-- JavaScript Bundle with Popper -->
<script>
      $(document).ready(function()
      {
         $("#modalAlerta").modal("show");
      });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
  </body>
</html>
