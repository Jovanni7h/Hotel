<?php 
include ("database/db.php");
include ('includes/footer.php');
include ('includes/header2.php');
// include ('includes/header.php');

// include ('includes/modaldelete.php');
// include ('includes/modalLogin.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
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
    
  <div class="container">
  
  <?php

$query = "SELECT MAX(Id_Reservacion) AS id FROM Reservaciones";
$resultado = mysqli_query($conn,$query);
if ($row = mysqli_fetch_row($resultado)) {
$id = trim($row[0]);
}

$query2 = "SELECT Habitaciones.Precio
FROM Reservaciones,Habitaciones
WHERE Reservaciones.Id_Habitacion = Habitaciones.Id_Habitacion";

$resultado2 = mysqli_query($conn,$query2);
if ($row = mysqli_fetch_array($resultado2)) {
  $precio = $row['Precio'];
}

$query3 = "SELECT Reservaciones.Cantidad, Habitaciones.Precio
FROM Reservaciones
INNER JOIN Habitaciones ON Reservaciones.Id_Habitacion = Habitaciones.Id_Habitacion
WHERE Reservaciones.Id_Reservacion = $id";

$resultado3 = mysqli_query($conn,$query3);
if ($row = mysqli_fetch_array($resultado3)) {
  $cantidad = $row['Cantidad'];
  $precio = $row['Precio'];
}

  ?>


    <div class="row mt-4">
      <div class="col">
        <h4>
          Estimado/a  el siguinte numero es el identificador de su reservacion debe guardarlo bien, ya que se le solicitara cuado quiera confirmar su reservacion
          <!-- <strong class="text-uppercase badge badge-info"><?php echo $nombre ?></strong> -->
        </h4>
        </div>
    </div>
      <h4 class="text-uppercase text-secondary">Numero de reservacion:
        <span class="badge badge-warning">
          <?php
          echo $id;
          ?>
        </span>
      </h4>
       <h4 class="text-uppercase text-secondary">Total a pagar:
        <span class="badge badge-warning">
          <?php
           echo  $cantidad * $precio
          ?>
        </span>
      </h4>
    
    <div class="row mt-4">
      <div class="col">
        <div class="card text-center">
          <div class="card-header text-uppercase font-weight-bold text-success">
            Datos de pago
          </div>
          <div class="card-body text-left">

            <p class="alert alert-danger" role="alert">Ya sea que elija pagar por medio de deposito o trasnferencia, el monto a pagar dependera del tipo de habitacion que halla selecionado al hacer su reservacion.</p>

            <h5 class="card-title text-info">Deposito bancario:</h5>
            <p class="card-text font-weight-bold">Nombre Titular: <span class="font-weight-normal">Hotel Cascada</span></p>
            <p class="card-text font-weight-bold">Número de Cuenta: <span class="font-weight-normal">1234567890</span></p>
            <p class="card-text font-weight-bold">Clabe interbancaria: <span class="font-weight-normal">123456789009876543</span></p>
            <p class="card-text font-weight-bold">Monto por noche: $<?php echo  $cantidad * $precio?></p>

            <hr></hr>
            
            <h5 class="card-title text-info">Transferencia bancaria:</h5>
            <p class="card-text font-weight-bold">Banco: <span class="font-weight-normal">Bank of America</span></p>
            <p class="card-text font-weight-bold">Número de Cuenta: <span class="font-weight-normal">1234567890</span></p>
            <p class="card-text font-weight-bold">Clabe interbancaria: <span class="font-weight-normal">123456789009876543</span></p>
            <p class="card-text font-weight-bold">Monto por noche: $<?php echo  $cantidad * $precio?></p>
            
     
            <h5 class="mt-2  text-info">Instrucciones:</h3>

<div class="row mt-4">
  <div class="col-2">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active text-success" aria-current="page">Paso 1:</li>
      </ol>
    </nav>
  </div>
</div>
<h5>
  Toma una foto del ticket de pago o bien una captura del comprobante de pago.
</h5>
<div class="row mt-4">
  <div class="col-2">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active text-success" aria-current="page">Paso 2:</li>
      </ol>
    </nav>
  </div>
</div>
<h5>
  Vuelva a la pagina principal y de click en el boton <span class="text-info">Confirmar</span> o de click en el siguiente boton, despues llene el formulario
</h5>
<div class="row d-flex justify-content-center mt-4">
  <div class="col-3 mb-4">
    <a href="confiReservacion.php" class="btn btn-block btn-outline-info">Ir al formulario de confirmacion</a>
  </div>
</div>

        </div>
  
        <div class="card-footer text-muted">
        </div>
      </div>
      </div>
    </div>  
      
  </div>
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
                        <button type="button" class="btn btn-outline-info" data-dismiss="modal">OK</button>
                      </div>
                    </div>
                  </div>
                </div>
<!--/Modal -->
<script>
      $(document).ready(function()
      {
         $("#exampleModal").modal("show");
      });
</script>
</body>
</html>