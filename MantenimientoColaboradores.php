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
        <button class="button button1" onclick="location.href='MantenimientoColaboradores.php'">Crear Colaborador</button>
        <button class="button button2" onclick="location.href='MantenimientoColaboradoresModificar.php'">Modificar Colaborador</button>
        <button class="button button3" onclick="location.href='MantenimientoColaboradoresEliminar.php'">Eliminar Colaborador</button>
    </div></center>
     <form action="Conexion/CrearColaborador.php" method="post">
  <div id="msform">
    <ul id="progressbar">
    </ul>
    <fieldset>
      <img src="Imagenes/Logotipo-Guadalupana1.png" style="position: absolute; top: -10px; right:0px;max-width: 100px" />
      <h2 class="fs-title" style="margin-top: 27px;    font-size: 20px;">Crear Colaborador</h2>
      <input type="number" name="cif" id="cif" placeholder="CIF" />
      <input type="text"   name="nombre" id="nombre"  placeholder="Nombre Completo" />
      <input type="text"   name="puesto" id="puesto"  placeholder="Puesto" />
      <input type="email"  name="correo" id="correo"  placeholder="Correo" />
        <label style="color:black; font-size:18px">Area:    </label>&nbsp;&nbsp;
                                    <select name="puestos" onchange="buscar_ajax(this.value);" required>            
                                        <option required disabled>Seleccione una Opcion</option>
                                            <?php
                                                $query = $conn -> query ("select nombre from area");
                                                    while ($valores = mysqli_fetch_array($query))
                                                    {
                                                        
                                                    echo utf8_encode('<option value="'.$valores[nombre].'" requerid>'.$valores[nombre].'</option>');
                                                    }
                                                ?>
                                     </select>
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
