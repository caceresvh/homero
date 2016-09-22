<?php
//biblioteca o libreria externa
//aca estaran todas las funciones para trabajar con la base de datos, es una clase

function crearConexion()
{
   $config=parse_ini_file('database.ini'); // en esta variable array cae los datos de database y los guarda
   // dentro de un array
   
   //$conexion=new mysqli(SERVIDOR,USUARIO,PASSWORD,NOMBREBDD); antes hacia asi
   $conexion=new mysqli($config ['SERVIDOR'],$config ['USUARIO'],$config ['PASSWORD'],$config ['NOMBREBDD']);

   //variables son como los atributos y los metodos son como las funciones
   //accedo a un atributo o a un metodo con ->
   //connect_errno es un atributo que da todos los codigos de error, si es mayor a 0 tuve problema con la conexion

   if($conexion->connect_errno>0)
	   die ("Error en la conexion a la base de datos");
   return $conexion;

}
