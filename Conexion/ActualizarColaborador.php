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


$cif=$_POST['cif'];
$nombre=$_POST['nombre'];
$puesto=$_POST['puesto'];
$correo=$_POST['correo'];


// echo"Cif: ".$cif."<br>";
// echo"nombre: ".$nombre."<br>";
// echo"puesto: ".$puesto."<br>";
// echo"area: ".$area."<br>";
// echo"correo: ".$correo."<br>";
// echo"fecha: ".$fecha."<br>";
// echo"fecha: ".$consulta."<br>";

    $sql ="UPDATE `colaborador` SET `nombres`='$nombre',`puesto`='$puesto',`email`='$correo' WHERE cif='$cif'";
    $result = mysqli_query($conn,$sql);



 echo "<script language='javascript'> alert('Colaborador Actualizado.'); window.location.href = '../MantenimientoColaboradoresModificar.php'; </script>";
?>