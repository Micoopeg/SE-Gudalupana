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
    $id   = $_POST["puesto"];?>
    
            <center>
             <div  style="overflow-x:auto;">
                <table>
                           <tr>
                                <th>CIF</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Estado</th>
                                <th>Acción</th>
                           </tr>
                           
                            <tbody>
                                <?php 
                                $banderas = "select T0.nombres as nombre, T0.cif, T0.puesto,
                                T0.email as correo ,T1.asociado ,T1.estado from   colaborador T0 
                                inner join colaborador_asociado T1 ON T0.id = T1.asociado
                                WHERE T1.colaborador = '$id'";
                                $resultados = mysqli_query($con, $banderas);
                                while ($row = mysqli_fetch_array($resultados)) {
                                    $cif       = $row["cif"];
                                    $asociado  = $row["asociado"];
                                    $correo    = $row["correo"];
                                    $nombre    = $row["nombre"];
                                    $estado    = $row["estado"];?>
                                <tr>
                                        <td><?php echo "".$cif;?></td>
                                        <td><?php echo "".$nombre;?></td>
                                        <td><?php echo "".$correo;?></td>
                                        <?php if($estado == "0"){?>
                                               <td><i class="fa fa-exclamation-circle" aria-hidden="true" title="No inicia"></i></td>
                                        <?php } ?>
                                        <?php if($estado == "1"){?>
                                               <td><i class="fa fa-envelope" aria-hidden="true" title="Enviada"></i></td>
                                        <?php } ?>
                                        <?php if($estado == "2"){?>
                                               <td><i class="fa fa-check-square-o" aria-hidden="true" title="Realizada"></i></td>
                                        <?php } ?>
                                        <td>
                                        <?php if($estado == "0"){ ?>
                                        <button   onclick="location.href='enviandoEncuesta.php?idA=<?php echo $asociado;?>&em=<?php echo $correo; ?>&idC=<?php echo $id;?>'" type="button" class="button button3" style="background-color:#003563;padding: 7px 20px;">Enviar Encuesta</button>
                                    <?php } ?>
                                    <?php if($estado == "1"){ ?>
                                        <button  disabled  type="button" class="button button3" style="background-color:#003563;padding: 7px 20px;">Enviar Encuesta</button>
                                    <?php } ?>
                                    <?php if($estado == "2"){ ?>
                                        <button disabled  type="button" class="button button3" style="background-color:#003563;padding: 7px 20px;">Enviar Encuesta</button>
                                    <?php } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </center>

