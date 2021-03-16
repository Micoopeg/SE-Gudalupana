<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(0);

$validar =  $_SESSION['usuario'];

if($validar == null || $validar = '')
{
     echo "<script language='javascript'> window.location.href = 'index.php'; </script>";
    die();
}
 include 'Conexion/conexion.php'; 
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

$idColaborador =  $_GET["c"];
$idAsociado    =  $_GET["a"];
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>SE - Iniciar Encuesta</title>
  <link rel="stylesheet" href="Estilos/style1.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>
    <div class="menu"></div>
        <form  name="enviarEncuesta" action="encuestaIniciada.php">
        <div id="msformEncuesta">
        <ul id="progressbar">
        </ul>
            <fieldset>
              <center> <img src="Imagenes/Logotipo-Guadalupana1.png" style="position: center; top: -8px; right:0px;max-width: 100px" /></center>
               <center><h3 style="color:black;">Encuesta protocolo de servicio</h3>
                <input hidden type="" name="c" id="c" value="<?php echo "".$idColaborador ?>">
                <input hidden type="" name="a" id="a" value="<?php echo "".$idAsociado ?>">
                <input   type="submit" class="next action-button" value="Iniciar" /></center>
         </div>
        </form>
   
</body>
</html>
