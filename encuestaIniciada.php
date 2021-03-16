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
    <?php

   date_default_timezone_set('America/Guatemala');
   include 'Conexion/conexion.php';    
   $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if (!$con) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $idAsociado    = $_GET["a"];
    $idColaborador = $_GET["c"];
    $fecha         = date("Y-m-d");
    $hora          = date("H:i:s");
    $space         = " ";
    $fechaHora = $fecha.$space.$hora;

    $actualiza = "update colaborador_asociado set estado = '2' where asociado = '$idAsociado'";
    $resultUpdate = mysqli_query($con,$actualiza);


    $inserta   = "insert into encuesta values('','$idColaborador','$idAsociado','$fechaHora')";
    $result    = mysqli_query($con,$inserta);
    $last_id   = mysqli_insert_id($con);
    ?>
    
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>SE - Detalle Encuesta</title>
  <link rel="stylesheet" href="Estilos/style1.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>
    <div class="menu"></div>
        <form id="guardaEncuesta" name="guardaEncuesta" method="POST">
        <div id="msformDetalle">
        <ul id="progressbar">
        </ul>
            <fieldset>
                <center><img src="Imagenes/Logotipo-Guadalupana1.png" style="position: center; top: -8px; right:0px;max-width: 100px" /><br>
                <h4 style="color:black;">Encuesta de Servicio</h4>
                <h6 style="color:black;">A continuación se le solicita contestar las siguiente preguntas, tomando en cuenta que 10 es la puntuación maxima de excelencia. </h6></center>
               <center><table> 
                  <thead>
                    <tr>
                      <td><h4 style="color: black;"> Pregunta</h4></td>
                      <td><h4 style="color: black;"> Ponderación</h4></td>
                    </tr>
                  </thead>
                   <?php 
                      $sql        ="select id, nombre from pregunta ORDER BY id ASC ";
                      $resultado  = $con->query($sql);
                      while ($row = mysqli_fetch_array($resultado)) 
                            {
                                $id       = $row["id"];
                                $pregunta = $row["nombre"];?>
                
                  <tbody>
                    <tr>
                      <td><h5 align="left" style="color:black"><?php echo "".$id.". ".$pregunta; ?></h5>
                        <input hidden type="" name="idPregunta[]" id="idPregunta"  value="<?php echo "".$id; ?>">
                        <input hidden type="text" name="pregunta[]" id="pregunta"  value="<?php echo "".$pregunta; ?>">
                      </td>
                      <td> <select id="punteo[]" name="punteo[]" >
                      <option required disabled>Seleccione una Opcion</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                      <option>6</option>
                      <option>7</option>
                      <option>8</option>
                      <option>9</option>
                      <option>10</option>
                    </select></td>
                    </tr>
                  </tbody>

                    <?php } ?>

                 </table></center>
                  <input type=""  hidden name="idEncabezado" id="idEncabezado" value="<?php echo $last_id; ?>">
                  
                 <center><input  id="asignar" name="asignar" type="submit" name="next" class="next action-button" value="Enviar" /></center>
            </fieldset>          
         </div>
 </form>
  
</body>


<script>
$(document).ready(function() {
    $('#asignar').on('click', function(e) {
        e.preventDefault();
        var dataString = $('#guardaEncuesta').serialize();
        var url = "guardaEncuesta.php";
        $.ajax({                        
           type: "POST",                 
           url: url,                     
           data: dataString, 
           success: function(data)             
           {  
            alert("Gracias por responder la encuesta de servicio");
            window.location = "encuestaProtocoloDeServicio.php"; 
                      }
       });
    }); 
});

</script>