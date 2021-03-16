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

$nombre=$_POST['nombre'];

    date_default_timezone_set('America/Guatemala');
    $fecha = date("Y/m/d");

   
// echo"Cif: ".$cif."<br>";
// echo"nombre: ".$nombre."<br>";
// echo"puesto: ".$puesto."<br>";
// echo"area: ".$area."<br>";
// echo"correo: ".$correo."<br>";
// echo"fecha: ".$fecha."<br>";
// echo"fecha: ".$consulta."<br>";

    $sql ="INSERT INTO `area` (`id`, `nombre`, `add_fecha`) VALUES (NULL, '$nombre', '$fecha');";
    $result = mysqli_query($conn,$sql);



 echo "<script language='javascript'> alert('Area Creada.'); window.location.href = '../MantenimientoColaboradoresAreas.php'; </script>";
?>