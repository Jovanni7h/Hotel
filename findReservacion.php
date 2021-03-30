<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
	<link rel="stylesheet" href="styles/find.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">

		<!-- SCRIPTS JS-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head>
<body>
  <div class="container">
    <header>
      <div class="alert alert-success">
        <a href="admin.php">
          <i class="fas fa-arrow-left"> Regresar</i>
        </a>
        <h2>Buscador de reservaciones</h2>
        </div>
      </header>
  
      <section>
        <input  class="pb-4" type="text" name="busqueda" id="busqueda" placeholder="Buscar...">
      </section>
  
      <section id="tabla_resultado" class="mt-4">
      <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->
      </section>
      	<script src="main.js"></script>
  </div>
</body>
</html>