<?php session_start();
if($_SESSION['autenticado']!="yeah"){
  header("Location: ../index.php");
    exit();
    }
    date_default_timezone_set('America/El_Salvador');
  $cont2=0;
  $idcliente=$_REQUEST["iddatos"];
  $idsolicitud=$_REQUEST["iddatos2"];
  $anio_actual=date("Y");//año
?>
  
<!DOCTYPE html>
<html>
<head>
    <title>Situación Vivienda</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../img/tittle.ico"  >
	

    <script src="../js/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="../css/sweet-alert.css">
    <link rel="stylesheet" href="../css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="../js/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="../js/modernizr.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../js/main.js"></script>
	
	<script src="../js/jquery.maskedinput.js"></script>
    <script src="../js/jquery.numeric.js"></script>
	

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>


	<!-- include alertify.css -->
<link rel="stylesheet" href="../alertas/build/css/alertify.css">

<!-- include boostrap theme  -->
<link rel="stylesheet" href="../alertas/build/css/themes/bootstrap.css">

<!-- include alertify script -->
<script src="../alertas/build/alertify.js"></script>

<script type="text/javascript">
//override defaults
alertify.defaults.transition = "slide";
alertify.defaults.theme.ok = "btn btn-primary";
alertify.defaults.theme.cancel = "btn btn-danger";
alertify.defaults.theme.input = "form-control";
</script>
	


	
	

	
	<script>
   $(document).ready(function () {
	   
	   
 
 
 
 

 
 	   
	   
/////////////////////////////////////////validacion nombre 
 $("#nombre").keypress(function (key) {
            window.console.log(key.charCode)
            if ((key.charCode < 97 || key.charCode > 122)//letras mayusculas
                && (key.charCode < 65 || key.charCode > 90) //letras minusculas
                && (key.charCode != 8) //retroceso
                && (key.charCode != 241) //ñ
                 && (key.charCode != 209) //Ñ
                 && (key.charCode != 32) //espacio
                 && (key.charCode != 225) //á
                 && (key.charCode != 233) //é
                 && (key.charCode != 237) //í
                 && (key.charCode != 243) //ó
                 && (key.charCode != 250) //ú
                 && (key.charCode != 193) //Á
                 && (key.charCode != 201) //É
                 && (key.charCode != 205) //Í
                 && (key.charCode != 211) //Ó
                 && (key.charCode != 218) //Ú
 
                )
                return false;
        });
		
		///////////////////////////validacion apellido


 $("#apellido").keypress(function (key) {
            window.console.log(key.charCode)
            if ((key.charCode < 97 || key.charCode > 122)//letras mayusculas
                && (key.charCode < 65 || key.charCode > 90) //letras minusculas
                && (key.charCode != 8) //retroceso
                && (key.charCode != 241) //ñ
                 && (key.charCode != 209) //Ñ
                 && (key.charCode != 32) //espacio
                 && (key.charCode != 225) //á
                 && (key.charCode != 233) //é
                 && (key.charCode != 237) //í
                 && (key.charCode != 243) //ó
                 && (key.charCode != 250) //ú
                 && (key.charCode != 193) //Á
                 && (key.charCode != 201) //É
                 && (key.charCode != 205) //Í
                 && (key.charCode != 211) //Ó
                 && (key.charCode != 218) //Ú
 
                )
                return false;
        });
		
		
		
		

		
	});
  </script>

	
		
<script language="javascript">
////////////////////script para llamar php que valida fecha de nacimiento del tutor


$(document).ready(function(){
   $("#departamento").change(function () {
           $("#departamento").each(function () {
            elegido=$(this).val();
            $.post("municipios.php", { elegido: elegido }, function(data){
            $("#municipio").html(data);
            });            
        });
   })
});
</script>

<script language="javascript">
////////////////////script para llamar php que valida fecha de nacimiento del tutor


$(document).ready(function(){
   $("#departamento").change(function () {
           $("#departamento").each(function () {
            elegido=$(this).val();
            $.post("zonas.php", { elegido: elegido }, function(data){
            $("#zona").html(data);
            });            
        });
   })


   
});
</script>
  
<script language="javascript">
////////////////////script para llamar php que valida fecha de nacimiento del tutor


$(document).ready(function(){
   $("#fechaN").change(function () {
           $("#fechaN").each(function () {
            elegido=$(this).val();
            $.post("edadTutor.php", { elegido: elegido }, function(data){
            $("#edad").html(data);
            });            
        });
   })
});
</script>


<style>
 
#nombre {text-transform:capitalize;}  
#apellido {text-transform:capitalize;}  



 </style>
  
  
  <script type="text/javascript">
///////////////validar solo numeros enteros
	$(document).ready(function(){

$('#grupoF').on('input', function () { 
    this.value = this.value.replace(/[^0-9]/g,'');
});
});
</script>
	
	
	<script type="text/javascript" class="init"> 

    function alertaError(){
  alertify.error("<h1>Error</h1>"+"<p>No ha agregado ningun cliente</p>"+"<img src='../img/error.png'>").dismissOthers();

	}
  	
	function r(id,id2) { location.href="situacionSalud.php?iddatos="+id+"&iddatos2="+id2
 //   window.open("editarMedicina.php?iddatos="+id, '_parent');
   } 
  
  
  function alertaExito(){
  alertify.success("<h1>Exito</h1>"+"<p>Datos ingresados correctamente</p>"+"<img src='../img/bien.png'>").set({transition:'flipx'});
  }

  function alertaErrorIngresar(){
  alertify.error("<h1>Error</h1>"+"<p>No se puedo ingresar el paciente </p>"+"<img src='../img/error.png'>").dismissOthers();


  }

  function alertaErrorA(){
  alertify.error("<h1>Error</h1>"+"<p>Campos vacios </p>"+"<img src='../img/error.png'>").dismissOthers();


  }
  function alertaErrorB(){
  alertify.error("<h1>Error</h1>"+"<p>LA fecha no es correcta </p>"+"<img src='../img/error.png'>").dismissOthers();


  }
  function alertaErrorC(){
  alertify.error("<h1>Error</h1>"+"<p>El correo no tiene el formato correcto </p>"+"<img src='../img/error.png'>").dismissOthers();


  }
  function alertaErrorD(){
  alertify.error("<h1>Error</h1>"+"<p>Email mal digitado </p>"+"<img src='../img/error.png'>").dismissOthers();


  }
  function alertaErrorE(){
  alertify.error("<h1>Error</h1>"+"<p>Nit mal digitado </p>"+"<img src='../img/error.png'>").dismissOthers();


  }

	function alertaError2(){
	alertify.notify("<h1>Aviso</h1>"+"<p>Este campo no es editable, es generado según la fecha de nacimiento</p>"+"<img src='../img/advertencia.png' width='200' height='170'>").dismissOthers();		
}

function verificar(){
            	

  $(document).ready(function() {

//if ($("#ct1").is(':checked') && $("#ct2").is(':checked') && $("#cc").is(':checked')) {
  if (document.getElementById('tenencia').value=="" ||
  (document.getElementById('otro_tenencia').value=="" && $('#otro_tenencia').is(':visible')) || 			
        document.getElementById('registrada').value=="" ||
        (document.getElementById('otro_registrada').value=="" && $('#otro_registrada').is(':visible')) || 			

            document.getElementById('espacios').value=="" ||  
            document.getElementById('materiales_paredes').value=="" || 
            document.getElementById('pro_legal').value=="" || 
                    (document.getElementById('otro_materiales_paredes').value=="" && $('#otro_materiales_paredes').is(':visible')) || 			

            document.getElementById('materiales_techo').value=="" ||
            (document.getElementById('otro_materiales_techo').value=="" && $('#otro_materiales_techo').is(':visible')) || 			

            document.getElementById('materiales_piso').value=="" ||   
            (document.getElementById('otro_materiales_piso').value=="" && $('#otro_materiales_piso').is(':visible')) || 			


            document.getElementById('partes_danadas').value=="" ||  
            (document.getElementById('otro_parte_danadas').value=="" && $('#otro_parte_danadas').is(':visible')) || 			


            document.getElementById('agua_potable').value=="" ||  
        
            document.getElementById('abastece_agua').value=="" ||  
            (document.getElementById('otro_abastecimiento_agua').value=="" && $('#otro_abastecimiento_agua').is(':visible')) || 			

            
            document.getElementById('energia_electrica').value=="" ||

            document.getElementById('abastece_energia').value=="" ||
            (document.getElementById('otro_abastecimiento_energia').value=="" && $('#otro_abastecimiento_energia').is(':visible')) || 			


            
            document.getElementById('tipo_sanitario').value=="" ||
           
            document.getElementById('tratamiento_agua_gris').value=="" ||
            (document.getElementById('otro_tratamiento_agua').value=="" && $('#otro_tratamiento_agua').is(':visible')) || 			


            document.getElementById('basura_vivienda').value=="" ||

            document.getElementById('combustible_cocina').value=="" ||
            (document.getElementById('otro_combustible_cocina').value=="" && $('#otro_combustible_cocina').is(':visible')) || 			


            document.getElementById('equipo_vivienda').value=="" ||

            (document.getElementById('otro_equipo_vivienda').value=="" && $('#otro_equipo_vivienda').is(':visible')) || 			

            document.getElementById('posee_telefono').value=="" ||

            document.getElementById('cantidad_telefonos').value=="" ||
            document.getElementById('gasto_mensual_telefono').value=="" ||
            document.getElementById('cable').value=="" ||
            document.getElementById('internet').value=="" ||
            document.getElementById('redes_sociales').value=="" ||
            document.getElementById('cual_red_social').value=="" ||

            (document.getElementById('otro_cual_red').value=="" && $('#otro_cual_red').is(':visible')) || 			
 
            document.getElementById('vivienda_afectada').value=="" ||
            document.getElementById('evento_dano').value=="" ||

      //      (document.getElementById('otro_evento_dano').value=="" && $('#otro_evento_dano').is(':visible')) || 			
            document.getElementById('nivel_afectacion').value=="" ||
            document.getElementById('dano_parcial').value=="" ||

            document.getElementById('afectacion_medios_vida').value=="" ||
             (document.getElementById('otro_afectacion_medios').value=="" && $('#otro_afectacion_medios').is(':visible')) || 			

             document.getElementById('capacitacion_gestion_riesgos').value=="" ||

             document.getElementById('riesgo_comunidad').value=="" ||
            
             document.getElementById('riesgo_fisico').value=="" ||
             (document.getElementById('otro_riesgo_fisico').value=="" && $('#otro_riesgo_fisico').is(':visible')) || 			

             document.getElementById('riesgo_social').value=="" ||
             (document.getElementById('otro_riesgo_social').value=="" && $('#otro_riesgo_social').is(':visible')) || 			

             document.getElementById('plan_familiar').value=="" ||

             document.getElementById('nombre').value=="" ||
             document.getElementById('parentesco').value=="" ||


             document.getElementById('comision_proteccion').value=="" 



             ) { 
                              alertaErrorA(); 
                  //    document.getElementById('bandera').value="";
                  var hoja = document.createElement('style')
hoja.innerHTML = ".form-group input:invalid{border-left-color: firebrick;}";
document.body.appendChild(hoja);
             
                  
              }else{
                document.getElementById('bandera').value="add";
				
        document.frmcdi.submit();	
              }
        
//}


});






          
}


	function Salir(){
	
			
alertify.confirm("<center>ATENCI&Oacute;N!</center>", "<center><img src='../img/warning.png' width='250' height='250'></center>"+"<center><h1>Desea cerrar la sesión?</h1></center>", function(){ alertify.success('Ok') 

document.location.href="../config/fin.php";
}
                , function(){ alertify.error('No ha cerrado la sesión').dismissOthers()}).set('labels', {ok:'si', cancel:'no'}).set({transition:'zoom'});; 
		
		
		}
	
	</script>
	
	
	<script>
	
