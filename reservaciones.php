<?php 
include ("database/db.php");
// include ('includes/header.php');
include ('includes/footer.php');
// include ('includes/modaldelete.php');
// include ('includes/modalLogin.php');

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

  
    <!--Table-->
    <div class="container">

     <div class="row ">
        <div class="col d-flex justify-content-between">
            <a class="btn btn-outline-info mb-4" href="findTable.php">Buscar Reservacion</a>
            <a class="btn btn-outline-secondary mb-4" href="habitaciones.php">Ver habitaciones</a>
        </div>
     </div>

      <div class="row">
        <div class="col">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Telefono</th>
                <th scope="col">Fecha de reservacion</th>
                <th scope="col">Hora</th>
                <th scope="col">Fecha de salida</th>
                <th scope="col">Tipo de habitacion</th>
              </tr>
            </thead>
            <tbody>
            <?php
              $query = "SELECT * FROM Reservaciones";
              $registros = mysqli_query($conn,$query);
              while($row = mysqli_fetch_array($registros)){ ?>
              <tr>
                <td><?php echo $row['Nombre']?></td>
                <td><?php echo $row['Apellido']?></td>
                <td><?php echo $row['Telefono']?></td>
                <td><?php echo $row['Fecha_Rev']?></td>
                <td><?php echo $row['Hora']?></td>
                <td><?php echo $row['Fecha_Termino']?></td>
                <td><?php echo $row['Id_Habitacion']?></td>
                <td class='text-center'>
                  
                  <a class='btn btn-danger' data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-trash-alt"></i>
                  </a>
                           <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <div class="alert alert-danger" style="width:100%" role="alert">
                          Advertencia
                        </div>
                      </div>
                      <div class="modal-body" style="font-weight:bold">
                        ¿Esta seguro de que desea eliminar esta reservacion?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <a type="button" href="delete.php?Id_Reservacion=<?php echo $row['Id_Reservacion']?>"  class="btn btn-primary">Eliminar</a>
                      </div>
                    </div>
                  </div>
                </div>
                 <!--/Modal -->
              </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>    
        </div>
      </div>
    </div>
    <!--/Table-->


    

 <!-- Modal -->

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
