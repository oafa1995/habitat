<?php session_start();
$idfamiliar=$_REQUEST["iddatos"];
include("../config/conexion.php");
$query_s2=pg_query($conexion,"select nombres,apellidos,edad,parentesco,escolaridad,ocupacion,ingresos_pro,lugar_trabajo,discapacidad,otro_parentesco,otra_escolaridad,otra_ocupacion,otra_discapacidad from familiares_cliente where idfamiliar='$idfamiliar' ");


while($fila=pg_fetch_array($query_s2)){
$rnombre=$fila[0];
$rapellido=$fila[1];
$redad=$fila[2];
$rparentesco=$fila[3];
$rescolaridad=$fila[4];
$rocupacion=$fila[5];
$ringreso=$fila[6];
$rtrabajo=$fila[7];
$rdiscapacidad=$fila[8];

$rotro_p=$fila[9];
$rotra_e=$fila[10];
$rotra_o=$fila[11];
$rotra_d=$fila[12];




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




            	
  if(document.getElementById('nombre').value=="" || document.getElementById('apellido').value=="" || document.getElementById('edad').value=="" || document.getElementById('parentesco').value=="" || document.getElementById('escolaridad').value=="" || document.getElementById('ocupacion').value=="" || document.getElementById('ingresos').value=="" || document.getElementById('discapacidad').value==""  || ($('#potros').is(':visible') && document.getElementById('potros').value=="") || ($('#otro_esco').is(':visible') && document.getElementById('otro_esco').value=="") || ($('#otro_ocupa').is(':visible') && document.getElementById('otro_ocupa').value=="" )|| ($('#dis').is(':visible') && document.getElementById('dis').value=="") )
  {

                              alertaErrorA(); 
                  //    document.getElementById('bandera').value="";
                  var hoja = document.createElement('style')
hoja.innerHTML = ".form-group input:invalid{border-left-color: firebrick;}";
document.body.appendChild(hoja);

                  
              }else{

				  if(($('#potros').is(':hidden') && document.getElementById('potros').value!="")){
            document.getElementById('potros').value="";
          }
			

if(($('#otro_esco').is(':hidden') && document.getElementById('otro_esco').value!="")){
  document.getElementById('otro_esco').value="";
}

if(($('#otro_ocupa').is(':hidden') && document.getElementById('otro_ocupa').value!="" )){
  document.getElementById('otro_ocupa').value="";
}

if(($('#dis').is(':hidden') && document.getElementById('dis').value!="")){
  document.getElementById('dis').value="";
}


      document.getElementById('bandera').value="add";
     window.opener.unhook();
        document.frmcdi2.submit();	
    
    
 
}	

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


<script language="javascript">
////////////////////script para llamar php que muestra los datos del producto a vender por codigo


$(document).ready(function(){

	$("#divp").hide();
  $("#lpotros").hide();
  $("#potros").hide();

pare="<?php echo $rparentesco; ?>";

if(pare=="otros"){




	$("#divp").show();
  $("#lpotros").show();
  $("#potros").show();



}else{
	$("#divp").hide();
  $("#lpotros").hide();
  $("#potros").hide();

}

});

</script>


<script language="javascript">
////////////////////script para llamar php que muestra los datos del producto a vender por codigo


$(document).ready(function(){

  


//$(".ldiv1").hide();


   $("#parentesco").change(function () {
//	alert("hola");
           $("#parentesco").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="otros"){
	$("#lpotros").show();
	$("#divp").show();


$("#potros").show();


//$(".ldiv1").show();
}else{
	$("#lpotros").hide();

	$("#divp").hide();

$("#potros").hide();

//document.getElementById('potros').value="";

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

	$("#dive").hide();
  $("#lesco").hide();
  $("#otro_esco").hide();

esco="<?php echo $rescolaridad; ?>";

if(esco=="otro"){
	$("#dive").show();
  $("#lesco").show();
  $("#otro_esco").show();
}else{
	$("#dive").hide();
  $("#lesco").hide();
  $("#otro_esco").hide();

}

});

</script>

<script language="javascript">
////////////////////script para llamar php que muestra los datos del producto a vender por codigo


$(document).ready(function(){

  


//$(".ldiv1").hide();


   $("#escolaridad").change(function () {
//	alert("hola");
           $("#escolaridad").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="otro"){
	$("#lesco").show();

	$("#dive").show();
$("#otro_esco").show();


//$(".ldiv1").show();
}else{
	$("#lesco").hide();

	$("#dive").hide();
$("#otro_esco").hide();

//document.getElementById('potros').value="";

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

	$("#divoc").hide();
  $("#locupa").hide();
  $("#otro_ocupa").hide();

ocup="<?php echo $rocupacion; ?>";

if(ocup=="otro"){
	$("#divoc").show();
  $("#locupa").show();
  $("#otro_ocupa").show();
}else{
	$("#divoc").hide();
  $("#locupa").hide();
  $("#otro_ocupa").hide();

}

});

</script>


<script language="javascript">
////////////////////script para llamar php que muestra los datos del producto a vender por codigo


$(document).ready(function(){

  


//$(".ldiv1").hide();


   $("#ocupacion").change(function () {
//	alert("hola");
           $("#ocupacion").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="otro"){
  $("#locupa").show();
	$("#divoc").show();
$("#otro_ocupa").show();


//$(".ldiv1").show();
}else{
	$("#locupa").hide();
	$("#divoc").hide();
$("#otro_esco").hide();

//document.getElementById('potros').value="";

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

	$("#divd").hide();
  $("#lpdis").hide();
  $("#dis").hide();

disc="<?php echo $rdiscapacidad; ?>";

if(disc=="otra"){
	$("#divd").show();
  $("#lpdis").show();
  $("#dis").show();

}else{
	$("#divd").hide();
  $("#lpdis").hide();
  $("#dis").hide();


}

});

</script>



<script language="javascript">
////////////////////script para llamar php que muestra los datos del producto a vender por codigo


$(document).ready(function(){

  


//$(".ldiv1").hide();


   $("#discapacidad").change(function () {
//	alert("hola");
           $("#discapacidad").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="otra"){
	$("#divd").show();
  $("#lpdis").show();
  $("#dis").show();



//$(".ldiv1").show();
}else{
	$("#divd").hide();
  $("#lpdis").hide();
  $("#dis").hide();

//document.getElementById('potros').value="";

//$(".ldiv1").hide();
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
	
	  
	
	
		
		 
       
        
    
	           
			   
			   
	
    
           
		 <form class="form-horizontal" action="" method="post" id="frmcdi2" name="frmcdi2">
	   <input type="hidden" name="bandera" id="bandera"/>
<input type="hidden" name="baccion" id="baccion"/>





<!-- Form Name -->
<br>





<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombre">Nombres del Familiar</label>  
  <div class="col-md-5 validate-input" data-validate = "Escriba su usuario">
  <input type="text" id="nombre" name="nombre" placeholder="" class="form-control input-md" autocomplete="off" value="<?php echo $rnombre; ?>" required>
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombre">Apellidos del Familiar</label>  
  <div class="col-md-5">
  <input type="text" id="apellido" name="apellido" placeholder="" class="form-control input-md" autocomplete="off" value="<?php echo $rapellido; ?>" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombre">Edad</label>  
  <div class="col-md-1">
  <input type="text" id="edad" name="edad" placeholder="" class="form-control input-md" autocomplete="off" value="<?php echo $redad; ?>" required>
    
  </div>
</div>






<!-- Text input-->
<div class="form-group">
<label class="col-md-1 control-label">Parentesco</label>
          <div class="col-md-2">
		  <select id="parentesco" name="parentesco" class="form-control input-sm" required>


          <?php  if($rparentesco=='padre'){ ?>

 
<option value="padre" selected>Padre</option>
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
	  


    <?php }else{ ?>
	
        <?php  if($rparentesco=='madre'){ ?>
        
            <option value="padre" >Padre</option>
	  <option value="madre" selected>Madre</option>
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
    
      
      <?php }else{ ?>
    

        <?php  if($rparentesco=='conyugue'){ ?>


          ption value="padre" >Padre</option>
	  <option value="madre" selected>Madre</option>
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


      <?php }else{ ?>

        <?php  if($rparentesco=='hijo(a)'){ ?>
          ption value="padre" >Padre</option>
	  <option value="madre" selected>Madre</option>
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


      <?php }else{ ?>


        <?php  if($rparentesco=='hermano(a)'){ ?>

          ption value="padre" >Padre</option>
	  <option value="madre" selected>Madre</option>
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


      <?php }else{ ?>

        <?php  if($rparentesco=='nieto(a)'){ ?>


          ption value="padre" >Padre</option>
	  <option value="madre" selected>Madre</option>
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


      <?php }else{ ?>

<?php  if($rparentesco=='sobrino(a)'){ ?>

    <option value="padre" >Padre</option>
	  <option value="madre" selected>Madre</option>
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

      <?php }else{ ?>

<?php  if($rparentesco=='yerno'){ ?>

  <option value="padre" >Padre</option>
	  <option value="madre" selected>Madre</option>
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


      <?php }else{ ?>

<?php  if($rparentesco=='nuera'){ ?>
  <option value="padre" >Padre</option>
	  <option value="madre" selected>Madre</option>
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
      
      <?php }else{ ?>

<?php  if($rparentesco=='suegro(a)'){ ?>
  <option value="padre" >Padre</option>
	  <option value="madre" selected>Madre</option>
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
    

      <?php }else{ ?>

<?php  if($rparentesco=='cuñado(a)'){ ?>
  <option value="padre" >Padre</option>
	  <option value="madre" selected>Madre</option>
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

      <?php }else{ ?>

<?php  if($rparentesco=='abuelo(a)'){ ?>

  <option value="padre" >Padre</option>
	  <option value="madre" selected>Madre</option>
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

      <?php }else{ ?>

      <?php  if($rparentesco=='otros'){ ?>
        <option value="padre" >Padre</option>
	  <option value="madre" selected>Madre</option>
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
        <?php } ?>
    <?php } ?>
    <?php } ?>
    <?php } ?>
    <?php } ?>
    <?php } ?>
        <?php } ?>
        <?php } ?>
            <?php } ?>
            <?php } ?>
            <?php } ?>
            <?php } ?>
    <?php } ?>
	

	 
	 
	  
	</select>
	
</div>
</div>


<!-- Text input-->
<div class="form-group" id="divp">

<label class="col-md-1 control-label" id="lpotros">Otro parentesco</label>  
          <div class="col-md-2">
	  
		  <input type="text" id="potros" name="potros" class="form-control input-sm" value="<?php echo $rotro_p; ?>" />
  
		  
		  </div>

</div>


<!-- Text input-->
<div class="form-group">
<label class="control-label col-sm-1">Escolaridad</label>
          <div class="col-md-2">
  <select id="escolaridad" name="escolaridad" class="form-control input-sm" required>
      <option value="" disabled selected>Escoja la escolaridad</option>
	

      <?php  if($rescolaridad=='kinder'){ ?>
	  <option value="kinder" selected>Kinder</option>
	  <option value="primero a sexto">Educacion basica de 1° a 6° Grado</option>
	  <option value="septimo a noveno">Educacion basica de 7° a 9° Grado</option>
	  <option value="bachillerato">Bachillerato</option>
	  <option value="tecnico">Tecnico Superior</option>
	  <option value="universitario">Universitario</option>
	  <option value="otro">Otro</option>
	  <option value="ninguno">Ninguno</option>
	  
      <?php }?>


      <?php  if($rescolaridad=='primero a sexto'){ ?>
	  <option value="kinder">Kinder</option>
	  <option value="primero a sexto" selected>Educacion basica de 1° a 6° Grado</option>
	  <option value="septimo a noveno">Educacion basica de 7° a 9° Grado</option>
	  <option value="bachillerato">Bachillerato</option>
	  <option value="tecnico">Tecnico Superior</option>
	  <option value="universitario">Universitario</option>
	  <option value="otro">Otro</option>
	  <option value="ninguno">Ninguno</option>
	  
      <?php }?>


      <?php  if($rescolaridad=='septimo a noveno'){ ?>
	  <option value="kinder">Kinder</option>
	  <option value="primero a sexto">Educacion basica de 1° a 6° Grado</option>
	  <option value="septimo a noveno" selected>Educacion basica de 7° a 9° Grado</option>
	  <option value="bachillerato">Bachillerato</option>
	  <option value="tecnico">Tecnico Superior</option>
	  <option value="universitario">Universitario</option>
	  <option value="otro">Otro</option>
	  <option value="ninguno">Ninguno</option>
	  
      <?php }?>


      <?php  if($rescolaridad=='bachillerato'){ ?>
	  <option value="kinder">Kinder</option>
	  <option value="primero a sexto">Educacion basica de 1° a 6° Grado</option>
	  <option value="septimo a noveno">Educacion basica de 7° a 9° Grado</option>
	  <option value="bachillerato" selected>Bachillerato</option>
	  <option value="tecnico">Tecnico Superior</option>
	  <option value="universitario">Universitario</option>
	  <option value="otro">Otro</option>
	  <option value="ninguno">Ninguno</option>
	  
      <?php }?>


      <?php  if($rescolaridad=='tecnico'){ ?>
	  <option value="kinder">Kinder</option>
	  <option value="primero a sexto">Educacion basica de 1° a 6° Grado</option>
	  <option value="septimo a noveno">Educacion basica de 7° a 9° Grado</option>
	  <option value="bachillerato">Bachillerato</option>
	  <option value="tecnico" selected>Tecnico Superior</option>
	  <option value="universitario">Universitario</option>
	  <option value="otro">Otro</option>
	  <option value="ninguno">Ninguno</option>
	  
      <?php }?>

      <?php  if($rescolaridad=='universitario'){ ?>
	  <option value="kinder">Kinder</option>
	  <option value="primero a sexto">Educacion basica de 1° a 6° Grado</option>
	  <option value="septimo a noveno">Educacion basica de 7° a 9° Grado</option>
	  <option value="bachillerato">Bachillerato</option>
	  <option value="tecnico" >Tecnico Superior</option>
	  <option value="universitario" selected>Universitario</option>
	  <option value="otro">Otro</option>
	  <option value="ninguno">Ninguno</option>
	  
      <?php }?>

      <?php  if($rescolaridad=='otro'){ ?>
	  <option value="kinder">Kinder</option>
	  <option value="primero a sexto">Educacion basica de 1° a 6° Grado</option>
	  <option value="septimo a noveno">Educacion basica de 7° a 9° Grado</option>
	  <option value="bachillerato">Bachillerato</option>
	  <option value="tecnico" >Tecnico Superior</option>
	  <option value="universitario">Universitario</option>
	  <option value="otro" selected>Otro</option>
	  <option value="ninguno">Ninguno</option>
	  
      <?php }?>


      <?php  if($rescolaridad=='ninguno'){ ?>
	  <option value="kinder">Kinder</option>
	  <option value="primero a sexto">Educacion basica de 1° a 6° Grado</option>
	  <option value="septimo a noveno">Educacion basica de 7° a 9° Grado</option>
	  <option value="bachillerato">Bachillerato</option>
	  <option value="tecnico" >Tecnico Superior</option>
	  <option value="universitario">Universitario</option>
	  <option value="otro">Otro</option>
	  <option value="ninguno" selected>Ninguno</option>
	  
      <?php }?>

  </select>
  
</div>
</div>

<div class="form-group" id="dive">
<label class="col-md-2 control-label" id="lesco">Escriba la escolaridad</label>  
          <div class="col-md-2">
	  
		  <input type="text" id="otro_esco" name="otro_esco" class="form-control input-sm" value="<?php echo $rotra_e; ?>" />
  
		  
		  </div>
</div>

<!-- Text input-->
<div class="form-group">
<label class="control-label col-sm-1">Ocupacion</label>
          <div class="col-md-2">
  <select id="ocupacion" name="ocupacion" class="form-control input-sm" required>
      <option value="" disabled selected>Escoja la ocupacion</option>
	  
      <?php  if($rocupacion=='empleado'){ ?>

	  <option value="empleado" selected>Empleado</option>
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
	  
    <?php }?>

    <?php  if($rocupacion=='pensionado'){ ?>

<option value="empleado">Empleado</option>
<option value="pensionado" selected>Pensionado</option>
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

<?php }?>


<?php  if($rocupacion=='comerciante'){ ?>

<option value="empleado">Empleado</option>
<option value="pensionado" >Pensionado</option>
<option value="comerciante" selected>Comerciante</option>
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

<?php }?>

<?php  if($rocupacion=='albañil'){ ?>

<option value="empleado">Empleado</option>
<option value="pensionado" >Pensionado</option>
<option value="comerciante" >Comerciante</option>
<option value="albañil" selected>Albañil</option>
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

<?php }?>

<?php  if($rocupacion=='jornalero'){ ?>

<option value="empleado">Empleado</option>
<option value="pensionado" >Pensionado</option>
<option value="comerciante" >Comerciante</option>
<option value="albañil" >Albañil</option>
<option value="jornalero" selected>Jornalero</option>
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

<?php }?>

<?php  if($rocupacion=='panadero'){ ?>

<option value="empleado">Empleado</option>
<option value="pensionado" >Pensionado</option>
<option value="comerciante" >Comerciante</option>
<option value="albañil" >Albañil</option>
<option value="jornalero" >Jornalero</option>
<option value="panadero" selected>Panadero</option>
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

<?php }?>

<?php  if($rocupacion=='costurera o sastre'){ ?>

<option value="empleado">Empleado</option>
<option value="pensionado" >Pensionado</option>
<option value="comerciante" >Comerciante</option>
<option value="albañil" >Albañil</option>
<option value="jornalero" >Jornalero</option>
<option value="panadero" >Panadero</option>
<option value="costurera o sastre" selected>Costurera o Sastre</option>
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

<?php }?>

<?php  if($rocupacion=='vigilante'){ ?>

<option value="empleado">Empleado</option>
<option value="pensionado" >Pensionado</option>
<option value="comerciante" >Comerciante</option>
<option value="albañil" >Albañil</option>
<option value="jornalero" >Jornalero</option>
<option value="panadero" >Panadero</option>
<option value="costurera o sastre" >Costurera o Sastre</option>
<option value="vigilante" selected>Vigilante</option>
<option value="empleada domestica">Empleada Domestica</option>
<option value="agricultor">Agricultor</option>
<option value="electricista">Electricista</option>
<option value="mecanico">Mecanico</option>
<option value="estudiante">Estudiante</option>
<option value="sin trabajo">Sin Trabajo</option>
<option value="otro">Otro</option>
<option value="oficios domesticos">Oficios Domesticos</option>
<option value="ninguna">Ninguna</option>

<?php }?>

<?php  if($rocupacion=='empleada domestica'){ ?>

<option value="empleado">Empleado</option>
<option value="pensionado" >Pensionado</option>
<option value="comerciante" >Comerciante</option>
<option value="albañil" >Albañil</option>
<option value="jornalero" >Jornalero</option>
<option value="panadero" >Panadero</option>
<option value="costurera o sastre" >Costurera o Sastre</option>
<option value="vigilante" >Vigilante</option>
<option value="empleada domestica" selected>Empleada Domestica</option>
<option value="agricultor">Agricultor</option>
<option value="electricista">Electricista</option>
<option value="mecanico">Mecanico</option>
<option value="estudiante">Estudiante</option>
<option value="sin trabajo">Sin Trabajo</option>
<option value="otro">Otro</option>
<option value="oficios domesticos">Oficios Domesticos</option>
<option value="ninguna">Ninguna</option>

<?php }?>


<?php  if($rocupacion=='agricultor'){ ?>

<option value="empleado">Empleado</option>
<option value="pensionado" >Pensionado</option>
<option value="comerciante" >Comerciante</option>
<option value="albañil" >Albañil</option>
<option value="jornalero" >Jornalero</option>
<option value="panadero" >Panadero</option>
<option value="costurera o sastre" >Costurera o Sastre</option>
<option value="vigilante" >Vigilante</option>
<option value="empleada domestica" >Empleada Domestica</option>
<option value="agricultor" selected>Agricultor</option>
<option value="electricista">Electricista</option>
<option value="mecanico">Mecanico</option>
<option value="estudiante">Estudiante</option>
<option value="sin trabajo">Sin Trabajo</option>
<option value="otro">Otro</option>
<option value="oficios domesticos">Oficios Domesticos</option>
<option value="ninguna">Ninguna</option>

<?php }?>

<?php  if($rocupacion=='electricista'){ ?>

<option value="empleado">Empleado</option>
<option value="pensionado" >Pensionado</option>
<option value="comerciante" >Comerciante</option>
<option value="albañil" >Albañil</option>
<option value="jornalero" >Jornalero</option>
<option value="panadero" >Panadero</option>
<option value="costurera o sastre" >Costurera o Sastre</option>
<option value="vigilante" >Vigilante</option>
<option value="empleada domestica" >Empleada Domestica</option>
<option value="agricultor" >Agricultor</option>
<option value="electricista" selected>Electricista</option>
<option value="mecanico">Mecanico</option>
<option value="estudiante">Estudiante</option>
<option value="sin trabajo">Sin Trabajo</option>
<option value="otro">Otro</option>
<option value="oficios domesticos">Oficios Domesticos</option>
<option value="ninguna">Ninguna</option>

<?php }?>


<?php  if($rocupacion=='mecanico'){ ?>

<option value="empleado">Empleado</option>
<option value="pensionado" >Pensionado</option>
<option value="comerciante" >Comerciante</option>
<option value="albañil" >Albañil</option>
<option value="jornalero" >Jornalero</option>
<option value="panadero" >Panadero</option>
<option value="costurera o sastre" >Costurera o Sastre</option>
<option value="vigilante" >Vigilante</option>
<option value="empleada domestica" >Empleada Domestica</option>
<option value="agricultor" >Agricultor</option>
<option value="electricista" >Electricista</option>
<option value="mecanico" selected>Mecanico</option>
<option value="estudiante">Estudiante</option>
<option value="sin trabajo">Sin Trabajo</option>
<option value="otro">Otro</option>
<option value="oficios domesticos">Oficios Domesticos</option>
<option value="ninguna">Ninguna</option>

<?php }?>

<?php  if($rocupacion=='estudiante'){ ?>

<option value="empleado">Empleado</option>
<option value="pensionado" >Pensionado</option>
<option value="comerciante" >Comerciante</option>
<option value="albañil" >Albañil</option>
<option value="jornalero" >Jornalero</option>
<option value="panadero" >Panadero</option>
<option value="costurera o sastre" >Costurera o Sastre</option>
<option value="vigilante" >Vigilante</option>
<option value="empleada domestica" >Empleada Domestica</option>
<option value="agricultor" >Agricultor</option>
<option value="electricista" >Electricista</option>
<option value="mecanico" >Mecanico</option>
<option value="estudiante" selected>Estudiante</option>
<option value="sin trabajo">Sin Trabajo</option>
<option value="otro">Otro</option>
<option value="oficios domesticos">Oficios Domesticos</option>
<option value="ninguna">Ninguna</option>

<?php }?>

<?php  if($rocupacion=='sin trabajo'){ ?>

<option value="empleado">Empleado</option>
<option value="pensionado" >Pensionado</option>
<option value="comerciante" >Comerciante</option>
<option value="albañil" >Albañil</option>
<option value="jornalero" >Jornalero</option>
<option value="panadero" >Panadero</option>
<option value="costurera o sastre" >Costurera o Sastre</option>
<option value="vigilante" >Vigilante</option>
<option value="empleada domestica" >Empleada Domestica</option>
<option value="agricultor" >Agricultor</option>
<option value="electricista" >Electricista</option>
<option value="mecanico" >Mecanico</option>
<option value="estudiante" >Estudiante</option>
<option value="sin trabajo" selected>Sin Trabajo</option>
<option value="otro">Otro</option>
<option value="oficios domesticos">Oficios Domesticos</option>
<option value="ninguna">Ninguna</option>

<?php }?>

<?php  if($rocupacion=='otro'){ ?>

<option value="empleado">Empleado</option>
<option value="pensionado" >Pensionado</option>
<option value="comerciante" >Comerciante</option>
<option value="albañil" >Albañil</option>
<option value="jornalero" >Jornalero</option>
<option value="panadero" >Panadero</option>
<option value="costurera o sastre" >Costurera o Sastre</option>
<option value="vigilante" >Vigilante</option>
<option value="empleada domestica" >Empleada Domestica</option>
<option value="agricultor" >Agricultor</option>
<option value="electricista" >Electricista</option>
<option value="mecanico" >Mecanico</option>
<option value="estudiante" >Estudiante</option>
<option value="sin trabajo">Sin Trabajo</option>
<option value="otro" selected>Otro</option>
<option value="oficios domesticos">Oficios Domesticos</option>
<option value="ninguna">Ninguna</option>

<?php }?>

<?php  if($rocupacion=='oficios domesticos'){ ?>

<option value="empleado">Empleado</option>
<option value="pensionado" >Pensionado</option>
<option value="comerciante" >Comerciante</option>
<option value="albañil" >Albañil</option>
<option value="jornalero" >Jornalero</option>
<option value="panadero" >Panadero</option>
<option value="costurera o sastre" >Costurera o Sastre</option>
<option value="vigilante" >Vigilante</option>
<option value="empleada domestica" >Empleada Domestica</option>
<option value="agricultor" >Agricultor</option>
<option value="electricista" >Electricista</option>
<option value="mecanico" >Mecanico</option>
<option value="estudiante" >Estudiante</option>
<option value="sin trabajo">Sin Trabajo</option>
<option value="otro" >Otro</option>
<option value="oficios domesticos" selected>Oficios Domesticos</option>
<option value="ninguna">Ninguna</option>

<?php }?>

<?php  if($rocupacion=='ninguna'){ ?>

<option value="empleado">Empleado</option>
<option value="pensionado" >Pensionado</option>
<option value="comerciante" >Comerciante</option>
<option value="albañil" >Albañil</option>
<option value="jornalero" >Jornalero</option>
<option value="panadero" >Panadero</option>
<option value="costurera o sastre" >Costurera o Sastre</option>
<option value="vigilante" >Vigilante</option>
<option value="empleada domestica" >Empleada Domestica</option>
<option value="agricultor" >Agricultor</option>
<option value="electricista" >Electricista</option>
<option value="mecanico" >Mecanico</option>
<option value="estudiante" >Estudiante</option>
<option value="sin trabajo">Sin Trabajo</option>
<option value="otro" >Otro</option>
<option value="oficios domesticos" >Oficios Domesticos</option>
<option value="ninguna" selected>Ninguna</option>

<?php }?>

	</select>
</div>
</div>

<div class="form-group" id="divoc">

<label class="col-md-3 control-label" id="locupa">Escriba la ocupacion</label>  
          <div class="col-md-2">
	  
		  <input type="text" id="otro_ocupa" name="otro_ocupa" class="form-control input-sm" value="<?php echo $rotra_o; ?>" >
  
		  
          </div>

</div>

<!-- Text input-->
<div class="form-group">
<label class="col-md-1 control-label" for="nombre">Ingreso promedio</label>  
          <div class="col-md-2">
	  
		  <select id="ingresos" name="ingresos" class="form-control input-sm" required>		  
	
      <?php  if($ringreso=='100 a 200'){ ?>
		  <option value="100 a 200" selected>Entre $100 a $200</option>
		  <option value="200 a 300">Entre $201 a $300</option>
		  <option value="301 a 600">Entre $301 a $600</option>
		  <option value="601 a 750">Entre $601 a $750</option>
		  <option value="mas mas 750">Mayor a $750</option>
		  <option value="ninguno">Ninguno</option>
      <?php }?>
      
      <?php  if($ringreso=='200 a 300'){ ?>
		  <option value="100 a 200" >Entre $100 a $200</option>
		  <option value="200 a 300" selected>Entre $201 a $300</option>
		  <option value="301 a 600">Entre $301 a $600</option>
		  <option value="601 a 750">Entre $601 a $750</option>
		  <option value="mas mas 750">Mayor a $750</option>
		  <option value="ninguno">Ninguno</option>
      <?php }?>

    
      <?php  if($ringreso=='301 a 600'){ ?>
		  <option value="100 a 200" >Entre $100 a $200</option>
		  <option value="200 a 300" >Entre $201 a $300</option>
		  <option value="301 a 600" selected>Entre $301 a $600</option>
		  <option value="601 a 750">Entre $601 a $750</option>
		  <option value="mas mas 750">Mayor a $750</option>
		  <option value="ninguno">Ninguno</option>
      <?php }?>

      <?php  if($ringreso=='601 a 750'){ ?>
		  <option value="100 a 200" >Entre $100 a $200</option>
		  <option value="200 a 300" >Entre $201 a $300</option>
		  <option value="301 a 600" >Entre $301 a $600</option>
		  <option value="601 a 750" selected>Entre $601 a $750</option>
		  <option value="mas mas 750">Mayor a $750</option>
		  <option value="ninguno">Ninguno</option>
      <?php }?>

      <?php  if($ringreso=='mas mas 750'){ ?>
		  <option value="100 a 200" >Entre $100 a $200</option>
		  <option value="200 a 300" >Entre $201 a $300</option>
		  <option value="301 a 600" >Entre $301 a $600</option>
		  <option value="601 a 750" >Entre $601 a $750</option>
		  <option value="mas mas 750" selected>Mayor a $750</option>
		  <option value="ninguno">Ninguno</option>
      <?php }?>

      <?php  if($ringreso=='ninguno'){ ?>
		  <option value="100 a 200" >Entre $100 a $200</option>
		  <option value="200 a 300" >Entre $201 a $300</option>
		  <option value="301 a 600" >Entre $301 a $600</option>
		  <option value="601 a 750" >Entre $601 a $750</option>
		  <option value="mas mas 750" >Mayor a $750</option>
		  <option value="ninguno" selected>Ninguno</option>
      <?php }?>


		  </select>
		  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombre">Lugar de trabajo</label>  
  <div class="col-md-5" data-validate = "Escriba su usuario">
  <input type="text" id="trabajo" name="trabajo" placeholder="" class="form-control input-md" autocomplete="off" value="<?php echo $rtrabajo; ?>" required>
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
<label class="col-md-1 control-label" for="nombre">Discapacidad</label>  
<div class="col-md-3">
	  
      <select id="discapacidad" name="discapacidad" class="form-control input-sm" required>

      <?php  if($rdiscapacidad=='ninguna'){ ?>
  <option value="ninguna" selected>Ninguna</option>
  <option value="intelectual">Intelectual</option>
  <option value="no vidente">No Vidente</option>
  <option value="sordera">Sordera</option>
  <option value="ausencia de miembros">Ausencia de Miembros</option>
  <option value="sindrome de down">Sindrome de Down</option>
  <option value="afasia">Afasia(Transtorno del lenguaje)</option>
  <option value="otra">Otra</option>


  <?php }?>

  <?php  if($rdiscapacidad=='intelectual'){ ?>
    <option value="ninguna" selected>Ninguna</option>
  <option value="intelectual">Intelectual</option>
  <option value="no vidente">No Vidente</option>
  <option value="sordera">Sordera</option>
  <option value="ausencia de miembros">Ausencia de Miembros</option>
  <option value="sindrome de down">Sindrome de Down</option>
  <option value="afasia">Afasia(Transtorno del lenguaje)</option>
  <option value="otra">Otra</option>


  <?php }?>

  <?php  if($rdiscapacidad=='no vidente'){ ?>
    <option value="ninguna" selected>Ninguna</option>
  <option value="intelectual">Intelectual</option>
  <option value="no vidente">No Vidente</option>
  <option value="sordera">Sordera</option>
  <option value="ausencia de miembros">Ausencia de Miembros</option>
  <option value="sindrome de down">Sindrome de Down</option>
  <option value="afasia">Afasia(Transtorno del lenguaje)</option>
  <option value="otra">Otra</option>


  <?php }?>

  <?php  if($rdiscapacidad=='sordera'){ ?>
    <option value="ninguna" selected>Ninguna</option>
  <option value="intelectual">Intelectual</option>
  <option value="no vidente">No Vidente</option>
  <option value="sordera">Sordera</option>
  <option value="ausencia de miembros">Ausencia de Miembros</option>
  <option value="sindrome de down">Sindrome de Down</option>
  <option value="afasia">Afasia(Transtorno del lenguaje)</option>
  <option value="otra">Otra</option>


  <?php }?>

  <?php  if($rdiscapacidad=='ausencia de miembros'){ ?>
    <option value="ninguna" selected>Ninguna</option>
  <option value="intelectual">Intelectual</option>
  <option value="no vidente">No Vidente</option>
  <option value="sordera">Sordera</option>
  <option value="ausencia de miembros">Ausencia de Miembros</option>
  <option value="sindrome de down">Sindrome de Down</option>
  <option value="afasia">Afasia(Transtorno del lenguaje)</option>
  <option value="otra">Otra</option>


  <?php }?>


  <?php  if($rdiscapacidad=='sindrome de down'){ ?>
    <option value="ninguna" selected>Ninguna</option>
  <option value="intelectual">Intelectual</option>
  <option value="no vidente">No Vidente</option>
  <option value="sordera">Sordera</option>
  <option value="ausencia de miembros">Ausencia de Miembros</option>
  <option value="sindrome de down">Sindrome de Down</option>
  <option value="afasia">Afasia(Transtorno del lenguaje)</option>
  <option value="otra">Otra</option>


  <?php }?>

  <?php  if($rdiscapacidad=='afasia'){ ?>
    <option value="ninguna" selected>Ninguna</option>
  <option value="intelectual">Intelectual</option>
  <option value="no vidente">No Vidente</option>
  <option value="sordera">Sordera</option>
  <option value="ausencia de miembros">Ausencia de Miembros</option>
  <option value="sindrome de down">Sindrome de Down</option>
  <option value="afasia">Afasia(Transtorno del lenguaje)</option>
  <option value="otra">Otra</option>


  <?php }?>

  <?php  if($rdiscapacidad=='otra'){ ?>
    <option value="ninguna" selected>Ninguna</option>
  <option value="intelectual">Intelectual</option>
  <option value="no vidente">No Vidente</option>
  <option value="sordera">Sordera</option>
  <option value="ausencia de miembros">Ausencia de Miembros</option>
  <option value="sindrome de down">Sindrome de Down</option>
  <option value="afasia">Afasia(Transtorno del lenguaje)</option>
  <option value="otra">Otra</option>


  <?php }?>

</select>
      </div>
</div>


<div class="form-group" id="divd">
          <label class="col-md-8 control-label" id="lpdis">Escriba la discapacidad</label>  
          <div class="col-md-2">
	  
		  <input type="text" id="dis" name="dis" class="form-control input-sm" value="<?php echo $rotra_d; ?>"/>
  
		  
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
  $nombre=$_POST["nombre"];
  $nombre=ucwords($nombre);
  $apellido=$_POST["apellido"];
  $apellido=ucwords($apellido);
  $edad=$_POST["edad"];
  $parentesco=$_POST["parentesco"];
  $escolaridad=$_POST["escolaridad"];
  $ocupacion=$_POST["ocupacion"];
  $ingreso_pro=$_POST["ingresos"];
  $lugar_trabajo=$_POST["trabajo"];
$discapacidad=$_POST["discapacidad"];



//|| ($('#potros').is(':visible') && document.getElementById('potros').value=="") || ($('#otro_esco').is(':visible') && document.getElementById('otro_esco').value=="") || ($('#otro_ocupa').is(':visible') && document.getElementById('otro_ocupa').value=="" )|| ($('#dis').is(':visible') && document.getElementById('dis').value==""

//////////////////
$otro_p=$_POST["potros"];
$otra_e=$_POST["otro_esco"];
$otra_o=$_POST["otro_ocupa"];
$otra_d=$_POST["dis"];
//////////////////

//if(!isset($otro_p) || $otro_p==""){
///$otro_p='NULL';
//}

//if(!isset($otra_e) || $otra_e==""){
//    $otra_e='NULL';
//    }

//    if(!isset($otra_o) || $otra_o==""){
//        $otra_o='NULL';
//        }

//        if(!isset($otra_d) || $otra_d==""){
//            $otra_d='NULL';
//            }





if($bandera=="add"){
	pg_query("BEGIN");
	
	
$result=pg_query($conexion,"update familiares_cliente set nombres='$nombre',apellidos='$apellido',edad='$edad',parentesco='$parentesco',escolaridad='$escolaridad',ocupacion='$ocupacion',ingresos_pro='$ingreso_pro',lugar_trabajo=NULLIF('$lugar_trabajo',''),discapacidad='$discapacidad',otro_parentesco=NULLIF('$otro_p',''),otra_escolaridad=NULLIF('$otra_e',''),otra_ocupacion=NULLIF('$otra_o',''),otra_discapacidad=NULLIF('$otra_d','') where idfamiliar='$idfamiliar'" );
	 
//$result=pg_query($conexion,"update familiares_cliente set nombres='$nombre',apellidos='$apellido',fecha_nac='$fechan',parentesco='$parentesco',escolaridad='$escolaridad',ocupacion='$ocupacion',ingresos_pro='$ingreso_pro',lugar_trabajo='$lugar_trabajo',discapacidad='$discapacidad',otro_parentesco='$otro_p',otra_escolaridad='$otra_e',otra_ocupacion='$otra_o',otra_discapacidad='$otra_d' where idfamiliar='$idfamiliar'" );



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
//echo "window.opener.location.unhook;";
  echo "window.opener.location.reload();";
  echo "window.close();";
	echo "</script>";
				}
	
	//}
			
			
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

 ?>
  

