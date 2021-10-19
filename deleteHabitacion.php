<?php
  include ("database/db.php");

  if(isset($_GET['Id_Habitacion'])){
        $id = $_GET['Id_Habitacion'];
        $query = "DELETE FROM Habitaciones WHERE Id_Habitacion = $id";
        $result = mysqli_query($conn, $query);
        if (!$result){
          die("Operacion fallida");
        }
        $_SESSION['message'] = 'Habitacion eliminada';
        $_SESSION['message_type'] = 'danger';
        header("Location: admin.php");

  }

?>