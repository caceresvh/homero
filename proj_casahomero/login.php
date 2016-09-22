<?php
//
//valida nombre de usuario y pass
//$_Post atrapa el valor de los names que estan en form_login.html
header('Content-type: text/html;charset-UTF-8');
$usuario=$_POST ['user'];
$pass=$_POST ['password'];
include_once 'includes/bdd.php';
$con=crearConexion(); // $con es una variable objeto
$con->set_charset("utf8"); //todo estara siempre en utf8
$sql="call sp_login_usuario(?,?,@valor_existe)"; //invoco la funcion, en los IN ? en los OUT @nombre del argumento
// para asegurarme que la entrada no sea una instruccion SQL, uso ? en su lugar.
$stmt = $con->prepare($sql);  // con esto limpio los valores de entrada
// empiezo a limpiar a ?, ?
$stmt->bind_param('ss', $usuario, $pass); //'ss' limpia cualquier comando SQL
$stmt->execute(); //ahora ejecuta el Call
$result2=$con->query("SELECT @valor_existe"); //pregunto por el valor del paramentro de salida
$row = $result2->fetch_assoc(); //recojo el valor del campo OUT (0 u 1)
if ($row['@valor_existe']==0)
{
	// (solucion anterior ) echo "<h1 style='text-align:cneter',>"."Ingreso invalido el sistema"."</h1>";
	// con js
	echo "<script> alert ('Ingreso Invalido al Sistema')</script>";
	echo "<script> window.location.assign ('form_login.html')</script>";
}
else 
{
// aca va el servicio que vamos a ofrecer si el ingreso fue correcto
    header('location:welcome.php'); // con header redirecciono
}
 

 




//comprobamos que los valores fueron atrapados correctamente
//echo $usuario;
//echo "<br>";
//echo $pass;

//voy a la base y consulto si el usuario y la clave son correctas, sino vuelvo al html
//me conecto a la base de datas

//guardo en constantes los datos para conectarme a la bd.
//primero va el nombre de la constante y siempre en mayuscula
//los define los borre porque ahora uso database.inic
//accedemos a la interface mysqli
//definimos variable que guardara a quien manejara toda la conexion=>new
//mysqli es el metodo

	
	




















