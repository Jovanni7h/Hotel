<?php
  include ("database/db.php");

  if(isset($_GET['Id_Reservacion'])){
        $id = $_GET['Id_Reservacion'];
        $query = "DELETE FROM Reservaciones WHERE Id_Reservacion = $id";
        $result = mysqli_query($conn, $query);
        if (!$result){
          die("Operacion fallida");
        }
        $_SESSION['message'] = 'Reservacion eliminada';
        $_SESSION['message_type'] = 'danger';
        header("Location: admin.php");

  }

?>