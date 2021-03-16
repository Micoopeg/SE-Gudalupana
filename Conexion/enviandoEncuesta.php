<?php

$mail   = 'se@guadalupana.com.gt';
$cif    = $_GET["cif"];
$correo = $_GET["em"];

echo "CIF: ".$cif;
echo "CORREO: ".$correo;
//Recipiente
$to = 'keyshard@gmail.com';

//remitente del correo
$from = 'SE - Guadalupana';
$fromName = '';

//Asunto del email
$subject = 'Evaluación a colaboradores'; 


//Contenido del Email
$htmlContent = '
<html> 
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head> 
<body style="background:white; "> 
   
    <center> <img style="max-width: 250px" src="https://i.ibb.co/TtbMn45/logotipo.png"></center>
<center><h1 style="color:#404040;;"><strong>Bienvenido Bunny Box</strong></h1> </center>
<center><p style="font-size: 25px"> 
 Traemos tus paquetes de una manera rápida y segura de Estados Unidos,<br> ofreciendote distintos servicios, desde brindarte una asesoría completa para que aprendas a comprar en todas las paginas de internet<br> hasta hacer las compras por ti, no dudes en comunicarte por cualquiera de nuestras redes sociales si tienes alguna duda.<br><br>
 Adjuntamos el manual de usuario asi como los terminos y condiciones.
</p> </center>
<br>
    <center><b><a style="color:#d97f49;font-size: 20px" href="http://bunnyboxgt.com/Terminos-y-condiciones.pdf" target="_blank"><span class="glyphicon glyphicon-arrow-right"></span>&nbsp;&nbsp;&nbsp;Terminos y Condiciones</a></b></center><br>
<center> <img style="max-width: 800px" src="https://i.ibb.co/hDB4bs7/Direcci-n-Miami.jpg"></center>
    <br>
    
</body> 
</html> 
'; 

//Encabezado para información del remitente
$headers = "De: $fromName"." <".$from.">";

//Limite Email
$semi_rand = md5(time()); 
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

//Encabezados para archivo adjunto 
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

//límite multiparte
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 


//Enviar Mail
if(!($mail = @mail($correo, $subject, $message, $headers, $returnpath)))
{
     echo "Correo no Enviado";
}
else
{
 $mails = 'info@bunnyboxgt.com';
$tel = $_POST['tel'];
$correo = $_POST['correo'];
$nombre   = $_POST['nombre'];

//Recipiente
$to = 'keyshard@gmail.com';

//remitente del correo
$from = 'BunnyBox';
$fromName = '';

//Asunto del email
$subject = 'Nuevo Registro Bunny Box'; 


$cuerpo1 = '
<html> 
<head> 
</head> 
<body style="background:white; "> 
   
    <center> <img style="max-width: 250px" src="https://i.ibb.co/TtbMn45/logotipo.png"></center>
<center><h1 style="color:#404040;;"><strong>Nuevo Registro Bunny Box</strong></h1> </center>
<p> 
 
</p> 
</body> 
</html> 
'; 

$cuerpo22 = '
<html> 
<head> 
</head> 
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
   
  <footer style="text-align: center;padding: 3px;  background-color:black;  color: white;">
     <center><p>Atentamente:</p></center>
 <h5 style="color:white"><center>Equipo de Soporte:  <a href="https://www.ggsoftdevelop.com/" target="_blank" style="color:aqua;"> G&G SoftDevelop</a></center></h5>
</footer>
</html> 
'; 

$linea33=" <center>Nombre Cliente:<input style='color:gray;border: 0;' type='text' disabled='disabled' value='$nombre' /></center>";
$linea44=" <center>Celular:<input type='text' style='color:gray;border: 0;' disabled='disabled' value='$tel' /></center>";
$linea55=" <center>Correo:<input type='text' style='color:gray;border: 0;' disabled='disabled' value='$correo' /></center>";

    
$htmlContent=$cuerpo1.$linea33.$linea44.$linea55.$cuerpo22;
//Encabezado para información del remitente
$headers = "De: $fromName"." <".$from.">";

//Limite Email
$semi_rand = md5(time()); 
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

//Encabezados para archivo adjunto 
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

//límite multiparte
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 

//preparación de archivo
if(!empty($filess) > 0)
{
    if(is_file($filess))
    {
        $message .= "--{$mime_boundary}\n";
        $fp =    @fopen($filess,"rb");
        $data =  @fread($fp,filesize($filess));

        @fclose($fp);
        $data = chunk_split(base64_encode($data));
        $message .= "Content-Type: application/octet-stream; name=\"".basename($filess)."\"\n" . 
        "Content-Description: ".basename($filess[$i])."\n" .
        "Content-Disposition: attachment;\n" . " filename=\"".basename($filess)."\"; size=".filesize($filess).";\n" . 
        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
    }
}
$message .= "--{$mime_boundary}--";
$returnpath = "-f" . $from;

//Enviar EMail


//Enviar Mail
if(!($mail = @mail($mails, $subject, $message, $headers)))
{
     echo "Correo no Enviado";
}
else
{
  echo "<script language='javascript'> alert('En breves momentos te estaremos contactando, a tu correo se enviaron los datos de registro!'); window.location.href = 'index.html'; </script>";

}

}