<?php
 
  include 'Conexion/conexion.php';	


    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if (!$conn) 
    {
		die("Connection failed: " . mysqli_connect_error());
    }
?>

<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">
  <title>SE - MantenimientoColaborador</title>
  <link rel="stylesheet" href="Estilos/style1.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<style>
.button {
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button1 {background-color: #003563;} 
.button2 {background-color: #69a43c;} 
.button3 {background-color: #69a43c;} 
</style>
</head>
    
    
<body>
    <div class="menu"></div>
    <br>
    <center><div>
        <button class="button button1" onclick="location.href='MantenimientoAreas.php'">Crear Area</button>
        <button class="button button2" onclick="location.href='MantenimientoColaboradoresAreas.php'">Modificar Area</button>
         <button class="button button3" onclick="location.href='MantenimientoAreaEliminar.php'">Eliminar Area</button>
    </div></center>
     <form action="Conexion/CrearArea.php" method="post">
  <div id="msform">
    <ul id="progressbar">
    </ul>
    <fieldset>
      <img src="Imagenes/Logotipo-Guadalupana1.png" style="position: absolute; top: -10px; right:0px;max-width: 100px" />
      <h2 class="fs-title" style="margin-top: 27px;    font-size: 20px;">Crear Area</h2>
      <input type="text"   name="nombre" id="nombre"  placeholder="Nombre Area" />
        <br>
      <input type="submit" name="next" class="next action-button" value="Guardar" />
    </fieldset>
  </div>
</form>
    
</body>

     <script>
       $(document).ready(function () {
           $('.menu').load('MenuPrincipal1.php');
       });
   </script>
</html>
