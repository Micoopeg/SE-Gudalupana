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


$usuario=$_POST['user'];
$pass=$_POST['pass'];
$encrypt=sha1($pass);

    $sql ="insert into usuario (id,Nombre,Clave,Estado) values ('','$usuario','$encrypt','1')";
    $result = mysqli_query($conn,$sql);

 echo "<script language='javascript'> alert('Usuario Registrado.'); window.location.href = '../MantenimientoUsuario.php'; </script>";

?>