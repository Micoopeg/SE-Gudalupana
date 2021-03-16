<link rel="stylesheet" href="../Estilos/style1.css">
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
    
<?php
   include 'conexion.php';    
   $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if (!$con) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $id   = $_POST["area0"];?>
    
            <center>
             <div  style="overflow-x:auto;">
                <table>
                           <tr>
                                <th>Area</th>
                                <th>Promedio</th>

                           </tr>
                           
                            <tbody>
                                <?php 
                                $banderas = "select AVG(T3.respuesta) as promedio, T1.nombre from colaborador T0 INNER JOIN area T1 ON T0.area = T1.id INNER JOIN encuesta T2 ON T0.id = T2.colaborador INNER JOIN encuesta_detail T3 ON T2.id = T3.encuesta WHERE T1.nombre = '$id' ";
                                $resultados = mysqli_query($con, $banderas);
                                while ($row = mysqli_fetch_array($resultados)) {
                                    $promedio       = $row["promedio"];
                                    $nombre  = $row["nombre"];?>
                                <tr>
                                        <td><?php echo "".$nombre;?></td>
                                        <td><?php echo "".$promedio;?></td>
                                </tr>
                              <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </center>

