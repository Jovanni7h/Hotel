<?php
include ("database/db.php");


if(isset($_POST['buscar'])){
  $nombre = $_POST['buscadorNombre'];
  $apellido = $_POST['buscadorApellido'];
  
  $queryBuscar = "SELECT Id_Reservacion FROM Reservaciones WHERE  Nombre = '$nombre' AND Apellido = '$apellido'";
  $result = mysqli_query($conn, $queryBuscar);

  if ($row = mysqli_fetch_array($result)) {
    $id = $row['Id_Reservacion'];

    $_SESSION['message'] = "El numero de su reservacion es el:";
    $_SESSION['message2'] = $id;
    $_SESSION['message_type'] = 'success';
    header("Location: formularioNumero.php");

  }else{
    $_SESSION['message'] = 'Numero no encontrado:';
    $_SESSION['message2'] = "(⌣̩̩́_⌣̩̩̀)";
    $_SESSION['message_type'] = 'danger';
    header("Location: formularioNumero.php");
  }
}
?>