function ayuda(){
	  $(document).ready(function () {
	$("#ayuda").modal();
	  });
}
	
	</script>
	

  <style>


     
    
    




/*.form-group input:invalid{
    border-left-color: salmon;
}*/




</style>

  
<style>
 
 #nombre {text-transform:capitalize;}  
 #apellido {text-transform:capitalize;}
  
  </style>


<script language="javascript">
////////////////////script para llamar php que muestra los datos del producto a vender por codigo


$(document).ready(function(){

  
	$("#ltenencia").hide();
	$("#div1").hide();
$("#otro_tenencia").hide();


//$(".ldiv1").hide();


   $("#tenencia").change(function () {
//	alert("hola");
           $("#tenencia").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="Otra"){

	$("#ltenencia").show();
	$("#div1").show();
$("#otro_tenencia").show();

}else{

	$("#ltenencia").hide();
	$("#div1").hide();
$("#otro_tenencia").hide();



document.getElementById('otro_tenencia').value="";

//$(".ldiv1").hide();
}

		//	$("#precio").html(data);
		
			
          //  });            
        });
   })
});
</script>
  

<script language="javascript">
////////////////////script para llamar php que muestra los datos del producto a vender por codigo


$(document).ready(function(){

  
	$("#lregistrada").hide();
	$("#div2").hide();
$("#otro_registrada").hide();


//$(".ldiv1").hide();


   $("#registrada").change(function () {
//	alert("hola");
           $("#registrada").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="Otro"){

	$("#lregistrada").show();
	$("#div2").show();
$("#otro_registrada").show();

}else{

	$("#lregistrada").hide();
	$("#div2").hide();
$("#otro_registrada").hide();



document.getElementById('otro_registrada').value="";

//$(".ldiv1").hide();
}

		//	$("#precio").html(data);
		
			
          //  });            
        });
   })
});
</script>
  
<script language="javascript">
////////////////////script para llamar php que muestra los datos del producto a vender por codigo


$(document).ready(function(){

  
	$("#lmateriales_paredes").hide();
	$("#div3").hide();
$("#otro_materiales_paredes").hide();


//$(".ldiv1").hide();


   $("#materiales_paredes").change(function () {
//	alert("hola");
           $("#materiales_paredes").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="Otro"){

	$("#lmateriales_paredes").show();
	$("#div3").show();
$("#otro_materiales_paredes").show();

}else{

	$("#lmateriales_paredes").hide();
	$("#div3").hide();
$("#otro_materiales_paredes").hide();


document.getElementById('otro_materiales_paredes').value="";

//$(".ldiv1").hide();
}

		//	$("#precio").html(data);
		
			
          //  });            
        });
   })
});
</script>

<script language="javascript">
////////////////////script para llamar php que muestra los datos del producto a vender por codigo


$(document).ready(function(){

  
	$("#lotro_materiales_techo").hide();
	$("#div4").hide();
$("#otro_materiales_techo").hide();


//$(".ldiv1").hide();


   $("#materiales_techo").change(function () {
//	alert("hola");
           $("#materiales_techo").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="Otro"){
	$("#lotro_materiales_techo").show();
	$("#div4").show();
$("#otro_materiales_techo").show();

}else{

	$("#lotro_materiales_techo").hide();
	$("#div4").hide();
$("#otro_materiales_techo").hide();


document.getElementById('otro_materiales_techo').value="";

//$(".ldiv1").hide();
}

		//	$("#precio").html(data);
		
			
          //  });            
        });
   })
});
</script>


<script language="javascript">
////////////////////script para llamar php que muestra los datos del producto a vender por codigo


$(document).ready(function(){

  
	$("#lotro_materiales_piso").hide();
	$("#div5").hide();
$("#otro_materiales_piso").hide();


//$(".ldiv1").hide();


   $("#materiales_piso").change(function () {
//	alert("hola");
           $("#materiales_piso").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="Otro"){
	$("#lotro_materiales_piso").show();
	$("#div5").show();
$("#otro_materiales_piso").show();

}else{
	$("#lotro_materiales_piso").hide();
	$("#div5").hide();
$("#otro_materiales_piso").hide();


document.getElementById('otro_materiales_piso').value="";

//$(".ldiv1").hide();
}

		//	$("#precio").html(data);
		
			
          //  });            
        });
   })
});
</script>


<script language="javascript">
////////////////////script para llamar php que muestra los datos del producto a vender por codigo


$(document).ready(function(){

  
	$("#lotro_parte_danadas").hide();
	$("#div6").hide();
$("#otro_parte_danadas").hide();


//$(".ldiv1").hide();


   $("#partes_danadas").change(function () {
//	alert("hola");
           $("#partes_danadas").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="Otro"){
	$("#lotro_parte_danadas").show();
	$("#div6").show();
$("#otro_parte_danadas").show();

}else{
	$("#lotro_parte_danadas").hide();
	$("#div6").hide();
$("#otro_parte_danadas").hide();

document.getElementById('otro_parte_danadas').value="";

//$(".ldiv1").hide();
}

		//	$("#precio").html(data);
		
			
          //  });            
        });
   })
});
</script>

<script language="javascript">
////////////////////script para llamar php que muestra los datos del producto a vender por codigo


$(document).ready(function(){

  
	$("#lotro_abastecimiento_agua").hide();
	$("#div7").hide();
$("#otro_abastecimiento_agua").hide();


//$(".ldiv1").hide();


   $("#abastece_agua").change(function () {
//	alert("hola");
           $("#abastece_agua").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="Otro"){
	$("#lotro_abastecimiento_agua").show();
	$("#div7").show();
$("#otro_abastecimiento_agua").show();


}else{
	$("#lotro_abastecimiento_agua").hide();
	$("#div7").hide();
$("#otro_abastecimiento_agua").hide();


document.getElementById('otro_abastecimiento_agua').value="";

//$(".ldiv1").hide();
}

		//	$("#precio").html(data);
		
			
          //  });            
        });
   })
});
</script>

<script language="javascript">
////////////////////script para llamar php que muestra los datos del producto a vender por codigo


$(document).ready(function(){

  
	$("#lotro_abastecimiento_energia").hide();
	$("#div8").hide();
$("#otro_abastecimiento_energia").hide();


//$(".ldiv1").hide();


   $("#abastece_energia").change(function () {
//	alert("hola");
           $("#abastece_energia").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="Otros"){
	$("#lotro_abastecimiento_energia").show();
	$("#div8").show();
$("#otro_abastecimiento_energia").show();

}else{
	$("#lotro_abastecimiento_energia").hide();
	$("#div8").hide();
$("#otro_abastecimiento_energia").hide();

document.getElementById('otro_abastecimiento_energia').value="";
 
//$(".ldiv1").hide();
}

		//	$("#precio").html(data);
		
			
          //  });            
        });
   })
});
</script>



<script language="javascript">
////////////////////script para llamar php que muestra los datos del producto a vender por codigo


$(document).ready(function(){

  
	$("#lotro_tratamiento_agua").hide();
	$("#div9").hide();
$("#otro_tratamiento_agua").hide();


//$(".ldiv1").hide();


   $("#tratamiento_agua_gris").change(function () {
//	alert("hola");
           $("#tratamiento_agua_gris").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="Otro"){
  
	$("#lotro_tratamiento_agua").show();
	$("#div9").show();
$("#otro_tratamiento_agua").show();

}else{
  
	$("#lotro_tratamiento_agua").hide();
	$("#div9").hide();
$("#otro_tratamiento_agua").hide();

document.getElementById('otro_tratamiento_agua').value="";
 
//$(".ldiv1").hide();
}

		//	$("#precio").html(data);
		
			
          //  });            
        });
   })
});
</script>

<script language="javascript">
////////////////////script para llamar php que muestra los datos del producto a vender por codigo


