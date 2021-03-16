<?php
 $id = $_POST["cadena"];
include 'Conexion/conexion.php';	
   $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if (!$con) 
    {
		die("Connection failed: " . mysqli_connect_error());
    }

//echo "<script language='javascript'> alert('Puesto: $id'); </script>"; 

$banderas = "SELECT id from area WHERE nombre='$id'";
$resultados = mysqli_query($con, $banderas);
$rows = mysqli_fetch_assoc($resultados);
$consultas = $rows['id'];
  
//echo "<script language='javascript'> alert('Puesto: $consultas'); </script>"; 


?>
<select name="puesto" id="puesto"  required>    
     <option required disabled>Seleccione una Opcion</option>
<?php
    
    $sql = "SELECT nombres from colaborador where area='$consultas' and estado='1'";
	$consulta=$con->query($sql);
	while ($row = mysqli_fetch_array($consulta)) 
         {
             echo utf8_encode('<option value="'.$row['nombres'].'" requerid>'.$row['nombres'].'</option>');
         }
?>
    </select>

    
