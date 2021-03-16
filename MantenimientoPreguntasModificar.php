<?php
 
  include 'Conexion/conexion.php';	


    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if (!$conn) 
    {
		die("Connection failed: " . mysqli_connect_error());
    }
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>SE - MantenimientoPreguntas</title>
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

.button1 {background-color: #69a43c;} 
.button2 {background-color: #003563;} 
.button3 {background-color: #69a43c;} 
    
    <style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  
  padding: 8px;
  text-align: center;
}

tr:nth-child(even){background-color: #69a43c}
</style>
</head>
    
    
<body>
    <div class="menu"></div>
    <br>
    <center><div>
     <button class="button button2" onclick="location.href='MantenimientoPreguntas.php'">Modificar Pregunta</button>
    </div></center>
    <br>
    <br>
    
     <?php
        
                $idCliente = $_GET["id"];
      
                $sql = "SELECT nombre from pregunta where id='$idCliente'";
              $consulta = $conn->query($sql);
              while ($row = mysqli_fetch_array($consulta)) 
                    {?>
    
 <form action="Conexion/ActualizarPregunta.php" method="post">
  <div id="msform">
    <ul id="progressbar">
    </ul>
    <fieldset style=" width: 200%; margin: 0px -50%;">
      <img src="Imagenes/Logotipo-Guadalupana1.png" style="position: absolute; top: -10px; right:0px;max-width: 100px" />
      <h2 class="fs-title" style="margin-top: 27px;    font-size: 20px;">Modificar Colaborador</h2>
      <input type="text" name="id" id="id" placeholder="Nombre Area" value="<?php echo "".$idCliente ?>" readonly=»readonly» />
      <input type="text" name="nombre" id="nombre" placeholder="nombre" value="<?php echo "".$row["nombre"]; ?>" />
        <br>
      <input type="submit" name="next" class="next action-button" value="Actualizar" />
    </fieldset>
  </div>
</form>
      <?php 
                  }  
                ?>
    
</body>

     <script>
       $(document).ready(function () {
           $('.menu').load('MenuPrincipal1.php');
       });
   </script>
</html>
