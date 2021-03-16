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
    $id            = $_POST["area0"];
    $colaborador   = $_POST["puesto"]
    ?>
    
            <center>
             <div  style="overflow-x:auto;">
                <table>
                           <tr>
                                <th>Area</th>
                                <th>Promedio</th>

                           </tr>
                           
                            <tbody>
                                <?php 
                                $banderas = "select avg(T3.respuesta) AS PROMEDIO, T1.nombres from area T0 
                                              INNER JOIN colaborador T1 ON T0.id = T1.area
                                              INNER JOIN encuesta T2 ON T1.id = T2.colaborador
                                              INNER JOIN encuesta_detail T3 ON T2.id = T3.encuesta
                                              where T0.id = '$id' and T1. = '$colaborador' ";
                                $resultados = mysqli_query($con, $banderas);
                                while ($row = mysqli_fetch_array($resultados)) {
                                    $promedio       = $row["promedio"];
                                    $nombre  = $row["nombres"];?>
                                <tr>
                                        <td><?php echo "".$nombre;?></td>
                                        <td><?php echo "".$promedio;?></td>
                                </tr>
                              <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </center>

