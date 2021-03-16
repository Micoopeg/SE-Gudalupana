<?php
 
  include 'Conexion/conexion.php';	


    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if (!$conn) 
    {
		die("Connection failed: " . mysqli_connect_error());
    }
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>SE - MantenimientoArea</title>
  <link rel="stylesheet" href="Estilos/style1.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<style>
.button {
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button1 {background-color: #69a43c;} 
.button2 {background-color: #003563;} 
.button3 {background-color: #69a43c;} 
    
    <style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  
  padding: 8px;
  text-align: center;
}

tr:nth-child(even){background-color: #69a43c}
</style>
</head>
    
    
<body>
    <div class="menu"></div>
    <br>
    <center><div>
        <button class="button button1" onclick="location.href='MantenimientoAreas.php'">Crear Area</button>
        <button class="button button2" onclick="location.href='MantenimientoColaboradoresAreas.php'">Modificar Area</button>
        <button class="button button3" onclick="location.href='MantenimientoAreaEliminar.php'">Eliminar Area</button>
    </div></center>
    
    <br>
    <br>
 <center><div style="overflow-x:auto;">
                        <table>
                           <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                            </tr>
                             <tbody>
                <?php  
                      include 'Conexion/conexion.php';	
                      $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
                  if ($conn->connect_error) 
                      {
                        die("Connection failed: " . $conn->connect_error);
                      }
                
                $sql = "select id, nombre from area order by id ASC";
                $consulta = $conn->query($sql);
                 while ($row = mysqli_fetch_array($consulta)) {
                              $id = $row["id"];
                              $nombre = $row["nombre"];
                     
                    
                ?>
                <tr>
                    <td><?php echo "".$id;?></td>
                    <td><?php echo "".$nombre;?></td>
                    <td>
                        <button   onclick="location.href='MantenimientoColaboradoresArea2.php?id=<?php echo $nombre;?>'" type="button" class="button button3" style="background-color:#003563;padding: 7px 20px;">Editar</button></td>
                  </tr>
               <?php } ?>
               </tbody>
                      </table>
                </div></center>
    
</body>

     <script>
       $(document).ready(function () {
           $('.menu').load('MenuPrincipal1.php');
       });
   </script>
</html>