$(document).ready(function(){

  
	$("#lotro_combustible_cocina").hide();
	$("#div10").hide();
$("#otro_combustible_cocina").hide();


//$(".ldiv1").hide();


   $("#combustible_cocina").change(function () {
//	alert("hola");
           $("#combustible_cocina").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="Otros"){
  
	$("#lotro_combustible_cocina").show();
	$("#div10").show();
$("#otro_combustible_cocina").show();

}else{
  
	$("#lotro_combustible_cocina").hide();
	$("#div10").hide();
$("#otro_combustible_cocina").hide();

document.getElementById('otro_combustible_cocina').value="";
 
//$(".ldiv1").hide();
}

		//	$("#precio").html(data);
		
			
          //  });            
        });
   })
});
</script>

<script language="javascript">
////////////////////script para llamar php que muestra los datos del producto a vender por codigo


$(document).ready(function(){

  
	$("#lotro_equipo_vivienda").hide();
	$("#div11").hide();
$("#otro_equipo_vivienda").hide();


//$(".ldiv1").hide();


   $("#equipo_vivienda").change(function () {
//	alert("hola");
           $("#equipo_vivienda").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="Otros"){
  $("#lotro_equipo_vivienda").show();
	$("#div11").show();
$("#otro_equipo_vivienda").show();

}else{
  
	$("#lotro_equipo_vivienda").hide();
	$("#div11").hide();
$("#otro_equipo_vivienda").hide();

document.getElementById('otro_equipo_vivienda').value="";
 
//$(".ldiv1").hide();
}

		//	$("#precio").html(data);
		
			
          //  });            
        });
   })
});
</script>


<script language="javascript">
////////////////////script para llamar php que muestra los datos del producto a vender por codigo


$(document).ready(function(){

  
	$("#lotro_cual_red").hide();
	$("#div12").hide();
$("#otro_cual_red").hide();


//$(".ldiv1").hide();


   $("#cual_red_social").change(function () {
//	alert("hola");
           $("#cual_red_social").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="Otras"){
  $("#lotro_cual_red").show();
	$("#div12").show();
$("#otro_cual_red").show();

}else{
  
	$("#lotro_cual_red").hide();
	$("#div12").hide();
$("#otro_cual_red").hide();

document.getElementById('otro_cual_red').value="";
 
//$(".ldiv1").hide();
}

		//	$("#precio").html(data);
		
			
          //  });            
        });
   })
});
</script>


<script language="javascript">
////////////////////script para llamar php que muestra los datos del producto a vender por codigo

/*
$(document).ready(function(){

  
	$("#lotro_evento_dano").hide();
	$("#div13").hide();
$("#otro_evento_dano").hide();


//$(".ldiv1").hide();


   $("#evento_dano").change(function () {
//	alert("hola");
           $("#evento_dano").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="Otros"){
	$("#lotro_evento_dano").show();
	$("#div13").show();
$("#otro_evento_dano").show();

}else{
  
	$("#lotro_evento_dano").hide();
	$("#div13").hide();
$("#otro_evento_dano").hide();

document.getElementById('otro_evento_dano').value="";
 
//$(".ldiv1").hide();
}

		//	$("#precio").html(data);
		
			
          //  });            
        });
   })
});

*/
</script>



<script language="javascript">
////////////////////script para llamar php que muestra los datos del producto a vender por codigo


$(document).ready(function(){

  
	$("#lotro_afectacion_medios").hide();
	$("#div14").hide();
$("#otro_afectacion_medios").hide();


//$(".ldiv1").hide();


   $("#afectacion_medios_vida").change(function () {
//	alert("hola");
           $("#afectacion_medios_vida").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="Otros"){
	$("#lotro_afectacion_medios").show();
	$("#div14").show();
$("#otro_afectacion_medios").show();

}else{
  
  $("#lotro_afectacion_medios").hide();
	$("#div14").hide();
$("#otro_afectacion_medios").hide();

document.getElementById('otro_afectacion_medios').value="";
 
//$(".ldiv1").hide();
}

		//	$("#precio").html(data);
		
			
          //  });            
        });
   })
});
</script>

<script language="javascript">
////////////////////script para llamar php que muestra los datos del producto a vender por codigo


$(document).ready(function(){

  
	$("#lotro_riesgo_fisico").hide();
	$("#div15").hide();
$("#otro_riesgo_fisico").hide();


//$(".ldiv1").hide();


   $("#riesgo_fisico").change(function () {
//	alert("hola");
           $("#riesgo_fisico").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="Otros"){
	$("#lotro_riesgo_fisico").show();
	$("#div15").show();
$("#otro_riesgo_fisico").show();

}else{
  
	$("#lotro_riesgo_fisico").hide();
	$("#div15").hide();
$("#otro_riesgo_fisico").hide();

document.getElementById('otro_riesgo_fisico').value="";
 
//$(".ldiv1").hide();
}

		//	$("#precio").html(data);
		
			
          //  });            
        });
   })
});
</script>

<script language="javascript">
////////////////////script para llamar php que muestra los datos del producto a vender por codigo


$(document).ready(function(){

  
	$("#lotro_riesgo_social").hide();
	$("#div16").hide();
$("#otro_riesgo_social").hide();


//$(".ldiv1").hide();


   $("#riesgo_social").change(function () {
//	alert("hola");
           $("#riesgo_social").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="Otro"){
	$("#lotro_riesgo_social").show();
	$("#div16").show();
$("#otro_riesgo_social").show();

}else{
  
	$("#lotro_riesgo_social").hide();
	$("#div16").hide();
$("#otro_riesgo_social").hide();

document.getElementById('otro_riesgo_social').value="";
 
//$(".ldiv1").hide();
}

		//	$("#precio").html(data);
		
			
          //  });            
        });
   })
});
</script>


<script>
 $(function($){

$('#bloque').on('change', function() {
    if ($(this).is(':checked') ) {
    //    $("#bloque").prop('checked', false);
  //  alert("hola");
    } else {
   //     $("#bloque").prop('checked', true);
    }

    cambiarSelect();
   
   //     alert($("#materiales_paredes").val());
     
      //  var list = document.getElementsByTagName("materiales_paredes").length;
      //  alert(list);
});

$('#ladrillo').on('change', function() {
    if ($(this).is(':checked') ) {
   //     $("#martesDescanso").prop('checked', false); 
    } else {
     //   $("#martesDescanso").prop('checked', true);
    }

    cambiarSelect();
});

$('#adobe').on('change', function() {
    if ($(this).is(':checked') ) {
      //  $("#miercolesDescanso").prop('checked', false);
    } else {
      //  $("#miercolesDescanso").prop('checked', true);
    }

    cambiarSelect();
});

$('#lamina').on('change', function() {
    if ($(this).is(':checked') ) {
  //      $("#juevesDescanso").prop('checked', false);
    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect();
});

$('#plastico').on('change', function() {
    if ($(this).is(':checked') ) {
  //      $("#viernesDescanso").prop('checked', false);
    } else {
    //    $('#viernesDescanso').prop('checked', true);
    }

    cambiarSelect();
});

$('#bahareque').on('change', function() {
    if ($(this).is(':checked') ) {
    //    $("#viernesDescanso").prop('checked', false);
    } else {
      //  $('#viernesDescanso').prop('checked', true);
    }

    cambiarSelect();
});


$('#otro').on('change', function() {
    if ($(this).is(':checked') ) {

      $("#lmateriales_paredes").show();
	$("#div3").show();
$("#otro_materiales_paredes").show();
    //    $("#viernesDescanso").prop('checked', false);
    } else {
      $("#lmateriales_paredes").hide();
	$("#div3").hide();
$("#otro_materiales_paredes").hide();
document.getElementById('otro_materiales_paredes').value="";

    }

    cambiarSelect();
  

});
//////////////////
////////////
////////////////
///////////////
$('#teja').on('change', function() {
    if ($(this).is(':checked') ) {
    //    $("#bloque").prop('checked', false);
  //  alert("hola");
  //  alert("hola");
    } else {
   //     $("#bloque").prop('checked', true);
    }

    cambiarSelect2();
   
     //   alert($("#materiales_paredes").val());
     
      //  var list = document.getElementsByTagName("materiales_paredes").length;
      //  alert(list);
});



$('#laminaT').on('change', function() {
    if ($(this).is(':checked') ) {
  //      $("#juevesDescanso").prop('checked', false);
    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect2();
});

$('#duralita').on('change', function() {
    if ($(this).is(':checked') ) {
  //      $("#juevesDescanso").prop('checked', false);
    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect2();
});

$('#plasticoT').on('change', function() {
    if ($(this).is(':checked') ) {
  //      $("#juevesDescanso").prop('checked', false);
    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect2();
});

$('#palma').on('change', function() {
    if ($(this).is(':checked') ) {
  //      $("#juevesDescanso").prop('checked', false);
    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect2();
});


$('#otroT').on('change', function() {
    if ($(this).is(':checked') ) {
//alert("hola");
      $("#lotro_materiales_techo").show();
	$("#div4").show();
$("#otro_materiales_techo").show();
    //    $("#viernesDescanso").prop('checked', false);
    } else {
      $("#lotro_materiales_techo").hide();
	$("#div4").hide();
$("#otro_materiales_techo").hide();
document.getElementById('otro_materiales_techo').value="";

    }

    cambiarSelect2();
  

});

//////
/////
/////

$('#tierra').on('change', function() {
    if ($(this).is(':checked') ) {
    //    $("#bloque").prop('checked', false);
  //  alert("hola");
  //  alert("hola");
    } else {
   //     $("#bloque").prop('checked', true);
    }

    cambiarSelect3();
   
     //   alert($("#materiales_paredes").val());
     
      //  var list = document.getElementsByTagName("materiales_paredes").length;
      //  alert(list);
});

$('#cemento').on('change', function() {
    if ($(this).is(':checked') ) {
    //    $("#bloque").prop('checked', false);
  //  alert("hola");
  //  alert("hola");
    } else {
   //     $("#bloque").prop('checked', true);
    }

    cambiarSelect3();
   
     //   alert($("#materiales_paredes").val());
     
      //  var list = document.getElementsByTagName("materiales_paredes").length;
      //  alert(list);
});

$('#ladrilloP').on('change', function() {
    if ($(this).is(':checked') ) {
    //    $("#bloque").prop('checked', false);
  //  alert("hola");
  //  alert("hola");
    } else {
   //     $("#bloque").prop('checked', true);
    }

    cambiarSelect3();
   
     //   alert($("#materiales_paredes").val());
     
      //  var list = document.getElementsByTagName("materiales_paredes").length;
      //  alert(list);
});

$('#ceramica').on('change', function() {
    if ($(this).is(':checked') ) {
    //    $("#bloque").prop('checked', false);
  //  alert("hola");
  //  alert("hola");
    } else {
   //     $("#bloque").prop('checked', true);
    }

    cambiarSelect3();
   
     //   alert($("#materiales_paredes").val());
     
      //  var list = document.getElementsByTagName("materiales_paredes").length;
      //  alert(list);
});

$('#otroP').on('change', function() {
    if ($(this).is(':checked') ) {

      $("#lotro_materiales_piso").show();
	$("#div5").show();
$("#otro_materiales_piso").show();
    //    $("#viernesDescanso").prop('checked', false);
    } else {
      $("#lotro_materiales_piso").hide();
	$("#div5").hide();
$("#otro_materiales_piso").hide();
document.getElementById('otro_materiales_piso').value="";

    }

    cambiarSelect3();
  

});
///////////
////////////
///////////
//////////


$('#techo').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunaPA").prop("checked", false);
    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect4();
});
$('#paredes').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunaPA").prop("checked", false);
    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect4();
});

$('#piso').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunaPA").prop("checked", false);
    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect4();
});

$('#bano').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunaPA").prop("checked", false);
    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect4();
});

