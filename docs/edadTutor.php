<?php	

function obtener_edad($fecha_nac){
    $mes="";
$fecha_nac = strtotime($fecha_nac);
$edad = date('Y', $fecha_nac);
 if (($mes = (date('m') - date('m', $fecha_nac))) < 0) {
  $edad++;
 } elseif ($mes == 0 && date('d') - date('d', $fecha_nac) < 0) {
  $edad++;
 }
return date('Y') - $edad;
}


$elegido=$_POST["elegido"];
 
 $elegido=obtener_edad($elegido);
 
//echo "La edad del usuario es: ". obtener_edad('1988/08/06');






$options="";
//////////////////////////////////////
if ($elegido<18) {
 
 $options= "<option value=''  >Edad no válida </option>";      
}


if($elegido>17){
	 $options= "<option value=\"".$elegido."\"  > $elegido años  </option>";  
	
}





echo $options;    

	
?>