<?php
include ("database/db.php");

if(isset($_POST['save-info'])){
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $telefono = $_POST['telefono'];
  $fecha = ($_POST['fecha']);
  $hora = $_POST['hora'];
  $habitacion = $_POST['habitacion'];
  
  $query = "INSERT INTO Reservaciones(Nombre,Apellido,Telefono,Fecha_Rev,Hora,Id_Habitacion) VALUES ('$nombre', '$apellido', '$telefono', '$fecha', '$hora', '$habitacion')";
  $result = mysqli_query($conn, $query);
  
  if(!$result){
    die('Los datos no se pudieron guardar');
  }
  $_SESSION['message'] = 'Datos guardados correctamente';
  $_SESSION['message_type'] = 'success';

    header("Location: confirmacion.php");
}
?>