$('#puertas').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunaPA").prop("checked", false);
    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect4();
});


$('#ventanas').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunaPA").prop("checked", false);
    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect4();
});

$('#ningunaPA').on('change', function() {
    if ($(this).is(':checked') ) {
  
      $("#techo").prop("checked", false);
      $("#paredes").prop("checked", false);
      $("#piso").prop("checked", false);
      $("#bano").prop("checked", false);
      $("#puertas").prop("checked", false);
      $("#ventanas").prop("checked", false);
      $("#otroPA").prop("checked", false);

      $("#lotro_parte_danadas").hide();
	$("#div6").hide();
$("#otro_parte_danadas").hide();
document.getElementById('otro_parte_danadas').value="";

    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect4();
});

$('#otroPA').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#lotro_parte_danadas").show();
	$("#div6").show();
$("#otro_parte_danadas").show();
$("#ningunaPA").prop("checked", false);
    } else {
      $("#lotro_parte_danadas").hide();
	$("#div6").hide();
$("#otro_parte_danadas").hide();
document.getElementById('otro_parte_danadas').value="";

    }

    cambiarSelect4();
});

///////////////////////
///////////////////////
//////////////////////
//////////////////////

$('#televisor').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunoE").prop("checked", false);
    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect5();
});
$('#equipoS').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunoE").prop("checked", false);
    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect5();
});

$('#refrigeradora').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunoE").prop("checked", false);
    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect5();
});

$('#licuadora').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunoE").prop("checked", false);
    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect5();
});

$('#ventilador').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunoE").prop("checked", false);
    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect5();
});

$('#plancha').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunoE").prop("checked", false);
    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect5();
});

$('#maquinaC').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunoE").prop("checked", false);
    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect5();
});

$('#motocicleta').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunoE").prop("checked", false);
    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect5();
});

$('#todosA').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunoE").prop("checked", false);
      $("#televisor").prop("checked", true);
      $("#equipoS").prop("checked", true);
      $("#refrigeradora").prop("checked", true);
      $("#licuadora").prop("checked", true);
      $("#ventilador").prop("checked", true);
      $("#plancha").prop("checked", true);
      $("#maquinaC").prop("checked", true);
      $("#motocicleta").prop("checked", true);

      cambiarSelect5A();

    } else {
    
      $("#televisor").prop("checked", false);
      $("#equipoS").prop("checked", false);
      $("#refrigeradora").prop("checked", false);
      $("#licuadora").prop("checked", false);
      $("#ventilador").prop("checked", false);
      $("#plancha").prop("checked", false);
      $("#maquinaC").prop("checked", false);
      $("#motocicleta").prop("checked", false);

      cambiarSelect5();

    }
   
 //   $("#todosA").prop("checked", false);
});


$('#otrosE').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#lotro_equipo_vivienda").show();
	$("#div11").show();
$("#otro_equipo_vivienda").show();
      $("#ningunoE").prop("checked", false);
    } else {
      $("#lotro_equipo_vivienda").hide();
	$("#div11").hide();
$("#otro_equipo_vivienda").hide();
document.getElementById('otro_equipo_vivienda').value="";

    }

    cambiarSelect5();
});

$('#ningunoE').on('change', function() {
    if ($(this).is(':checked') ) {
   //   $("#ningunoE").prop("checked", false);
      $("#televisor").prop("checked", false);
      $("#equipoS").prop("checked", false);
      $("#refrigeradora").prop("checked", false);
      $("#licuadora").prop("checked", false);
      $("#ventilador").prop("checked", false);
      $("#plancha").prop("checked", false);
      $("#maquinaC").prop("checked", false);
      $("#motocicleta").prop("checked", false);
      $("#todosA").prop("checked", false);
      $("#otrosE").prop("checked", false);
      $("#lotro_equipo_vivienda").hide();
	$("#div11").hide();
$("#otro_equipo_vivienda").hide();
document.getElementById('otro_equipo_vivienda').value="";

    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect5();
});


function cambiarSelect(){
    var seleccionados = $(".jornada input[type='checkbox']:checked");

    var valores = [];

    for(var i = 0; i < seleccionados.length; i++){
        valores.push($(seleccionados[i]).val());
    }

    $('#materiales_paredes').selectpicker('val', valores);
}

function cambiarSelect2(){
    var seleccionados = $(".jornada2 input[type='checkbox']:checked");

    var valores = [];

    for(var i = 0; i < seleccionados.length; i++){
        valores.push($(seleccionados[i]).val());
    }

    $('#materiales_techo').selectpicker('val', valores);
}

function cambiarSelect3(){
    var seleccionados = $(".jornada3 input[type='checkbox']:checked");

    var valores = [];

    for(var i = 0; i < seleccionados.length; i++){
        valores.push($(seleccionados[i]).val());
    }

    $('#materiales_piso').selectpicker('val', valores);
}


function cambiarSelect4(){
    var seleccionados = $(".jornada4 input[type='checkbox']:checked");

    var valores = [];

    for(var i = 0; i < seleccionados.length; i++){
        valores.push($(seleccionados[i]).val());
    }

    $('#partes_danadas').selectpicker('val', valores);
}

function cambiarSelect5(){
    var seleccionados = $(".jornada5 input[type='checkbox']:checked");

    var valores = [];

    for(var i = 0; i < seleccionados.length; i++){
        valores.push($(seleccionados[i]).val());
    }

    $('#equipo_vivienda').selectpicker('val', valores);
}

function cambiarSelect5A(){
    var seleccionados = $(".jornada5 input[type='checkbox']:checked");

    var valores = [];

    for(var i = 0; i < seleccionados.length-1; i++){
        valores.push($(seleccionados[i]).val());
    }

    $('#equipo_vivienda').selectpicker('val', valores);
}


});

</script>

</head>
<body>
    <div class="navbar-lateral full-reset">
        <div class="visible-xs font-movile-menu mobile-menu-button"></div>
        <div class="full-reset container-menu-movile custom-scroll-containers">
        <div class="logo full-reset all-tittles" style="background-color:#0095FF;" >
                <i class="visible-xs zmdi zmdi-close pull-left mobile-menu-button" style=" line-height: 55px; cursor: pointer; padding: 0 10px; margin-left: 7px;"></i> 
                sistema habitat
            </div>
            <figure>
                    <img src="../img/logo.png" alt="CDI" class="img-responsive center-box" style="width:45%;">
                </figure>
            <div class="full-reset nav-lateral-list-menu"> <?php include("menu.php"); ?> </div>
        </div>
    </div>
    <div class="content-page-container full-reset custom-scroll-containers" >
	
	  
	
	
        <nav class="navbar-user-top full-reset" >
		
	 
		
		
            <ul class="list-unstyled full-reset" >
                
              
            
				 <li   onClick="Salir()" data-placement="bottom" title="Salir del sistema">
                    <i class="zmdi zmdi-power"></i>
                </li>
				
				  
				
				<figure>
				
				
                 <img src="../assets/img/user01.png" alt="user-picture" class="img-responsive img-circle center-box"> 
			<!--aqui va la foto del usuario -->
                
				
				
				
				<?php
				/*
				if(isset($_SESSION)){
$sexo=$_SESSION["sexoT"];
				$man='../assets/img/user01.png';
				$woman='../assets/img/userWoman.png';
				$user='user-picture';
				$class='img-responsive img-circle center-box';
				$style='max-width: 110px;';
				if(isset($_SESSION)){
				
				if($sexo=='masculino'){
		
	//echo "<img src="../assets/img/user01.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">";	
	echo "<img src=\"".$man."\" alt=\"".$user."\" class=\"".$class."\" >";
				}else{
					
			if($sexo=='femenino'){
				
			echo "<img src=\"".$woman."\" alt=\"".$user."\" class=\"".$class."\" >";		
				
			}		
					
				}
				}

				} */				
								
