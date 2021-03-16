<?php
 $id   = $_POST["nombre"];
 $tipo = $_POST["tipo"];

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
if($tipo == "0"){?>
        <select name="puesto" id="puesto"  required>    
            <option required disabled>Seleccione una Opcion</option>
            <?php
    
                $sql = "SELECT id as id1, nombres from colaborador where area='$consultas' and estado='1'";
                $consulta=$con->query($sql);
                while ($row = mysqli_fetch_array($consulta)) 
                        {
                            echo utf8_encode('<option value="'.$row['id1'].'" requerid>'.$row['nombres'].'</option>');
                        }?>
        </select><?php } 

if($tipo == "1"){?>
        <select name="puesto1" id="puesto1"  required>    
            <option required disabled>Seleccione una Opcion</option>
            <?php
    
                $sql = "SELECT id as id2, nombres from colaborador where area='$consultas' and estado='1'";
                $consulta=$con->query($sql);
                while ($row = mysqli_fetch_array($consulta)) 
                        {
                            echo utf8_encode('<option value="'.$row['id2'].'" requerid>'.$row['nombres'].'</option>');
                        }?>
        </select><?php } ?>
