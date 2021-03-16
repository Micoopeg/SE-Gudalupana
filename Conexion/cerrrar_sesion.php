<?php

    session_start();
    $validar =  $_SESSION['usuario'];
    include 'conexion.php';	

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if (!$conn) 
    {
		die("Connection failed: " . mysqli_connect_error());
    }


//    date_default_timezone_set('America/Guatemala');
//    $fecha = date("Y/m/d");
//    $hora  =  date("H:i:s");
//
//    $sql ="INSERT INTO bitacora (id, Usuario, Nombre, Descripcion, Hora, Fecha) VALUES (NULL, '$validar', 'Cierre de Sesion', 'El usuario cerro sesion','$hora','$fecha' );";
//    $result = mysqli_query($conn,$sql);

    session_destroy();
    header("location: ../index.php");


?>