?>		             
				
				
				
				</figure>
			
				
                <li style="color:#fff; cursor:default;" title="Datos personales">
				<a href="datosPersonales.php"  style="color:#ffffff;">
                    <span class="all-tittles"><?php  if(isset($_SESSION)){
					$usu=$_SESSION["usuarioE"];
					$usu=base64_decode($usu);
					echo "$usu";
					
					
					}
					
					
					
					?>
				
					</span>
	</a>               
			   </li>
				
				
				
               
         <center>
				<br>
				 <li style="color:#fff; cursor:default;">
                    <h4><span class="all-tittles">Sección II: Vivienda</span></h4>
                </li>
				</center>      
			

    <li class="mobile-menu-button visible-xs" style="float: left !important;">
                    <i class="zmdi zmdi-menu"></i>
                </li>
			
            </ul>
        </nav>
		
		 
       
        
    
	           
			   
			   
	
    
           
		 <form class="form-horizontal" action="" method="post" id="frmcdi" name="frmcdi">
	   <input type="hidden" name="bandera" id="bandera"/>
<input type="hidden" name="baccion" id="baccion"/>





<!-- Form Name -->
<br>





<!-- Text input-->
<p style="text-align: center;">Características de la vivienda</p>
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">24. ¿Cuál es la Tenencia de la Propiedad?</label>  
  <div class="col-md-2">
  <select id="tenencia" name="tenencia" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Propia">Propia</option>
  <option value="Financiada">Financiada</option>
  <option value="Alquilada">Alquilada</option>
  <option value="Familiar">Familiar</option>
  <option value="Prestada">Prestada</option>
  <option value="Colono">Colono</option>
  <option value="Otra">Otra</option>
  <option value="Ninguna">Ninguna</option>

</select>
</div>
</div>

<div class="form-group" id="div1">
          <label class="col-md-4 control-label" id="ltenencia">Escriba la Tenencia</label>  
          <div class="col-md-2 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="otro_tenencia" name="otro_tenencia" class="form-control input-md" autocomplete="off" required>
  
		  
		  </div>		
		  

  
				</div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="nombre">Nombre del Propietario del Inmueble</label>  
          <div class="col-md-3">
	  
		  <input type="text" id="nombre" name="nombre" class="form-control input-sm"/>
  
		  
          </div>
        </div>


        <div class="form-group">	  
          <label class="col-md-4 control-label">Parentesco</label>
          <div class="col-md-2">
		  <select id="parentesco" name="parentesco" class="form-control input-sm" required>
	  <option value="" disabled selected>Escoja el parentesco</option>
	  <option value="padre">Padre</option>
	  <option value="madre">Madre</option>
	  <option value="conyugue">Cónyugue</option>
	  <option value="hijo(a)">Hijo(a)</option>
	  <option value="hermano(a)">Hermano(a)</option>
	  <option value="nieto(a)">Nieto(a)</option>
	  <option value="sobrino(a)">Sobrino(a)</option>
	  <option value="yerno">Yerno</option>
	  <option value="nuera">Nuera</option>
	  <option value="suegro(a)">Suegro(a)</option>
	  <option value="cuñado(a)">Cuñado(a)</option>
	  <option value="abuelo(a)">Abuelo(a)</option>
	  <option value="otros">Otros</option>
    <option value="ninguno">Ninguno</option>
	  
	</select>
	

  </div>
  </div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">25. ¿Tiene Registrada en el CNR  su escritura?</label>  
  <div class="col-md-2">
  <select id="registrada" name="registrada" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Si">Si</option>
  <option value="No">No</option>
  <option value="En proceso">En Proceso</option>
  <option value="Otro">Otro</option>

</select>
</div>
</div>

<div class="form-group" id="div2">
          <label class="col-md-4 control-label" id="lregistrada">Escriba Otra opcion</label>  
          <div class="col-md-2 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="otro_registrada" name="otro_registrada" class="form-control input-md" autocomplete="off" required>
  
		  
		  </div>		
		  

  
				</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">26. ¿Porqué no  ha legalizado la propiedad?</label>  
  <div class="col-md-2">
  <select id="pro_legal" name="pro_legal" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="lotificacion ilegal">Lotificación Ilegal</option>
  <option value="linea ferrea">Línea Ferrea</option>
  <option value="razones economicas">Razones económicas </option>
  <option value="aceptación de herencia">Aceptación de Herencia </option>
  <option value="procesos burocraticos">Procesos burocráticos</option>
  <option value="Otro (ISTA)">Otro (ISTA)</option>
  <option value="no aplica">No Aplica</option>

</select>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">27. ¿Qué Numero de espacios  tiene la vivienda, sin incluir el servicio sanitario?</label>  
  <div class="col-md-2">
  <select id="espacios" name="espacios" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="Mas de 3">Mas de 3</option>

</select>
</div>
</div>



<!-- Text input-->
<div class="form-group jornada">
  <label class="col-md-4 control-label" for="nombresv">28. ¿Cuáles son los Materiales de Paredes de la vivienda?</label>  
  <div class="col-md-2">
  <input type="checkbox" class="flat-red"  value="Bloque" name="bloque" id="bloque" >
  Bloque
    </label>
    <label>
        <input type="checkbox" class="flat-red" value="Ladrillo" name="ladrillo" id="ladrillo">
        Ladrillo
    </label>
    <label>
        <input type="checkbox" class="flat-red" value="Adobe" name="adobe" id="adobe">
        Adobe
    </label>
    <label>
        <input type="checkbox" class="flat-red" value="Lámina" name="lamina" id="lamina">
        Lámina
    </label>
    <label>
        <input type="checkbox" class="flat-red" value="Plástico" name="plastico" id="plastico">
        Plástico
    </label>
    <label>
        <input type="checkbox" class="flat-red" value="Bahareque" name="bahareque"  id="bahareque" >
        Bahareque
    </label>

    <label>
        <input type="checkbox" class="flat-red" value="Otro" name="otro"  id="otro" >
        Otro
    </label>

</div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv"></label>  
  <div class="col-md-5">
  <select id="materiales_paredes" multiple="multiple" name="materiales_paredes[]" class="form-control input-md selectpicker" >

  <option value="Bloque">Bloque</option>
  <option value="Ladrillo" >Ladrillo</option>
  <option value="Adobe">Adobe</option>
  <option value="Lámina">Lámina</option>
  <option value="Plástico">Plástico</option>
  <option value="Bahareque">Bahareque</option>
  <option value="Otro">Otro</option>

</select>


</div>
</div>


<div class="form-group" id="div3">
          <label class="col-md-4 control-label" id="lmateriales_paredes">Escriba los materiales de paredes</label>  
          <div class="col-md-2 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="otro_materiales_paredes" name="otro_materiales_paredes" class="form-control input-md" autocomplete="off" required>
  
		  
		  </div>		
		  

  
				</div>


    
<div class="form-group jornada2">
  <label class="col-md-4 control-label" for="nombresv">29. ¿Cuáles son los Materiales de techo de la vivienda?</label>  
  <div class="col-md-2">
  <input type="checkbox" class="flat-red"  value="Teja" name="teja" id="teja" >
  Teja
    </label>
    <label>
        
        <input type="checkbox" class="flat-red" value="Lámina" name="laminaT" id="laminaT">
        Lámina
    </label>
    <label>
        <input type="checkbox" class="flat-red" value="Duralita" name="duralita" id="duralita">
        Duralita
    </label><label>
        <input type="checkbox" class="flat-red" value="Plástico" name="plasticoT" id="plasticoT">
        Plástico
    </label>
    <label>
        <input type="checkbox" class="flat-red" value="Palma" name="palma"  id="palma" >
        Palma
    </label>

    <label>
        <input type="checkbox" class="flat-red" value="Otro" name="otroT"  id="otroT" >
        Otro
    </label>

</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv"></label>  
  <div class="col-md-5">
  <select id="materiales_techo" name="materiales_techo[]" multiple="multiple" class="form-control input-md selectpicker" >
  <option value="Teja">Teja</option>
  <option value="Lámina">Lámina</option>
  <option value="Duralita">Duralita</option>
  <option value="Plástico">Plástico</option>
  <option value="Palma">Palma</option>
  <option value="Otro">Otro</option>
</select>
</div>
</div>

<div class="form-group" id="div4">
          <label class="col-md-4 control-label" id="lotro_materiales_techo">Escriba los materiales de techo</label>  
          <div class="col-md-2 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="otro_materiales_techo" name="otro_materiales_techo" class="form-control input-md" autocomplete="off" required>
  
		  
		  </div>		
		  

  
				</div>

        <div class="form-group jornada3">
  <label class="col-md-4 control-label" for="nombresv">30. ¿Cuáles son los Materiales del piso de la vivienda?</label>  
  <div class="col-md-2">

        
        <input type="checkbox" class="flat-red" value="Tierra" name="tierra" id="tierra">
        Tierra
    </label>
    <label>
        <input type="checkbox" class="flat-red" value="Cemento" name="cemento" id="cemento">
        Cemento
    </label><label>
        <input type="checkbox" class="flat-red" value="Ladrillo de piso" name="ladrilloP" id="ladrilloP">
        Ladrillo de piso
    </label>
    <label>
        <input type="checkbox" class="flat-red" value="Cerámica" name="ceramica"  id="ceramica" >
        Cerámica
    </label>

    <label>
        <input type="checkbox" class="flat-red" value="Otro" name="otroP"  id="otroP" >
        Otro
    </label>

</div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv"></label>  
  <div class="col-md-5">
  <select id="materiales_piso" multiple="multiple" name="materiales_piso[]" class="form-control input-md selectpicker" >
 
  <option value="Tierra">Tierra</option>
  <option value="Cemento">Cemento</option>
  <option value="Ladrillo de piso">Ladrillo de piso</option>
  <option value="Cerámica">Cerámica</option>
  <option value="Otro">Otro</option>
</select>
</div>
</div>

