<?php session_start();
include("../config/conexion.php");

$id=$_SESSION["idUsuario"];

$query_s= pg_query($conexion,"select idagencia from usuario_agencia where idusuario='$id' ");
while($fila=pg_fetch_array($query_s)){
  $idagencia=$fila[0];
}

?>
  
<!DOCTYPE html>
<html>
<head>
    <title>Registrar Cliente</title>
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
	
<script type="text/javascript">
///////////////validar solo numeros enteros
	$(document).ready(function(){

$('#edad').on('input', function () { 
    this.value = this.value.replace(/[^0-9]/g,'');
});
});
</script>

	
	<script type="text/javascript" class="init"> 

    function alertaError(){
  alertify.error("<h1>Error</h1>"+"<p>No ha agregado ningun cliente</p>"+"<img src='../img/error.png'>").dismissOthers();

	}
  	
	function r(id) { location.href="familiaresCliente.php?iddatos="+id
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


  if (document.getElementById('nombre').value=="" ||
			      document.getElementById('apellido').value=="" ||
            document.getElementById('edad').value=="" ||  
            document.getElementById('direccion').value=="" || 
        //    document.getElementById('telefono').value=="" ||
        //    document.getElementById('telefonoF').value=="" ||   
            document.getElementById('sexo').value=="" ||  
            document.getElementById('municipio').value=="" ||  
            document.getElementById('departamento').value=="" ||  
       //     document.getElementById('correo').value=="" ||
            document.getElementById('dui').value=="" ||
            document.getElementById('nit').value=="" ||
            document.getElementById('zonaR').value=="" ||
            document.getElementById('grupoF').value=="" ||
            document.getElementById('tiempoR').value=="" ||
            document.getElementById('edad').value==""   ||
            
           document.getElementById('parentesco').value=="" || 
           document.getElementById('escolaridad').value=="" || 
           document.getElementById('ocupacion').value=="" || 
           document.getElementById('ingresos').value=="" || 
           document.getElementById('discapacidad').value=="" || 

           ($('#potros').is(':visible') && document.getElementById('potros').value=="") ||
            ($('#otro_esco').is(':visible') && document.getElementById('otro_esco').value=="") || 
            ($('#otro_ocupa').is(':visible') && document.getElementById('otro_ocupa').value=="" )|| 
            ($('#dis').is(':visible') && document.getElementById('dis').value=="") ||

            ($("#ct1").is(':checked') && document.getElementById('telefono').value=="")  ||
           ( $("#ct2").is(':checked') && document.getElementById('telefonoF').value=="") ||
           ( $("#cc").is(':checked') && document.getElementById('correo').value=="")
        //    $("#ct2").is(':not(:checked)') && $("#cc").is(':checked')


            
//$("#telefono").hide();
//$("#telefonoF").hide();
//$("#correo").hide();
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
      document.getElementById('telefono').value="";
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
      document.getElementById('telefonoF').value="";
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
      document.getElementById('correo').value="";

//$("#url-archivo").hide();
//$("#lfoto").hide();
//$("#s").hide();
       // console.log("Checkbox " + $(this).prop("id") +  " (" + $(this).val() + ") => Deseleccionado");
    }
});

  });
	
</script>
  






<script language="javascript">
////////////////////script para llamar php que muestra los datos del producto a vender por codigo


