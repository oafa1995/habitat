<?php 
date_default_timezone_set('America/El_Salvador');
 include("../config/conexion.php");   
$nombre=$_POST["nombre"];
$nombre=ucwords($nombre);
$apellido=$_POST["apellido"];
$apellido=ucwords($apellido);
$edad=$_POST["edad"];
$idcliente=$_POST["idcliente"];
$parentesco=$_POST["parentesco"];
$escolaridad=$_POST["escolaridad"];
$ocupacion=$_POST["ocupacion"];
$ingreso_pro=$_POST["ingreso_pro"];


$lugar_trabajo=$_POST["lugar_trabajo"];
$discapacidad=$_POST["discapacidad"];
//$dosis=$_POST["dosis"];


//otro_parentesco=$('#potros').val();
//otra_escolaridad=$('#otro_esco').val();
//otro_ocupa=$('#otro_ocupa').val();
//otra_discapacidad=$('#dis').val();

$otro_p=$_POST["otro_parentesco"];
$otra_e=$_POST["otra_escolaridad"];
$otra_o=$_POST["otro_ocupa"];
$otra_d=$_POST["otra_discapacidad"];


if(!isset($otro_p) || $otro_p==''){
$otro_p='';
}

if(!isset($otra_e) || $otra_e==''){
    $otra_e='';
    }

    if(!isset($otra_o) || $otra_o==''){
        $otra_o='';
        }

        if(!isset($otra_d) || $otra_d==''){
            $otra_d='';
            }


//if(){

//if (isset($ingreso_pro)) {
//    $q3=pg_query($conexion,"INSERT into familiares_cliente(nombres,apellidos,fecha_nac,idcliente,parentesco,escolaridad,ocupacion,ingresos_pro,lugar_trabajo,discapacidad) values('$nombre','$apellido','$fechan','$idcliente','$parentesco','$escolaridad','$ocupacion','$ingreso_pro','$lugar_trabajo','$discapacidad') returning idfamiliar");
    $q3=pg_query($conexion,"INSERT into familiares_cliente(nombres,apellidos,edad,idcliente,parentesco,escolaridad,ocupacion,ingresos_pro,lugar_trabajo,discapacidad,otro_parentesco,otra_escolaridad,otra_ocupacion,otra_discapacidad) values('$nombre','$apellido','$edad','$idcliente','$parentesco','$escolaridad','$ocupacion','$ingreso_pro',NULLIF('$lugar_trabajo',''),'$discapacidad',NULLIF('$otro_p',''),NULLIF('$otra_e',''),NULLIF('$otra_o',''),NULLIF('$otra_d','') ) returning idfamiliar");

//    }else{
//        $q3=pg_query($conexion,"INSERT into familiares_cliente(nombres,apellidos,fecha_nac,idcliente,parentesco,escolaridad,ocupacion,lugar_trabajo,discapacidad) values('$nombre','$apellido','$fechan','$idcliente','$parentesco','$escolaridad','$ocupacion','$lugar_trabajo','$discapacidad') returning idfamiliar");
    //   $q3=pg_query($conexion,"INSERT into familiares_cliente(nombres,apellidos,fecha_nac,idcliente,parentesco,escolaridad,ocupacion,lugar_trabajo,discapacidad,otro_parentesco,otra_escolaridad,otra_ocupacion,otra_discapacidad) values('$nombre','$apellido','$fechan','$idcliente','$parentesco','$escolaridad','$ocupacion','$lugar_trabajo','$discapacidad','$otro_p','$otra_e','$otra_o','$otra_d') returning idfamiliar");

  //  }

//}

$fila2=pg_fetch_array($q3);///obteniendo el id de la insercion recien hecha
$idfamiliar=$fila2[0];
 


 
 echo $idfamiliar;


?>