<div class="form-group" id="div5">
          <label class="col-md-4 control-label" id="lotro_materiales_piso">Escriba los materiales de piso</label>  
          <div class="col-md-2 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="otro_materiales_piso" name="otro_materiales_piso" class="form-control input-md" autocomplete="off" required>
  
		  
		  </div>		
		  

  
				</div>




        <div class="form-group jornada4">
  <label class="col-md-4 control-label" for="nombresv">31. ¿Qué partes de la vivienda están dañadas?</label>  
  <div class="col-md-2">

        
        <input type="checkbox" class="flat-red" value="Techo" name="techo" id="techo">
        Techo
    </label>
    <label>
        <input type="checkbox" class="flat-red" value="Paredes" name="paredes" id="paredes">
        Paredes
    </label><label>
        <input type="checkbox" class="flat-red" value="Piso" name="Piso" id="piso">
        Piso
    </label>
    <label>
        <input type="checkbox" class="flat-red" value="Baño" name="bano"  id="bano" >
        Baño
    </label>
    
    <label>
        <input type="checkbox" class="flat-red" value="Puertas" name="puertas"  id="puertas" >
        Puertas
    </label>  
    
    <label>
        <input type="checkbox" class="flat-red" value="Ventanas" name="ventanas"  id="ventanas" >
        Ventanas
    </label>
    
    <label>
        <input type="checkbox" class="flat-red" value="Ninguna" name="ningunaPA"  id="ningunaPA" >
        Ninguna
    </label>

    <label>
        <input type="checkbox" class="flat-red" value="Otro" name="otroPA"  id="otroPA" >
        Otro
    </label>

</div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv"></label>  
  <div class="col-md-5">
  <select id="partes_danadas" multiple="multiple" name="partes_danadas[]" class="form-control input-md selectpicker">

  <option value="Techo">Techo</option>
  <option value="Paredes">Paredes</option>
  <option value="Piso">Piso</option>
  <option value="Baño">Baño</option>
  <option value="Puertas">Puertas</option>
  <option value="Ventanas">Ventanas</option>
  <option value="Ninguna">Ninguna</option>
  <option value="Otro">Otro</option>

</select>
</div>
</div>

<div class="form-group" id="div6">
          <label class="col-md-4 control-label" id="lotro_parte_danadas">Escriba las partes dañadas</label>  
          <div class="col-md-2 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="otro_parte_danadas" name="otro_parte_danadas" class="form-control input-md" autocomplete="off" required>
  
		  
		  </div>		
		  

  
				</div>


<p style="text-align: center;">Acceso a Servicios Básicos</p>
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">32. ¿Se cuenta con servicio de agua potable?</label>  
  <div class="col-md-2">
  <select id="agua_potable" name="agua_potable" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Si">Si</option>
  <option value="No">No</option>

</select>
</div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">33. ¿Cómo se abastecen de agua?</label>  
  <div class="col-md-2">
  <select id="abastece_agua" name="abastece_agua" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Domiciliar">Domiciliar</option>
  <option value="Cantarera">Cantarera</option>
  <option value="Pozo">Pozo</option>
  <option value="Pipa">Pipa</option>
  <option value="Rio">Rio</option>
  <option value="Vecino">Vecino</option>
  <option value="Otro">Otro</option>
  <option value="Ninguna">Ninguna</option>
</select>
</div>
</div>

<div class="form-group" id="div7">
          <label class="col-md-4 control-label" id="lotro_abastecimiento_agua">Escriba la forma de abastecimiento</label>  
          <div class="col-md-2 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="otro_abastecimiento_agua" name="otro_abastecimiento_agua" class="form-control input-md" autocomplete="off" required>
  
		  
		  </div>		
		  

  
				</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">34. ¿Se cuenta con servicio de energía eléctrica?</label>  
  <div class="col-md-2">
  <select id="energia_electrica" name="energia_electrica" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Si">Si</option>
  <option value="No">No</option>

</select>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">35. ¿Cómo se abastecen de energía eléctrica?</label>  
  <div class="col-md-2">
  <select id="abastece_energia" name="abastece_energia" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Propia">Propia</option>
  <option value="Vecino">Vecino</option>
  <option value="Paneles Solares">Paneles Solares</option>
  <option value="Otros">Otros</option>
  <option value="Ninguna">Ninguna</option>

</select>
</div>
</div>

<div class="form-group" id="div8">
          <label class="col-md-4 control-label" id="lotro_abastecimiento_energia">Escriba el abastecimiento de energia</label>  
          <div class="col-md-2 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="otro_abastecimiento_energia" name="otro_abastecimiento_energia" class="form-control input-md" autocomplete="off" required>
  
		  
		  </div>		
		  

  
				</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">36. ¿Qué tipo de servicio sanitario poseen?</label>  
  <div class="col-md-2">
  <select id="tipo_sanitario" name="tipo_sanitario" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Letrina de fosa">Letrina de Fosa</option>
  <option value="Letrina Abonera">Letrina Abonera</option>
  <option value="Sistema de lavar">Sistema de Lavar</option>
  <option value="No tiene">No Tiene</option>
  <option value="Usa la de un vecino/familiar">Usa la de un vecino</option>
</select>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">37. ¿Qué tratamiento le dan a las aguas grises?</label>  
  <div class="col-md-2">
  <select id="tratamiento_agua_gris" name="tratamiento_agua_gris" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Pozo de absorción">Pozo de absorción</option>
  <option value="Lo sacan a la calle">Lo sacan a la calle</option>
  <option value="Se esparce en terreno">Se esparce en terreno</option>
  <option value="Otro">Otro</option>
  <option value="Ninguno">Ninguno</option>

</select>
</div>
</div>

<div class="form-group" id="div9">
          <label class="col-md-4 control-label" id="lotro_tratamiento_agua">Escriba el tratamiento de aguas grises</label>  
          <div class="col-md-2 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="otro_tratamiento_agua" name="otro_tratamiento_agua" class="form-control input-md" autocomplete="off" required>
  
		  
		  </div>		
		  

  
				</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">38. ¿Qué hacen con la basura que genera de la  vivienda?</label>  
  <div class="col-md-2">
  <select id="basura_vivienda" name="basura_vivienda" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Recolección Municipal">Recolección Municipal</option>
  <option value="Quema">Quema</option>
  <option value="Esparcimiento">Esparcimiento</option>
  <option value="Depositan en otro lugar">Depositan en otro lugar</option>
</select>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">39. ¿Qué combustible utilizan para cocinar?</label>  
  <div class="col-md-2">
  <select id="combustible_cocina" name="combustible_cocina" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Gas propano">Gas propano</option>
  <option value="Leña">Leña</option>
  <option value="Carbon">Carbon</option>
  <option value="Otros">Otros</option>
</select>
</div>
</div>

<div class="form-group" id="div10">
          <label class="col-md-4 control-label" id="lotro_combustible_cocina">Escriba el combustible para cocinar</label>  
          <div class="col-md-2 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="otro_combustible_cocina" name="otro_combustible_cocina" class="form-control input-md" autocomplete="off" required>
  
		  
		  </div>		
		  

  
				</div>

<p style="text-align: center;">Equipamiento de la Vivienda</p>
<!-- Text input-->


<div class="form-group jornada5">
  <label class="col-md-4 control-label" for="nombresv">40. ¿Cuál de los siguientes equipos  posee en la vivienda?</label>  
  <div class="col-md-2">

        
        <input type="checkbox" class="flat-red" value="Televisor" name="televisor" id="televisor">
        Televisor
    </label>
    <label>
        <input type="checkbox" class="flat-red" value="Equipo de sonido" name="equipoS" id="equipoS">
        Equipo de sonido
    </label><label>
        <input type="checkbox" class="flat-red" value="Refrigeradora" name="refrigeradora" id="refrigeradora">
        Refrigeradora
    </label>
   
     
    
    <label>
        <input type="checkbox" class="flat-red" value="Licuadora" name="licuadora"  id="licuadora" >
        Licuadora
    </label>  
    
    <label>
        <input type="checkbox" class="flat-red" value="Ventilador" name="ventilador"  id="ventilador" >
        Ventilador
    </label>
    
    <label>
        <input type="checkbox" class="flat-red" value="Plancha" name="plancha"  id="plancha" >
        Plancha
    </label>
    
   <label>
        <input type="checkbox" class="flat-red" value="Maquina de coser" name="maquinaC"  id="maquinaC" >
        Maquina de coser
    </label> 
    
    
    <label>
        <input type="checkbox" class="flat-red" value="Motocicleta" name="motocicleta"  id="motocicleta" >
        Motocicleta
    </label>
    
      <label>
        <input type="checkbox" class="flat-red" value="Todos los anteriores" name="todosA"  id="todosA" >
        Todos los anteriores
    </label>

    <label>
        <input type="checkbox" class="flat-red" value="Otros" name="otrosE"  id="otrosE" >
        Otros
    </label>
    
     <label>
        <input type="checkbox" class="flat-red" value="Ninguno" name="ningunoE"  id="ningunoE" >
        Ninguno
    </label>

</div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv"></label>  
  <div class="col-md-7">
  <select id="equipo_vivienda" name="equipo_vivienda[]" multiple="multiple" class="form-control input-md selectpicker" >
 
  <option value="Televisor">Televisor</option>
  <option value="Equipo de sonido">Equipo de sonido</option>
  <option value="Refrigeradora">Refrigeradora</option>
  <option value="Licuadora">Licuadora</option>
  <option value="Ventilador">Ventilador</option>
  <option value="Plancha">Plancha</option>
  <option value="Maquina de coser">Maquina de coser</option>
  <option value="Motocicleta">Motocicleta</option>
  <option value="Todos los anteriores">Todos los anteriores</option>
  <option value="Otros">Otros</option>
  <option value="Ninguno">Ninguno</option>
</select>
</div>
</div>

<div class="form-group" id="div11">
          <label class="col-md-4 control-label" id="lotro_equipo_vivienda">Escriba el equipamento</label>  
          <div class="col-md-2 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="otro_equipo_vivienda" name="otro_equipo_vivienda" class="form-control input-md" autocomplete="off" required>
  
		  
		  </div>		
		  

  
				</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">41. ¿Usted tiene teléfono Celular ?</label>  
  <div class="col-md-2">
  <select id="posee_telefono" name="posee_telefono" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Si">Si</option>
  <option value="No">No</option>
