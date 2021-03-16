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
  <title>SE-Guadalupana</title>
  <link rel="stylesheet" href="Estilos/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
 <nav>
        <div id="logo"><img src="Imagenes/se-guadalupana2.png" style="max-width: 250px"></div>
        <label for="drop" class="toggle">Menu</label>
        <input type="checkbox" id="drop" />
            <ul class="menu">
                <li><a href="MenuPrincipal.html">Inicio</a></li>
                
                <li><a href="enviarEncuestas.php">Enviar Encuestas</a></li>
                <li>
                    <a href="#">Mantenimientos <i class="fa fa-sort-down"></i></a>
                    <input type="checkbox" id="drop-1"/>
                   <ul>
                        <li><a href="MantenimientoUsuario.php">Usuarios</a></li>
                        <li><a href="MantenimientoColaboradores.php">Colaboradores</a></li>
                        <li><a href="MantenimientoAreas.php">Areas</a></li>
                        <li><a href="MantenimientoPreguntas.php">Preguntas</a></li>
                        <li><a href="MantenimientoEncuestas.php">Encuestas</a></li>
                        
                    </ul> 

                </li>
                <li>
                <label for="drop-2" class="toggle"></label>
                <a href="#">Reportes <i class="fa fa-sort-down"></i></a>
                <input type="checkbox" id="drop-2"/>
                <ul>
                        <li><a href="reporteArea.php">Area</a></li>
                        <li><a href="reporteColaborador.php">Colaborador</a></li>
                    <li>
                    </li>
                </ul>
                </li>
                 <li style="background-color:#AD0000"><a href="Conexion/cerrrar_sesion.php">Cerrar Sesion</a></li>
            </ul>
        </nav>
    
    <img src="Imagenes/Logotipo.png" style=" display:block;margin-left: auto;margin-right: auto;margin-top: 220px;">

</body>
</html>
