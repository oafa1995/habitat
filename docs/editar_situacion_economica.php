<?php session_start();
 if($_SESSION['autenticado']!="yeah"){
  header("Location: ../index.php");
    exit();
    }
    date_default_timezone_set('America/El_Salvador');
  $cont2=0;
  $iddatos=$_REQUEST["iddatos"];
  $fecha_actual=date("Y-m-d");
  $anio_actual=date("Y");//año

  include("../config/conexion.php");
  //$iddatos=$_REQUEST["iddatos"];
  $query_s=pg_query($conexion,"select idsituacion from solicitud_situacion_ec where idsolicitud='$iddatos'");
      while($fila=pg_fetch_array($query_s)){
  //    $ridpaciente=$fila[0];
   $idsituacion=$fila[0];
     // $rfecha=$fila[3];
          
      }

      $query_s=pg_query($conexion,"select principal_fuente_ingreso,recibe_remesa,persona_remesa,frecuencia_remesa,promedio_remesa,ingresos_hogar,experiencia_financiamiento,monto_financiado,prestamista,inversion_prestamo,ingresos_afectados,razon_afectacion,ofuente,cremesa,oquien_envia,ofrecuencia_remesa,cpromedio,cingresos_hogar,cexperiencia,cmonto_maximo,o_otorgado,o_invertido,cingreso_afectado,o_razon from situacion_economica_familiar where idsituacion='$idsituacion'");
      while($fila=pg_fetch_array($query_s)){
        //    $ridpaciente=$fila[0];
         $pfi=$fila[0];
         $rm=$fila[1];
         $pr=$fila[2];          
         $fr=$fila[3];
         $pror=$fila[4];
         $ih=$fila[5];
         $ef=$fila[6];
         $mf=$fila[7];
         $pres=$fila[8];
         $ip=$fila[9];
         $ia=$fila[10];
         $ra=$fila[11];

         $of=$fila[12];
         $crm=$fila[13];
         $oqev=$fila[14];
         $ofr=$fila[15];
         $cpro=$fila[16];
         $cih=$fila[17];
         $cxp=$fila[18];
         $cmm=$fila[19];
         $oot=$fila[20];
         $oiv=$fila[21];
         $cia=$fila[22];
         $ora=$fila[23];
         
            }

?>
  
