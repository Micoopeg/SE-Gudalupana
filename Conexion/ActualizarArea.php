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
$area=$_POST['area'];


// echo"Cif: ".$cif."<br>";
// echo"nombre: ".$nombre."<br>";
// echo"puesto: ".$puesto."<br>";
// echo"area: ".$area."<br>";
// echo"correo: ".$correo."<br>";
// echo"Area: ".$area."<br>";
// echo"Nuevaa: ".$nombre."<br>";

    $sql ="UPDATE `area` SET `nombre`='$nombre' where nombre='$area'";
    $result = mysqli_query($conn,$sql);



 echo "<script language='javascript'> alert('Area Actualizado.'); window.location.href = '../MantenimientoColaboradoresAreas.php'; </script>";
?>