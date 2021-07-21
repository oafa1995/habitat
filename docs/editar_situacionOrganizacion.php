<?php session_start();
if($_SESSION['autenticado']!="yeah"){
  header("Location: ../index.php");
    exit();
    }

    
 include("../config/conexion.php");
 //$iddatos=$_REQUEST["iddatos"];
    date_default_timezone_set('America/El_Salvador');
 $iddatos=$_REQUEST["iddatos"];

 $anio_actual=date("Y");//año

  //$iddatos=$_REQUEST["iddatos"];
  $query_s=pg_query($conexion,"select id_situacion_organizacion from solicitud_situacion_organizacion where idsolicitud='$iddatos'");
      while($fila=pg_fetch_array($query_s)){
  //    $ridpaciente=$fila[0];
   $idsituacion=$fila[0];
     // $rfecha=$fila[3];
          
      }

      $query_s2=pg_query($conexion,"select espacio_organizacion,cual_espacio,comunidad_alcaldia,liderazgo_comunidad,espera_liderazgo,interes_comunidad,recreacion,servicios_comunidad,otro_cual_espacio,otro_espera_liderazgo,otro_recreacion,otro_servicios_comunidad from situacion_organizacion where id_situacion_organizacion='$idsituacion' ");
      while($fila=pg_fetch_array($query_s2)){
        //    $ridpaciente=$fila[0];
         $eo=$fila[0];
         $ce=$fila[1];
         $ca=$fila[2];
         $lc=$fila[3];
         $el=$fila[4];
        $ic=$fila[5];
        $re=$fila[6];
        $sc=$fila[7];

        $palabras1 = explode(", ", $re);
        $cantiPala1 = count($palabras1); 

        $palabras2 = explode(", ", $sc);
        $cantiPala2 = count($palabras2); 


$oce=$fila[8];
$oel=$fila[9];
$or=$fila[10];
$osc=$fila[11];

        }

?>
  
