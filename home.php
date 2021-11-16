<?php

include ("database/db.php");
include ('includes/header.php');
include ('includes/footer.php');
include ('modalLogin.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Cascada</title>
  <link rel="stylesheet" href="styles/footer.css">
  
 
</head>
<body>
  <div class="container-fluid text-center mt-4">


    <div class="row align-items-center">
      <div class="col-md-4 col-sm-12">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Habitaciones</a>
          <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Cafeteria</a>
          <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Bar</a>
          <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Piscina</a>
        </div>

         

      </div>
      <div class="col-md-8 col-sm-12">
        <div class="tab-content" id="nav-tabContent">

          <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
            <section id="main">
              <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel" data-pause="false">
                <div class="carousel-inner">                                                      <!--Paea que siga sin detenerse-->
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="images/sencilla.jpg" alt="Hawai 1">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="images/especial.jpg" alt="Hawai 2">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="images/suite.jpg" alt="Hawai 3">
                    </div>
                  </div>
                </div>
            </section>
          </div>

          <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
               <section id="main">
                  <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel" data-pause="false">
                    <div class="carousel-inner">                                                      <!--Paea que siga sin detenerse-->
                        <div class="carousel-item active">
                          <img class="d-block w-100" src="images/CAFETERIA1.jpg" alt="Hawai 1">
                          Desallunos desde $100
                        </div>
                        <div class="carousel-item">
                          <img class="d-block w-100" src="images/CAFETERIA2.jpg" alt="Hawai 2">
                          Almuerzos desde $150
                        </div>
                        <div class="carousel-item">
                          <img class="d-block w-100" src="images/CAFETERIA3.jpg" alt="Hawai 3">
                          Cenas desde $200
                        </div>
                      </div>
                    </div>
               </section>
          </div>

          <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
            <section id="main">
              <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel" data-pause="false">
                <div class="carousel-inner">                                                      <!--Paea que siga sin detenerse-->
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="images/bar1.jpg" alt="Hawai 1">
                      Agua
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="images/bar2.jpg" alt="Hawai 2">
                      Cerveza
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="images/bar3.jpeg" alt="Hawai 3">
                      Alcohol
                    </div>
                  </div>
                </div>
            </section>
          </div>

          <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
             <section id="main">
              <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel" data-pause="false">
                <div class="carousel-inner">                                                      <!--Paea que siga sin detenerse-->
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="images/piscina1.jpeg" alt="Hawai 1">
                      Agua caliente
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="images/piscina2.png" alt="Hawai 2">
                      Cambiadores
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="images/piscina3.jpg" alt="Hawai 3">
                      Los huespedes con habitaciones especiales y suites tienen acceso gratuito a la piscina
                    </div>
                  </div>
                </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container mt-4">
    <div class="row">
      <div class="col">
        <div class="alert alert-info text-uppercase text-center" role="alert">
          Precio de habitaciones
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-3">
         <!--Table-->
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">$ Precio</th>
              </tr>
            </thead>
            <tbody>
            <?php
              $query = "SELECT * FROM Habitaciones";
              $registros = mysqli_query($conn,$query);
              while($row = mysqli_fetch_array($registros)){ ?>
              <tr>
                <td><?php echo $row['Nombre_Hab']?></td>
                <td><?php echo "$" , $row['Precio']?></td>
              </tr>
            <?php } ?>
            </tbody>
          </table>    
          <!--/Table-->
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
    <?php 
  include ('includes/footer2.php');
  ?>
    </div>
  </div>
 
  <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <div class="alert alert-info" style="width:100%" role="alert">
                          !Atencion!
                          Esta apunto de completar su reservacion,
                        </div>
                      </div>
                      <div class="modal-body" style="font-weight:bold">
                        
                      </div>
                      <div class="modal-footer">
                        <div class="progress">
                          <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">50%</div>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                      </div>
                    </div>
                  </div>
                </div>
<!--/Modal -->
</body>
</html>