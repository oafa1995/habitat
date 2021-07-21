<?php 
 include("../config/conexion.php");   
//$idConsulta=$_POST[""];
include("../config/conexion.php");   
//$idConsulta=$_POST[""];
$idcliente=$_POST["idcliente"];
$idfamiliar=$_POST["id_familiar"];


$eliminar=pg_query($conexion,"DELETE from familiares_cliente where idcliente='$idcliente' and idfamiliar='$idfamiliar' ");


?>