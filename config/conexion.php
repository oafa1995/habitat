<?php
$server="localhost";
$puerto="5432";
$database="habitat";
$usuario="postgres";
$clave="root";

$conexion=pg_connect("host=$server port=$puerto dbname=$database user=$usuario password=$clave");
if(!$conexion){
	echo"Error de conexion a la Base de Datos";
	exit;
	}else{
		//echo "hola";
	}
?>