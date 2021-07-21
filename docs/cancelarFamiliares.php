<?php 
 include("../config/conexion.php");   
//$idConsulta=$_POST[""];
//$idMedicina=$_POST["id_prod"];
$idcliente=$_POST["idcliente"];
$fecha_actual=date("Y-m-d");
//$dosis=$_POST["dosis"];

//$w=pg_query($conexion,"select idmedi,cantidad from detalle_factura where idfac_med='$idFactura' ");
//while($fila=pg_fetch_array($w)){
//    $u=pg_query($conexion,"UPDATE lote set cantidad=(cantidad+'$fila[1]') where fecha_cadu in (select min(fecha_cadu) from lote where idmedi='$fila[0]' and lote.estado=1 and (lote.fecha_cadu::date - '$fecha_actual'::date) >20 )");
//}

$eliminar=pg_query($conexion,"DELETE from familiares_cliente where idcliente='$idcliente' ");

//$eliminar2=pg_query($conexion,"DELETE from factura_medicina where idfac_med='$idFactura' ");


?>