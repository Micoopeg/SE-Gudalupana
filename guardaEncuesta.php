<?php
    error_reporting(E_ALL ^ E_NOTICE);
    date_default_timezone_set('America/Guatemala');
    include 'Conexion/conexion.php'; 
    $fecha =  date("Y/m/d");
    $hora  =  date("H:i:s");
    $con   =  mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
                  if ($con->connect_error) 
                      {
                        die("Connection failed: " . $conn->connect_error);
                      }
    $idEncabezado  = $_POST["idEncabezado"];
    $idPregunta    = $_POST["idPregunta"];
    $fecha         = date("Y-m-d");
    $hora          = date("H:i:s");
    $space         = " ";
    $fechaHora = $fecha.$space.$hora;
    for ($i = 0; $i < count($_POST["pregunta"]); $i++) 
         {
          $punteo = $_POST["punteo"];
          $inserta ="insert  into encuesta_detail  values ('','".$idEncabezado."','".$_POST["idPregunta"][$i]."','".$_POST["punteo"][$i]."','".$fechaHora."')";
          $resultado = $con->query($inserta);
          
          }
         ?>