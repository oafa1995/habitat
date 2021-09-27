<?php
$server="ec2-52-23-40-80.compute-1.amazonaws.com";
$puerto="5432";
$database="dfug7mqfvt0m0t";
$usuario="lrabxoraylrbte";
$clave="4fb97b294515e022a9b3b3bb736f5b349a35d3a742d0dc8d5581ae6e0ce95d61";

$conexion=pg_connect("host=$server port=$puerto dbname=$database user=$usuario password=$clave");
if(!$conexion){
	echo"Error de conexion a la Base de Datos";
	exit;
	}else{
		//echo "hola";$
		
	}
?>