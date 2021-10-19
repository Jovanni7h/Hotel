<?php
include ("database/db.php");


$salida = "";
$query = "SELECT * FROM Reservaciones ORDER BY Id_Reservacion";

if(isset($_POST['consulta'])){
  $q = $conn->real_escape_string($_POST['consulta']);
  $query = "SELECT Nombre,Apellido,Telefono,Fecha_Rev,Hora,Id_Habitacion FROM Reservaciones WHERE 
  Nombre LIKE '%".$q."%' OR 
  Apellido LIKE '%".$q."%' OR 
  Telefono LIKE '%".$q."%' OR 
  Fecha_Rev LIKE '%".$q."%' OR 
  Hora LIKE '%".$q."%' OR
  Id_Habitacion LIKE '%".$q."%'";
}
 $resultado = $conn->query($query);

if($resultado->num_rows>0){
  $salida.= "<table class='table'>
            <thead class='thead-dark'>
              <tr>
                <th scope='col'>Nombre</th>
                <th scope='col'>Apellido</th>
                <th scope='col'>Telefono</th>
                <th scope='col'>Fecha Reservacion</th>
                <th scope='col'>Hora</th>
                <th scope='col'>Habitacion</th>
              </tr>
            </thead>
            <tbody>";
                 while($row = $resultado->fetch_assoc()){
                  $salida.="<tr>
                            <td>".$row['Nombre']."</td>
                            <td>".$row['Apellido']."</td>
                            <td>".$row['Telefono']."</td>
                            <td>".$row['Fecha_Rev']."</td>
                            <td>".$row['Hora']."</td>
                            <td>".$row['Id_Habitacion']."</td>
                           
                  </tr>";
            }
            $salida.="</tbody></table>";
}else{
  $salida.="<div class='alert alert-danger' role='alert'>
  Ningun resultado encontrado! :(
</div>";
}
echo $salida;
$conn->close();

?>
