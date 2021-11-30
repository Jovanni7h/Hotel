<?php
  include ("database/db.php");


  if(isset($_GET['Id_Reservacion'])){
    $id = $_GET['Id_Reservacion'];
    $query = "SELECT * FROM Confirmacion WHERE Id_Reservacion = $id";
    $result = mysqli_query($conn,$query);
    
    if(mysqli_num_rows($result) >= 1){
      $row = mysqli_fetch_array($result);
      $imagen = $row['Imagen'];
    }
  }

?>

<?php include ('includes/header.php')?>

  <div class="container pt-4">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <card class="card card-body">
         <img class="img-fluid" style="max-width: 100%; max-height: 700px;" src="data:image/*;base64, <?php echo base64_encode($row['Imagen']); ?>" alt="">
        </card>
      </div>
    </div>
  </div>

<?php include ('includes/footer.php')?>

