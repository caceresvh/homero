<?php
session_start();
if (isset($_POST['enviar']) && $_POST ["captcha"] && $_POST  ["captcha"] !="" &&
    $_SESSION["code"]==$_POST["captcha"]) // si la variable de Session es igual a lo que escribo sigue
    
{
	
	$nombre = $_POST ['nombre'];
	$mail = $_POST ['mail'];    // Emisor
	$empresa = $_POST ['empresa'];
	
// $header arma le encabezado del mail   	
    $header = "From: " . $mail . " \r\n";
    $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
    $header .= "Mime-Version: 1.0 \r\n";
    $header .= "Content-Type: text/plain";
    
    $mensaje = "Este mensaje fue enviado por " . $nombre . ", de la empresa " . $empresa .  " \r\n";
    $mensaje .= "Su e-mail es: " . $mail .  " \r\n";
    $mensaje .= "Mensaje: " . $_POST ['mensaje'] .  " \r\n";
    $mensaje .= "Enviado el " . date('d/m/Y', time());  
    
    $para = "info@micorreo.com.ar";  // Receptor
    $asunto = "Pedido de Informacion de: " . $nombre;
    
    if (($nombre=="") or ($mail=="") or ($_POST ['mensaje']==""))
    {
    	echo "Error en el envio del correo";
    }
    else 
    {
        mail($para, $asunto, utf8_decode($mensaje), $header); //utf8_decode es una funcion que pasa todo a utf8  
        header ("Location:correo_enviado.html");
    
    }

}

elseif ($_SESSION["code"]!=$_POST["captcha"])
{
	 echo "<p style='text-align:center'>Codigo Invalido</p>";
}



?>