<!DOCTYPE html>
<html>
<head>
    <title>Situación Organización y Convivencia comunitaria</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../img/tittle.ico"  >
	
	<script src="../js/jquery.min.js"></script>
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
	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
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

	<script>
    
 $(function($){
	$("#telefono").mask("9999-9999");  
  $("#telefonoF").mask("9999-9999"); 
  $("#nit").mask("9999-999999-999-9");  

 // $("#telefono").unmask();  

	$("#dui").mask("99999999-9");////////////mascara de entrada para telefono
  $("#dui").mask("99999999-9");
   
   
   
    $('#ingresos').on('keypress', function (e) {/////////validacion de numeros con dos decimales
        // Backspace = 8, Enter = 13, ’0′ = 48, ’9′ = 57, ‘.’ = 46
        var field = $(this);
        key = e.keyCode ? e.keyCode : e.which;
 
        if (key == 8) return true;
        if (key > 47 && key < 58) {
          if (field.val() === "") return true;
          var existePto = (/[.]/).test(field.val());
          if (existePto === false){
              regexp = /.[0-9]{10}$/;
          }
          else {
            regexp = /.[0-9]{2}$/;
          }
 
          return !(regexp.test(field.val()));
        }
        if (key == 46) {
          if (field.val() === "") return false;
          regexp = /^[0-9]+$/;
          return regexp.test(field.val());
        }
        return false;
    });
   

   $('#egresos').on('keypress', function (e) {/////////validacion de numeros con dos decimales
        // Backspace = 8, Enter = 13, ’0′ = 48, ’9′ = 57, ‘.’ = 46
        var field = $(this);
        key = e.keyCode ? e.keyCode : e.which;
 
        if (key == 8) return true;
        if (key > 47 && key < 58) {
          if (field.val() === "") return true;
          var existePto = (/[.]/).test(field.val());
          if (existePto === false){
              regexp = /.[0-9]{10}$/;
          }
          else {
            regexp = /.[0-9]{2}$/;
          }
 
          return !(regexp.test(field.val()));
        }
        if (key == 46) {
          if (field.val() === "") return false;
          regexp = /^[0-9]+$/;
          return regexp.test(field.val());
        }
        return false;
    });
   
   
   
   
   
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
  	
	function r(id) { location.href="editar_situacionEnfoqueGenero.php?iddatos="+id
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


  if (document.getElementById('espacio_organizacion').value=="" ||
            document.getElementById('cual_espacio').value=="" ||  
            document.getElementById('comunidad_alcaldia').value=="" || 
            document.getElementById('liderazgo_comunidad').value=="" ||
            document.getElementById('espera_liderazgo').value=="" ||   
            document.getElementById('interes_comunidad').value=="" ||  
            document.getElementById('recreacion').value=="" ||  
            document.getElementById('servicios_comunidad').value=="" ||
          
            (document.getElementById('otro_cual_espacio').value=="" && $('#otro_cual_espacio').is(':visible')) || 			
            (document.getElementById('otro_espera_liderazgo').value=="" && $('#otro_espera_liderazgo').is(':visible')) || 			
            (document.getElementById('otro_recreacion').value=="" && $('#otro_recreacion').is(':visible')) || 			
            (document.getElementById('otro_servicios_comunidad').value=="" && $('#otro_servicios_comunidad').is(':visible')) 			

            
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


     
      
    


.form-group input:valid {
    
  border-left-color: forestgreen;
}

.form-group input{
    border-left-width:12px;
}

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

  oce="<?php echo $oce; ?>";
//alert(oten);
if(oce!=""){
  document.getElementById('otro_cual_espacio').value=oce;
}else{
	$("#lotro_cual_espacio").hide();
	$("#div1").hide();
$("#otro_cual_espacio").hide();
}

//$(".ldiv1").hide();


   $("#cual_espacio").change(function () {
//	alert("hola");
           $("#cual_espacio").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="Otros"){
  
	$("#lotro_cual_espacio").show();
	$("#div1").show();
$("#otro_cual_espacio").show();
}else{
  
	$("#lotro_cual_espacio").hide();
	$("#div1").hide();
$("#otro_cual_espacio").hide();


document.getElementById('otro_cual_espacio').value="";

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

  oel="<?php echo $oel; ?>";
//alert(oten);
if(oel!=""){
  document.getElementById('otro_espera_liderazgo').value=oel;
}else{
	$("#lotro_espera_liderazgo").hide();
	$("#div2").hide();
$("#otro_espera_liderazgo").hide();
}

//$(".ldiv1").hide();


   $("#espera_liderazgo").change(function () {
//	alert("hola");
           $("#espera_liderazgo").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="Otros"){
	$("#lotro_espera_liderazgo").show();
	$("#div2").show();
$("#otro_espera_liderazgo").show();

}else{
	$("#lotro_espera_liderazgo").hide();
	$("#div2").hide();
$("#otro_espera_liderazgo").hide();



document.getElementById('otro_espera_liderazgo').value="";

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

  or="<?php echo $or; ?>";
//alert(oten);
if(or!=""){
  document.getElementById('otro_recreacion').value=or;
}else{
	$("#lotro_otro_recreacion").hide();
	$("#div3").hide();
$("#otro_recreacion").hide();
}

//$(".ldiv1").hide();


   $("#recreacion").change(function () {
//	alert("hola");
           $("#recreacion").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="Otros"){
	$("#lotro_otro_recreacion").show();
	$("#div3").show();
$("#otro_recreacion").show();
}else{
  $("#lotro_otro_recreacion").hide();
	$("#div3").hide();
$("#otro_recreacion").hide();


document.getElementById('otro_recreacion').value="";

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

  osc="<?php echo $osc; ?>";
//alert(oten);
if(osc!=""){
  document.getElementById('otro_servicios_comunidad').value=osc;
}else{  
	$("#lotro_servicios_comunidad").hide();
	$("#div4").hide();
$("#otro_servicios_comunidad").hide();
}

//$(".ldiv1").hide();


   $("#servicios_comunidad").change(function () {
//	alert("hola");
           $("#servicios_comunidad").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="Otros"){

  $("#lotro_servicios_comunidad").show();
	$("#div4").show();
$("#otro_servicios_comunidad").show();

}else{

	$("#lotro_servicios_comunidad").hide();
	$("#div4").hide();
$("#otro_servicios_comunidad").hide();



document.getElementById('otro_servicios_comunidad').value="";

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

$('#zonaV').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunoR").prop("checked", false);
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

$('#casaC').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunoR").prop("checked", false);
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

$('#cancha').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunoR").prop("checked", false);
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

$('#parque').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunoR").prop("checked", false);
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


$('#OtrosR').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunoR").prop("checked", false);
      $("#lotro_otro_recreacion").show();
	$("#div3").show();
$("#otro_recreacion").show();
    //    $("#viernesDescanso").prop('checked', false);
    } else {
      $("#lotro_otro_recreacion").hide();
	$("#div3").hide();
$("#otro_recreacion").hide();
document.getElementById('otro_recreacion').value="";
    }

    cambiarSelect();
  

});

$('#ningunoR').on('change', function() {
    if ($(this).is(':checked') ) {
   //   $("#ningunaE").prop("checked", false);
      $("#zonaV").prop("checked", false);
      $("#casaC").prop("checked", false);
      $("#cancha").prop("checked", false);
      $("#parque").prop("checked", false);
      $("#OtrosR").prop("checked", false);
    //  $("#covid").prop("checked", false);
    //  $("#otrosE").prop("checked", false);
     
   
      $("#lotro_otro_recreacion").hide();
	$("#div3").hide();
$("#otro_recreacion").hide();
document.getElementById('otro_recreacion').value="";
    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect();
});
/////////////////////
////////////////////
////////////////////
///////////////////


$('#eco').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunoC").prop("checked", false);
    //    $("#bloque").prop('checked', false);
  //  alert("hola");
    } else {
   //     $("#bloque").prop('checked', true);
    }

    cambiarSelect2();
   
   //     alert($("#materiales_paredes").val());
     
      //  var list = document.getElementsByTagName("materiales_paredes").length;
      //  alert(list);
});

$('#escuela').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunoC").prop("checked", false);
    //    $("#bloque").prop('checked', false);
  //  alert("hola");
    } else {
   //     $("#bloque").prop('checked', true);
    }

    cambiarSelect2();
   
   //     alert($("#materiales_paredes").val());
     
      //  var list = document.getElementsByTagName("materiales_paredes").length;
      //  alert(list);
});

$('#pnc').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunoC").prop("checked", false);
    //    $("#bloque").prop('checked', false);
  //  alert("hola");
    } else {
   //     $("#bloque").prop('checked', true);
    }

    cambiarSelect2();
   
   //     alert($("#materiales_paredes").val());
     
      //  var list = document.getElementsByTagName("materiales_paredes").length;
      //  alert(list);
});
$('#iglesia').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunoC").prop("checked", false);
    //    $("#bloque").prop('checked', false);
  //  alert("hola");
    } else {
   //     $("#bloque").prop('checked', true);
    }

    cambiarSelect2();
   
   //     alert($("#materiales_paredes").val());
     
      //  var list = document.getElementsByTagName("materiales_paredes").length;
      //  alert(list);
});
$('#mercado').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunoC").prop("checked", false);
    //    $("#bloque").prop('checked', false);
  //  alert("hola");
    } else {
   //     $("#bloque").prop('checked', true);
    }

    cambiarSelect2();
   
   //     alert($("#materiales_paredes").val());
     
      //  var list = document.getElementsByTagName("materiales_paredes").length;
      //  alert(list);
});




