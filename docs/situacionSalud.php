<?php session_start();
if($_SESSION['autenticado']!="yeah"){
  header("Location: ../index.php");
    exit();
    }
    date_default_timezone_set('America/El_Salvador');
 $idcliente=$_REQUEST["iddatos"];
 $idsolicitud=$_REQUEST["iddatos2"];
 $anio_actual=date("Y");//año
?>
  
<!DOCTYPE html>
<html>
<head>
    <title>Situación Salud</title>
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
  	
	function r(id,id2) { location.href="situacionOrganizacion.php?iddatos="+id+"&iddatos2="+id2
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
  if (document.getElementById('salud_familiar').value=="" ||
            document.getElementById('familiar_cronico').value=="" ||
            document.getElementById('enfermedad_cronica').value=="" ||
            (document.getElementById('otro_enfermedad_cronica').value=="" && $('#otro_enfermedad_cronica').is(':visible')) || 			

            document.getElementById('tratamiento').value=="" ||  


            document.getElementById('asiste_tratamiento').value=="" ||  
            (document.getElementById('otro_asiste_tratamiento').value=="" && $('#otro_asiste_tratamiento').is(':visible')) || 			

            document.getElementById('atencion_general').value=="" ||  
            (document.getElementById('otro_atencion_general').value=="" && $('#otro_atencion_general').is(':visible')) || 			


            document.getElementById('atencion_promotor').value=="" ||  
            document.getElementById('prevenir_dengue').value=="" || 
            (document.getElementById('otro_prevenir_dengue').value=="" && $('#otro_prevenir_dengue').is(':visible')) || 			


            document.getElementById('sintomas_covid').value=="" ||
           
            document.getElementById('medidas_covid').value=="" ||   
            (document.getElementById('otro_medidas_covid').value=="" && $('#otro_medidas_covid').is(':visible')) || 			


            document.getElementById('acceso_alimento').value=="" || 
            document.getElementById('desayuno').value=="" || 
            document.getElementById('menor_comida').value=="" || 
            
            document.getElementById('familia_alimentacion').value=="" || 
            (document.getElementById('otro_familia_alimentacion').value=="" && $('#otro_familia_alimentacion').is(':visible')) || 			



            document.getElementById('cultivos_propios').value==""  
            
            
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

  
	$("#lotro_enfermedad_cronica ").hide();
	$("#div1").hide();
$("#otro_enfermedad_cronica").hide();


//$(".ldiv1").hide();


   $("#enfermedad_cronica").change(function () {
//	alert("hola");
           $("#enfermedad_cronica").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="Otros"){
  
	$("#lotro_enfermedad_cronica ").show();
	$("#div1").show();
$("#otro_enfermedad_cronica").show();
}else{
  
	$("#lotro_enfermedad_cronica ").hide();
	$("#div1").hide();
$("#otro_enfermedad_cronica").hide();


document.getElementById('otro_enfermedad_cronica').value="";

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

  
	$("#lotro_asiste_tratamiento").hide();
	$("#div2").hide();
$("#otro_asiste_tratamiento").hide();


//$(".ldiv1").hide();


   $("#asiste_tratamiento").change(function () {
//	alert("hola");
           $("#asiste_tratamiento").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="Otros"){
	$("#lotro_asiste_tratamiento").show();
	$("#div2").show();
$("#otro_asiste_tratamiento").show();
}else{
	$("#lotro_asiste_tratamiento").hide();
	$("#div2").hide();
$("#otro_asiste_tratamiento").hide();


document.getElementById('otro_asiste_tratamiento').value="";

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

  
	$("#lotro_atencion_general").hide();
	$("#div3").hide();
$("#otro_atencion_general").hide();


//$(".ldiv1").hide();


   $("#atencion_general").change(function () {
//	alert("hola");
           $("#atencion_general").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="Otros"){
	$("#lotro_atencion_general").show();
	$("#div3").show();
$("#otro_atencion_general").show();
}else{
	$("#lotro_atencion_general").hide();
	$("#div3").hide();
$("#otro_atencion_general").hide();


document.getElementById('otro_atencion_general').value="";

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

  
	$("#lotro_prevenir_dengue").hide();
	$("#div4").hide();
$("#otro_prevenir_dengue").hide();


//$(".ldiv1").hide();


   $("#prevenir_dengue").change(function () {
//	alert("hola");
           $("#prevenir_dengue").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="Otros"){

	$("#lotro_prevenir_dengue").show();
	$("#div4").show();
$("#otro_prevenir_dengue").show();

}else{

	$("#lotro_prevenir_dengue").hide();
	$("#div4").hide();
$("#otro_prevenir_dengue").hide();



document.getElementById('otro_prevenir_dengue').value="";

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

  
	$("#lotro_medidas_covid").hide();
	$("#div5").hide();
$("#otro_medidas_covid").hide();


//$(".ldiv1").hide();


   $("#medidas_covid").change(function () {
//	alert("hola");
           $("#medidas_covid").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="Otros"){

	$("#lotro_medidas_covid").show();
	$("#div5").show();
$("#otro_medidas_covid").show();

}else{

	$("#lotro_medidas_covid").hide();
	$("#div5").hide();
$("#otro_medidas_covid").hide();



document.getElementById('otro_medidas_covid').value="";

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

  
	$("#lotro_familia_alimentacion").hide();
	$("#div6").hide();
$("#otro_familia_alimentacion").hide();


//$(".ldiv1").hide();


   $("#familia_alimentacion").change(function () {
//	alert("hola");
           $("#familia_alimentacion").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="Otros"){

	$("#lotro_familia_alimentacion").show();
	$("#div6").show();
$("#otro_familia_alimentacion").show();

}else{

  
	$("#lotro_familia_alimentacion").hide();
	$("#div6").hide();
$("#otro_familia_alimentacion").hide();



document.getElementById('otro_familia_alimentacion').value="";

//$(".ldiv1").hide();
}

		//	$("#precio").html(data);
		
			
          //  });            
        });
   })
});
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





</style>

  
<style>
 
 #nombre {text-transform:capitalize;}  
 #apellido {text-transform:capitalize;}
  
  </style>


<script type="text/javascript">
//////////////para validar edad normal
	$(document).ready(function() {
  
   $("#ltelefono").hide();
$("#ltelefonoF").hide();
$("#lcorreo").hide();

$("#telefono").hide();
$("#telefonoF").hide();
$("#correo").hide();

$(".ldivt1").hide();
$(".ldivt2").hide();
$(".ldivc").hide();


$('#ct1').on('change', function() {
    if ($(this).is(':checked') ) {
   ///   alert("seleccionado");
      $("#ltelefono").show();
      $("#telefono").show();
      $(".ldivt1").show();
//$("#url-archivo").show();
//$("#lfoto").show();
//$("#s").show();

    //    console.log("Checkbox " + $(this).prop("id") +  " (" + $(this).val() + ") => Seleccionado");
    } else {
  //    alert("nel perro");
      $("#ltelefono").hide();
      $("#telefono").hide();
      $(".ldivt1").hide();
//$("#url-archivo").hide();
//$("#lfoto").hide();
//$("#s").hide();
       // console.log("Checkbox " + $(this).prop("id") +  " (" + $(this).val() + ") => Deseleccionado");
    }
});

$('#ct2').on('change', function() {
    if ($(this).is(':checked') ) {
   ///   alert("seleccionado");
      $("#ltelefonoF").show();
      $("#telefonoF").show();
      $(".ldivt2").show();
//$("#url-archivo").show();
//$("#lfoto").show();
//$("#s").show();

    //    console.log("Checkbox " + $(this).prop("id") +  " (" + $(this).val() + ") => Seleccionado");
    } else {
  //    alert("nel perro");
      $("#ltelefonoF").hide();
      $("#telefonoF").hide();
      $(".ldivt2").hide();
//$("#url-archivo").hide();
//$("#lfoto").hide();
//$("#s").hide();
       // console.log("Checkbox " + $(this).prop("id") +  " (" + $(this).val() + ") => Deseleccionado");
    }
});


$('#cc').on('change', function() {
    if ($(this).is(':checked') ) {
   ///   alert("seleccionado");
      $("#lcorreo").show();
      $("#correo").show();
      $(".ldivc").show();
//$("#url-archivo").show();
//$("#lfoto").show();
//$("#s").show();

    //    console.log("Checkbox " + $(this).prop("id") +  " (" + $(this).val() + ") => Seleccionado");
    } else {
  //    alert("nel perro");
      $("#lcorreo").hide();
      $("#correo").hide();
      $(".ldivc").hide();
//$("#url-archivo").hide();
//$("#lfoto").hide();
//$("#s").hide();
       // console.log("Checkbox " + $(this).prop("id") +  " (" + $(this).val() + ") => Deseleccionado");
    }
});

  });
	
</script>
	



<script>
 $(function($){

$('#diabetes').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunaE").prop("checked", false);
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

$('#presionA').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunaE").prop("checked", false);
   //     $("#martesDescanso").prop('checked', false); 
    } else {
     //   $("#martesDescanso").prop('checked', true);
    }

    cambiarSelect();
});

$('#enfermedadesR').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunaE").prop("checked", false);
      //  $("#miercolesDescanso").prop('checked', false);
    } else {
      //  $("#miercolesDescanso").prop('checked', true);
    }

    cambiarSelect();
});

$('#cancer').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunaE").prop("checked", false);
  //      $("#juevesDescanso").prop('checked', false);
    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect();
});

$('#insuficiencia').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunaE").prop("checked", false);
  //      $("#viernesDescanso").prop('checked', false);
    } else {
    //    $('#viernesDescanso').prop('checked', true);
    }

    cambiarSelect();
});

