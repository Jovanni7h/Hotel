<?php
include ("database/db.php");

$varNumeroReserv = $_POST['numero'];
$varNombre = $_POST['nombre'];
$varImagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));


$query = "INSERT INTO Confirmacion(Id_Reservacion,Nombre_ImgImagen,Imagen) VALUES ('$varNumeroReserv', '$varNombre', '$varImagen')";
$result = mysqli_query($conn, $query);

if($result){
  $_SESSION['message'] = '¡Su recervacion ha sido completada satisfactoriamente!';
  $_SESSION['message_type'] = 'success';
  header("Location: Reservacion.php");
}else{
  $_SESSION['message'] = '¡Su recervacion no ha sido completada!';
  $_SESSION['message_type'] = 'danger';
}

?>