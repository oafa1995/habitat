<?php session_start();
if($_SESSION['autenticado']!="yeah"){
    header("Location: ../index.php");
      exit();
      }
      include("../config/conexion.php");

      date_default_timezone_set('America/El_Salvador');
    $cont2=0;
    $iddatos=$_REQUEST["iddatos"];
    $cargo=$_SESSION["cargo"];

    $query_s2=pg_query($conexion,"select idcliente from solicitud where idsolicitud='$iddatos' ");
    while($fila=pg_fetch_array($query_s2)){
      $idcliente=$fila[0];
      }
  

  //  $anio_actual=date("Y");//año
  //  $idusuario=$_SESSION["idUsuario"];

    $query_s2=pg_query($conexion,"select nombres,apellidos,dui from cliente where idcliente='$idcliente' ");
	while($fila=pg_fetch_array($query_s2)){
        $nombre=$fila[0];
        $apellido=$fila[1];
        $dui=$fila[2];
    }

    $query_s2=pg_query($conexion,"select comentario_clave,condicion_actual,a_riesgo,id_datos_finales_es,fecha,latitud,longitud from datos_finales_es where idsolicitud='$iddatos' ");
    while($fila=pg_fetch_array($query_s2)){
        $rc=$fila[0];
        $rca=$fila[1];
        $rr=$fila[2];
        $id_datos_finales_es=$fila[3];
        $rfecha=$fila[4];
        $rlatitud=$fila[5];
        $rlongitud=$fila[6];
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

	
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>


              <link rel="stylesheet" href="https://unpkg.com/leaflet-gesture-handling@1.2.1/dist/leaflet-gesture-handling.min.css" type="text/css">
<script src="https://unpkg.com/leaflet-gesture-handling@1.2.1/dist/leaflet-gesture-handling.min.js"></script>

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
  alertify.error("<h1>Error</h1>"+"<p>Hay campos vacios</p>"+"<img src='../img/error.png'>").dismissOthers();

	}
  	
	function r(id,id2) { location.href="reportePuntaje.php?iddatos="+id+"&iddatos2="+id2
 //   window.open("editarMedicina.php?iddatos="+id, '_parent');
   } 
  
  
  function alertaExito(){
  alertify.success("<h1>Exito</h1>"+"<p>Datos ingresados correctamente</p>"+"<img src='../img/bien.png'>");
  }

  function alertaErrorEx(){
    alertify.error("<h1>Error</h1>"+"<p>Tipo de archivo invalido en Firma, solo es permitido JPG, PNG y GIF</p>"+"<img src='../img/error.png'>").dismissOthers();


  }

  function alertaErrorEx2(){
    alertify.error("<h1>Error</h1>"+"<p>Tipo de archivo invalido en fotografia de vivienda, solo es permitido JPG, PNG y GIF</p>"+"<img src='../img/error.png'>").dismissOthers();


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

jQuery("#mi-textarea").focus();
            

function verificar(){
  //  document.querySelector("comentario_clave").focus(); //set the focus - cursor at end
//document.querySelector("comentario_clave").setSelectionRange(0,0);

  $(document).ready(function() {

    if(document.getElementById('comentario_clave').value=="" || 
	
	//	document.getElementById('paciente').value=="" ||
		document.getElementById('encuestado').value==""  ||
    document.getElementById('dui').value==""  ||
    document.getElementById('archivo').value==""  ||
    document.getElementById('fecha').value==""  ||
    document.getElementById('latitud').value==""  ||
    document.getElementById('longitud').value==""  ||
    document.getElementById('a_riesgo').value==""  ||
    document.getElementById('archivo3').value==""  ||
    document.getElementById('condicion_actual').value=="" 
     ||    document.getElementById('solucion_habitacional').value==""  ||
 	document.getElementById('archivo2').value==""
	
	){
		
		alertaError();
        var hoja = document.createElement('style')
hoja.innerHTML = ".form-group input:invalid{border-left-color: firebrick;}";
document.body.appendChild(hoja);
		}else{
	
      var fileInput = document.getElementById('archivo');
		  var filePath = fileInput.value;
		  var allowedExtensions =/(.jpg|.jpeg|.png|.gif)$/i;
	
	

		if(!allowedExtensions.exec(filePath) ){
			
		alertaErrorEx();
		 fileInput.value = '';
        return false;
		
		}else{

            var fileInput = document.getElementById('archivo2');
		  var filePath = fileInput.value;
		  var allowedExtensions =/(.jpg|.jpeg|.png|.gif)$/i;


          if(!allowedExtensions.exec(filePath) ){
			
            alertaErrorEx();
             fileInput.value = '';
            return false;
            
            }else{

              var fileInput = document.getElementById('archivo3');
		  var filePath = fileInput.value;
		  var allowedExtensions =/(.jpg|.jpeg|.png|.gif)$/i;


          if(!allowedExtensions.exec(filePath) ){
			
            alertaErrorEx();
             fileInput.value = '';
            return false; 

          }else{



                document.getElementById('bandera').value="add";
    document.frmcdi.submit();
            
          }
            
            }

          
        }
 //   document.getElementById('bandera').value="add";
  //  document.frmcdi.submit();
        
        
 
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
                    <h4><span class="all-tittles">(Datos Finales)</span></h4>
                </li>
				</center>      
			

    <li class="mobile-menu-button visible-xs" style="float: left !important;">
                    <i class="zmdi zmdi-menu"></i>
                </li>
			
            </ul>
        </nav>
		
		 
       
        
    
	           
			   
			   
	
    
           
		 <form class="form-horizontal" action="" method="post" id="frmcdi" name="frmcdi" enctype="multipart/form-data">
	   <input type="hidden" name="bandera" id="bandera"/>
<input type="hidden" name="baccion" id="baccion"/>





<!-- Form Name -->
<br>





<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombre">Comentarios Clave a considerar</label>  
  <div class="col-md-5">
  <textarea id="comentario_clave" name="comentario_clave" class="form-control input-md" autocomplete="off" required><?php echo $rc;?></textarea>
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombre">Condicion actual de la vivienda</label>  
  <div class="col-md-5">
  <textarea id="condicion_actual" name="condicion_actual" class="form-control input-md" autocomplete="off" required><?php echo $rca;?></textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombre">Amenazas y riesgos de la vivienda </label>  
  <div class="col-md-5">
  <textarea id="a_riesgo" name="a_riesgo" class="form-control input-md" autocomplete="off" required><?php echo $rr;?></textarea>
  </div>
</div>

<div class="form-group">
  <label class="control-label col-md-4">Solucion Habitacional Considerada</label>
          <div class="col-md-2">
  <select id="solucion_habitacional" name="solucion_habitacional" class="form-control input-sm" required>
      <option value="" disabled selected>Escoja la opción</option>
	  

	  <option value="Reconstrucción de Vivienda">Reconstrucción de Vivienda</option>
	  <option value="Mejoramiento de Vivienda">Mejoramiento de Vivienda</option>

	</select>
	
  </div>
				</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="apellido">Nombre del encuestado</label>  
  <div class="col-md-3">
  <input id="encuestado" name="encuestado" type="text" placeholder="" class="form-control input-md" autocomplete="off" value="<?php echo $nombre." ".$apellido; ?>" readonly required>
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="apellido">DUI</label>  
  <div class="col-md-3">
  <input id="dui" name="dui" type="text" placeholder="" class="form-control input-md" autocomplete="off" value="<?php echo $dui; ?>" readonly required>
    
  </div>
</div>




<div class="form-group">
  <label class="col-md-4 control-label" for="salario" id="lfoto">Firma del Encuestado</label>  
<div class="col-md-4">
  <input type="text" id="url-archivo" readonly class="form-control input-md mask-telefono" autocomplete="off"/>
</div>
<div class="col-md-4">
<label class="cargar3" id="s">
subir<span>
<input type="file" id="archivo3" name="archivo3" required value=''/>
</span>
</label>
</div>


</div>








<div class="form-group">
  <label class="col-md-4 control-label" for="salario" id="lfoto">Fotografia de vivienda actual</label>  
<div class="col-md-4">
  <input type="text" id="url-archivo2" readonly class="form-control input-md mask-telefono" autocomplete="off"/>
</div>
<div class="col-md-4">
<label class="cargar2" id="s">
subir<span>
<input type="file" id="archivo2" name="archivo2" />
</span>
</label>
</div>


</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="apellido">Persona de que realizo la encuesta</label>  
  <div class="col-md-3">
  <input id="encuestador" name="encuestador" type="text" placeholder="" class="form-control input-md" autocomplete="off" value="<?php echo $_SESSION["nombresE"]." ".$_SESSION["apellidosE"]; ?>" readonly required>
    
  </div>
</div>



<div class="form-group">
  <label class="col-md-4 control-label" for="apellido">Cargo</label>  
  <div class="col-md-3">
  <input id="cargo" name="cargo" type="text" placeholder="" class="form-control input-md" autocomplete="off" value="<?php echo $cargo; ?>" readonly required>
    
  </div>
</div><!-- Text input-->


<div class="form-group">
  <label class="col-md-4 control-label" for="nombre">Fecha</label>  
  <div class="col-md-2">
  <input type="date" id="fecha" name="fecha" placeholder="" class="form-control input-md" autocomplete="off" value="<?php echo $rfecha ?>" required>
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="salario" id="lfoto">Firma del Encuestador</label>  
<div class="col-md-4">
  <input type="text" id="url-archivo" readonly class="form-control input-md mask-telefono" autocomplete="off"/>
</div>
<div class="col-md-4">
<label class="cargar" id="s">
subir<span>
<input type="file" id="archivo" name="archivo" required/>
</span>
</label>
</div>


</div>

<div class="form-group" id = "map" style = "width: 600px; height: 480px"></div>
              <script>

$('.map').mousedown( function() {
    map.dragging.disable();
});

                 // Creating map options
                 var mapOptions = {
                    center: [13.6972878, -89.2001648],
                    zoom: 200,
                    gestureHandling: true
                 
                 
                }
                 
                 // Creating a map object
                 var map = new L.map('map', mapOptions);

           
                 var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      'attribution': 'Map data &copy; OpenStreetMap contributors'
    });
    //locateMe();
                 // Adding layer to the map
                 map.addLayer(layer);
          
marker=null;
la="<?php echo $rlatitud ?>";
lo="<?php echo $rlongitud ?>";



                 this.map.locate({setView : true}).on('locationfound', function(e){
            var marker = L.marker([la, lo]).bindPopup('Te encuentras aqui :)');
            var circle = L.circle([la, lo], e.accuracy/2, {
                weight: 1,
                color: 'blue',
                fillColor: '#cacaca',
                fillOpacity: 0.2
            });
            map.addLayer(marker);
            map.addLayer(circle);

         //   document.getElementById('latitud').value=e.latlng.lat;
  //document.getElementById('longitud').value=e.latlng.lng;
          //  dragging.disable();
          

            map.on("click", function(e){

//alert("latitud"+e.latlng.lat);// para capturar la latitud
//alert("longitud"+e.latlng.lng);//para capturar la longitud

//if (marker !== null) {
// map.removeLayer(marker);
// map.removeLayer(circle);
 //$(".leaflet-marker-icon").remove(); $(".leaflet-popup").remove();
//}
//$(".leaflet-marker-icon").remove(); $(".leaflet-popup").remove();
//marker = L.marker(e.latlng).addTo(map).bindPopup('Te encuentras aqui :)');

 //marker.addTo(map);
 // map.setView([e.latlng.lat, e.latlng.lng], 150);//localizar y dar zoom en esa parte del mapa
  //circle.addTo(map);
 // document.getElementById('latitud').value=e.latlng.lat;
 // document.getElementById('longitud').value=e.latlng.lng;



              })
             
 


        });

  
                 
                 // Creating a Layer object
    

function actualizar (){
  
  if (marker !== null) {
 map.removeLayer(marker);
 //map.removeLayer(circle);
 //$(".leaflet-marker-icon").remove(); $(".leaflet-popup").remove();
}      

  
  //  marker = L.marker(e.latlng).addTo(map);
 // $(".leaflet-marker-icon").remove(); $(".leaflet-popup").remove();

marker = L.marker([parseFloat(document.getElementById('latitud').value), parseFloat(document.getElementById('longitud').value)]).addTo(map).bindPopup('Posicion ingresada por el usuario :)');



 // marker.addTo(map);
  map.setView([parseFloat(document.getElementById('latitud').value), parseFloat(document.getElementById('longitud').value)], 150);//localizar y dar zoom en esa parte del mapa
  
 // map.setView([parseFloat(document.getElementById('latitud').value), parseFloat(document.getElementById('longitud').value)], 200);
  //circle.addTo(map);
 // document.getElementById('latitud').value=e.latlng.lat;
 // document.getElementById('longitud').value=e.latlng.lng;


          



   


}     


        

              </script>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="apellido">Latitud</label>  
  <div class="col-md-3">
  <input id="latitud" name="latitud" type="text" placeholder="" class="form-control input-md" autocomplete="off" required value="<?php echo $rlatitud; ?>" >
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="apellido">Longitud</label>  
  <div class="col-md-3">
  <input id="longitud" name="longitud" type="text" placeholder="" class="form-control input-md" autocomplete="off" required value="<?php echo $rlongitud; ?>">
  <button type="button" id="enviar" name="enviar" class="btn btn-success" onClick="actualizar()">Actualizar</button>

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
$comentario_clave=$_REQUEST["comentario_clave"];//1
//$archivo=$_REQUEST["archivo"];
$fecha_base=$_REQUEST["fecha"];
$latitud=$_REQUEST["latitud"];
$longitud=$_REQUEST["longitud"];
$condicion_actual=$_REQUEST["condicion_actual"];
$a_riesgo=$_REQUEST["a_riesgo"];
$solucion_habitacional=$_REQUEST["solucion_habitacional"];


$temp = $_FILES['archivo']['tmp_name']; // tmp name (no se puede cambiar el nombre nos devuelve la ubicación temporal del archivo. 
$name = $_FILES['archivo']['name']; // nombre original del archivo 
$tamanoBytes = $_FILES['archivo']['size']; // En bytes 
$tipoFile = $_FILES['archivo']['type'];



$temp2 = $_FILES['archivo2']['tmp_name']; // tmp name (no se puede cambiar el nombre nos devuelve la ubicación temporal del archivo. 
$name2 = $_FILES['archivo2']['name']; // nombre original del archivo 
$tamanoBytes2 = $_FILES['archivo2']['size']; // En bytes 
$tipoFile2 = $_FILES['archivo2']['type'];



$temp3 = $_FILES['archivo3']['tmp_name']; // tmp name (no se puede cambiar el nombre nos devuelve la ubicación temporal del archivo. 
$name3 = $_FILES['archivo3']['name']; // nombre original del archivo 
$tamanoBytes3 = $_FILES['archivo3']['size']; // En bytes 
$tipoFile3 = $_FILES['archivo3']['type'];


if($bandera=="add"){
	pg_query("BEGIN");
	


    // VALIDAR PESO DEL ARCHIVO. LIMITAR SUBIDA POR PESO 
    // LIMITAMOS A 300KB 
    $kiloBytes = $tamanoBytes/1024; // esto nos da la cantidad de kb 
    if($kiloBytes > 300000){ 
    echo "El archivo supera los 3000 KB &lt;br/&gt;";  
    
    } else{
        $v1=1;
    }
    
    // VALIDAR POR TIPO DE ARCHIVO. 
    // COMPROBAMOS LA EXTENSIÓN DEL ARCHIVO SÓLO ADMITIMOS JPH, GIF Y PNG 
    if($tipoFile == "image/jpeg" || $tipoFile == "image/gif" || $tipoFile == "image/png"){ 
    $v2=1;
    } 
    else{ 
    
    } 
    
    
    // LE ASIGNAMOS UN NOMBRE DE EXTENSIÓN A LOS ARCHIVOS GRÁFICOS 
    switch ($tipoFile) 
    { 
    case 'image/jpeg': 
    $ext = ".jpg"; 
    break;
    
    case 'image/gif': 
    $ext = ".gif"; 
    break; 
    
    case 'image/png': 
    $ext = ".png"; 
    break; 
    }
    
    // VALOR ALEATORIO CON EL QUE SE ALMACENARÁ EL ARCHIVO 
    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; 
    $cad = ""; 
    // 18 ES EL LARGO DEL STRING RANDOM, ESTE SERÁ EL TAMAÑO DEL NOMBRE DEL ARCHIVO 
    for($i=0;$i<18;$i++) { 
    $cad .= substr($str,rand(0,62),1); 
    }
    
    // REEMPLAZAR EN CASO DE NOMBRE COMPUESTOS LOS ESPACIOS POR GUIÓN BAJO 
    //$alea1 = str_replace(" ","_",$alea1);
    
    $alea1 = $cad.$ext; 
    echo "Alea: " .$alea1 ."&lt;br/&gt;";
    
    //copy($temp,$alea1); 
    $fecha = date("y-m-d");
    
    
    // Indicamos el directorio donde se guardará el archivo 
    $dir = "../firmas/"; 
    move_uploaded_file ($temp,"$dir/$alea1");
    


  ////////**************** *////////////////////////////////




// VALIDAR PESO DEL ARCHIVO. LIMITAR SUBIDA POR PESO 
    // LIMITAMOS A 300KB 
    $kiloBytes2 = $tamanoBytes2/1024; // esto nos da la cantidad de kb 
    if($kiloBytes2 > 300000){ 
    echo "El archivo supera los 3000 KB &lt;br/&gt;";  
    
    } else{
        $v2=1;
    }
    
    // VALIDAR POR TIPO DE ARCHIVO. 
    // COMPROBAMOS LA EXTENSIÓN DEL ARCHIVO SÓLO ADMITIMOS JPH, GIF Y PNG 
    if($tipoFile2 == "image/jpeg" || $tipoFile2 == "image/gif" || $tipoFile2 == "image/png"){ 
    $v2=1;
    } 
    else{ 
    
    } 
    
    
    // LE ASIGNAMOS UN NOMBRE DE EXTENSIÓN A LOS ARCHIVOS GRÁFICOS 
    switch ($tipoFile2) 
    { 
    case 'image/jpeg': 
    $ext = ".jpg"; 
    break;
    
    case 'image/gif': 
    $ext = ".gif"; 
    break; 
    
    case 'image/png': 
    $ext = ".png"; 
    break; 
    }
  
    // VALOR ALEATORIO CON EL QUE SE ALMACENARÁ EL ARCHIVO 
    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; 
    $cad = ""; 
    // 18 ES EL LARGO DEL STRING RANDOM, ESTE SERÁ EL TAMAÑO DEL NOMBRE DEL ARCHIVO 
    for($i=0;$i<18;$i++) { 
    $cad .= substr($str,rand(0,62),1); 
    }
    
    // REEMPLAZAR EN CASO DE NOMBRE COMPUESTOS LOS ESPACIOS POR GUIÓN BAJO 
    //$alea1 = str_replace(" ","_",$alea1);
    
    $alea2 = $cad.$ext; 
    echo "Alea: " .$alea2 ."&lt;br/&gt;";
    
    //copy($temp,$alea1); 
    $fecha = date("y-m-d");
    
    
    // Indicamos el directorio donde se guardará el archivo 
    $dir = "../viviendantes/"; 
    move_uploaded_file ($temp2,"$dir/$alea2");


//$query_s2=pg_query($conexion,"select * from cliente where dui='$dui' ");
//	$rows = pg_num_rows($query_s2);
	

	

/////////////////////////////////////////////////
/////////////////////////////////////////////////
/////////////////////////////////////////////////

// VALIDAR PESO DEL ARCHIVO. LIMITAR SUBIDA POR PESO 
    // LIMITAMOS A 300KB 
    $kiloBytes3 = $tamanoBytes3/1024; // esto nos da la cantidad de kb 
    if($kiloBytes3 > 300000){ 
    echo "El archivo supera los 3000 KB &lt;br/&gt;";  
    
    } else{
        $v3=1;
    }
    
    // VALIDAR POR TIPO DE ARCHIVO. 
    // COMPROBAMOS LA EXTENSIÓN DEL ARCHIVO SÓLO ADMITIMOS JPH, GIF Y PNG 
    if($tipoFile3 == "image/jpeg" || $tipoFile3 == "image/gif" || $tipoFile3 == "image/png"){ 
    $v3=1;
    } 
    else{ 
    
    } 
    
    
    // LE ASIGNAMOS UN NOMBRE DE EXTENSIÓN A LOS ARCHIVOS GRÁFICOS 
    switch ($tipoFile3) 
    { 
    case 'image/jpeg': 
    $ext = ".jpg"; 
    break;
    
    case 'image/gif': 
    $ext = ".gif"; 
    break; 
    
    case 'image/png': 
    $ext = ".png"; 
    break; 
    }
  
    // VALOR ALEATORIO CON EL QUE SE ALMACENARÁ EL ARCHIVO 
    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; 
    $cad = ""; 
    // 18 ES EL LARGO DEL STRING RANDOM, ESTE SERÁ EL TAMAÑO DEL NOMBRE DEL ARCHIVO 
    for($i=0;$i<18;$i++) { 
    $cad .= substr($str,rand(0,62),1); 
    }
    
    // REEMPLAZAR EN CASO DE NOMBRE COMPUESTOS LOS ESPACIOS POR GUIÓN BAJO 
    //$alea1 = str_replace(" ","_",$alea1);
    
    $alea3 = $cad.$ext; 
    echo "Alea: " .$alea3 ."&lt;br/&gt;";
    
    //copy($temp,$alea1); 
    $fecha = date("y-m-d");
    
    
    // Indicamos el directorio donde se guardará el archivo 
    $dir = "../viviendantes/"; 
    move_uploaded_file ($temp3,"$dir/$alea3");


//$query_s2=pg_query($conexion,"select * from cliente where dui='$dui' ");
//	$rows = pg_num_rows($query_s2);
	



  $result=pg_query($conexion,"update datos_finales_es set comentario_clave='$comentario_clave',archivo='$alea1',fecha='$fecha_base',archivo2='$alea2',latitud='$latitud',longitud='$longitud',firma_soli='$alea3',condicion_actual='$condicion_actual',a_riesgo='$a_riesgo',solucion_habitacional='$solucion_habitacional' where id_datos_finales_es='$id_datos_finales_es' ");

//$fila2=pg_fetch_array($result);///obteniendo el id de la insercion recien hecha
//$idcli=$fila2[0];
 



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
echo "setTimeout ('r(".$idcliente.",".$iddatos.")', 1500);";
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
  

