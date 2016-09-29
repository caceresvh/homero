<?php
session_start();
if ($_SESSION['logueado']){
	echo "<h1 style 'text-aling:center'>¡ Bienvenido al Sistema !</h1>";
	echo 'Bienvenido,  '.$_SESSION ['username'];
	echo '<br>';
	echo 'Horario de Conexion:'.$_SESSION ['time'];
	echo '<br>';
	echo "<a href='logout.php'> Logout </a>";
}

?>