<?php
 
 $id = $_GET["id"];

  include 'Conexion/conexion.php';	

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if (!$conn) 
    {
		die("Connection failed: " . mysqli_connect_error());
    }


//$banderas = "SELECT cif from colaborador WHERE nombres='Diego Jose Gomez Giron'";
//$resultados = mysqli_query($conn, $banderas);
//$rows = mysqli_fetch_assoc($resultados);
//$consultas = $rows['cif'];
//
//echo $id;

 $sql ="UPDATE `colaborador` SET `estado`='0' WHERE nombres ='$id'";
 $result = mysqli_query($conn,$sql); 

echo "<script language='javascript'> alert('Colaborador Eliminado.'); window.location.href = 'MenuPrincipal.php'; </script>";
?>