<!DOCTYPE html>
<html>
<head>
    <title>Situación Económica Familiar </title>
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
	
	
	<script type="text/javascript" class="init"> 

    function alertaError(){
  alertify.error("<h1>Error</h1>"+"<p>No ha agregado ningun cliente</p>"+"<img src='../img/error.png'>").dismissOthers();

	}
  	
	function r(id,id2) { location.href="editar_situacionVivienda.php?iddatos="+id+"&iddatos2="+id2
 //   window.open("editarMedicina.php?iddatos="+id, '_parent');
   } 
  
  
  function alertaExito(){
  alertify.success("<h1>Exito</h1>"+"<p>Datos ingresados correctamente</p>"+"<img src='../img/bien.png'>");
  }

  function alertaErrorIngresar(){
  alertify.error("<h1>Error</h1>"+"<p>No se puede ingresar el beneficiario</p>"+"<img src='../img/error.png'>").dismissOthers();


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
  if (document.getElementById('fuente').value=="" || //ya 1
			      document.getElementById('remesa').value=="" ||
            document.getElementById('quien_envia').value=="" || //ya  2
            document.getElementById('frecuencia_remesa').value=="" || //ya  3
            document.getElementById('promedio').value=="" ||
            document.getElementById('experiencia').value=="" ||   
            document.getElementById('monto_maximo').value=="" ||  
            document.getElementById('otorgado').value=="" ||  //ya  4
            document.getElementById('invertido').value=="" ||  //ya  5
            document.getElementById('ingreso_afectado').value=="" ||
            document.getElementById('razon_afectado').value=="" ||//ya   6
            document.getElementById('ingresos_hogar').value=="" ||

            
         (document.getElementById('ofuente').value=="" && document.getElementById('fuente').value=="Otros")|| 
        ( document.getElementById('oquien_envia').value=="" && document.getElementById('quien_envia').value=="Otros") ||
        ( document.getElementById('ofrecuencia_remesa').value=="" && document.getElementById('frecuencia_remesa').value=="Otros")  ||
        ( document.getElementById('o_otorgado').value=="" && document.getElementById('otorgado').value=="Otros") ||
         (document.getElementById('o_invertido').value=="" && document.getElementById('invertido').value=="Otros") ||
         (document.getElementById('o_razon').value=="" && document.getElementById('razon_afectado').value=="Otros")

       //   document.getElementById('zonaR').value=="" o_razon
     //       document.getElementById('grupoF').value=="" ||o_otorga
      //      document.getElementById('tiempoR').value=="" ||
      //      document.getElementById('edad').value==""
            
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
                    <h4><span class="all-tittles">Situación Económica Familiar (Datos Generales)</span></h4>
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
  <label class="col-md-4 control-label" for="nombresv">12. ¿Cuál es la principal fuente de ingresos de la familia?</label>  
  <div class="col-md-2">
  <select id="fuente" name="fuente" class="form-control input-md" >


<option value="Trabajo/Empleo" <?php if($pfi=="Trabajo/Empleo") echo "selected"; ?> >Trabajo/Empleo</option>
<option value="Negocio" <?php if($pfi=="Negocio") echo "selected"; ?>>Negocio</option>
  <option value="Oficio" <?php if($pfi=="Oficio") echo "selected"; ?>>Oficio</option>
  <option value="Pensión" <?php if($pfi=="Pensión") echo "selected"; ?>>Pensión</option>
  <option value="Remesas Familiares" <?php if($pfi=="Remesas Familiares") echo "selected"; ?>>Remesas Familiares</option>
  <option value="Otros" <?php if($pfi=="Otros") echo "selected"; ?>>Otros</option>


  
 


 
</select>
</div>
</div>

<div class="form-group" id="div1">
          <label class="col-md-4 control-label" id="lfuente">Comentario</label>  
          <div class="col-md-4 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="ofuente" name="ofuente" class="form-control input-md" autocomplete="off" required value="<?php echo $of; ?>">
  
		  
		  </div>		
		  

  
				</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">13. ¿Usted o alguien de su familia recibe remesas familiares ?</label>  
  <div class="col-md-2">
  <select id="remesa" name="remesa" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Si" <?php if($rm=="Si") echo "selected"; ?>>Si</option>
  <option value="No" <?php if($rm=="No") echo "selected"; ?>>No</option>


</select>
</div>
</div>


<div class="form-group" >
          <label class="col-md-4 control-label">Comentario</label>  
          <div class="col-md-5 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="cremesa" name="cremesa" class="form-control input-md" autocomplete="off" required value="<?php echo $crm; ?>" >
  
		  
		  </div>		
		  

  
				</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">14. ¿Quién le envía las remesas familiares?</label>  
  <div class="col-md-2">
  <select id="quien_envia" name="quien_envia" class="form-control input-md" >
 
  <option value="Padres" <?php if($pr=="Padres") echo "selected"; ?>>Padres</option>
  <option value="Hermanos" <?php if($pr=="Hermanos") echo "selected"; ?>>Hermanos</option>
  <option value="Hijos" <?php if($pr=="Hijos") echo "selected"; ?>>Hijos</option>
  <option value="Nietos" <?php if($pr=="Nietos") echo "selected"; ?>>Nietos</option>
  <option value="Amigos" <?php if($pr=="Amigos") echo "selected"; ?>>Amigos</option>
  <option value="Otros" <?php if($pr=="Otros") echo "selected"; ?>>Otros</option>
  <option value="No Aplica" <?php if($pr=="No Aplica") echo "selected"; ?>>No Aplica</option>

</select>
</div>
</div>

<div class="form-group" id="div2">
          <label class="col-md-4 control-label" id="lfamiliar">Comentario</label>  
          <div class="col-md-5 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="oquien_envia" name="oquien_envia" class="form-control input-md" autocomplete="off" required value="<?php echo $oqev; ?>">
  
		  
		  </div>		
		  

  
				</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">15. ¿Cada cuanto recibe las remesas las remesas familiares?</label>  
  <div class="col-md-2">
  <select id="frecuencia_remesa" name="frecuencia_remesa" class="form-control input-md" >

  <option value="Semanal" <?php if($fr=="Semanal") echo "selected"; ?>>Semanal</option>
  <option value="Quincenal" <?php if($fr=="Quincenal") echo "selected"; ?>>Quincenal</option>
  <option value="Mensual" <?php if($fr=="Mensual") echo "selected"; ?>>Mensual</option>
  <option value="Bimensual" <?php if($fr=="Bimensual") echo "selected"; ?>>Bimensual</option>
  <option value="Trimestral" <?php if($fr=="Trimestral") echo "selected"; ?>>Trimestral</option>
  <option value="Ocasiones" <?php if($fr=="Ocasiones") echo "selected"; ?>>Ocasiones</option>
  <option value="Nunca" <?php if($fr=="Nunca") echo "selected"; ?>>Nunca</option>
  <option value="Otros" <?php if($fr=="Otros") echo "selected"; ?>>Otros</option>

</select>
</div>
</div>

<div class="form-group" id="div3">
          <label class="col-md-4 control-label" id="lfrecuencia">Comentario</label>  
          <div class="col-md-5 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="ofrecuencia_remesa" name="ofrecuencia_remesa" class="form-control input-md" autocomplete="off" required value="<?php echo $ofr; ?>" >
  
		  
		  </div>		
		  

  
				</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">16. ¿Cuál es el promedio mensual que recibe?</label>  
  <div class="col-md-2">
  <select id="promedio" name="promedio" class="form-control input-md" >

  <option value="Menos de $50" <?php if($pror=="Menos de $50") echo "selected"; ?>>Menos de $50</option>
  <option value="Entre $51 y $100" <?php if($pror=="Entre $51 y $100") echo "selected"; ?>>Entre $51 y $100</option>
  <option value="Entre $101 y $200" <?php if($pror=="Entre $101 y $200") echo "selected"; ?>>Entre $101 y $200</option>
  <option value="Entre $201 y $300" <?php if($pror=="Entre $201 y $300") echo "selected"; ?>>Entre $201 y $300</option>
  <option value="Mas de $300" <?php if($pror=="Mas de $300") echo "selected"; ?>>Mas de $300</option>
  <option value="Ninguno" <?php if($pror=="Ninguno") echo "selected"; ?>>Ninguno</option>

</select>
</div>
</div>

<div class="form-group" >
          <label class="col-md-4 control-label">Comentario</label>  
          <div class="col-md-5 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="cpromedio" name="cpromedio" class="form-control input-md" autocomplete="off" required value="<?php echo $cpro; ?>" >
  
		  
		  </div>		
		  

  
				</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">17. ¿Cuál es el total de ingresos mensuales aproximadamente en el hogar?</label>  
  <div class="col-md-2">
  <select id="ingresos_hogar" name="ingresos_hogar" class="form-control input-md" >

  <option value="Entre 100 a 200" <?php if($ih=="Entre 100 a 200") echo "selected"; ?>>Entre $100 a $200</option>
  <option value="Entre 201 a 300" <?php if($ih=="Entre 201 a 300") echo "selected"; ?>>Entre $201 a $300</option>
  <option value="Entre 301 a 600" <?php if($ih=="Entre 301 a 600") echo "selected"; ?>>Entre $301 y $600</option>
  <option value="Entre 601 y 750" <?php if($ih=="Entre 601 y 750") echo "selected"; ?>>Entre $601 y $700</option>
  <option value="Mayor a 750" <?php if($ih=="Mayor a 750") echo "selected"; ?>>Mayor a $750</option>
  <option value="Ninguno" <?php if($ih=="Ninguno") echo "selected"; ?>>Ninguno</option>
 
</select>
</div>
</div>


<div class="form-group" >
          <label class="col-md-4 control-label">Comentario</label>  
          <div class="col-md-5 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="cingresos_hogar" name="cingresos_hogar" class="form-control input-md" autocomplete="off" required value="<?php echo $cih; ?>">
  
		  
		  </div>		
		  

  
				</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">18. ¿Usted ha tenido experiencia con financiamiento?</label>  
  <div class="col-md-2">
  <select id="experiencia" name="experiencia" class="form-control input-md" >
 
  <option value="Si" <?php if($ef=="Si") echo "selected"; ?>>Si</option>
  <option value="No"  <?php if($ef=="No") echo "selected"; ?>>No</option>


</select>
</div>
</div>

<div class="form-group" >
          <label class="col-md-4 control-label">Comentario</label>  
          <div class="col-md-5 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="cexperiencia" name="cexperiencia" class="form-control input-md" autocomplete="off" required value="<?php echo $cxp; ?>">
  
		  
		  </div>		
		  

  
				</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">19. ¿Qué monto máximo le han financiado?</label>  
  <div class="col-md-2">
  <select id="monto_maximo" name="monto_maximo" class="form-control input-md" >

  <option value="Entre $100 y $200" <?php if($mf=="Entre $100 y $200") echo "selected"; ?>>Entre $100 y $200</option>
  <option value="Entre $201 y $300" <?php if($mf=="Entre $201 y $300") echo "selected"; ?>>Entre $201 y $300</option>
  <option value="Entre $301 y $600" <?php if($mf=="Entre $301 y $600") echo "selected"; ?>>Entre $301 y $600</option>
  <option value="Entre $601 y $1,000" <?php if($mf=="Entre $601 y $1,000") echo "selected"; ?>>Entre $601 y $1,000</option>
  <option value="Mas de $1,000" <?php if($mf=="Mas de $1,000") echo "selected"; ?>>Mas de $1,000</option>
  <option value="Ninguno" <?php if($mf=="Ninguno") echo "selected"; ?>>Ninguno</option>


</select>
</div>
</div>

<div class="form-group" >
          <label class="col-md-4 control-label">Comentario</label>  
          <div class="col-md-5 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="cmonto_maximo" name="cmonto_maximo" class="form-control input-md" autocomplete="off" required value="<?php echo $cmm; ?>" >
  
		  
		  </div>		
		  

  
				</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">20. ¿Quién le ha otorgado en financiamiento?</label>  
  <div class="col-md-2">
  <select id="otorgado" name="otorgado" class="form-control input-md" >

  <option value="Prestamistas" <?php if($pres=="Prestamistas") echo "selected"; ?>>Prestamistas</option>
  <option value="Caja de Credito" <?php if($pres=="Caja de Credito") echo "selected"; ?>>Caja de Credito</option>
  <option value="Cooperativa" <?php if($pres=="Cooperativa") echo "selected"; ?>>Cooperativa</option>
  <option value="Microfinanciera" <?php if($pres=="Microfinanciera") echo "selected"; ?>>Microfinanciera</option>
  <option value="Banco" <?php if($pres=="Banco") echo "selected"; ?>>Banco</option>
  <option value="Familias" <?php if($pres=="Familias") echo "selected"; ?>>Familias</option>
  <option value="Otros" <?php if($pres=="Otros") echo "selected"; ?>>Otros</option>
  <option value="Nadie" <?php if($pres=="Nadie") echo "selected"; ?>>Nadie</option>

</select>
</div>
</div>

<div class="form-group" id="div4">
        <label class="col-md-4 control-label" id="lotorgado">Comentario</label>  
          <div class="col-md-5 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="o_otorgado" name="o_otorgado" class="form-control input-md" autocomplete="off" required value="<?php echo $oot; ?>">
  
		  
		  </div>		
		  

  
				</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">21. ¿En que fue invertido el financiamiento otorgado?</label>  
  <div class="col-md-5">
  <select id="invertido" name="invertido" class="form-control input-md" >

  <option value="Personal" <?php if($ip=="Personal") echo "selected"; ?>>Personal</option>
  <option value="Vivienda" <?php if($ip=="Vivienda") echo "selected"; ?> >Vivienda</option>
  <option value="Compra de Terreno" <?php if($ip=="Compra de Terreno") echo "selected"; ?>>Compra de Terreno</option>
  <option value="Negocio" <?php if($ip=="Negocio") echo "selected"; ?>>Negocio</option>
  <option value="Enfermedad" <?php if($ip=="Enfermedad") echo "selected"; ?>>Enfermedad</option>
  <option value="Ninguno" <?php if($ip=="Ninguno") echo "selected"; ?>>Ninguno</option>
  <option value="Otros" <?php if($ip=="Otros") echo "selected"; ?>>Otros</option>

</select>
</div>
</div>

<div class="form-group" id="div5">
        <label class="col-md-4 control-label" id="linvertido">Comentario</label>  
          <div class="col-md-5 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="o_invertido" name="o_invertido" class="form-control input-md" autocomplete="off" required value="<?php echo $oiv; ?>">
  
		  
		  </div>		
		  

  
				</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">22. ¿En los últimos 3 meses sus ingresos familiares se han visto afectados?</label>  
  <div class="col-md-2">
  <select id="ingreso_afectado" name="ingreso_afectado" class="form-control input-md" >
  <option value="" disabled selected>Escoja la opcion</option>
  <option value="Disminuyeron" <?php if($ia=="Disminuyeron") echo "selected"; ?>>Disminuyeron</option>
  <option value="Aumentaron" <?php if($ia=="Aumentaron") echo "selected"; ?>>Aumentaron</option>
  <option value="Se mantuvieron" <?php if($ia=="Se mantuvieron") echo "selected"; ?>>Se Mantuvieron</option>

</select>
</div>
</div>

<div class="form-group" >
          <label class="col-md-4 control-label">Comentario</label>  
          <div class="col-md-5 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="cingreso_afectado" name="cingreso_afectado" class="form-control input-md" autocomplete="off" required value="<?php echo $cia; ?>">
  
		  
		  </div>		
		  

  
				</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">23. ¿Cuál fue la razón del porque se afectaron los ingresos?</label>  
  <div class="col-md-2">
  <select id="razon_afectado" name="razon_afectado" class="form-control input-md" >

  <option value="Enfermedad" <?php if($ra=="Enfermedad") echo "selected"; ?>>Enfermedad</option>
  <option value="Despedido de empleo" <?php if($ra=="Despedido de empleo") echo "selected"; ?>>Despedido de empleo</option>
  <option value="Renuncia al trabajo" <?php if($ra=="Renuncia al trabajo") echo "selected"; ?>>Renuncia al trabajo</option>
  <option value="Disminución de las ventas" <?php if($ra=="Disminución de las ventas") echo "selected"; ?>>Disminución de las ventas</option>
  <option value="Inseguridad Social" <?php if($ra=="Inseguridad Social") echo "selected"; ?>>Inseguridad Social</option>
  <option value="COVID" <?php if($ra=="COVID") echo "selected"; ?>>COVID-19</option>
  <option value="Desastre natural" <?php if($ra=="Desastre natural") echo "selected"; ?>>Desastre natural(tormenta)</option>
  <option value="Otros" <?php if($ra=="Otros") echo "selected"; ?>>Otros</option>
  <option value="Ninguno" <?php if($ra=="Ninguno") echo "selected"; ?>>Ninguno</option>

</select>
</div>
</div>


<div class="form-group" id="div6">
        <label class="col-md-4 control-label" id="lrazon">Comentario</label>  
          <div class="col-md-5 validate-input" data-validate = "Escriba su usuario">
	  
		  <input type="text" id="o_razon" name="o_razon" class="form-control input-md" autocomplete="off" required value="<?php echo $ora; ?>">
  
		  
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

  $fuente=$_REQUEST["fuente"];
  $remesa=$_REQUEST["remesa"];
  $quien_envia=$_REQUEST["quien_envia"];
  $frecuencia_remesa=$_REQUEST["frecuencia_remesa"];
  $promedio=$_REQUEST["promedio"];
  $experiencia=$_REQUEST["experiencia"];
  $monto_maximo=$_REQUEST["monto_maximo"];
  $otorgado=$_REQUEST["otorgado"];
  $invertido=$_REQUEST["invertido"];
$ingreso_afectado=$_REQUEST["ingreso_afectado"];
$razon_afectado=$_REQUEST["razon_afectado"];
$ingresos_hogar=$_REQUEST["ingresos_hogar"];


$ofuente=$_REQUEST["ofuente"];
$oquien_envia=$_REQUEST["oquien_envia"];
$ofrecuencia_remesa=$_REQUEST["ofrecuencia_remesa"];
$o_otorgado=$_REQUEST["o_otorgado"];
$o_invertido=$_REQUEST["o_invertido"];
$o_razon=$_REQUEST["o_razon"];



$cremesa=$_REQUEST["cremesa"];
$cpromedio=$_REQUEST["cpromedio"];
$cexperiencia=$_REQUEST["cexperiencia"];
$cmonto_maximo=$_REQUEST["cmonto_maximo"];
$cingreso_afectado=$_REQUEST["cingreso_afectado"];
$cingresos_hogar=$_REQUEST["cingresos_hogar"];


if(!isset($ofuente) || $ofuente==''){
  $ofuente='';
  }
  
  if(!isset($oquien_envia) || $oquien_envia==''){
      $oquien_envia='';
      }
  
      if(!isset($ofrecuencia_remesa) || $ofrecuencia_remesa==''){
          $ofrecuencia_remesa='';
          }
  
          if(!isset($o_otorgado) || $o_otorgado==''){
              $o_otorgado='';
              }

              if(!isset($o_invertido) || $o_invertido==''){
                $o_invertido='';
                }
                if(!isset($o_razon) || $o_razon==''){
                  $o_razon='';
                  }



////////////////////////////////////
                  if(!isset($cremesa) || $cremesa==''){
                    $cremesa='';
                    }
                    
                    if(!isset($cpromedio) || $cpromedio==''){
                        $cpromedio='';
                        }
                    
                        if(!isset($cexperiencia) || $cexperiencia==''){
                            $cexperiencia='';
                            }
                    
                            if(!isset($cmonto_maximo) || $cmonto_maximo==''){
                                $cmonto_maximo='';
                                }
                  
                                if(!isset($cingreso_afectado) || $cingreso_afectado==''){
                                  $cingreso_afectado='';
                                  }
                                  if(!isset($cingresos_hogar) || $cingresos_hogar==''){
                                    $cingresos_hogar='';
                                    }


  /*
  /*
  document.getElementById('fuente').value=="" ||
  document.getElementById('remesa').value=="" ||
  document.getElementById('quien_envia').value=="" ||  
  document.getElementById('frecuencia_remesa').value=="" || 
  document.getElementById('promedio').value=="" ||
  document.getElementById('experiencia').value=="" ||   
  document.getElementById('monto_maximo').value=="" ||  
  document.getElementById('otorgado').value=="" ||  
  document.getElementById('invertido').value=="" ||  
  document.getElementById('ingreso_afectado').value=="" ||
  document.getElementById('razon_afectado').value=="" ||

(document.getElementById('ofuente').value=="" && $('#ofuente').is(':visible')) || 
(document.getElementById('oquien_envia').value=="" && $('#oquien_envia').is(':visible')) ||
(document.getElementById('ofrecuencia_remesa').value=="" && $('#ofrecuencia_remesa').is(':visible')) ||
(document.getElementById('o_otorgado').value=="" && $('#o_otorgado').is(':visible'))  ||
(document.getElementById('o_otorga').value=="" && $('#o_otorga').is(':visible')) ||
(document.getElementById('o_razon').value=="" && $('#o_razon').is(':visible')) 
*/


$bandera=$_REQUEST["bandera"];





if($bandera=="add"){
	pg_query("BEGIN");
	

 

    $result2=pg_query($conexion,"update situacion_economica_familiar set principal_fuente_ingreso='$fuente',recibe_remesa='$remesa',persona_remesa='$quien_envia',frecuencia_remesa='$frecuencia_remesa',promedio_remesa='$promedio',experiencia_financiamiento='$experiencia',monto_financiado='$monto_maximo',prestamista='$otorgado',inversion_prestamo='$invertido',ingresos_afectados='$ingreso_afectado',razon_afectacion='$razon_afectado',ofuente=NULLIF('$ofuente',''),oquien_envia=NULLIF('$oquien_envia',''),ofrecuencia_remesa=NULLIF('$ofrecuencia_remesa',''),o_otorgado=NULLIF('$o_otorgado',''),o_invertido=NULLIF('$o_invertido',''),o_razon=NULLIF('$o_razon',''),ingresos_hogar='$ingresos_hogar',cremesa=NULLIF('$cremesa',''),
    cpromedio=NULLIF('$cpromedio',''),
    cexperiencia=NULLIF('$cexperiencia',''),
    cmonto_maximo=NULLIF('$cmonto_maximo',''),
    cingreso_afectado=NULLIF('$cingreso_afectado',''),
    cingresos_hogar=NULLIF('$cingresos_hogar','') where idsituacion='$idsituacion' ");


//$fila3=pg_fetch_array($result2);
//$idsituacion=$fila3[0];

//$result=pg_query($conexion,"insert into cliente(nombres,apellidos,sexo,direccion,telefono,correo,telefono_familiar,estado_civil,zona,municipio,departamento,fecha_nac,grupo_familiar,tiempo_residencia,dui,nit) values('$nombre','$apellido','$sexo','$direccion','$telefono','$correo','$telefonoFamiliar','$estado_civil','$zonaResidencia','$municipio','$departamento','$fechan','$grupoF','$tiempoR','$dui','$nit' ) returning idcliente" );
	


//$fila2=pg_fetch_array($result);///obteniendo el id de la insercion recien hecha
//$idcli=$fila2[0];
 



	if(!$result2){
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
	
//	}
			
			
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
  

