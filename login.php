<?php
include './database/db.php';



$varUsuario = $_POST["usuario"];
$varContraseña = $_POST["contraseña"];

$query = "SELECT *FROM Usuarios WHERE Usuario = '".$varUsuario."' AND Contraseña = '".$varContraseña."'";
$result = mysqli_query($conn, $query);

$row  = mysqli_num_rows($result);
if ($row == 1 ){
   header("Location: admin.php");
}
else if($row == 0){
   header("Location: home.php");
}


?>