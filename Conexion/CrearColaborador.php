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
$area=$_POST['puestos'];

    date_default_timezone_set('America/Guatemala');
    $fecha = date("Y/m/d");

   
$bandera = "SELECT id from area where nombre='$area'";
$resultado = mysqli_query($conn, $bandera);
$row = mysqli_fetch_assoc($resultado);
$consulta = $row['id'];


// echo"Cif: ".$cif."<br>";
// echo"nombre: ".$nombre."<br>";
// echo"puesto: ".$puesto."<br>";
// echo"area: ".$area."<br>";
// echo"correo: ".$correo."<br>";
// echo"fecha: ".$fecha."<br>";
// echo"fecha: ".$consulta."<br>";

    $sql ="INSERT INTO `colaborador` (`id`, `cif`, `nombres`, `puesto`, `area`, `email`, `add_fecha`,`estado`) VALUES (NULL, '$cif', '$nombre', '$puesto', '$consulta', '$correo', '$fecha','1');";
    $result = mysqli_query($conn,$sql);



 echo "<script language='javascript'> alert('Colaborador Registrado.'); window.location.href = '../MantenimientoColaboradores.php'; </script>";
?>