$(document).ready(function(){

  
	$("#lpotros").hide();


$("#potros").hide();


$(".ldiv1").hide();


   $("#parentesco").change(function () {
//	alert("hola");
           $("#parentesco").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="otros"){
	$("#lpotros").show();


$("#potros").show();


$(".ldiv1").show();
}else{
	$("#lpotros").hide();


$("#potros").hide();

document.getElementById('potros').value="";

$(".ldiv1").hide();
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

  
	$("#lesco").hide();


$("#otro_esco").hide();


$(".ldiv2").hide();


   $("#escolaridad").change(function () {
//	alert("hola");
           $("#escolaridad").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="otro"){
	$("#lesco").show();


$("#otro_esco").show();


$(".ldiv2").show();
}else{
	$("#lesco").hide();


$("#otro_esco").hide();

document.getElementById('otro_esco').value="";

//$(".ldiv2").hide();
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

  
	$("#locupa").hide();


$("#otro_ocupa").hide();


$(".ldiv3").hide();


   $("#ocupacion").change(function () {
//	alert("hola");
           $("#ocupacion").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="otro"){
	$("#locupa").show();


$("#otro_ocupa").show();



$(".ldiv3").show();
}else{
	$("#locupa").hide();


$("#otro_ocupa").hide();


document.getElementById('otro_ocupa').value="";

$(".ldiv3").hide();
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

  
	$("#lpdis").hide();


$("#dis").hide();


$(".ldiv4").hide();


   $("#discapacidad").change(function () {
//	alert("hola");
           $("#discapacidad").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="otra"){
	$("#lpdis").show();


$("#dis").show();



$(".ldiv4").show();
}else{
	$("#lpdis").hide();


$("#dis").hide();

document.getElementById('dis').value="";


$(".ldiv4").hide();
}

		//	$("#precio").html(data);
		
			
          //  });            
        });
   })
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
                    <h4><span class="all-tittles">Registrar Solicitante (Datos Generales)</span></h4>
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
  <label class="col-md-4 control-label" for="nombre">1. Nombre del Beneficiario</label>  
  <div class="col-md-5 validate-input" data-validate = "Escriba su usuario">
  <input type="text" id="nombre" name="nombre" placeholder="" class="form-control input-md" autocomplete="off" value="<?= (isset($_POST['nombre']))?$_POST['nombre']:""; ?>" required>
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombre">Apellidos del Beneficiario</label>  
  <div class="col-md-5">
  <input type="text" id="apellido" name="apellido" placeholder="" class="form-control input-md" autocomplete="off" value="<?= (isset($_POST['apellido']))?$_POST['apellido']:""; ?>" required>
    
  </div>
</div>



<div class="form-group">
  <label class="col-md-4 control-label" for="nombre"> Edad</label>  
  <div class="col-md-1">
  
  <input type="text" id="edad" name="edad" placeholder="" class="form-control input-md" autocomplete="off" value="<?= (isset($_POST['edad']))?$_POST['edad']:""; ?>" required>

  </div>
</div>	



<p style="text-align: center;">2. DUI Y NIT</p>
<!-- Text input-->
<div class="form-group" >
  <label class="col-md-4 control-label" for="dui" id="label">DUI</label>  
  <div class="col-md-2">
  <input type="text" id="dui" name="dui" placeholder="" class="form-control input-md" autocomplete="off" value="<?= (isset($_POST['dui']))?$_POST['dui']:""; ?>" required>
    
  </div>
</div>


<!-- Text input-->
<div class="form-group" >
  <label class="col-md-4 control-label" for="dui" id="label">NIT</label>  
  <div class="col-md-2">
  <input type="text" id="nit" name="nit" placeholder="" class="form-control input-md" autocomplete="off" value="<?= (isset($_POST['dui']))?$_POST['dui']:""; ?>" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">3. Sexo</label>  
  <div class="col-md-2">
  <select id="sexo" name="sexo" class="form-control input-md" >
  <option value="" disabled selected>Escoja el sexo</option>
  <option value="masculino"  >Masculino</option>
  <option value="femenino"  >Femenino</option>
</select>
</div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">4. Tiempo de residencia</label>  
  <div class="col-md-2">
  <select id="tiempoR" name="tiempoR" class="form-control input-md" >
  <option value="" disabled selected>Escoja el tiempo de residencia</option>
  <option value="Menos de 1 año">Menos de 1 año</option>
  <option value="Entre 1 y 2 años">Entre 1 y 2 años</option>
  <option value="Entre 2 y 5 años">Entre 2 y 5 años</option>
  <option value="Más de 5 años">Más de 5 años</option>


</select>
</div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombre">5. Direcci&oacuten</label>  
  <div class="col-md-5">
  <input type="text" id="direccion" name="direccion" placeholder="" class="form-control input-md" autocomplete="off" value="<?= (isset($_POST['direccion']))?$_POST['apellido']:""; ?>" required>
    
  </div>
</div>


<p style="text-align: center;">6. Telefono y Correo</p>

<div class="form-group">
<label class="col-md-4 control-label" for="fecha">Marcar si tiene telefono</label> 
<div class="col-md-5">
<input type="checkbox" id="ct1" name="ct1" placeholder="" autocomplete="off" required>
</div>
</div>

<!-- Text input-->
<div class="form-group ldivt1">
  <label class="col-md-4 control-label" for="nombre" id="ltelefono">Tel&eacutefono</label>  
  <div class="col-md-2">
  <input type="text" id="telefono" name="telefono" placeholder="" class="form-control input-md" autocomplete="off" value="<?= (isset($_POST['telefono']))?$_POST['apellido']:""; ?>" required>
    
  </div>
</div>

<div class="form-group">
<label class="col-md-4 control-label" for="fecha">Marcar si tiene telefono familiar</label> 
<div class="col-md-5">
<input type="checkbox" id="ct2" name="ct2" placeholder="" autocomplete="off" required>
</div>
</div>
<!-- Text input-->
<div class="form-group ldivt2">
  <label class="col-md-4 control-label" for="nombre" id="ltelefonoF">Tel&eacutefono Familiar</label>  
  <div class="col-md-2">
  <input type="text" id="telefonoF" name="telefonoF" placeholder="" class="form-control input-md" autocomplete="off" value="<?= (isset($_POST['telefono']))?$_POST['apellido']:""; ?>" required>
    
  </div>
</div>

<div class="form-group">
<label class="col-md-4 control-label" for="fecha">Marcar si tiene correo electronico</label> 
<div class="col-md-5">
<input type="checkbox" id="cc" name="cc" placeholder="" autocomplete="off" required>
</div>
</div>
<!-- Text input-->
<div class="form-group ldivc">
  <label class="col-md-4 control-label" for="nombresv" id="lcorreo">Correo Electronico</label>  
  <div class="col-md-6">
  <input id="correo" name="correo" type="text" class="form-control input-md" autocomplete="off" value="<?= (isset($_POST['correo']))?$_POST['correo']:""; ?>" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">7. Estado Civil</label>  
  <div class="col-md-2">
  <select id="estadoCivil" name="estadoCivil" class="form-control input-md" >
  <option value="" disabled selected>Escoja el estado civil</option>
  <option value="soltero">Soltero</option>
  <option value="acompañado">Acompañado</option>
  <option value="casado">Casado</option>
  <option value="divorciado">Divorciado</option>
  <option value="viudo">Viudo</option>

</select>
</div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="apellido">8. Cuantos grupos familiares habitan?</label>  
  <div class="col-md-1">
  <input id="grupoF" name="grupoF" type="text" placeholder="" class="form-control input-md" autocomplete="off" value="<?= (isset($_POST['grupoF']))?$_POST['grupoF']:""; ?>" required>
    
  </div>
</div>

<p style="text-align: center;">9. Dirección</p>


<div class="form-group">
  <label class="col-md-4 control-label" for="responsable">Departamento</label>  
  <div class="col-md-4">
  <select id="departamento" name="departamento" class="form-control input-md" autocomplete="off" required>
    
	
	 <option value="" disabled selected>Escoja el departamento...</option>
	 
	  <option value="Ahuachapan">Ahuachapan</option>
	   <option value="Cabañas">Cabañas</option>
	 <option value="Chalatenango">Chalatenango</option>
	 					  <option value="Cuscatlan">Cuscatlan</option>
						  			  <option value="Morazan">Morazan</option>
									  				  <option value="La Libertad">La Libertad</option>
						  <option value="La Paz">La Paz</option>
			    <option value="La Union">La Union</option>
   <option value="San Miguel">San Miguel</option>

   	    <option value="San Salvador">San Salvador</option>
							  <option value="San Vicente">San Vicente</option>
	    <option value="Santa Ana">Santa Ana</option>
		  <option value="Sonsonate">Sonsonate</option>
		   <option value="Usulutan">Usulutan</option>
		 
				
							    
	
	</select>
	
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="responsable"> Zona Departamental</label>  
  <div class="col-md-4">
  <select id="zona" name="zona" class="form-control input-md" autocomplete="off" required>
    
	
	 <option value="" disabled selected>Escoja departamento para saber la zona...</option>
		
	
	
	</select>
	
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="responsable"> Municipio</label>  
  <div class="col-md-4">
  <select id="municipio" name="municipio" class="form-control input-md" autocomplete="off" required>
    
	
	
			 <option value="" disabled selected>Escoja el departamento para escoger municipio...</option>

	
	
	</select>
	
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">10. Zona De Residencia(Area)</label>  
  <div class="col-md-2">
  <select id="zonaR" name="zonaR" class="form-control input-md" >
  <option value="" disabled selected>Escoja el area</option>
  <option value="Urbana">Urbana</option>
  <option value="Peri Urbana">Peri Urbana</option>
  <option value="Rural">Rural</option>
  <option value="Rural">Otra</option>


</select>
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
    </select>
    </div>
    </div>

    <div class="form-group" id="ldiv1">
     
    <label class="col-md-4 control-label" id="lpotros">Escriba el parentesco</label>  
          <div class="col-md-2">
	  
		  <input type="text" id="potros" name="potros" class="form-control input-sm" />
  
		  
		  </div>
      </div>


    <div class="form-group">	  
    <label class="control-label col-md-4">Escolaridad</label>
          <div class="col-md-2">
  <select id="escolaridad" name="escolaridad" class="form-control input-sm" required>
      <option value="" disabled selected>Escoja la escolaridad</option>
	

	  <option value="kinder">Kinder</option>
	  <option value="primero a sexto">Educacion basica de 1° a 6° Grado</option>
	  <option value="septimo a noveno">Educacion basica de 7° a 9° Grado</option>
	  <option value="bachillerato">Bachillerato</option>
	  <option value="tecnico">Tecnico Superior</option>
	  <option value="universitario">Universitario</option>
	  <option value="otro">Otro</option>
	  <option value="ninguno">Ninguno</option>
	  


	</select>
	
  </div>
  </div>


  <div class="form-group" id="ldiv2">
     
  <label class="col-md-4 control-label" id="lesco">Escriba la escolaridad</label>  
          <div class="col-md-2">
	  
		  <input type="text" id="otro_esco" name="otro_esco" class="form-control input-sm" required/>
  
		  
		  </div>
       </div>

  <div class="form-group">
  <label class="control-label col-md-4">Ocupacion</label>
          <div class="col-md-2">
  <select id="ocupacion" name="ocupacion" class="form-control input-sm" required>
      <option value="" disabled selected>Escoja la ocupacion</option>
	  

	  <option value="empleado">Empleado</option>
	  <option value="pensionado">Pensionado</option>
	  <option value="comerciante">Comerciante</option>
	  <option value="albañil">Albañil</option>
	  <option value="jornalero">Jornalero</option>
	  <option value="panadero">Panadero</option>
	  <option value="costurera o sastre">Costurera o Sastre</option>
	  <option value="vigilante">Vigilante</option>
	  <option value="empleada domestica">Empleada Domestica</option>
	  <option value="agricultor">Agricultor</option>
	  <option value="electricista">Electricista</option>
	  <option value="mecanico">Mecanico</option>
	  <option value="estudiante">Estudiante</option>
	  <option value="sin trabajo">Sin Trabajo</option>
	  <option value="otro">Otro</option>
	  <option value="oficios domesticos">Oficios Domesticos</option>
	  <option value="ninguna">Ninguna</option>


	</select>
	
  </div>
				</div>

				<div class="form-group" id="ldiv3">
     
        <label class="col-md-4 control-label" id="locupa">Escriba la ocupacion</label>  
          <div class="col-md-2">
	  
		  <input type="text" id="otro_ocupa" name="otro_ocupa" class="form-control input-sm" required/>
  
		  
          </div>
          </div>


        <div class="form-group">		
  <label class="col-md-4 control-label" for="nombre">Ingreso promedio</label>  
          <div class="col-md-2">
	  
		  <select id="ingresos" name="ingresos" class="form-control input-sm" required>		  
	
		  <option value="" disabled selected>Escoja los ingresos</option>
		  <option value="100 a 200">Entre $100 a $200</option>
		  <option value="200 a 300">Entre $201 a $300</option>
		  <option value="301 a 600">Entre $301 a $600</option>
		  <option value="601 a 750">Entre $601 a $750</option>
		  <option value="mas mas 750">Mayor a $750</option>
		  <option value="ninguno">Ninguno</option>
		  
		  </select>

		  			  
		  </div>
        </div>


  

        <div class="form-group">		
        <label class="col-md-4 control-label" for="nombre">Lugar de Trabajo</label>  
          <div class="col-md-3">
	  
		  <input type="text" id="trabajo" name="trabajo" class="form-control input-sm" required/>
  
		  
      </div>
        </div>


 <div class="form-group">		
          <label class="col-md-4 control-label" for="nombre">Discapacidad</label>  
          <div class="col-md-3">
	  
		  <select id="discapacidad" name="discapacidad" class="form-control input-sm" required>
      <option value="" disabled selected>Escoja la discapacidad</option>
	  <option value="ninguna">Ninguna</option>
	  <option value="intelectual">Intelectual</option>
	  <option value="no vidente">No Vidente</option>
	  <option value="sordera">Sordera</option>
	  <option value="ausencia de miembros">Ausencia de Miembros</option>
	  <option value="sindrome de down">Sindrome de Down</option>
	  <option value="afasia">Afasia(Transtorno del lenguaje)</option>
	  <option value="otra">Otra</option>


	  


	</select>
      </div>
      </div>


      <div class="form-group" id="ldiv4">
      <label class="col-md-4 control-label" id="lpdis">Escriba la discapacidad</label>  
          <div class="col-md-2">
	  
		  <input type="text" id="dis" name="dis" class="form-control input-sm" required/>
  
		  
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
$nombre=$_REQUEST["nombre"];//1
$edad=$_REQUEST["edad"];
$nombre= ucwords($nombre);
$apellido=$_REQUEST["apellido"];
$apellido=ucwords($apellido);//2
$correo=$_REQUEST["correo"];//3
$edad=$_REQUEST["edad"];//4
$telefono=$_REQUEST["telefono"];//5
$telefonoFamiliar=$_REQUEST["telefonoF"];//6
$direccion=$_REQUEST["direccion"];//7
$estado_civil=$_REQUEST["estadoCivil"];//8
$dui=$_REQUEST["dui"];//9
$departamento=$_REQUEST["departamento"];//10
$municipio=$_REQUEST["municipio"];//11
$zonaResidencia=$_REQUEST["zonaR"];//12
$sexo=$_REQUEST["sexo"];//13
$grupoF=$_REQUEST["grupoF"];
$tiempoR=$_REQUEST["tiempoR"];
$nit=$_REQUEST["nit"];//9



$parentesco=$_POST["parentesco"];
$escolaridad=$_POST["escolaridad"];
$ocupacion=$_POST["ocupacion"];
$ingreso_pro=$_POST["ingresos"];
$lugar_trabajo=$_POST["trabajo"];
$discapacidad=$_POST["discapacidad"];




$otro_p=$_POST["potros"];
$otra_e=$_POST["otro_esco"];
$otra_o=$_POST["otro_ocupa"];
$otra_d=$_POST["dis"];

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


if($bandera=="add"){
	pg_query("BEGIN");
	

$query_s2=pg_query($conexion,"select * from cliente where dui='$dui' ");
	$rows = pg_num_rows($query_s2);
	

	if($rows==0){
    
    
    if(!isset($telefono) || $telefono==''){
      $telefono='';
    }

    if(!isset($telefonoFamiliar) || $telefonoFamiliar==''){
      $telefonoFamiliar='';
    }

    if(!isset($correo) || $correo==''){
      $correo='';
    }



		

  $result=pg_query($conexion,"insert into cliente(nombres,apellidos,sexo,direccion,telefono,correo,telefono_familiar,estado_civil,zona,municipio,departamento,edad,grupo_familiar,tiempo_residencia,dui,nit,parentesco,escolaridad,ocupacion,ingresos_pro,lugar_trabajo,discapacidad,otro_parentesco,otra_escolaridad,otra_ocupacion,otra_discapacidad) values('$nombre','$apellido','$sexo','$direccion',NULLIF('$telefono',''),NULLIF('$correo',''),NULLIF('$telefonoFamiliar',''),'$estado_civil','$zonaResidencia','$municipio','$departamento','$edad','$grupoF','$tiempoR','$dui','$nit','$parentesco','$escolaridad','$ocupacion','$ingreso_pro',NULLIF('$lugar_trabajo',''),'$discapacidad',NULLIF('$otro_p',''),NULLIF('$otra_e',''),NULLIF('$otra_o',''),NULLIF('$otra_d','') ) returning idcliente" );


$fila2=pg_fetch_array($result);///obteniendo el id de la insercion recien hecha
$idcli=$fila2[0];
 
$result2=pg_query($conexion,"insert into cliente_agencia (idcliente,idagencia) values ('$idcli','$idagencia') ");



	if(!$result || !$result2){
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
//echo "setTimeout ('r(".$iddatos.")', 1500);";
echo "setTimeout ('r(".$idcliente.",".$idsolicitud.")', 1500);";
//echo "location.href='familiaresCliente.php?iddatos='+$idcli";
	echo "</script>";
				}
	
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
  