</select>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">42. ¿Cuántos teléfonos Celulares tienen en su vivienda?</label>  
  <div class="col-md-2">
  <select id="cantidad_telefonos" name="cantidad_telefonos" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="0">Ninguno</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="Mas de 3">Mas de 3</option>
</select>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">¿Cuánto es el gasto mensual en celular?</label>  
  <div class="col-md-2">
  <select id="gasto_mensual_telefono" name="gasto_mensual_telefono" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Ninguno">Ninguno</option>
  <option value="$5">$5</option>
  <option value="$10">$10</option>
  <option value="$15">$15</option>
  <option value="$20">$20</option>
  <option value="Mas de $20">Mas de $20</option>
</select>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">43. ¿Posee  servicio de Cable para la televisión?</label>  
  <div class="col-md-2">
  <select id="cable" name="cable" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Si">Si</option>
  <option value="No">No</option>
</select>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">44. ¿Posee servicio de internet?</label>  
  <div class="col-md-2">
  <select id="internet" name="internet" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Si">Si</option>
  <option value="No">No</option>
</select>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">¿Usted cuenta con redes sociales?</label>  
  <div class="col-md-2">
  <select id="redes_sociales" name="redes_sociales" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Si">Si</option>
  <option value="No">No</option>
</select>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">¿Mencione cuál?</label>  
  <div class="col-md-2">
  <select id="cual_red_social" name="cual_red_social" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Whatsapp">Whatsapp</option>
  <option value="Facebook">Facebook</option>
  <option value="Twitter">Twitter</option>
  <option value="Otras">Otras</option>
  <option value="Ninguna">Ninguna</option>
</select>
</div>
</div>

<div class="form-group" id="div12">
          <label class="col-md-4 control-label" id="lotro_cual_red">Escriba la red social</label>  
          <div class="col-md-2 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="otro_cual_red" name="otro_cual_red" class="form-control input-md" autocomplete="off" required>
  
		  
		  </div>		
		  

  
				</div>


<p style="text-align: center;">Gestión de Riesgo</p>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">45. ¿Su vivienda ha sido afectada en el ultimo año?</label>  
  <div class="col-md-2">
  <select id="vivienda_afectada" name="vivienda_afectada" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Si">Si</option>
  <option value="No">No</option>
</select>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">46. ¿Qué tipo de evento?</label>  
  <div class="col-md-2">
  <select id="evento_dano" name="evento_dano" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Inundación">Inundación</option>
  <option value="Deslave">Deslave</option>
  <option value="Erupción de volcán">Erupción de volcán</option>
  <option value="Incendio">Incendio</option>
  <option value="Tormentas">Tormentas</option>
  <option value="Derrumbes">Derrumbes</option>
  <option value="Ninguno">Ninguno</option>
  <option value="Otros">Otros</option>
</select>
</div>
</div>

<div class="form-group" id="div13">
          <label class="col-md-4 control-label" id="lotro_evento_dano">Escriba el evento</label>  
          <div class="col-md-2 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="otro_evento_dano" name="otro_evento_dano" class="form-control input-md" autocomplete="off" required>
  
		  
		  </div>		
		  

  
				</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">47. ¿Cuál fue el nivel de afectación?</label>  
  <div class="col-md-2">
  <select id="nivel_afectacion" name="nivel_afectacion" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Pérdida completa de vivienda">Pérdida completa de vivienda</option>
  <option value="Daño parcial de vivienda">Daño parcial de vivienda</option>
  <option value="Ninguno">Ninguno</option>

</select>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">Daño parcial a la vivienda en:</label>  
  <div class="col-md-2">
  <select id="dano_parcial" name="dano_parcial" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Techo">Techo</option>
  <option value="Pared">Pared</option>
  <option value="Hundimientos">Hundimientos</option>
  <option value="Materiales">Materiales</option>
  <option value="Ninguno">Ninguno</option>
</select>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">Afectación en Medios de vida en: </label>  
  <div class="col-md-2">
  <select id="afectacion_medios_vida" name="afectacion_medios_vida" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Cultivos">Cultivos</option>
  <option value="Muebles">Muebles</option>
  <option value="Negocio">Negocio</option>
  <option value="Otros">Otros</option>
  <option value="Ninguno">Ninguno</option>
</select>
</div>
</div>

<div class="form-group" id="div14">
          <label class="col-md-4 control-label" id="lotro_afectacion_medios">Escriba la afectacion</label>  
          <div class="col-md-2 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="otro_afectacion_medios" name="otro_afectacion_medios" class="form-control input-md" autocomplete="off" required>
  
		  
		  </div>		
		  

  
				</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">48. ¿Ha recibido capacitación en gestión de riesgo?</label>  
  <div class="col-md-2">
  <select id="capacitacion_gestion_riesgos" name="capacitacion_gestion_riesgos" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Si">Si</option>
  <option value="No">No</option>
</select>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">49. ¿Existe en la comunidad algún tipo de riesgo social y físico a desastres naturales?</label>  
  <div class="col-md-2">
  <select id="riesgo_comunidad" name="riesgo_comunidad" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Si">Si</option>
  <option value="No">No</option>
</select>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">Tipo de riesgo físico existente:</label>  
  <div class="col-md-2">
  <select id="riesgo_fisico" name="riesgo_fisico" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Rios">Rios</option>
  <option value="Deslizamientos de Montañas">Deslizamientos de Montañas</option>
  <option value="Deslizamientos de Volcán">Deslizamientos de Volcán</option>
  <option value="Taludes">Taludes</option>
  <option value="Carcava">Carcava</option>
  <option value="Otros">Otros</option>
  <option value="Ninguno">Ninguno</option>
</select>
</div>
</div>


<div class="form-group" id="div15">
          <label class="col-md-4 control-label" id="lotro_riesgo_fisico">Escriba el riesgo fisico</label>  
          <div class="col-md-2 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="otro_riesgo_fisico" name="otro_riesgo_fisico" class="form-control input-md" autocomplete="off" required>
  
		  
		  </div>		
		  

  
				</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">Tipo de Riesgo Social existente:</label>  
  <div class="col-md-2">
  <select id="riesgo_social" name="riesgo_social" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Inseguridad Social">Inseguridad Social</option>
  <option value="Otro">Otro</option>
  <option value="Ninguno">Ninguno</option>
</select>
</div>
</div>

<div class="form-group" id="div16">
          <label class="col-md-4 control-label" id="lotro_riesgo_social">Escriba el riesgo social</label>  
          <div class="col-md-2 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="otro_riesgo_social" name="otro_riesgo_social" class="form-control input-md" autocomplete="off" required>
  
		  
		  </div>		
		  

  
				</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">50. ¿En caso de ocurrencia de un desastre natural, ¿cuenta con un plan familiar?</label>  
  <div class="col-md-2">
  <select id="plan_familiar" name="plan_familiar" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Si">Si</option>
  <option value="No">No</option>
</select>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">51. ¿Existe una Comisión de Protección Civil Comunitaria?</label>  
  <div class="col-md-2">
  <select id="comision_proteccion" name="comision_proteccion" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Si">Si</option>
  <option value="No">No</option>
  <option value="No Sabe">No Sabe</option>
</select>
</div>
</div>

<!-- Button -->
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="enviar"></label>
  <div class="col-md-4">
    <button type="button" id="enviar" name="enviar" class="btn btn-success" onClick="verificar()">Guardar</button>
	<button type="reset" id="cancelar" name="cancelar" class="btn btn-danger">Cancelar</button>
  </div>
</div>





</form>
  
	   
        <footer class="footer full-reset">
        <div class="footer-copyright full-reset all-tittles"><img src="../img/logoC.png" width ="45" height="45"/>Sistema Habitat Para la Humanidad 2021</div>
		   
        </footer>
    </div>

        
    
    




	
</body>
</html>
<?php 

