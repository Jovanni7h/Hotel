<?php
  include ("database/db.php");


  if(isset($_GET['Id_Habitacion'])){
    $id = $_GET['Id_Habitacion'];
    $query = "SELECT * FROM Habitaciones WHERE Id_Habitacion = $id";
    $result = mysqli_query($conn,$query);
    
    if(mysqli_num_rows($result) >= 1){
      $row = mysqli_fetch_array($result);
      $nombre = $row['Nombre_Hab'];
      $precio = $row['Precio'];
    }
  }
  if(isset($_POST['update'])){
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];

    $query = "UPDATE Habitaciones SET Nombre_Hab = '$nombre', precio = '$precio' WHERE Id_Habitacion = $id";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Habitacion actualizada satisfactoriamente';
    $_SESSION['message_type'] = 'info'; 
    header("Location: admin.php");
  }
?>

<?php include ('includes/header.php')?>

  <div class="container pt-4">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <card class="card card-body">
          <form action="editHabitacion.php?id=<?php echo $_GET['Id_Habitacion']; ?>" method="POST">
            <div class="form-group">
              <input type="text" name='nombre' value="<?php echo $nombre?>" class="form-control" placeholder="Actualiza el nombre" data-toggle="tooltip" title="Nombre">
            </div>
            <div class="form-group">
              <input type="text" name='precio' value="<?php echo $precio?>" class="form-control" placeholder="Actualiza el precio de la habitacion" data-toggle="tooltip" title="Precio">
            </div>
           
            <button class='btn btn-success' name='update'>
              Actualizar
            </button>
          </form>
        </card>
      </div>
    </div>
  </div>

<?php include ('includes/footer.php')?>