$('#covid').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunaE").prop("checked", false);
    //    $("#viernesDescanso").prop('checked', false);
    } else {
      //  $('#viernesDescanso').prop('checked', true);
    }

    cambiarSelect();
});


$('#otrosE').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunaE").prop("checked", false);
      $("#lotro_enfermedad_cronica ").show();
	$("#div1").show();
$("#otro_enfermedad_cronica").show();
    //    $("#viernesDescanso").prop('checked', false);
    } else {
      $("#lotro_enfermedad_cronica ").hide();
	$("#div1").hide();
$("#otro_enfermedad_cronica").hide();
document.getElementById('otro_enfermedad_cronica').value="";

    }

    cambiarSelect();
  

});

$('#ningunaE').on('change', function() {
    if ($(this).is(':checked') ) {
   //   $("#ningunaE").prop("checked", false);
      $("#diabetes").prop("checked", false);
      $("#presionA").prop("checked", false);
      $("#enfermedadesR").prop("checked", false);
      $("#cancer").prop("checked", false);
      $("#insuficiencia").prop("checked", false);
      $("#covid").prop("checked", false);
      $("#otrosE").prop("checked", false);
     
   
      $("#lotro_enfermedad_cronica ").hide();
	$("#div1").hide();
$("#otro_enfermedad_cronica").hide();
document.getElementById('otro_enfermedad_cronica').value="";
    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect();
});
/////////////////////
////////////////////
////////////////////
///////////////////


$('#eliminarC').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunoP").prop("checked", false);
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


$('#mosquitero').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunoP").prop("checked", false);
      //  $("#miercolesDescanso").prop('checked', false);
    } else {
      //  $("#miercolesDescanso").prop('checked', true);
    }

    cambiarSelect2();
});

