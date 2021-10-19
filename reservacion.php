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
    <!--Form-->
    <div class="container mt-2">
      <?php if(isset($_SESSION['message'])) { ?> 
        <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['message'] ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php session_unset(); }?>
    </div>

    <div class="container mt-5 shadow-none p-3 mb-5 bg-light rounded">
      <form action='saveReservacion.php' method='POST' class="needs-validation" novalidate>
        <!-- <div class="form-row mb-3">
          <div class="col-2">
            <label for="id">N.Cliente</label>
            <input type="text" class='form-control' id='id'>
          </div>
        </div> -->
        <div class="form-row mb-3">
          <div class="col">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name='nombre' id='nombre' placeholder="Escribe el nombre o nombres" required>
            <div class="valid-tooltip">
              Muy Bien!
            </div>
            <div class="invalid-feedback">
              Por favor ingresa el nombre
            </div>
          </div>
          <div class="col">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" name='apellido' id='apellido' placeholder="Escribe el apellido" required>
            <div class="valid-tooltip">
              Muy Bien!
            </div>
            <div class="invalid-feedback">
              Por favor ingresa el apellido
            </div>
          </div>
        </div>
        
        <div class="form-row mb-3">
          <div class="col">
            <label for="telefono">Telefono</label>
            <input type="tel" class="form-control" name='telefono' id='telefono' placeholder="Escribe el numero de telefono" required>
            <div class="valid-tooltip">
              Muy Bien!
          </div>
          <div class="invalid-feedback">
            Por favor ingresa el Telefono
          </div>
          </div>
          <div class="col">
            <label for="fecha">Fecha de reservacion</label>
            <input type="date" min="2020-11-01" max="2021-12-01" step="1" class="form-control" name='fecha' id='fecha'required>
          <div class="valid-tooltip">
              Muy Bien!
          </div>
          <div class="invalid-feedback">
            Por favor ingresa la fecha
          </div>
          </div>
           <div class="col">
            <label for="hora">Hora de reservacion</label>
            <input type="time" class="form-control" name='hora' id='hora' required>
          <div class="valid-tooltip">
              Muy Bien!
          </div>
          <div class="invalid-feedback">
            Por favor ingresa la hora
          </div>
          </div>
        </div>
        <div class="form-row mb-3">
          <div class="col-3">
            <label for="habitacion">Habitacion</label>
            <select name="habitacion" id="habitacion" class='form-control' required>
            
            <!---Llenar select desde la base de datos-->

            <?php
              $consulta = "SELECT *FROM Habitaciones";
              $ejecutar = mysqli_query($conn,$consulta) or die (mysqli_error($conn));
            ?>
            
            <?php foreach ($ejecutar as $opciones):?>

              <option value="<?php echo $opciones['Id_Habitacion']?>"><?php echo $opciones['Nombre_Hab']?></option>

            <?php endforeach ?>

            <!---/Llenar select desde la base de datos-->

            
            </select>
           <div class="valid-tooltip">
              Muy Bien!
          </div>
          <div class="invalid-feedback">
            Por favor selecciona la habitacion
          </div>
          </div>
          
          </div>
          
          <!-- <input type="submit" class="btn btn-block btn-outline-success mt-4" name='save-info'></input> -->
          <button type="submit" class="btn btn-outline-success" name="save-info">Reservar</button>
        </div>
      </form>
    </div>
    <!--/Form-->

           <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <div class="alert alert-info text-center" style="width:100%" role="alert">
                          !Atencion!
                        </div>
                      </div>
                      <div class="modal-body font-italic">
                        Esta apunto de completar su reservacion. Por favor siga las siguientes instrucciones:
                      </div>
                      <div class="modal-footer">
                        <div class="container">
                          <div class="row">
                            <div class="col-12">
                              <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">50%</div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <a type="button" class="btn btn-outline-info" data-dismiss="modal">OK</a>
                      </div>
                    </div>
                  </div>
                </div>
<!--/Modal -->

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
