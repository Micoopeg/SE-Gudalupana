<?php
        include 'Conexion/conexion.php';    
        $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        if (!$con) 
            {
                die("Connection failed: " . mysqli_connect_error());
            }
    
        $idAsociado      = $_GET['idA'];
        $correoAsociado  = $_GET['em'];
        $idColaborador   = $_GET['idC'];
        
        $evaluado = "select T0.id as idEvaluado, T0.nombres , T1.nombre as area from colaborador T0 
                        INNER JOIN area T1 ON T0.area = T1.id where T0.id = '$idColaborador'";
        $resultados = mysqli_query($con, $evaluado);
            while ($row = mysqli_fetch_array($resultados))
                 {
                    $nombres    = $row["nombres"];
                    $area       = $row["area"];
                    $idEvaluado = $row["idEvaluado"];
        
        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
        $titulo = "Link Encuesta Cultura de Servicio";
        $headers .= "From: Cultura de servicio <culturadeservicio@micoopeguadalupana.com.gt>\r\n";
       
        $strHTML = "";
        $strHTML .= "<html>";
        $strHTML .= "<head>";
        $strHTML .= "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
        $strHTML .= "<title>Link Encuesta Protocolo de Servicio</title>";
        $strHTML .= "</head>";
        $strHTML .= "<body style='margin: 0; padding: 0;'>";
        $strHTML .= "<p>Estimado(a) compañero(a),</p><br>";
        $strHTML .= "<p>Por este medio les hacemos llegar un cordial saludo y al mismo tiempo hacer de su conocimiento que a solicitud de Gerencia General y con base al Plan Anual de Capacitación, el departamento de capacitación y desarrollo a puesto en marcha el tema CULTURA DE SERVICIO para el área administrativa, por tal motivo agradecemos el apoyo para realizar la siguiente evaluación, al personal que se describe a continuación: <b>{$nombres}</b> del Departamento de <b>{$area}</b>, dicha evaluación medirá la calidad de servicio que brinda el compañero cada vez que requieren de su apoyo, además que la misma es estrictamente para fines de crecimiento de nuestra Cooperativa en busca de la mejora continúa.</p><br><br>";
        $strHTML .= "<p><b>Intrucciones generales</b></p>";
        $strHTML .= "<p>1. Ingresar al siguiente link http://evaluacionprotocolov2.micoopeguadalupana.com.gt/index.php?c={$idColaborador}&a={$idAsociado}</p>";
        $strHTML .= "<p>2. Al darle clik al link debes de realizar y finalizar la encuesta ya que se te bloqueara después de 5 minutos.</p>";
        $strHTML .= "<p>3. Duración de la encuesta es de 5 minutos.</p>";
        $strHTML .= "<p>4. Click en botón azul INICIAR y contestar la encuesta.</p>";
        $strHTML .= "<p>5. Fecha limite para realizar la evaluación 24 de febrero de 2021 a las 23:59 hrs.</p>";
        $strHTML .= "<p>6. Click en el botón FINALIZAR.</p><br>";
        $strHTML .= "<p>Cultura de servicio</p>";
        $strHTML .= "</body>";
        $strHTML .= "</html>";
        $mail = utf8_decode($strHTML);
    
    }
        if(!(mail($correoAsociado,$titulo,$mail,$headers)))
        {
            echo "Correo no Enviado";
            
        }
        else
        {
             $sql ="update colaborador_asociado set estado='1' WHERE colaborador='$idColaborador' and asociado='$idAsociado'";
            $result = mysqli_query($con,$sql); 
            echo "<script language='javascript'> alert('Correo Enviado.'); window.location.href = 'enviarEncuesta.php'; </script>";
        }
?>
