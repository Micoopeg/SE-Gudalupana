<?php 
    include 'conexion.php';	
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if (!$conn) 
    {
		die("Connection failed: " . mysqli_connect_error());
    }
   
    $idEvaluado  = $_POST['puesto'];
    $idEvaluador = $_POST['puesto1'];

 // INSERTA tbl_colaborador
    $inserta = "insert into colaborador_asociado values ('','$idEvaluado','$idEvaluador','0','1','1','null')";
    $resultado = $conn->query($inserta);

    $sql = "select count(0) as cantidad from colaborador_asociado where colaborador = '$idEvaluado'";
    $result = $conn->query($sql);
    while ($row = mysqli_fetch_array($result)) {

    	 $cantidad = $row["cantidad"];
    	  echo $cantidad;
    }
   
        
    		
?>
