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
 
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>SE - MantenimientoUsuario</title>
  <link rel="stylesheet" href="Estilos/style1.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

</head>
<body>
    <div class="menu"></div>
    
    <form action="Conexion/CrearUsuario.php" method="post" >
        <div id="msform">
        <ul id="progressbar">
        </ul>
            <fieldset>
                <img src="Imagenes/Logotipo-Guadalupana1.png" style="position: absolute; top: -8px; right:0px;max-width: 100px" />
                <h2 class="fs-title" style="margin-top: 27px;">Crear Usuario</h2>
                <input style="color:black" type="text" name="user" id="user" placeholder="Nombre" required>
                <input style="color:black" type="password" name="clave" id="clave" placeholder="Contraseña" required>
                <input type="submit" name="next" class="next action-button" value="Crear Usuario" />
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
