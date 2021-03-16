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
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
.button2 {background-color: #69a43c;} 
.button3 {background-color: #003563;} 
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
     <form id="datos" name="datos">
  <div id="msform">
    <ul id="progressbar">
    </ul>
    <fieldset>
      <img src="Imagenes/Logotipo-Guadalupana1.png" style="position: absolute; top: -10px; right:0px;max-width: 100px" />
      <h2 class="fs-title" style="margin-top: 27px;    font-size: 20px;">Eliminar Colaborador</h2>
                     <center><label style="color:black">Seleccionar Area</label></center> 
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
                        <center><label style="color:black">Seleccionar Colaborador</label></center> 
                                    <div id="mostrar" name="mostrar">
                                    </div>
        <br>
        <br>
                 <input type="submit" id="boton" class="next action-button" value="Guardar" />
    </fieldset>
  </div>
</form>
    
</body>

     <script>
       $(document).ready(function () {
           $('.menu').load('MenuPrincipal1.php');
       });
   </script>
    
  <script>
  function buscar_ajax(cadena)
        {
            $.ajax(
        { 
            type: 'POST',
            url:  'consulta.php',
            data: 'cadena=' + cadena,
            success: function(respuesta) 
       {
            //Copiamos el resultado en #mostrar
            $('#mostrar').html(respuesta);
     }
  });
  }
</script>
    
<script>
$(document).ready(function() {
    $('#boton').on('click', function(e) 
                   {
        
        e.preventDefault();
        var dataString = $('#datos').serialize();
        
        var url = "EliminarColaborador.php";
        $.ajax({                        
           type: "POST",                 
           url: url,                     
           data: dataString, 
           success: function(data)             
           {  
             $('#resp').html(data); 
            window.location = "reportes2.php?id=" +data; 
           }
       });
    }); 
});

</script>    
    
</html>
