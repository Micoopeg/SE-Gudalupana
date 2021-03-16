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
$id=$_POST['id'];


// echo"Cif: ".$cif."<br>";
// echo"nombre: ".$nombre."<br>";
// echo"puesto: ".$puesto."<br>";
// echo"area: ".$area."<br>";
// echo"correo: ".$correo."<br>";
// echo"Area: ".$area."<br>";
// echo"Nuevaa: ".$nombre."<br>";

    $sql ="UPDATE `pregunta` SET `nombre`='$nombre' where id='$id'";
    $result = mysqli_query($conn,$sql);



 echo "<script language='javascript'> alert('Pregunta Actualizado.'); window.location.href = '../MantenimientoPreguntas.php'; </script>";
?>