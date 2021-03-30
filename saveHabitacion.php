<?php
include ("database/db.php");

if(isset($_POST['save-info'])){
  $nombre = $_POST['nombre'];
  $precio = $_POST['precio'];

  $query = "INSERT INTO Habitaciones(Nombre_Hab,Precio) VALUES ('$nombre', '$precio')";

  $result = mysqli_query($conn, $query);
  if(!$result){
    die('Los datos no se pudieron guardar');
  }
  $_SESSION['message'] = 'Datos guardados correctamente';
  $_SESSION['message_type'] = 'success';

    header("Location: admin.php");
}
?>