$('#OtrosC').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunoC").prop("checked", false);
      $("#lotro_servicios_comunidad").show();
	$("#div4").show();
$("#otro_servicios_comunidad").show();
    //    $("#viernesDescanso").prop('checked', false);
    } else {
      $("#lotro_servicios_comunidad").hide();
	$("#div4").hide();
$("#otro_servicios_comunidad").hide();
document.getElementById('otro_servicios_comunidad').value="";

    }

    cambiarSelect2();
  

});

$('#ningunoC').on('change', function() {
    if ($(this).is(':checked') ) {
   //   $("#ningunoP").prop("checked", false);
      $("#eco").prop("checked", false);
      $("#escuela").prop("checked", false);
      $("#pnc").prop("checked", false);
      $("#iglesia").prop("checked", false);
      $("#mercado").prop("checked", false);
     $("#OtrosC").prop("checked", false);
    //  $("#otrosE").prop("checked", false);
     
   
    $("#lotro_servicios_comunidad").hide();
	$("#div4").hide();
$("#otro_servicios_comunidad").hide();
document.getElementById('otro_servicios_comunidad').value="";

    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect2();
});
///////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////
/////////////////////////////////////////////////



$('#lavadoM').on('change', function() {
    if ($(this).is(':checked') ) {
  //    $("#ningunoP").prop("checked", false);
  //      $("#juevesDescanso").prop('checked', false);
    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect3();
});

$('#usoM').on('change', function() {
    if ($(this).is(':checked') ) {
  //    $("#ningunoP").prop("checked", false);
  //      $("#juevesDescanso").prop('checked', false);
    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect3();
});

$('#distanciamientoM').on('change', function() {
    if ($(this).is(':checked') ) {
  //    $("#ningunoP").prop("checked", false);
  //      $("#juevesDescanso").prop('checked', false);
    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect3();
});

$('#alcoholG').on('change', function() {
    if ($(this).is(':checked') ) {
  //    $("#ningunoP").prop("checked", false);
  //      $("#juevesDescanso").prop('checked', false);
    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect3();
});

$('#lejia_c').on('change', function() {
    if ($(this).is(':checked') ) {
  //    $("#ningunoP").prop("checked", false);
  //      $("#juevesDescanso").prop('checked', false);
    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect3();
});





$('#otrosM').on('change', function() {
    if ($(this).is(':checked') ) {
//      $("#ningunoP").prop("checked", false);
$("#lotro_medidas_covid").show();
	$("#div5").show();
$("#otro_medidas_covid").show();
    //    $("#viernesDescanso").prop('checked', false);
    } else {
      $("#lotro_medidas_covid").hide();
	$("#div5").hide();
$("#otro_medidas_covid").hide();
    }

    cambiarSelect3();
  

});




function cambiarSelect(){
    var seleccionados = $(".jornada input[type='checkbox']:checked");

    var valores = [];

    for(var i = 0; i < seleccionados.length; i++){
        valores.push($(seleccionados[i]).val());
    }

    $('#recreacion').selectpicker('val', valores);
}

function cambiarSelect2(){
    var seleccionados = $(".jornada2 input[type='checkbox']:checked");

    var valores = [];

    for(var i = 0; i < seleccionados.length; i++){
        valores.push($(seleccionados[i]).val());
    }

    $('#servicios_comunidad').selectpicker('val', valores);
}

function cambiarSelect3(){
    var seleccionados = $(".jornada3 input[type='checkbox']:checked");

    var valores = [];

    for(var i = 0; i < seleccionados.length; i++){
        valores.push($(seleccionados[i]).val());
    }

    $('#medidas_covid').selectpicker('val', valores);
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
                    <h4><span class="all-tittles">Sección IV: Organización y Convivencia comunitaria</span></h4>
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
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">67. ¿Usted Participa en espacios de organización comunitaria?</label>  
  <div class="col-md-2">
  <select id="espacio_organizacion" name="espacio_organizacion" class="form-control input-md" >

  <option value="Si" <?php if($eo=="Si") echo "selected"; ?>>Si</option>
  <option value="No" <?php if($eo=="No") echo "selected"; ?>>No</option>

</select>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">¿Mencione en cual?</label>  
  <div class="col-md-2">
  <select id="cual_espacio" name="cual_espacio" class="form-control input-md" >

  <option value="ADESCO" <?php if($ce=="ADESCO") echo "selected"; ?>>ADESCO</option>
  <option value="Junta de Agua" <?php if($ce=="Junta de Agua") echo "selected"; ?>>Junta de Agua</option>
  <option value="Comité Comunitario" <?php if($ce=="Comité Comunitario") echo "selected"; ?>>Comité Comunitario</option>
  <option value="Comité de la iglesia local" <?php if($ce=="Comité de la iglesia local") echo "selected"; ?>>Comité de la iglesia local</option>
  <option value="Equipo Deportivo" <?php if($ce=="Equipo Deportivo") echo "selected"; ?>>Equipo Deportivo</option>
  <option value="Otros" <?php if($ce=="Otros") echo "selected"; ?>>Otros</option>
  <option value="Ninguno" <?php if($ce=="Ninguno") echo "selected"; ?>>Ninguno</option>
</select>
</div>
</div>

<div class="form-group" id="div1">
          <label class="col-md-4 control-label" id="lotro_cual_espacio">Comentario</label>  
          <div class="col-md-5 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="otro_cual_espacio" name="otro_cual_espacio" class="form-control input-md" autocomplete="off" required>
  
		  
		  </div>		
		  

  
				</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">68. ¿Cómo evalúa la Relación Comunidad/Alcaldía?</label>  
  <div class="col-md-2">
  <select id="comunidad_alcaldia" name="comunidad_alcaldia" class="form-control input-md" >

  <option value="Excelente" <?php if($ca=="Excelente") echo "selected"; ?>>Excelente</option>
  <option value="Buena" <?php if($ca=="Buena") echo "selected"; ?>>Buena</option>
  <option value="Regular" <?php if($ca=="Regular") echo "selected"; ?>>Regular</option>
  <option value="No sabe" <?php if($ca=="No sabe") echo "selected"; ?>>No sabe</option>
</select>
</div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">69. ¿Cómo evalúa el Liderazgo la comunidad?</label>  
  <div class="col-md-2">
  <select id="liderazgo_comunidad" name="liderazgo_comunidad" class="form-control input-md" >

  <option value="Excelente" <?php if($lc=="Excelente") echo "selected"; ?>>Excelente</option>
  <option value="Buena" <?php if($lc=="Buena") echo "selected"; ?>>Buena</option>
  <option value="Regular" <?php if($lc=="Regular") echo "selected"; ?>>Regular</option>
  <option value="No sabe" <?php if($lc=="No sabe") echo "selected"; ?>>No sabe</option>

</select>
</div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">70. ¿Qué espera del liderazgo comunitario?</label>  
  <div class="col-md-2">
  <select id="espera_liderazgo" name="espera_liderazgo" class="form-control input-md" >

  <option value="Transparencia en el manejo de fondos" <?php if($el=="Transparencia en el manejo de fondos") echo "selected"; ?>>Transparencia en el manejo de fondos</option>
  <option value="Gestión de proyectos comunitarios" <?php if($el=="Gestión de proyectos comunitarios") echo "selected"; ?>>Gestión de proyectos comunitarios</option>
  <option value="Otros" <?php if($el=="Otros") echo "selected"; ?>>Otros</option>
</select>
</div>
</div>


<div class="form-group" id="div2">
          <label class="col-md-4 control-label" id="lotro_espera_liderazgo">Comentario</label>  
          <div class="col-md-5 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="otro_espera_liderazgo" name="otro_espera_liderazgo" class="form-control input-md" autocomplete="off" required>
  
		  
		  </div>		
		  

  
				</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">71. ¿Usted tiene interés en  participar  en la organización comunitaria?</label>  
  <div class="col-md-2">
  <select id="interes_comunidad" name="interes_comunidad" class="form-control input-md" >

  <option value="Si" <?php if($ic=="Si") echo "selected"; ?>>Si</option>
  <option value="No" <?php if($ic=="No") echo "selected"; ?>>No</option>
  <option value="No Se" <?php if($ic=="No Se") echo "selected"; ?>>No Se</option>
</select>
</div>
</div>


<div class="form-group jornada">
  <label class="col-md-4 control-label" for="nombresv">72. ¿Cuáles con los Espacios públicos de recreación en su comunidad?</label>  
  <div class="col-md-2">

        <label>
        <input type="checkbox" class="flat-red" value="Zona Verde" name="zonaV" id="zonaV"
        <?php 
  
  for($i = 0; $i < $cantiPala1; $i++){ 
                          
    if($palabras1[$i] == "Zona Verde"){
       echo "checked";
                         
                         } }
  
  ?>
         
        
        >
        Zona Verde
    </label>
    <label>
        <input type="checkbox" class="flat-red" value="Casa Comunal" name="casaC" id="casaC"
        <?php 
  
  for($i = 0; $i < $cantiPala1; $i++){ 
                          
    if($palabras1[$i] == "Casa Comunal"){
       echo "checked";
                         
                         } }
  
  ?>
        
        >
        Casa Comunal
    </label>
    
    <label>
        <input type="checkbox" class="flat-red" value="Cancha" name="cancha" id="cancha"
        <?php 
  
  for($i = 0; $i < $cantiPala1; $i++){ 
                          
    if($palabras1[$i] == "Cancha"){
       echo "checked";
                         
                         } }
  
  ?>
        
        >
        Cancha
    </label>
   
     
    
    <label>
        <input type="checkbox" class="flat-red" value="Parque" name="parque"  id="parque"
        <?php 
  
  for($i = 0; $i < $cantiPala1; $i++){ 
                          
    if($palabras1[$i] == "Parque"){
       echo "checked";
                         
                         } }
  
  ?>
         >
        Parque
    </label>  
    
    <label>
        <input type="checkbox" class="flat-red" value="Otros" name="OtrosR"  id="OtrosR" 
        <?php 
  
  for($i = 0; $i < $cantiPala1; $i++){ 
                          
    if($palabras1[$i] == "Otros"){
       echo "checked";
                         
                         } }
  
  ?>
        >
        Otros
    </label>
    
    
    <label>
        <input type="checkbox" class="flat-red" value="Ninguno" name="ningunoR"  id="ningunoR" 
        <?php 
  
  for($i = 0; $i < $cantiPala1; $i++){ 
                          
    if($palabras1[$i] == "Ninguno"){
       echo "checked";
                         
                         } }
  
  ?>
        >
        Ninguno
    </label> 
    


</div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv"></label>  
  <div class="col-md-7">
  <select id="recreacion" multiple="multiple" name="recreacion[]" class="form-control input-md selectpicker" >
  
  <option value="Zona Verde"
  <?php 
  
  for($i = 0; $i < $cantiPala1; $i++){ 
                          
    if($palabras1[$i] == "Zona Verde"){
       echo "selected";
                         
                         } }
  
  ?>
  >Zona Verde</option>
  <option value="Casa Comunal"
  <?php 
  
  for($i = 0; $i < $cantiPala1; $i++){ 
                          
    if($palabras1[$i] == "Casa Comunal"){
       echo "selected";
                         
                         } }
  
  ?>
  >Casa Comunal</option>
  <option value="Cancha"
  <?php 
  
  for($i = 0; $i < $cantiPala1; $i++){ 
                          
    if($palabras1[$i] == "Cancha"){
       echo "selected";
                         
                         } }
  
  ?>
  >Cancha</option>
  <option value="Parque"
  <?php 
  
  for($i = 0; $i < $cantiPala1; $i++){ 
                          
    if($palabras1[$i] == "Parque"){
       echo "selected";
                         
                         } }
  
  ?>
  >Parque</option>
  <option value="Otros"
  <?php 
  
  for($i = 0; $i < $cantiPala1; $i++){ 
                          
    if($palabras1[$i] == "Otros"){
       echo "selected";
                         
                         } }
  
  ?>
  >Otros</option>
  <option value="Ninguno"
  <?php 
  
  for($i = 0; $i < $cantiPala1; $i++){ 
                          
    if($palabras1[$i] == "Ninguno"){
       echo "selected";
                         
                         } }
  
  ?>
  >Ninguno</option>
</select>
</div>
</div>


<div class="form-group" id="div3">
          <label class="col-md-4 control-label" id="lotro_recreacion">Comentario</label>  
          <div class="col-md-5 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="otro_recreacion" name="otro_recreacion" class="form-control input-md" autocomplete="off" required>
  
		  
		  </div>		
		  

  
				</div>



        <div class="form-group jornada2">
  <label class="col-md-4 control-label" for="nombresv">73. ¿Existe en la comunidad los siguientes servicios?</label>  
  <div class="col-md-2">

        
        <input type="checkbox" class="flat-red" value="ECO o Puesto de Salud" name="eco" id="eco"
        <?php 
  
  for($i = 0; $i < $cantiPala2; $i++){ 
                          
    if($palabras2[$i] == "ECO o Puesto de Salud"){
       echo "checked";
                         
                         } }
  
  ?>
        >
        ECO o Puesto de Salud
    </label>
    <label>
        <input type="checkbox" class="flat-red" value="Escuela" name="escuela" id="escuela"
        <?php 
  
  for($i = 0; $i < $cantiPala2; $i++){ 
                          
    if($palabras2[$i] == "Escuela"){
       echo "checked";
                         
                         } }
  
  ?>
        >
        Escuela
    </label>
    
    <label>
        <input type="checkbox" class="flat-red" value="PNC" name="pnc" id="pnc"
        <?php 
  
  for($i = 0; $i < $cantiPala2; $i++){ 
                          
    if($palabras2[$i] == "PNC"){
       echo "checked";
                         
                         } }
  
  ?>
        >
        PNC
    </label>
   
     
    
    <label>
        <input type="checkbox" class="flat-red" value="Iglesia" name="iglesia"  id="iglesia" 
        <?php 
  
  for($i = 0; $i < $cantiPala2; $i++){ 
                          
    if($palabras2[$i] == "Iglesia"){
       echo "checked";
                         
                         } }
  
  ?>
        >
        Iglesia
    </label> 
    
       <label>
        <input type="checkbox" class="flat-red" value="Mercado" name="mercado"  id="mercado" 
        <?php 
  
  for($i = 0; $i < $cantiPala2; $i++){ 
                          
    if($palabras2[$i] == "Mercado"){
       echo "checked";
                         
                         } }
  
  ?>
        >
        Mercado
    </label>  
    
    <label>
        <input type="checkbox" class="flat-red" value="Otros" name="OtrosC"  id="OtrosC" 
        <?php 
  
  for($i = 0; $i < $cantiPala2; $i++){ 
                          
    if($palabras2[$i] == "Otros"){
       echo "checked";
                         
                         } }
  
  ?>
        >
        Otros
    </label>
    
    
    <label>
        <input type="checkbox" class="flat-red" value="Ninguno" name="ningunoC"  id="ningunoC" 
        <?php 
  
  for($i = 0; $i < $cantiPala2; $i++){ 
                          
    if($palabras2[$i] == "Ninguno"){
       echo "checked";
                         
                         } }
  
  ?>
        >
        Ninguno
    </label> 
    


</div>
</div>




<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv"></label>  
  <div class="col-md-7">
  <select id="servicios_comunidad" multiple="multiple" name="servicios_comunidad[]" class="form-control input-md selectpicker" >

  <option value="ECO o Puesto de Salud"
  <?php 
  
  for($i = 0; $i < $cantiPala2; $i++){ 
                          
    if($palabras2[$i] == "CO o Puesto de Salud"){
       echo "selected";
                         
                         } }
  
  ?>
  >ECO o Puesto de Salud</option>
  <option value="Escuela"
  <?php 
  
  for($i = 0; $i < $cantiPala2; $i++){ 
                          
    if($palabras2[$i] == "Escuela"){
       echo "selected";
                         
                         } }
  
  ?>
  >Escuela</option>
  <option value="PNC"
  <?php 
  
  for($i = 0; $i < $cantiPala2; $i++){ 
                          
    if($palabras2[$i] == "PNC"){
       echo "selected";
                         
                         } }
  
  ?>
  >PNC</option>
  <option value="Iglesia"
  <?php 
  
  for($i = 0; $i < $cantiPala2; $i++){ 
                          
    if($palabras2[$i] == "Iglesia"){
       echo "selected";
                         
                         } }
  
  ?>
  >Iglesia</option>
  <option value="Mercado"
  <?php 
  
  for($i = 0; $i < $cantiPala2; $i++){ 
                          
    if($palabras2[$i] == "Mercado"){
       echo "selected";
                         
                         } }
  
  ?>
  >Mercado</option>
  <option value="Otros"
  <?php 
  
  for($i = 0; $i < $cantiPala2; $i++){ 
                          
    if($palabras2[$i] == "Otros"){
       echo "selected";
                         
                         } }
  
  ?>
  >Otros</option>  
  <option value="Ninguno"
  <?php 
  
  for($i = 0; $i < $cantiPala2; $i++){ 
                          
    if($palabras2[$i] == "Ninguno"){
       echo "selected";
                         
                         } }
  
  ?>
  >Ninguno</option>
</select>
</div>
</div>

<div class="form-group" id="div4">
          <label class="col-md-4 control-label" id="lotro_servicios_comunidad">Comentario</label>  
          <div class="col-md-5 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="otro_servicios_comunidad" name="otro_servicios_comunidad" class="form-control input-md" autocomplete="off" required>
  
		  
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

$espacio_organizacion=$_REQUEST["espacio_organizacion"];
$cual_espacio=$_REQUEST["cual_espacio"];
$comunidad_alcaldia=$_REQUEST["comunidad_alcaldia"];
$liderazgo_comunidad=$_REQUEST["liderazgo_comunidad"];
$espera_liderazgo=$_REQUEST["espera_liderazgo"];
$interes_comunidad=$_REQUEST["interes_comunidad"];

//$recreacion=$_REQUEST["recreacion"];
foreach ($_REQUEST['recreacion'] as $value){
  $recreacion .= $value . ', ';
}
$recreacion = substr($recreacion, 0, -2);






//$servicios_comunidad=$_REQUEST["servicios_comunidad"];
foreach ($_REQUEST['servicios_comunidad'] as $value2){
  $servicios_comunidad .= $value2 . ', ';
}
$servicios_comunidad = substr($servicios_comunidad, 0, -2);




$otro_cual_espacio=$_REQUEST["otro_cual_espacio"];
$otro_espera_liderazgo=$_REQUEST["otro_espera_liderazgo"];
$otro_recreacion=$_REQUEST["otro_recreacion"];
$otro_servicios_comunidad=$_REQUEST["otro_servicios_comunidad"];

if($bandera=="add"){
	pg_query("BEGIN");
	

	

	
//$result=pg_query($conexion,"insert into cliente(nombres,apellidos,sexo,direccion,telefono,correo,telefono_familiar,estado_civil,zona,municipio,departamento,fecha_nac,grupo_familiar,tiempo_residencia,dui,nit) values('$nombre','$apellido','$sexo','$direccion','$telefono','$correo','$telefonoFamiliar','$estado_civil','$zonaResidencia','$municipio','$departamento','$fechan','$grupoF','$tiempoR','$dui','$nit' ) returning idcliente" );
	
$result=pg_query($conexion,"update situacion_organizacion set 
espacio_organizacion='$espacio_organizacion',
cual_espacio='$cual_espacio',
comunidad_alcaldia='$comunidad_alcaldia',
liderazgo_comunidad='$liderazgo_comunidad',
espera_liderazgo='$espera_liderazgo',
interes_comunidad='$interes_comunidad',
recreacion='$recreacion',
servicios_comunidad='$servicios_comunidad',
otro_cual_espacio=NULLIF('$otro_cual_espacio',''),
otro_espera_liderazgo=NULLIF('$otro_espera_liderazgo',''),
otro_recreacion=NULLIF('$otro_recreacion',''),
otro_servicios_comunidad=NULLIF('$otro_servicios_comunidad','')
 where id_situacion_organizacion='$idsituacion' ");

//$fila2=pg_fetch_array($result);///obteniendo el id de la insercion recien hecha
//$id_situacion_organizacion=$fila2[0];


//$result3=pg_query($conexion,"insert into solicitud_situacion_organizacion (idsolicitud,id_situacion_organizacion) values('$idsolicitud','$id_situacion_organizacion') ");

 
 



	if(!$result){
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
echo "setTimeout ('r(".$iddatos.")', 1500);";
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
  