include("../config/conexion.php");
if (isset($_REQUEST["bandera"])) {





$bandera=$_REQUEST["bandera"];


$tenencia=$_REQUEST["tenencia"];
$otro_tenencia=$_REQUEST["otro_tenencia"];//////////////////////////
$registrada=$_REQUEST["registrada"];
$otro_registrada=$_REQUEST["otro_registrada"];//////////////////
$espacios=$_REQUEST["espacios"];
//$materiales_paredes=$_REQUEST["materiales_paredes"];

foreach ($_REQUEST['materiales_paredes'] as $value){
  $materiales_paredes .= $value . ', ';
}
$materiales_paredes = substr($materiales_paredes, 0, -2);


$otro_materiales_paredes=$_REQUEST["otro_materiales_paredes"];//////////////



//$materiales_techo=$_REQUEST["materiales_techo"];
foreach ($_REQUEST['materiales_techo'] as $value2){
  $materiales_techo .= $value2 . ', ';
}
$materiales_techo = substr($materiales_techo, 0, -2);


$otro_materiales_techo=$_REQUEST["otro_materiales_techo"];///////////////////////





//$materiales_piso=$_REQUEST["materiales_piso"];

foreach ($_REQUEST['materiales_piso'] as $value3){
  $materiales_piso .= $value3 . ', ';
}
$materiales_piso = substr($materiales_piso, 0, -2);



$otro_materiales_piso=$_REQUEST["otro_materiales_piso"];///////////////////////




//$partes_danadas=$_REQUEST["partes_danadas"];
foreach ($_REQUEST['partes_danadas'] as $value4){
  $partes_danadas .= $value4 . ', ';
}
$partes_danadas = substr($partes_danadas, 0, -2);



$otro_parte_danadas=$_REQUEST["otro_parte_danadas"];/////////////////




$agua_potable=$_REQUEST["agua_potable"];
$abastece_agua=$_REQUEST["abastece_agua"];
$otro_abastecimiento_agua=$_REQUEST["otro_abastecimiento_agua"];/////////////////////
$energia_electrica=$_REQUEST["energia_electrica"];
$abastece_energia=$_REQUEST["abastece_energia"];
$otro_abastecimiento_energia=$_REQUEST["otro_abastecimiento_energia"];/////////////////
$tipo_sanitario=$_REQUEST["tipo_sanitario"];
$tratamiento_agua_gris=$_REQUEST["tratamiento_agua_gris"];
$otro_tratamiento_agua=$_REQUEST["otro_tratamiento_agua"];/////////////////
$basura_vivienda=$_REQUEST["basura_vivienda"];
$combustible_cocina=$_REQUEST["combustible_cocina"];
$otro_combustible_cocina=$_REQUEST["otro_combustible_cocina"];//////////////////////


//$equipo_vivienda=$_REQUEST["equipo_vivienda"];
foreach ($_REQUEST['equipo_vivienda'] as $value5){
  $equipo_vivienda .= $value5 . ', ';
}
$equipo_vivienda = substr($equipo_vivienda, 0, -2);




$otro_equipo_vivienda=$_REQUEST["otro_equipo_vivienda"];///////////////////////



$posee_telefono=$_REQUEST["posee_telefono"];
$cantidad_telefonos=$_REQUEST["cantidad_telefonos"];
$gasto_mensual_telefono=$_REQUEST["gasto_mensual_telefono"];
$cable=$_REQUEST["cable"];
$internet=$_REQUEST["internet"];
$redes_sociales=$_REQUEST["redes_sociales"];
$cual_red_social=$_REQUEST["cual_red_social"];
$otro_cual_red=$_REQUEST["otro_cual_red"];/////////////////////////////
$vivienda_afectada=$_REQUEST["vivienda_afectada"];
$evento_dano=$_REQUEST["evento_dano"];
$otro_evento_dano=$_REQUEST["otro_evento_dano"];////////////////////////////////////
$nivel_afectacion=$_REQUEST["nivel_afectacion"];
$dano_parcial=$_REQUEST["dano_parcial"];
$afectacion_medios_vida=$_REQUEST["afectacion_medios_vida"];
$otro_afectacion_medios=$_REQUEST["otro_afectacion_medios"];/////////////////////////////
$capacitacion_gestion_riesgos=$_REQUEST["capacitacion_gestion_riesgos"];
$riesgo_comunidad=$_REQUEST["riesgo_comunidad"];
$riesgo_fisico=$_REQUEST["riesgo_fisico"];
$otro_riesgo_fisico=$_REQUEST["otro_riesgo_fisico"];//////////////////////
$riesgo_social=$_REQUEST["riesgo_social"];
$otro_riesgo_social=$_REQUEST["otro_riesgo_social"];///////////////////
$plan_familiar=$_REQUEST["plan_familiar"];
$comision_proteccion=$_REQUEST["comision_proteccion"];

$pro_legal=$_REQUEST["pro_legal"];


$nombre=$_REQUEST["nombre"];
$nombre=ucwords($nombre);
$parentesco=$_REQUEST["parentesco"];


if(!isset($otro_tenencia) || $otro_tenencia==''){
  $otro_tenencia='';
  }
  
  if(!isset($otro_registrada) || $otro_registrada==''){
      $otro_registrada='';
      }
  
      if(!isset($otro_materiales_paredes) || $otro_materiales_paredes==''){
          $otro_materiales_paredes='';
          }
  
          if(!isset($otro_materiales_techo) || $otro_materiales_techo==''){
              $otro_materiales_techo='';
              }

              if(!isset($otro_materiales_piso) || $otro_materiales_piso==''){
                $otro_materiales_piso='';
                }
                if(!isset($otro_parte_danadas) || $otro_parte_danadas==''){
                  $otro_parte_danadas='';
                  }

                  if(!isset($otro_abastecimiento_agua) || $otro_abastecimiento_agua==''){
                    $otro_abastecimiento_agua='';
                    }
                    if(!isset($otro_abastecimiento_energia) || $otro_abastecimiento_energia==''){
                      $otro_abastecimiento_energia='';
                      }  if(!isset($otro_abastecimiento_energia) || $otro_abastecimiento_energia==''){
                        $otro_abastecimiento_energia='';
                        }
                        if(!isset($otro_tratamiento_agua) || $otro_tratamiento_agua==''){
                          $otro_tratamiento_agua='';
                          }  if(!isset($otro_combustible_cocina) || $otro_combustible_cocina==''){
                            $otro_combustible_cocina='';
                            }
                            if(!isset($otro_equipo_vivienda) || $otro_equipo_vivienda==''){
                              $otro_equipo_vivienda='';
                              }  if(!isset($otro_cual_red) || $otro_cual_red==''){
                                $otro_cual_red='';
                                }
                                if(!isset($otro_evento_dano) || $otro_evento_dano==''){
                                  $otro_evento_dano='';
                                  }  if(!isset($otro_afectacion_medios) || $otro_afectacion_medios==''){
                                    $otro_afectacion_medios='';
                                    }
                                    if(!isset($otro_riesgo_fisico) || $otro_riesgo_fisico==''){
                                      $otro_riesgo_fisico='';
                                      }
                                      if(!isset($otro_riesgo_social) || $otro_riesgo_social==''){
                                        $otro_riesgo_social='';
                                        }
                                      



if($bandera=="add"){
	pg_query("BEGIN");
	

//$query_s2=pg_query($conexion,"select * from cliente where dui='$dui' ");
//	$rows = pg_num_rows($query_s2);
	


		
		

	
$result=pg_query($conexion,"insert into situacion_vivienda(tenencia,
otro_tenencia,
registrada,
otro_registrada,
espacios,
materiales_paredes,
otro_materiales_paredes,
materiales_techo,
otro_materiales_techo,
materiales_piso,
otro_materiales_piso,
partes_danadas,
otro_parte_danadas,
agua_potable,
abastece_agua,
otro_abastecimiento_agua,
energia_electrica,
abastece_energia,
otro_abastecimiento_energia,
tipo_sanitario,
tratamiento_agua_gris,
otro_tratamiento_agua,
basura_vivienda,
combustible_cocina,
otro_combustible_cocina,
equipo_vivienda,
otro_equipo_vivienda,
posee_telefono,
cantidad_telefonos,
gasto_mensual_telefono,
cable,
internet,
redes_sociales,
cual_red_social,
otro_cual_red,
vivienda_afectada,
evento_dano,
otro_evento_dano,
nivel_afectacion,
dano_parcial,
afectacion_medios_vida,
otro_afectacion_medios,
capacitacion_gestion_riesgos,
riesgo_comunidad,
riesgo_fisico,
otro_riesgo_fisico,
riesgo_social,
otro_riesgo_social,
plan_familiar,
comision_proteccion,pro_legal,nombre,parentesco) values('$tenencia',
NULLIF('$otro_tenencia',''),
'$registrada',
NULLIF('$otro_registrada',''),
'$espacios',
'$materiales_paredes',
NULLIF('$otro_materiales_paredes',''),
'$materiales_techo',
NULLIF('$otro_materiales_techo',''),
'$materiales_piso',
NULLIF('$otro_materiales_piso',''),
'$partes_danadas',
NULLIF('$otro_parte_danadas',''),
'$agua_potable',
'$abastece_agua',
NULLIF('$otro_abastecimiento_agua',''),
'$energia_electrica',
'$abastece_energia',
NULLIF('$otro_abastecimiento_energia',''),
'$tipo_sanitario',
'$tratamiento_agua_gris',
NULLIF('$otro_tratamiento_agua',''),
'$basura_vivienda',
'$combustible_cocina',
NULLIF('$otro_combustible_cocina',''),
'$equipo_vivienda',
NULLIF('$otro_equipo_vivienda',''),
'$posee_telefono',
'$cantidad_telefonos',
'$gasto_mensual_telefono',
'$cable',
'$internet',
'$redes_sociales',
'$cual_red_social',
NULLIF('$otro_cual_red',''),
'$vivienda_afectada',
'$evento_dano',
NULLIF('$otro_evento_dano',''),
'$nivel_afectacion',
'$dano_parcial',
'$afectacion_medios_vida',
NULLIF('$otro_afectacion_medios',''),
'$capacitacion_gestion_riesgos',
'$riesgo_comunidad',
'$riesgo_fisico',
NULLIF('$otro_riesgo_fisico',''),
'$riesgo_social',
NULLIF('$otro_riesgo_social',''),
'$plan_familiar',
'$comision_proteccion',
'$pro_legal','$nombre','$parentesco') returning id_situacion_vivienda" );
	


$fila2=pg_fetch_array($result);///obteniendo el id de la insercion recien hecha
$id_situacion_vivienda=$fila2[0];
 
$result3=pg_query($conexion,"insert into solicitud_situacion_vivienda (idsolicitud,id_situacion_vivienda) values('$idsolicitud','$id_situacion_vivienda') ");



	if(!$result || !$result3){
				pg_query("rollback");
		
				echo "<script language='javascript'>";
						echo "alertaErrorIngresar();";
	//echo "setTimeout ('r()', 1500);";
	echo "</script>";
				}else{
					pg_query("commit");
					echo "<script language='javascript'>";
				echo "alertaExito();";
			//	echo "redi();";
				echo "</script>";
	

echo "<script language='javascript'>";
	echo "setTimeout ('r(".$idcliente.",".$idsolicitud.")', 1500);";
//echo "location.href='situacionSalud.php?iddatos='+$idcliente+'&iddatos2='+$idsolicitud";
	echo "</script>";
				}
	

			
			
			}else{
		
		echo "<script language='javascript'>";
				echo "alertaErrorRegistro();";
				echo "</script>";
		}	

	
	

	


}




   
  


function generar(){
		$str="ABCDEFGHIJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789";
		$cad="";
		for($i=0; strlen($cad)<10; $i++){
			$cad.=substr($str,rand(0,strlen($str)-1),1);
		}
		return base64_encode($cad);
	}

 ?>
  