$('#lejia').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunoP").prop("checked", false);
  //      $("#juevesDescanso").prop('checked', false);
    } else {
    //    $('#juevesDescanso').prop('checked', true);
    }

    cambiarSelect2();
});




$('#otrosP').on('change', function() {
    if ($(this).is(':checked') ) {
      $("#ningunoP").prop("checked", false);
      $("#lotro_prevenir_dengue").show();
	$("#div4").show();
$("#otro_prevenir_dengue").show();
    //    $("#viernesDescanso").prop('checked', false);
    } else {
      $("#lotro_prevenir_dengue").hide();
	$("#div4").hide();
$("#otro_prevenir_dengue").hide();
document.getElementById('otro_prevenir_dengue').value="";

    }

    cambiarSelect2();
  

});

$('#ningunoP').on('change', function() {
    if ($(this).is(':checked') ) {
   //   $("#ningunoP").prop("checked", false);
      $("#eliminarC").prop("checked", false);
      $("#mosquitero").prop("checked", false);
      $("#lejia").prop("checked", false);
      $("#otrosP").prop("checked", false);
    //  $("#ningunoP").prop("checked", false);
    //  $("#covid").prop("checked", false);
    //  $("#otrosE").prop("checked", false);
     
   
    	$("#lotro_prevenir_dengue").hide();
	$("#div4").hide();
$("#otro_prevenir_dengue").hide();
document.getElementById('otro_prevenir_dengue').value="";

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
document.getElementById('otro_medidas_covid').value="";

    }

    cambiarSelect3();
  

});




