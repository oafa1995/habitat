<?php session_start();
include("../config/conexion.php");

$id=$_SESSION["idUsuario"];

$query_s= pg_query($conexion,"select idagencia from usuario_agencia where idusuario='$id' ");
while($fila=pg_fetch_array($query_s)){
  $idagencia=$fila[0];
}

$arreglo=unserialize($_GET["arreglo"]);

$fecha=$arreglo[0];
$mejoramiento=$arreglo[1];
$dias_construccion=$arreglo[2];

?>
  
<!DOCTYPE html>
<html>
<head>
    <title>Presupuesto de construccion</title>
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

	
		

	<script>
    
 $(function($){
	$("#telefono").mask("9999-9999");  
  $("#telefonoF").mask("9999-9999"); 
  $("#nit").mask("9999-999999-999-9");  

 // $("#telefono").unmask();  

	$("#dui").mask("99999999-9");////////////mascara de entrada para telefono
  $("#dui").mask("99999999-9");
   
   
   
    $('#pu').on('keypress', function (e) {/////////validacion de numeros con dos decimales
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
   

   $('#cantidad').on('keypress', function (e) {/////////validacion de numeros con dos decimales
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
               //   var hoja = document.createElement('style')
//hoja.innerHTML = ".form-group input:invalid{border-left-color: firebrick;}";
//document.body.appendChild(hoja);
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
                    <h4><span class="all-tittles">Presupuesto de Construcción </span></h4>
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







<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar materiales a presupuesto</button>


<div class="panel panel-default"  style="overflow-y: scroll; height: 700px; width:1040px" >
 
 <table id="tabla" class="table table-bordered">
         <thead>
     
         
      <tr>
      <th scope="row" colspan="1" rowspan="2">
     
            <h4><strong>N°</strong></h4>
        
        </th>

        <th scope="row" colspan="1" rowspan="2">
     
     <h4><strong>Descripción</strong></h4>
 
 </th>
        <th scope="row" colspan="7" rowspan="1" >
      <center>    <h4><strong>Presupuesto</strong></h4></center>
     
       
        </th>
      </tr>


      <tr>
        <th scope="row" colspan="1" rowspan="1">Unidad </th>
        <th scope="row" colspan="1" rowspan="1">Cantidad </th>
        <th scope="row" colspan="1" rowspan="1">PU</th>
        <th scope="row" colspan="1" rowspan="1">SUB-TOTAL</th>
    
        <th scope="row" colspan="1" rowspan="1"></th>
        <th scope="row" colspan="1" rowspan="1"></th>
      </tr>
 
      <tr>
      <th scope="row" colspan="8">
     
            <h4><strong>1 <center>Materiales</center></strong></h4>
        
        </th>
      </tr>
           
         </thead>
 
 
<?php
 /*  include("../config/conexion.php");
   $query_s=pg_query($conexion,"SELECT idfamiliar,nombres,apellidos,edad,parentesco,escolaridad,ocupacion,ingresos_pro,lugar_trabajo,discapacidad from familiares_cliente where idcliente='$idcliente' ");
 
   while($fila=pg_fetch_array($query_s)){  */
 
   ?>
 <script>
 //cont++;

// pa="fila"+cont;

 </script>
 <?php // $cont2++; ?>
 <tr id="fila<?php //echo $cont2; ?>">
 
 
 <td></td>
 
 
 <td><input type="text" id="n<?php // echo $cont2;?>" style="border: 0;" value="<?php // echo $fila[1]; ?>" /></td>
 
 <td><?php //echo $fila[2]; ?></td>
 <td><input id="c<?php //echo $cont2; ?>" style="border: 0;" type="text" value="<?php //echo ucwords($fila[3]); ?>"/>
 </td><!--cantidad -->
 
 <td><?php //echo ucwords($fila[4]); ?></td>
 <td><?php //echo ucwords($fila[4]); ?></td>
 
 <td><button onClick="eliminar('<?php //echo $fila[0]; ?>','<?php //echo "fila".$cont2; ?>')" type="button" class="btn"> <i class="zmdi zmdi-delete zmdi-hc-2x" style="color: red;"></i> </button>
 <td><button onClick="editar('<?php //echo $fila[0]; ?>','<?php //echo "fila".$cont2; ?>')" type="button" class="btn" > <i class="zmdi zmdi-edit zmdi-hc-2x" style="color: blue;"></i> </button>
 
 </tr>
 
 <script>
     //reordenar();
 </script>
 
 <?php
 
  // }
 ?>

     </table>
     </div>




     <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal2" data-whatever="@mdo">Agregar materiales a presupuesto</button>


<div class="panel panel-default"  style="overflow-y: scroll; height: 700px; width:1040px" >
 
 <table id="tabla2" class="table table-bordered">
         <thead>
     
         
      <tr>
      <th scope="row" colspan="1" rowspan="2">
     
            <h4><strong>N°</strong></h4>
        
        </th>

        <th scope="row" colspan="1" rowspan="2">
     
     <h4><strong>Descripción</strong></h4>
 
 </th>
        <th scope="row" colspan="7" rowspan="1" >
      <center>    <h4><strong>Presupuesto</strong></h4></center>
     
       
        </th>
      </tr>


      <tr>
        <th scope="row" colspan="1" rowspan="1">Unidad </th>
        <th scope="row" colspan="1" rowspan="1">Cantidad </th>
        <th scope="row" colspan="1" rowspan="1">PU</th>
        <th scope="row" colspan="1" rowspan="1">SUB-TOTAL</th>
    
        <th scope="row" colspan="1" rowspan="1"></th>
        <th scope="row" colspan="1" rowspan="1"></th>
      </tr>
 
      <tr>
      <th scope="row" colspan="8">
     
            <h4><strong>2</strong></h4>
        
        </th>
      </tr>
           
         </thead>
 
 
<?php
 /*  include("../config/conexion.php");
   $query_s=pg_query($conexion,"SELECT idfamiliar,nombres,apellidos,edad,parentesco,escolaridad,ocupacion,ingresos_pro,lugar_trabajo,discapacidad from familiares_cliente where idcliente='$idcliente' ");
 
   while($fila=pg_fetch_array($query_s)){  */
 
   ?>
 <script>
 //cont++;

// pa="fila"+cont;

 </script>
 <?php // $cont2++; ?>
 <tr id="fila<?php //echo $cont2; ?>">
 
 
 <td></td>
 
 
 <td><input type="text" id="n<?php // echo $cont2;?>" style="border: 0;" value="<?php // echo $fila[1]; ?>" /></td>
 
 <td><?php //echo $fila[2]; ?></td>
 <td><input id="c<?php //echo $cont2; ?>" style="border: 0;" type="text" value="<?php //echo ucwords($fila[3]); ?>"/>
 </td><!--cantidad -->
 
 <td><?php //echo ucwords($fila[4]); ?></td>
 <td><?php //echo ucwords($fila[4]); ?></td>
 
 <td><button onClick="eliminar('<?php //echo $fila[0]; ?>','<?php //echo "fila".$cont2; ?>')" type="button" class="btn"> <i class="zmdi zmdi-delete zmdi-hc-2x" style="color: red;"></i> </button>
 <td><button onClick="editar('<?php //echo $fila[0]; ?>','<?php //echo "fila".$cont2; ?>')" type="button" class="btn" > <i class="zmdi zmdi-edit zmdi-hc-2x" style="color: blue;"></i> </button>
 
 </tr>
 
 <script>
     //reordenar();
 </script>
 
 <?php
 
  // }
 ?>

     </table>
     </div>

     <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal3" data-whatever="@mdo">Agregar materiales a presupuesto</button>


<div class="panel panel-default"  style="overflow-y: scroll; height: 700px; width:1040px" >
 
 <table id="tabla3" class="table table-bordered">
         <thead>
     
         
      <tr>
      <th scope="row" colspan="1" rowspan="2">
     
            <h4><strong>N°</strong></h4>
        
        </th>

        <th scope="row" colspan="1" rowspan="2">
     
     <h4><strong>Descripción</strong></h4>
 
 </th>
        <th scope="row" colspan="7" rowspan="1" >
      <center>    <h4><strong>Presupuesto</strong></h4></center>
     
       
        </th>
      </tr>


      <tr>
        <th scope="row" colspan="1" rowspan="1">Unidad </th>
        <th scope="row" colspan="1" rowspan="1">Cantidad </th>
        <th scope="row" colspan="1" rowspan="1">PU</th>
        <th scope="row" colspan="1" rowspan="1">SUB-TOTAL</th>
    
        <th scope="row" colspan="1" rowspan="1"></th>
        <th scope="row" colspan="1" rowspan="1"></th>
      </tr>
 
      <tr>
      <th scope="row" colspan="8">
     
            <h4><strong>3 <center>Otros</center></strong></h4>
        
        </th>
      </tr>
           
         </thead>
 
 
<?php
 /*  include("../config/conexion.php");
   $query_s=pg_query($conexion,"SELECT idfamiliar,nombres,apellidos,edad,parentesco,escolaridad,ocupacion,ingresos_pro,lugar_trabajo,discapacidad from familiares_cliente where idcliente='$idcliente' ");
 
   while($fila=pg_fetch_array($query_s)){  */
 
   ?>
 <script>
 //cont++;

// pa="fila"+cont;

 </script>
 <?php // $cont2++; ?>
 <tr id="fila<?php //echo $cont2; ?>">
 
 
 <td></td>
 
 
 <td><input type="text" id="n<?php // echo $cont2;?>" style="border: 0;" value="<?php // echo $fila[1]; ?>" /></td>
 
 <td><?php //echo $fila[2]; ?></td>
 <td><input id="c<?php //echo $cont2; ?>" style="border: 0;" type="text" value="<?php //echo ucwords($fila[3]); ?>"/>
 </td><!--cantidad -->
 
 <td><?php //echo ucwords($fila[4]); ?></td>
 <td><?php //echo ucwords($fila[4]); ?></td>
 
 <td><button onClick="eliminar('<?php //echo $fila[0]; ?>','<?php //echo "fila".$cont2; ?>')" type="button" class="btn"> <i class="zmdi zmdi-delete zmdi-hc-2x" style="color: red;"></i> </button>
 <td><button onClick="editar('<?php //echo $fila[0]; ?>','<?php //echo "fila".$cont2; ?>')" type="button" class="btn" > <i class="zmdi zmdi-edit zmdi-hc-2x" style="color: blue;"></i> </button>
 
 </tr>
 
 <script>
     //reordenar();
 </script>
 
 <?php
 
  // }
 ?>

     </table>
     </div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Datos Material</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
      <form>
          
        
        <div class="form-group">
            <label for="recipient-name" class="col-md-2">Descripción:</label>
            <div class="col-md-4">
            <input type="text" class="form-control col-md-4" name="descripcion" id="descripcion">
            </div>
          </div>
         
          <div class="form-group">
            <label for="recipient-name" class="col-md-2">Unidad:</label>
            <div class="col-md-4">
            <input type="text" class="form-control col-md-4" name="unidad" id="unidad">
            </div>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-md-2">Cantidad:</label>
            <div class="col-md-4">
            <input type="number" class="form-control col-md-4" name="cantidad" id="cantidad">
            </div>
          </div>


          <div class="form-group">
            <label for="recipient-name" class="col-md-2">PU:</label>
            <div class="col-md-4">
            <input type="number" class="form-control col-md-4" name="pu" id="pu">
            </div>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Agregar</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Datos Material(2)</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
      <form>
          
        
        <div class="form-group">
            <label for="recipient-name" class="col-md-2">Descripción:</label>
            <div class="col-md-4">
            <input type="text" class="form-control col-md-4" name="descripcion2" id="descripcion2">
            </div>
          </div>
         
          <div class="form-group">
            <label for="recipient-name" class="col-md-2">Unidad:</label>
            <div class="col-md-4">
            <input type="text" class="form-control col-md-4" name="unidad2" id="unidad2">
            </div>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-md-2">Cantidad:</label>
            <div class="col-md-4">
            <input type="number" class="form-control col-md-4" name="cantidad2" id="cantidad2">
            </div>
          </div>


          <div class="form-group">
            <label for="recipient-name" class="col-md-2">PU:</label>
            <div class="col-md-4">
            <input type="number" class="form-control col-md-4" name="pu2" id="pu2">
            </div>
          </div>

          

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Agregar</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Otros(3)</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
      <form>
          
        
        <div class="form-group">
            <label for="recipient-name" class="col-md-2">Descripción:</label>
            <div class="col-md-4">
            <input type="text" class="form-control col-md-4" name="descripcion3" id="descripcion3">
            </div>
          </div>
         
          <div class="form-group">
            <label for="recipient-name" class="col-md-2">Unidad:</label>
            <div class="col-md-4">
            <input type="text" class="form-control col-md-4" name="unidad3" id="unidad3">
            </div>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-md-2">Cantidad:</label>
            <div class="col-md-4">
            <input type="number" class="form-control col-md-4" name="cantidad3" id="cantidad3">
            </div>
          </div>


          <div class="form-group">
            <label for="recipient-name" class="col-md-2">PU:</label>
            <div class="col-md-4">
            <input type="number" class="form-control col-md-4" name="pu3" id="pu3">
            </div>
          </div>

          

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Agregar</button>
      </div>
    </div>
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
  

