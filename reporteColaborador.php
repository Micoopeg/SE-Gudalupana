<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(0);

$validar =  $_SESSION['usuario'];

if($validar == null || $validar = '')
{
     echo "<script language='javascript'> window.location.href = 'index.php'; </script>";
    die();
}
 include 'Conexion/conexion.php'; 
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
 
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>SE - Reporte Colaborador</title>
  <link rel="stylesheet" href="Estilos/style1.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>
    <div class="menu"></div>
        <form id="promedioColaborador" name="promedioColaborador">
        <div id="msform2">
        <ul id="progressbar">
        </ul>
            <fieldset>
                <img src="Imagenes/Logotipo-Guadalupana1.png" style="position: absolute; top: -8px; right:0px;max-width: 100px" />
                <center><h2 class="fs-title" style="margin-top: 27px;">Promedio por colaborador</h2>
                <span style="color:black;"><font size = "3">Seleccionar area</font></span><br>
                <select onchange="buscar_ajaxEncuestado(this.value);" id="area0" name="area0">
                   <option required disabled>Seleccione una Opcion</option>
                                            <?php
                                                $query ="select id,nombre from area";
                                                $sql = $conn->query($query);
                                                    while ($row = mysqli_fetch_array($sql))
                                                    {
                                                        $nombre = $row["nombre"];?>
                                                        <option value="<?php echo "".$nombre; ?>" id="nombre" name="nombre"><?php  echo "".$nombre;?></option>
                                                    <?php }?>
                </select><br>
                <span style="color:black;"><font size = "3">Seleccionar colaborador</font></span><br>
                 <div id="mostrar" name="mostrar"></div>
              </center>
               
                <center><input  id="asignar" name="asignar" type="submit" name="next" class="next action-button" value="Ver" /></center><br><br><br>
            </fieldset>
        </div>
      
  </form>
</body>

     <script>
       $(document).ready(function () {
           $('.menu').load('MenuPrincipal1.php');
       });

function buscar_ajaxEncuestado(nombre)
        {
          var nombre = document.getElementById('area0').value;
          var tipo   = "0";
          $.ajax(
        { 
            type: 'POST',
            url:  'consultaColaborador.php',
            data: { 'nombre': nombre,'tipo': tipo},
            success: function(respuesta) 
          {
            //Copiamos el resultado en #mostrar
            $('#mostrar').html(respuesta);
     }
  });
  }

$(document).ready(function() {
    $('#asignar').on('click', function(e) {
        e.preventDefault();
        var dataString = $('#promedioColaborador').serialize();
        var url = "Conexion/AsignarEvaluador.php";
        $.ajax({
                type: "POST", //definimos el m??todo de env??o
                url: url, //el archivo al cual se enviaran
                data: dataString,

                }).done(function(data) { 
                 

                  
                });
    }); 
});
</script>
</html>
