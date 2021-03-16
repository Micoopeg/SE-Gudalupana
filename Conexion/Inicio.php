<?php

session_start();

include 'conexion.php';	

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if (!$conn) 
    {
		die("Connection failed: " . mysqli_connect_error());
    }


$user=$_POST['user'];
$clave=$_POST['clave'];

$_SESSION['usuario'] = $user;



$grup = "SELECT Estado from usuario where Nombre='$user' AND Clave='$clave'";
$resultado = mysqli_query($conn, $grup);
$row = mysqli_fetch_assoc($resultado);
$estado = $row['Estado'];


if($estado == '1')
    {
       echo "<script language='javascript'>  window.location.href = '../MenuPrincipal.php'; </script>";
    }
else
    {
      echo "<script language='javascript'> alert('Usuario o la contraseña son incorrectos.'); window.location.href = '../index.php'; </script>";
    }

?>