function cambiarSelect(){
    var seleccionados = $(".jornada input[type='checkbox']:checked");

    var valores = [];

    for(var i = 0; i < seleccionados.length; i++){
        valores.push($(seleccionados[i]).val());
    }

    $('#enfermedad_cronica').selectpicker('val', valores);
}

function cambiarSelect2(){
    var seleccionados = $(".jornada2 input[type='checkbox']:checked");

    var valores = [];

    for(var i = 0; i < seleccionados.length; i++){
        valores.push($(seleccionados[i]).val());
    }

    $('#prevenir_dengue').selectpicker('val', valores);
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
                    <h4><span class="all-tittles">Sección III: Salud</span></h4>
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




<p style="text-align: center;">Condiciones de Salud Familiar</p>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">52. ¿Cómo califica la salud  de su familia en general? </label>  
  <div class="col-md-2">
  <select id="salud_familiar" name="salud_familiar" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Muy Buena">Muy Buena</option>
  <option value="Buena">Buena</option>
  <option value="Regular">Regular</option>
  <option value="Mala">Mala</option>

</select>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">53. ¿Algún miembro de su familia padece de alguna enfermedad crónica?</label>  
  <div class="col-md-2">
  <select id="familiar_cronico" name="familiar_cronico" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Si">Si</option>
  <option value="No">No</option>


</select>
</div>
</div>

<div class="form-group jornada">
  <label class="col-md-4 control-label" for="nombresv">54. ¿Qué Enfermedades crónicas se padece en la familia?</label>  
  <div class="col-md-2">

        
        <input type="checkbox" class="flat-red" value="Diabétes" name="diabetes" id="diabetes">
        Diabétes
    </label>
    <label>
        <input type="checkbox" class="flat-red" value="Presión Arterial" name="presionA" id="presionA">
        Presión Arterial
    </label>
    
    <label>
        <input type="checkbox" class="flat-red" value="Enfermedades Respiratorias" name="enfermedadesR" id="enfermedadesR">
        Enfermedades Respiratorias
    </label>
   
     
    
    <label>
        <input type="checkbox" class="flat-red" value="Cancer" name="cancer"  id="cancer" >
        Cancer
    </label>  
    
    <label>
        <input type="checkbox" class="flat-red" value="Insuficiencia Renal" name="insuficiencia"  id="insuficiencia" >
        Insuficiencia Renal
    </label>
    
    <label>
        <input type="checkbox" class="flat-red" value="COVID-19" name="covid"  id="covid" >
        COVID-19
    </label>
    
   <label>
        <input type="checkbox" class="flat-red" value="Otros" name="otrosE"  id="otrosE" >
        Otros
    </label> 
    
    <label>
        <input type="checkbox" class="flat-red" value="Ninguna" name="ningunaE"  id="ningunaE" >
        Ninguna
    </label> 
    


</div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv"></label>  
  <div class="col-md-7">
  <select id="enfermedad_cronica" multiple="multiple" name="enfermedad_cronica[]" class="form-control input-md selectpicker" >

  <option value="Diabétes">Diabétes</option>
  <option value="Presión Arterial">Presión Arterial</option>
  <option value="Enfermedades Respiratorias">Enfermedades Respiratoria</option>
  <option value="Cancer">Cancer</option>
  <option value="Insuficiencia Renal">Insuficiencia Renal</option>
  <option value="COVID-19">COVID-19</option>
  <option value="Otros">Otros</option>
  <option value="Ninguna">Ninguna</option>
</select>
</div>
</div>

<div class="form-group" id="div1">
          <label class="col-md-4 control-label" id="lotro_enfermedad_cronica">Escriba la enfermedad cronica</label>  
          <div class="col-md-2 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="otro_enfermedad_cronica" name="otro_enfermedad_cronica" class="form-control input-md" autocomplete="off" required>
  
		  
		  </div>		
		  

  
				</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">55. ¿Está bajo un tratamiento médico?</label>  
  <div class="col-md-2">
  <select id="tratamiento" name="tratamiento" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Si">Si</option>
  <option value="No">No</option>
  <option value="No Aplica">No Aplica</option>

</select>
</div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">56. ¿Dónde asiste para el tratamiento médico?</label>  
  <div class="col-md-2">
  <select id="asiste_tratamiento" name="asiste_tratamiento" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="ECO o Unidad de Salud">ECO o Unidad de Salud</option>
  <option value="Hospital Nacional">Hospital Nacional</option>
  <option value="ISSS">ISSS</option>
  <option value="Clinica Privada">Clinica Privada</option>
  <option value="ONG">ONG</option>
  <option value="Otros">Otros</option>
  <option value="Ninguno">Ninguno</option>
</select>
</div>
</div>

<div class="form-group" id="div2">
          <label class="col-md-4 control-label" id="lotro_asiste_tratamiento ">Escriba la enfermedad cronica</label>  
          <div class="col-md-2 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="otro_asiste_tratamiento" name="otro_asiste_tratamiento" class="form-control input-md" autocomplete="off" required>
  
		  
		  </div>		
		  

  
				</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">57. ¿Dónde asiste para la atención médica general?</label>  
  <div class="col-md-2">
  <select id="atencion_general" name="atencion_general" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Hospital Nacional">Hospital Nacional</option>
  <option value="ECO o Unidad de Salud">ECO o Unidad de Salud</option>
  <option value="ISSS">ISSS</option>
  <option value="Médico Particular">Médico Particular</option>
  <option value="Remedios Caseros">Remedios Caseros</option>
  <option value="Otros">Otros</option>
  <option value="Ninguno">Ninguno</option>
</select>
</div>
</div>

<div class="form-group" id="div3">
          <label class="col-md-4 control-label" id="lotro_atencion_general">Escriba donde asiste</label>  
          <div class="col-md-2 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="otro_atencion_general" name="otro_atencion_general" class="form-control input-md" autocomplete="off" required>
  
		  
		  </div>		
		  

  
				</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">58. ¿Reciben atención por parte del  Promotor de Salud en la comunidad?</label>  
  <div class="col-md-2">
  <select id="atencion_promotor" name="atencion_promotor" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Si">Si</option>
  <option value="No">No</option>
  <option value="A Veces">A Veces</option>
</select>
</div>
</div>


<div class="form-group jornada2">
  <label class="col-md-4 control-label" for="nombresv">59. ¿Qué medidas se implementan para prevenir el Dengue?</label>  
  <div class="col-md-2">

        
        <input type="checkbox" class="flat-red" value="Eliminar Criaderos de Zancudos" name="eliminarC" id="eliminarC">
        Eliminar Criaderos de Zancudos
    </label>
    <label>
        <input type="checkbox" class="flat-red" value="Usar mosquitero" name="mosquitero" id="mosquitero">
        Usar mosquitero
    </label>
    
    <label>
        <input type="checkbox" class="flat-red" value="Aplicar Lejía" name="lejia" id="lejia">
        Aplicar Lejía
    </label>
   
     
    
    <label>
        <input type="checkbox" class="flat-red" value="Otros" name="otrosP"  id="otrosP" >
        Otros
    </label>  
    
    <label>
        <input type="checkbox" class="flat-red" value="Ninguno" name="ningunoP"  id="ningunoP" >
        Ninguno
    </label>
    
   

</div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv"></label>  
  <div class="col-md-5">
  <select id="prevenir_dengue" name="prevenir_dengue[]" multiple="multiple" class="form-control input-md selectpicker" >
 
  <option value="Eliminar Criaderos de Zancudos">Eliminar Criaderos de Zancudos</option>
  <option value="Usar mosquitero">Usar mosquitero</option>
  <option value="Aplicar Lejía">Aplicar Lejía</option>
  <option value="Otros">Otros</option>
  <option value="Ninguno">Ninguno</option>
</select>
</div>
</div>

<div class="form-group" id="div4">
          <label class="col-md-4 control-label" id="lotro_prevenir_dengue">Escriba donde asiste</label>  
          <div class="col-md-2 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="otro_prevenir_dengue" name="otro_prevenir_dengue" class="form-control input-md" autocomplete="off" required>
  
		  
		  </div>		
		  

  
				</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">60. ¿Conoce los principales síntomas del COVID-19? </label>  
  <div class="col-md-2">
  <select id="sintomas_covid" name="sintomas_covid" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Si">Si</option>
  <option value="No">No</option>
</select>
</div>
</div>

<div class="form-group jornada3">
  <label class="col-md-4 control-label" for="nombresv">61. ¿Qué medidas está tomando para prevenir el COVID-19?</label>  
  <div class="col-md-2">

        
        <input type="checkbox" class="flat-red" value="Lavado de Manos" name="lavadoM" id="lavadoM">
        Lavado de Manos
    </label>
    <label>
        <input type="checkbox" class="flat-red" value="Uso de mascarillas" name="usoM" id="usoM">
        Uso de mascarillas
    </label>
    
    <label>
        <input type="checkbox" class="flat-red" value="Distanciamiento Social" name="distanciamientoM" id="distanciamientoM">
        Distanciamiento Social
    </label>
    
    <label>
        <input type="checkbox" class="flat-red" value="Alcohol gel" name="alcoholG" id="alcoholG">
        Alcohol gel
    </label> 
    
    <label>
        <input type="checkbox" class="flat-red" value="Uso de Lejía o cloro" name="lejia_c" id="lejia_c">
        Uso de Lejía o cloro
    </label>
   
     
    
    <label>
        <input type="checkbox" class="flat-red" value="Otros" name="otrosM"  id="otrosM" >
        Otros
    </label>  
    
  
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv"></label>  
  <div class="col-md-8">
  <select id="medidas_covid" multiple="multiple" name="medidas_covid[]" class="form-control input-md selectpicker" >
 
  <option value="Lavado de Manos">Lavado de Manos</option>
  <option value="Uso de mascarillas">Uso de mascarillas</option>
  <option value="Distanciamiento Social">Distanciamiento Social</option>
  <option value="Alcohol gel">Alcohol gel</option>
  <option value="Uso de Lejía o cloro">Uso de Lejía o cloro</option>
  <option value="Otros">Otros</option>  
</select>
</div>
</div>


<div class="form-group" id="div5">
          <label class="col-md-4 control-label" id="lotro_medidas_covid">Escriba las medidas</label>  
          <div class="col-md-4 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="otro_medidas_covid" name="otro_medidas_covid" class="form-control input-md" autocomplete="off" required>
  
		  
		  </div>		
		  

  
				</div>

<p style="text-align: center;">Acceso a Alimentos(Seguridad Alimentaria)</p>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">62. ¿Usted se ha preocupado por que no haya comida en su hogar?</label>  
  <div class="col-md-2">
  <select id="acceso_alimento" name="acceso_alimento" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Si">Si</option>
  <option value="No">No</option>
  <option value="A Veces">A Veces</option>

</select>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">63. ¿En los últimos 3 meses por falta de recursos alguna vez se quedaron sin desayunar, almorzar o cenar?</label>  
  <div class="col-md-2">
  <select id="desayuno" name="desayuno" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Si">Si</option>
  <option value="No">No</option>
  <option value="A Veces">A Veces</option>

</select>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">64. ¿Algún menor de 18 años se ha dormido sin comer?</label>  
  <div class="col-md-2">
  <select id="menor_comida" name="menor_comida" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Si">Si</option>
  <option value="No">No</option>
  <option value="A Veces">A Veces</option>

</select>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">65. ¿De que forma considera que la familia podría tener una mejor alimentación?</label>  
  <div class="col-md-2">
  <select id="familia_alimentacion" name="familia_alimentacion" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Cultivando sus propios alimentos">Cultivando sus propios alimentos</option>
  <option value="Incremento de ingresos de la familia">Incremento de ingresos de la familia</option>
  <option value="Conociendo sobre preparación de alimentos">Conociendo sobre preparación de alimentos</option>
  <option value="Otros">Otros</option>

</select>
</div>
</div>


<div class="form-group" id="div6">
          <label class="col-md-4 control-label" id="lotro_familia_alimentacion">Escriba la opcion</label>  
          <div class="col-md-2 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="otro_familia_alimentacion" name="otro_familia_alimentacion" class="form-control input-md" autocomplete="off" required>
  
		  
		  </div>		
		  

  
				</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">66. ¿Considera que cultivar sus propios alimentos, podría asegurar una mejor alimentación?</label>  
  <div class="col-md-2">
  <select id="cultivos_propios" name="cultivos_propios" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Si">Si</option>
  <option value="No">No</option>
  
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

$salud_familiar=$_REQUEST["salud_familiar"];
$familiar_cronico=$_REQUEST["familiar_cronico"]; 



//$enfermedad_cronica=$_REQUEST["enfermedad_cronica"];
foreach ($_REQUEST['enfermedad_cronica'] as $value){
  $enfermedad_cronica .= $value . ', ';
}
$enfermedad_cronica = substr($enfermedad_cronica, 0, -2);




$tratamiento=$_REQUEST["tratamiento"];
$asiste_tratamiento=$_REQUEST["asiste_tratamiento"];
$atencion_general=$_REQUEST["atencion_general"];
$atencion_promotor=$_REQUEST["atencion_promotor"];


//$prevenir_dengue=$_REQUEST["prevenir_dengue"];
foreach ($_REQUEST['prevenir_dengue'] as $value2){
  $prevenir_dengue .= $value2 . ', ';
}
$prevenir_dengue = substr($prevenir_dengue, 0, -2);





$sintomas_covid=$_REQUEST["sintomas_covid"];



//$medidas_covid=$_REQUEST["medidas_covid"];
foreach ($_REQUEST['medidas_covid'] as $value3){
  $medidas_covid .= $value3 . ', ';
}
$medidas_covid = substr($medidas_covid, 0, -2);




$acceso_alimento=$_REQUEST["acceso_alimento"];
$desayuno=$_REQUEST["desayuno"];
$menor_comida=$_REQUEST["menor_comida"];
$familia_alimentacion=$_REQUEST["familia_alimentacion"]; 
$cultivos_propios=$_REQUEST["cultivos_propios"];

$otro_enfermedad_cronica=$_REQUEST["otro_enfermedad_cronica"];
$otro_asiste_tratamiento=$_REQUEST["otro_asiste_tratamiento"];
$otro_atencion_general=$_REQUEST["otro_atencion_general"];
$otro_prevenir_dengue=$_REQUEST["otro_prevenir_dengue"];
$otro_medidas_covid=$_REQUEST["otro_medidas_covid"];
$otro_familia_alimentacion=$_REQUEST["otro_familia_alimentacion"];


if(!isset($otro_enfermedad_cronica) || $otro_enfermedad_cronica==''){
  $otro_enfermedad_cronica='';
  }
  
  
  if(!isset($otro_asiste_tratamiento) || $otro_asiste_tratamiento==''){
    $otro_asiste_tratamiento='';
    }


    if(!isset($otro_atencion_general) || $otro_atencion_general==''){
      $otro_atencion_general='';
      }

      if(!isset($otro_prevenir_dengue) || $otro_prevenir_dengue==''){
        $otro_prevenir_dengue='';
        }

        if(!isset($otro_medidas_covid) || $otro_medidas_covid==''){
          $otro_medidas_covid='';
          }


          if(!isset($otro_familia_alimentacion) || $otro_familia_alimentacion==''){
            $otro_familia_alimentacion='';
            }



            

            


if($bandera=="add"){
	pg_query("BEGIN");
	


  $result=pg_query($conexion,"insert into situacion_salud(salud_familiar,   
  familiar_cronico,  
  enfermedad_cronica,    
  tratamiento,
  asiste_tratamiento,   
  atencion_general,     
  atencion_promotor,
  prevenir_dengue,       
  sintomas_covid, 
  medidas_covid,         
  acceso_alimento, 
  desayuno, 
  menor_comida, 
  familia_alimentacion,   
  cultivos_propios,   
  otro_enfermedad_cronica,
  otro_asiste_tratamiento,
  otro_atencion_general,
  otro_prevenir_dengue,
  otro_medidas_covid,
  otro_familia_alimentacion) values('$salud_familiar',   
  '$familiar_cronico',  
  '$enfermedad_cronica',    
  '$tratamiento',
  '$asiste_tratamiento',   
  '$atencion_general',     
  '$atencion_promotor',
  '$prevenir_dengue',       
  '$sintomas_covid', 
  '$medidas_covid',         
  '$acceso_alimento', 
  '$desayuno', 
  '$menor_comida', 
  '$familia_alimentacion',   
  '$cultivos_propios',   
  NULLIF('$otro_enfermedad_cronica',''),
  NULLIF('$otro_asiste_tratamiento',''),
  NULLIF('$otro_atencion_general',''),
  NULLIF('$otro_prevenir_dengue',''),
  NULLIF('$otro_medidas_covid',''),
  NULLIF('$otro_familia_alimentacion','') ) returning id_situacion_salud" );


//$result=pg_query($conexion,"insert into cliente(nombres,apellidos,sexo,direccion,telefono,correo,telefono_familiar,estado_civil,zona,municipio,departamento,fecha_nac,grupo_familiar,tiempo_residencia,dui,nit) values('$nombre','$apellido','$sexo','$direccion','$telefono','$correo','$telefonoFamiliar','$estado_civil','$zonaResidencia','$municipio','$departamento','$fechan','$grupoF','$tiempoR','$dui','$nit' ) returning idcliente" );
	


$fila2=pg_fetch_array($result);///obteniendo el id de la insercion recien hecha
$id_situacion_salud=$fila2[0];

$result3=pg_query($conexion,"insert into solicitud_situacion_salud (idsolicitud,id_situacion_salud) values('$idsolicitud','$id_situacion_salud') ");

 



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
//echo "location.href='situacionOrganizacion.php?iddatos='+$idcliente+'&iddatos2='+$idsolicitud";
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
  

