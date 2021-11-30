<?php
include ('includes/header2.php');
include ('includes/footer.php');
include ('modalLogin.php');
include ("database/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php session_unset(); }?>
    </div>
  <div class="container-fluid text-center mt-4">
    <div class="row">
      <div class="col-2">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Habitaciones</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Reservaciones pendientes</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Recervaciones confirmadas</a>
    </div>
  </div>
  <div class="col-10">
    <div class="tab-content" id="nav-tabContent">

<!--Reservaciones pendientes-->
    <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
      <a href="findReservacion.php" class="btn btn-info mb-4"> Buscar Reservacion</a>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Id</th>
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
                <td><?php echo $row['Id_Reservacion']?></td>
                <td><?php echo $row['Nombre']?></td>
                <td><?php echo $row['Apellido']?></td>
                <td><?php echo $row['Telefono']?></td>
                <td><?php echo $row['Fecha_Rev']?></td>
                <td><?php echo $row['Hora']?></td>
                <td><?php echo $row['Fecha_Termino']?></td>
                <td class="text-center"><?php echo $row['Id_Habitacion']?></td>
                <td class="text-center">
                  
                  <!-- <a class='btn btn-danger' data-toggle="modal" data-target="#exampleModal2">
                    <i class="fas fa-trash-alt"></i>
                  </a> -->
                           <!-- Modal -->
                <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <a type="button" href="deleteReservacion.php?Id_Reservacion=<?php echo $row['Id_Reservacion']?>"  class="btn btn-primary">Eliminar</a>
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
<!--/Reservaciones pendientes-->

<!--Habitaciones-->       
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
      <div class="row d-flex justify-content-around"> <!--Row-->
          <div class="col-md-4 bg-light rounded pt-2">
            <form action='saveHabitacion.php' method='POST' class="needs-validation" novalidate>
              <!-- <div class="form-row mb-3">
                <div class="col-2">
                  <label for="id">N.Cliente</label>
                  <input type="text" class='form-control' id='id'>
                </div>
              </div> -->
              <div class="form-row mb-3">
                <div class="col">
                  <label for="nombre">Nombre de habitacion</label>
                  <input type="text" class="form-control" name='nombre' id='nombre' placeholder="Escribe el nombre" required>
                  <div class="valid-tooltip">
                    Muy Bien!
                  </div>
                  <div class="invalid-feedback">
                    Por favor ingresa el nombre
                  </div>
                </div>
                <div class="col">
                  <label for="precio">Precio</label>
                  <input type="text" class="form-control" name='precio' id='precio' placeholder="Escribe el precio" required>
                  <div class="valid-tooltip">
                    Muy Bien!
                  </div>
                  <div class="invalid-feedback">
                    Por favor ingresa el precio
                  </div>
                </div>
              </div>
              
                <!-- <input type="submit" class="btn btn-block btn-outline-success mt-4" name='save-info'></input> -->
                <button type="submit" class="btn btn-outline-success" name="save-info">Guardar</button>
              </form>
          </div>

          <div class="col-md-6 bg-light rounded pt-2">
            <!--Table-->
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Precio</th>
                  <th class="text-info" scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $query = "SELECT * FROM Habitaciones";
                $registros = mysqli_query($conn,$query);
                while($row = mysqli_fetch_array($registros)){ ?>
                <tr>
                  <td><?php echo $row['Id_Habitacion']?></td>
                  <td><?php echo $row['Nombre_Hab']?></td>
                  <td><?php echo $row['Precio']?></td>
                  
                  <td class='text-center'>
                    <a class='btn btn-info mb-2' href="editHabitacion.php?Id_Habitacion=<?php echo $row['Id_Habitacion']?>">
                      <i class='fas fa-marker'></i>
                    </a>
                    <!-- <a class='btn btn-danger' data-toggle="modal" data-target="#exampleModal">
                      <i class="fas fa-trash-alt"></i>
                    </a> -->

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
                                ¿Esta seguro de que desea eliminar esta habitacion?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <a type="button" href="deleteHabitacion.php?Id_Habitacion=<?php echo $row['Id_Habitacion']?>"  class="btn btn-primary">Eliminar</a>
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
            <!--/Table-->
          </div>
        </div> <!--Row-->
      </div>
      <!--Habitaciones-->

<!--Reservaciones confirmadas-->
      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
        <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Id Reservacion</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Fecha de ingreso</th>
            <th scope="col">Hora</th>
            <th scope="col">Fecha de salida</th>
            <th scope="col">Habitacion</th>
            <th scope="col">Imagen</th>
            <!-- <th scope="col">Operaciones</th> -->
          </tr>
        </thead>
        <tbody>
          <?php
              $query = "SELECT Confirmacion.Id_Reservacion, Reservaciones.Nombre, Reservaciones.Apellido, Reservaciones.Fecha_Rev, Reservaciones.Hora, Habitaciones.Nombre_Hab, Reservaciones.Fecha_Termino, Confirmacion.Imagen
              FROM Confirmacion,Reservaciones,Habitaciones 
              WHERE Confirmacion.Id_Reservacion=Reservaciones.Id_Reservacion 
              AND Reservaciones.Id_Habitacion=Habitaciones.Id_Habitacion";
              $registros = mysqli_query($conn,$query);
              while($row = mysqli_fetch_array($registros)){ ?>
              <tr>
                <td class="text-center"><?php echo $row['Id_Reservacion']?></td>
                <td><?php echo $row['Nombre']?></td>
                <td><?php echo $row['Apellido']?></td>
                <td><?php echo $row['Fecha_Rev']?></td>
                <td><?php echo $row['Hora']?></td>
                <td><?php echo $row['Fecha_Termino']?></td>
                <td><?php echo $row['Nombre_Hab']?></td>
                <td><a class="btn btn-outline-success" href="verImagen.php?Id_Reservacion=<?php echo $row['Id_Reservacion']?>" >Ver imagen</a></td>
         <!-- Modal
        data-toggle="modal" data-target="#modalImagen"
        -->
        <div class="modal fade" id="modalImagen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="text-secondary">Comprobante de pago</h5>
              </div>
              <div class="modal-body" style="font-weight:bold">
                <img class="img-fluid" style="max-width: 100%; height: auto;" src="data:image/*;base64, <?php echo base64_encode($row['Imagen']); ?>" alt="">
              </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
                      </div>
                    </div>
                  </div>
                </div>
                 <!--/Modal -->
              </tr>
              <?php } ?>
            </tbody>
          </table>    
        </div>
<!--Reservaciones confirmadas-->

      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
    </div>
  </div>
</div>
  </div>
</body>
</html>