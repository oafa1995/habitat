<?php	
$elegido=$_POST["elegido"];
 


$options="";
//////////////////////////////////////  terminar esto para el formulario
if ($elegido=="Ahuachapan" || $elegido=="Sonsonate" || $elegido=="Santa Ana") {


  $options="<option value='Occidente'>Occidente</option>";
   
}

if($elegido=="Cabañas" || $elegido=="Chalatenango" || $elegido=="Cuscatlan" || $elegido=="La Libertad" || $elegido=="La Paz" || $elegido=="San Salvador" || $elegido=="San Vicente"){
	  $options="<option value='Central'>Central</option>";
	
}

if($elegido=="Morazan" || $elegido=="San Miguel" || $elegido=="Usulutan" || $elegido=="La Union"){
	$options="<option value='Oriental'>Oriental</option>";
}

echo $options;    

	
?>


