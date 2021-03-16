<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(0);
session_start();	
include 'conexion.php';	
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if (!$conn) 
    {
		die("Connection failed: " . mysqli_connect_error());
    }

$nombre=$_POST['area'];

    date_default_timezone_set('America/Guatemala');
    $fecha = date("Y/m/d");

   
// echo"Cif: ".$cif."<br>";
// echo"nombre: ".$nombre."<br>";
// echo"puesto: ".$puesto."<br>";
// echo"area: ".$area."<br>";
// echo"correo: ".$correo."<br>";
// echo"fecha: ".$fecha."<br>";
// echo"fecha: ".$consulta."<br>";

    $sql ="DELETE FROM area WHERE nombre='$nombre'";
    $result = mysqli_query($conn,$sql);



 echo "<script language='javascript'> alert('Area Borrada.'); window.location.href = '../MantenimientoColaboradoresAreas.php'; </script>";
?>