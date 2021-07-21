<?php session_start();
 if($_SESSION['autenticado']!="yeah"){
header("Location: ../index.php");
	exit();
	}
	date_default_timezone_set('America/El_Salvador');
$cont2=0;
$idcliente=$_REQUEST["iddatos"];
$fecha_actual=date("Y-m-d");
$anio_actual=date("Y");//año


include("../config/conexion.php");
//$iddatos=$_REQUEST["iddatos"];
$query_s=pg_query($conexion,"select nombres,apellidos from cliente where idcliente='$idcliente'");
	while($fila=pg_fetch_array($query_s)){
//    $ridpaciente=$fila[0];
 $rnombre=$fila[0]." ".$fila[1];
   // $rfecha=$fila[3];
		
	}

   if($idcliente=="" || $idcliente==null){
	header("Location: index.php");
	exit();
	}
		





//$idConsulta=13;
	
?>
<!DOCTYPE html>
<html>
<head>
    <title>Grupo Familiar</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../img/tittle.ico"  >
	
	 <script src="../js/jquery.min.js"> </script>
	 <script src="../js/jquery.numeric.js"></script>
	 
	

	 <script type="text/javascript">
 // window.onbeforeunload = function(){
  //  return "Did you save your stuff?"
 // }


 var hook = true;
      window.onbeforeunload = function() {
        if (hook) {
          return "Did you save your stuff?"
        }
      }


      function unhook() {
        hook=false;
      }

</script>

    <script src="../js/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="../css/sweet-alert.css">
    <link rel="stylesheet" href="../css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="../css/style.css">
  
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
	
	
	<script type="text/javascript" class="init"> 

 

function Salir(){
	
			
alertify.confirm("<center>ATENCI&Oacute;N!</center>", "<center><img src='../img/warning.png' width='250' height='250'></center>"+"<center><h1>Desea cerrar la sesion?</h1></center>", function(){ alertify.success('Ok') 

document.location.href="../config/fin.php";
}
                , function(){ alertify.error('No ha cerrado la sesion').dismissOthers()}).set('labels', {ok:'si', cancel:'no'}).set({transition:'zoom'});; 
		
		
		}
		function abrirVentana(){
					window.open("ej.php", "Nuevo", "alwaysRaised=no, toolbar=no, menubar=no,status=no,rezisable=no,width=400,height=300, location=no")
					}
					
								function r() { location.href="index.php" } 

		
</script>





<script language="javascript">
var codigoFF="";

function verificar(){

	$(document).ready(function(){
	nFilita = $("#tabla tr").length;
	//alert(nFilita);
});

//alert(nFilita);


	if(nFilita<2){
		
		alertaError();
			
		}else{
		//	window.onbeforeunload = null;// para que no pregunte si cerrará la ventana
		unhook();
			document.getElementById('bandera').value="add";

		//		idconsultita="<?php //echo $idFactura; ?>";

				//	document.frmfin.submit();
				llamarPaginaEditar();
					//document.getElementById('codigof').value="";

				//	alert("probando");
			}
			
			
}


function llamarPaginaEditar(){
window.open("buscarCliente.php", '_parent');
	}

function alertaError(){
	alertify.error("<h1>Error</h1>"+"<p>No ha agregado ningun medicamento</p>"+"<img src='../img/error.png'>").dismissOthers();


	}

	function alertaErrorSinM(){
	alertify.error("<h1>Error</h1>"+"<p>Elimine la medicina recetada antes de proceder</p>"+"<img src='../img/error.png'>").dismissOthers();


	}
	
function alertaErrorS(){
	alertify.error("<h1>Error</h1>"+"<p>No ha seleccionado ningun producto para deseleccionar</p>"+"<img src='../img/error.png'>").dismissOthers();


	}	
	
	
function alertaErrorA(){
	alertify.error("<h1>Error</h1>"+"<p>Campos vacios</p>"+"<img src='../img/error.png'>").dismissOthers();


	}	
	
function alertaExito(){
	alertify.success("<h1>Exito</h1>"+"<p>Datos ingresados correctamente</p>"+"<img src='../img/ok.png'>").set({transition:'flipx'});
	}	
	
function confirmar(){
alertify.confirm("Message", function (e) {
    if (e) {
        // user clicked "ok"
    } else {
        // user clicked "cancel"
    }
});
}







</script>





<script language="javascript">
////////////////////script para llamar php que muestra los datos del producto a vender



$(document).ready(function(){
   $("#categoria").change(function () {
           $("#categoria").each(function () {
            elegido=$(this).val();
            $.post("detalleNombre.php", { elegido: elegido }, function(data){
				var select = document.getElementById("precio");
var length = select.options.length;
for (i = 0; i < length; i++) {
  select.options[i] = null;
}

var select = document.getElementById("cantidad");
var length = select.options.length;
for (i = 0; i < length; i++) {
  select.options[i] = null;
}


var select = document.getElementById("nombreGenerico");
var length = select.options.length;
for (i = 0; i < length; i++) {
  select.options[i] = null;
}

		    $("#nombreGeneral").html(data);
		
		if(document.getElementById("categoria")!=3){
			$("#cantidadc").show();
			$("#cantidadc").val("");
		}
            });            
        });
   })
});
</script>

<script language="javascript">
////////////////////script para llamar php que muestra los datos del producto a vender


$(document).ready(function(){
   $("#nombreGeneral").change(function () {
           $("#nombreGeneral").each(function () {
            elegido=$(this).val();
            $.post("detalleNombre2.php", { elegido: elegido }, function(data){
            $("#nombreGenerico").html(data);
			
		

            });            
        });
   })
});
</script>

<script language="javascript">
////////////////////script para llamar php que muestra los datos del producto a vender


$(document).ready(function(){
   $("#nombreGenerico").change(function () {
           $("#nombreGenerico").each(function () {
            elegido=$(this).val();
            $.post("detallePrecio.php", { elegido: elegido }, function(data){
            $("#precio").html(data);
		
			
            });            
        });
   })
});
</script>


<script language="javascript">
////////////////////script para llamar php que muestra los datos del producto a vender por codigo


$(document).ready(function(){
   $("#nombreGenerico").change(function () {
           $("#nombreGenerico").each(function () {
            elegido=$(this).val();
            $.post("detalleTipo.php", { elegido: elegido }, function(data){
            
			$("#tipoM").html(data);
		
			
            });            
        });
   })
});
</script>



<script language="javascript">
////////////////////script para llamar php que muestra los datos del producto a vender por codigo


$(document).ready(function(){
   $("#nombreGenerico").change(function () {
           $("#nombreGenerico").each(function () {
            elegido=$(this).val();
            $.post("detalleCantidad.php", { elegido: elegido }, function(data){
			$("#cantidad").html(data);
		
			
            });            
        });
   })
});
</script>


<script language="javascript">
////////////////////script para llamar php que muestra los datos del producto a vender por codigo


$(document).ready(function(){
   $("#nombreGenerico").change(function () {
           $("#nombreGenerico").each(function () {
            elegido=$(this).val();
            $.post("detalleDescripcion.php", { elegido: elegido }, function(data){
            
			$("#descripcion").html(data);

		
			
            });            
        });
   })
});
</script>


<script language="javascript">
////////////////////script para llamar php que muestra los datos del producto a vender por codigo


$(document).ready(function(){
   $("#nombreGenerico").change(function () {
           $("#nombreGenerico").each(function () {
            elegido=$(this).val();
        //    $.post("detalleDescripcion.php", { elegido: elegido }, function(data){
            
		//	$("#descripcion").html(data);

		
			
        //    });         
		alert(elegido);
			if(elegido==12){
			$("#cantidadc").hide();
			document.getElementById('cantidadc').value=1;
			}else{
				$("#cantidadc").show();
				document.getElementById('cantidadc').value="";
			}

        });
   })
});
</script>





<script language="javascript">
////////////////////script para llamar php que muestra los datos del producto a vender por codigo


$(document).ready(function(){

  
	$("#lpotros").hide();


$("#potros").hide();


//$(".ldiv1").hide();


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

  
	$("#lesco").hide();


$("#otro_esco").hide();


//$(".ldiv1").hide();


   $("#escolaridad").change(function () {
//	alert("hola");
           $("#escolaridad").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="otro"){
	$("#lesco").show();


$("#otro_esco").show();


$(".ldiv1").show();
}else{
	$("#lesco").hide();


$("#otro_esco").hide();

document.getElementById('otro_esco').value="";

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

  
	$("#locupa").hide();


$("#otro_ocupa").hide();


//$(".ldiv1").hide();


   $("#ocupacion").change(function () {
//	alert("hola");
           $("#ocupacion").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="otro"){
	$("#locupa").show();


$("#otro_ocupa").show();



$(".ldiv1").show();
}else{
	$("#locupa").hide();


$("#otro_ocupa").hide();


document.getElementById('otro_ocupa').value="";

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

  
	$("#lpdis").hide();


$("#dis").hide();


//$(".ldiv1").hide();


   $("#discapacidad").change(function () {
//	alert("hola");
           $("#discapacidad").each(function () {
            elegido=$(this).val();
     //       $.post("detalleProductoCodigo4.php", { elegido: elegido }, function(data){


if(elegido=="otra"){
	$("#lpdis").show();


$("#dis").show();



$(".ldiv2").show();
}else{
	$("#lpdis").hide();


$("#dis").hide();

document.getElementById('dis').value="";


//$(".ldiv1").hide();
}

		//	$("#precio").html(data);
		
			
          //  });            
        });
   })
});
</script>




<script>


var i=0;
var j=0;
var paratotal=0;
var parasub=0;
var codigofactura=0;
var global;
//var agregaono=0;

	$(document).ready(function(){
	//	tutu="<?php// echo $totalin; ?>";
		
	//	if(tutu!=null){
	//	$('#total').val(tutu);
	//	}

		$('#bt_add').click(function(){


//			if($('#potros').is(':hidden') && $('#otro_esco').is(':hidden') && $('#otro_ocupa').is(':hidden') && $('#dis').is(':hidden'))
//
//{if($('#potros').is(':visible') && $('#otro_esco').is(':visible') && $('#otro_ocupa').is(':visible') && $('#dis').is(':visible')){

	if(document.getElementById('nombre').value=="" || document.getElementById('apellido').value=="" || document.getElementById('edad').value=="" || document.getElementById('parentesco').value=="" || document.getElementById('escolaridad').value=="" || document.getElementById('ocupacion').value=="" || document.getElementById('ingresos').value=="" || document.getElementById('discapacidad').value=="" || ($('#potros').is(':visible') && document.getElementById('potros').value=="") || ($('#otro_esco').is(':visible') && document.getElementById('otro_esco').value=="") || ($('#otro_ocupa').is(':visible') && document.getElementById('otro_ocupa').value=="" )|| ($('#dis').is(':visible') && document.getElementById('dis').value=="") ){
		alertaErrorA();
		}else{			
			agregar();
		//	document.getElementById("frmfin").reset();
		}
//}

/*
if($('#potros').is(':hidden') && $('#otro_esco').is(':hidden') && $('#otro_ocupa').is(':hidden') && $('#dis').is(':hidden'))
{
	if(document.getElementById('nombre').value=="" || document.getElementById('apellido').value=="" || document.getElementById('fechan').value=="" || document.getElementById('parentesco').value=="" || document.getElementById('escolaridad').value=="" || document.getElementById('ocupacion').value=="" || document.getElementById('ingresos').value=="" || document.getElementById('discapacidad').value=="" ){
		alertaErrorA();
		}else{
			agregar();
		}
}

if($('#potros').is(':visible') && $('#otro_esco').is(':visible') && $('#otro_ocupa').is(':hidden') && $('#dis').is(':hidden'))
{
	if(document.getElementById('nombre').value=="" || document.getElementById('apellido').value=="" || document.getElementById('fechan').value=="" || document.getElementById('parentesco').value=="" || document.getElementById('escolaridad').value=="" || document.getElementById('ocupacion').value=="" || document.getElementById('ingresos').value=="" || document.getElementById('discapacidad').value=="" || document.getElementById('potros').value=="" || document.getElementById('otro_esco').value==""){
		alertaErrorA();
		}else{
			agregar();
		}
}


	
if($('#potros').is(':visible') && $('#otro_esco').is(':visible') && $('#otro_ocupa').is(':visible') && $('#dis').is(':hidden')){
	if(document.getElementById('nombre').value=="" || document.getElementById('apellido').value=="" || document.getElementById('fechan').value=="" || document.getElementById('parentesco').value=="" || document.getElementById('escolaridad').value=="" || document.getElementById('ocupacion').value=="" || document.getElementById('ingresos').value=="" || document.getElementById('discapacidad').value=="" || document.getElementById('potros').value=="" || document.getElementById('otro_esco').value=="" || document.getElementById('otro_ocupa').value==""){
		alertaErrorA();
		}else{
			agregar();
		}
}


if($('#potros').is(':visible') && $('#otro_esco').is(':visible') && $('#otro_ocupa').is(':visible') && $('#dis').is(':visible')){
	if(document.getElementById('nombre').value=="" || document.getElementById('apellido').value=="" || document.getElementById('fechan').value=="" || document.getElementById('parentesco').value=="" || document.getElementById('escolaridad').value=="" || document.getElementById('ocupacion').value=="" || document.getElementById('ingresos').value=="" || document.getElementById('discapacidad').value=="" || document.getElementById('potros').value=="" || document.getElementById('otro_esco').value=="" || document.getElementById('otro_ocupa').value=="" || document.getElementById('dis').value==""){
		alertaErrorA();
		}else{
			agregar();
		}
}

if($('#potros').is(':hidden') && $('#otro_esco').is(':visible') && $('#otro_ocupa').is(':visible') && $('#dis').is(':visible'))
{
	if(document.getElementById('nombre').value=="" || document.getElementById('apellido').value=="" || document.getElementById('fechan').value=="" || document.getElementById('parentesco').value=="" || document.getElementById('escolaridad').value=="" || document.getElementById('ocupacion').value=="" || document.getElementById('ingresos').value=="" || document.getElementById('discapacidad').value=="" || document.getElementById('otro_esco').value=="" || document.getElementById('otro_ocupa').value=="" || document.getElementById('dis').value==""){
		alertaErrorA();
		}else{
			agregar();
		}
}

if($('#potros').is(':hidden') && $('#otro_esco').is(':hidden') && $('#otro_ocupa').is(':visible') && $('#dis').is(':visible'))
{
	if(document.getElementById('nombre').value=="" || document.getElementById('apellido').value=="" || document.getElementById('fechan').value=="" || document.getElementById('parentesco').value=="" || document.getElementById('escolaridad').value=="" || document.getElementById('ocupacion').value=="" || document.getElementById('ingresos').value=="" || document.getElementById('discapacidad').value=="" || document.getElementById('otro_ocupa').value=="" || document.getElementById('dis').value==""){
		alertaErrorA();
		}else{
			agregar();
		}
}

if($('#potros').is(':hidden') && $('#otro_esco').is(':hidden') && $('#otro_ocupa').is(':hidden') && $('#dis').is(':visible'))
{
	if(document.getElementById('nombre').value=="" || document.getElementById('apellido').value=="" || document.getElementById('fechan').value=="" || document.getElementById('parentesco').value=="" || document.getElementById('escolaridad').value=="" || document.getElementById('ocupacion').value=="" || document.getElementById('ingresos').value=="" || document.getElementById('discapacidad').value=="" || document.getElementById('dis').value==""){
		alertaErrorA();
		}else{
			agregar();
		}
}

if($('#potros').is(':visible') && $('#otro_esco').is(':hidden') && $('#otro_ocupa').is(':hidden') && $('#dis').is(':visible'))
{
	if(document.getElementById('nombre').value=="" || document.getElementById('apellido').value=="" || document.getElementById('fechan').value=="" || document.getElementById('parentesco').value=="" || document.getElementById('escolaridad').value=="" || document.getElementById('ocupacion').value=="" || document.getElementById('ingresos').value=="" || document.getElementById('discapacidad').value=="" || document.getElementById('potros').value=="" || document.getElementById('dis').value==""){
		alertaErrorA();
		}else{
			agregar();
		}
}

if($('#potros').is(':visible') && $('#otro_esco').is(':hidden') && $('#otro_ocupa').is(':hidden') && $('#dis').is(':hidden'))
{
	if(document.getElementById('nombre').value=="" || document.getElementById('apellido').value=="" || document.getElementById('fechan').value=="" || document.getElementById('parentesco').value=="" || document.getElementById('escolaridad').value=="" || document.getElementById('ocupacion').value=="" || document.getElementById('ingresos').value=="" || document.getElementById('discapacidad').value=="" || document.getElementById('potros').value=="" ){
		alertaErrorA();
		}else{
			agregar();
		}
}


if($('#potros').is(':visible') && $('#otro_esco').is(':hidden') && $('#otro_ocupa').is(':visible') && $('#dis').is(':visible')){
	if(document.getElementById('nombre').value=="" || document.getElementById('apellido').value=="" || document.getElementById('fechan').value=="" || document.getElementById('parentesco').value=="" || document.getElementById('escolaridad').value=="" || document.getElementById('ocupacion').value=="" || document.getElementById('ingresos').value=="" || document.getElementById('discapacidad').value=="" || document.getElementById('potros').value=="" || document.getElementById('otro_ocupa').value=="" || document.getElementById('dis').value==""){
		alertaErrorA();
		}else{
			agregar();
		}
}


if($('#potros').is(':hidden') && $('#otro_esco').is(':visible') && $('#otro_ocupa').is(':visible') && $('#dis').is(':hidden'))
{
	if(document.getElementById('nombre').value=="" || document.getElementById('apellido').value=="" || document.getElementById('fechan').value=="" || document.getElementById('parentesco').value=="" || document.getElementById('escolaridad').value=="" || document.getElementById('ocupacion').value=="" || document.getElementById('ingresos').value=="" || document.getElementById('discapacidad').value=="" || document.getElementById('otro_ocupa').value=="" || document.getElementById('otro_esco').value==""){
		alertaErrorA();
		}else{
			agregar();
		}
}

if($('#potros').is(':hidden') && $('#otro_esco').is(':visible') && $('#otro_ocupa').is(':hidden') && $('#dis').is(':hidden'))
{
	if(document.getElementById('nombre').value=="" || document.getElementById('apellido').value=="" || document.getElementById('fechan').value=="" || document.getElementById('parentesco').value=="" || document.getElementById('escolaridad').value=="" || document.getElementById('ocupacion').value=="" || document.getElementById('ingresos').value=="" || document.getElementById('discapacidad').value=="" || document.getElementById('otro_ocupa').value=="" || document.getElementById('otro_esco').value==""){
		alertaErrorA();
		}else{
			agregar();
		}
}



	//	else{	
			
	//		agregar();
				
	//	}

*/

		});
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$('#bt_del').click(function(){
			eliminar(id_fila_selected);
		});
		
		
		$('#cancelar').click(function(){//boton cancelar

	
		
			
	document.getElementById('nombre').value="";
	
	document.getElementById('apellido').value="";
	
	document.getElementById('edad').value="";
			//	document.getElementById('cantidadc').value="";

		
//	document.getElementById('dosis').value="";
	  
	
	var $miSelect = $('#categoria');
$miSelect.val($miSelect.children('option:first').val());
					
	
//	var $miSelect = $('#codigo');
//$miSelect.val($miSelect.children('option:first').val());
	
var select = document.getElementById("precio");
var length = select.options.length;
for (i = 0; i < length; i++) {
  select.options[i] = null;
}

$('#nombreGeneral option').remove();
$('#nombreGenerico option').remove();



var select = document.getElementById("cantidad");
var length = select.options.length;
for (i = 0; i < length; i++) {
  select.options[i] = null;
}

var select = document.getElementById("descripcion");
var length = select.options.length;
for (i = 0; i < length; i++) {
  select.options[i] = null;
}

			

		});//boton cancelar
		
		$('#bt_delall').click(function(){
			eliminarTodasFilas();
		});
		



		$('#btno').click(function(){
	//		eliminarTodasFilas();
		//	nFili = $("#tabla tr").length;
		idcliente="<?php echo $idcliente; ?>";

		$.post("cancelarFamiliares.php",{idcliente:idcliente},function(data){
//	$("#total").val(data);
window.open("buscarCliente.php", '_parent');

});///final de post


		});


	});
	var cont=0;
	var id_fila_selected=[];
	var fg;

	////////////////////>>>>>>>AGREGAR A LA TABLA MOMENTANEA<<<<<<<<//////////////////////
	function agregar(){
//var op = $('#producto:selected').text();
		
idcliente="<?php echo $idcliente; ?>";

		$('#cliente').attr('disabled', 'disabled');
		
		var nombre = $('#nombre').val();
		
		var apellido = $('#apellido').val();
     //   var fecha
		edad = $('#edad').val();

		parentesco=$('#parentesco').val();
		escolaridad=$('#escolaridad').val();
		ocupacion=$('#ocupacion').val();
		ingreso_pro=$('#ingresos').val();
		lugar_trabajo=$('#trabajo').val();
		discapacidad=$('#discapacidad').val();
		/////////////////
		//valores opcionales
//////////////////////
//if($('#potros').is(':hidden') && $('#otro_esco').is(':visible') && $('#otro_ocupa').is(':visible') && $('#dis').is(':visible'))

otro_parentesco=$('#potros').val();
otra_escolaridad=$('#otro_esco').val();
otro_ocupa=$('#otro_ocupa').val();
otra_discapacidad=$('#dis').val();


edad = $('#edad').val();
        

	//	var dosis = $('#dosis').val();
	//	var agregaono=0;

	



	//	if (agregaono==0) {
			cont++;
			pa="fila"+cont;
			pa2=nombre;
		//	pa3=global;
	
	//	}
		

$.post("detalleFamiliar.php",{nombre:nombre,apellido:apellido,edad:edad,parentesco:parentesco,escolaridad:escolaridad,ocupacion:ocupacion,ingreso_pro:ingreso_pro,lugar_trabajo:lugar_trabajo,discapacidad:discapacidad,idcliente:idcliente,otro_parentesco:otro_parentesco,otra_escolaridad:otra_escolaridad,otro_ocupa:otro_ocupa,otra_discapacidad:otra_discapacidad},function(data){
	idfamiliar=data;



          

	var fila='<tr class="selected" id="fila'+cont+'" onclick="seleccionar(this.id);"><td></td><td><input type="text" id="n'+cont+'" style="border: 0;" value="'+$('#nombre').val()+'" /></td><td class="suma"><input type="text" id="p'+cont+'" style="border: 0" value="'+$('#apellido').val()+'" /></td><td><input id="c'+cont+'" style="border: 0;" type="text" value="'+edad+'"/></td><td><input type="text" id="p'+cont+'" style="border: 0" value="'+$('#parentesco').val()+'" /></td> <td><button onclick=eliminar("'+idfamiliar+'","'+pa+'") type="button" class="btn btn-danger" >Eliminar</button><input type=text id="pr'+cont+'" name="pr'+cont+'" class="form-control input-sm" style="display:none" value="'+pa2+'" ></td> <td><button onclick=editar("'+idfamiliar+'","'+pa+'") type="button" class="btn btn-primary" >Editar o Verificar</button><input type=text id="pr'+cont+'" name="pr'+cont+'" class="form-control input-sm" style="display:none" value="'+pa2+'" ></td> </tr>';
		$('#tabla').append(fila);
		reordenar();


		document.getElementById('nombre').value="";
		document.getElementById('apellido').value="";
		document.getElementById('edad').value="";

		document.getElementById('trabajo').value="";


		var $miSelect = $('#parentesco');
    $miSelect.val($miSelect.children('option:first').val());

	
	var $miSelect = $('#escolaridad');
    $miSelect.val($miSelect.children('option:first').val());

	
	var $miSelect = $('#ocupacion');
    $miSelect.val($miSelect.children('option:first').val());

	
	var $miSelect = $('#ingresos');
    $miSelect.val($miSelect.children('option:first').val());
	

	var $miSelect = $('#discapacidad');
    $miSelect.val($miSelect.children('option:first').val());

	document.getElementById("frmfin").reset();


	$("#lpotros").hide();


$("#potros").hide();

document.getElementById('potros').value="";


$("#lesco").hide();


$("#otro_esco").hide();

document.getElementById('otro_esco').value="";

$("#locupa").hide();


$("#otro_ocupa").hide();


document.getElementById('otro_ocupa').value="";


$("#lpdis").hide();


$("#dis").hide();

document.getElementById('dis').value="";



});///final de post



//		probando();

		

	
	   
	   j++;//contador para variable global "j" para crear la factura 
//	   document.getElementById("frmfin").reset();

	}//final de funcion agregar



	function seleccionar(id_fila){
		if($('#'+id_fila).hasClass('seleccionada')){
			$('#'+id_fila).removeClass('seleccionada');
		}
		else{
			$('#'+id_fila).addClass('seleccionada');
		}
		//2702id_fila_selected=id_fila;
		id_fila_selected.push(id_fila);
	}

	function eliminar(id_familiar,id_fila){
		idcliente="<?php echo $idcliente; ?>";
	//	alert("Id de la fila a eliminar"+id_fila);
	//	alert("Id del producto a eliminar"+id_prod);

		$.post("detalleEliminarFamiliar.php",{idcliente:idcliente,id_familiar:id_familiar},function(data){



});


	//	codigofact=$("#codigof").val();
//alert("Codigo de factura:"+codigofact);
		$('#'+id_fila).remove();
		reordenar();
//		for(var i=0; i<id_fila.length; i++){
//			$('#'+id_fila[i]).remove();
//		}
	//	reordenar();
	}





	function reordenar(){
		var num=1;
		$('#tabla tbody tr').each(function(){
			$(this).find('td').eq(0).text(num);
			num++;
		});
	}
	function eliminarTodasFilas(){
$('#tabla tbody tr').each(function(){
			$(this).remove();
		});

	}



</script>


<script type="text/javascript">
///////////////validar solo numeros enteros
	$(document).ready(function(){

$('#edad').on('input', function () { 
    this.value = this.value.replace(/[^0-9]/g,'');
});
});
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
   
	
	
	
	<script type="text/javascript" class="init"> 
	function Salir(){
	
			
alertify.confirm("<center>ATENCI&Oacute;N!</center>", "<center><img src='../img/warning.png' width='250' height='250'></center>"+"<center><h1>Desea cerrar la sesión?</h1></center>", function(){ alertify.success('Ok') 

document.location.href="../config/fin.php";
}
                , function(){ alertify.error('No ha cerrado la sesión').dismissOthers()}).set('labels', {ok:'si', cancel:'no'}).set({transition:'zoom'});; 
		
		
		}
	
	</script>
	
	<style>
 
#nombre {text-transform:capitalize;}  
#apellido {text-transform:capitalize;}  



 </style>
	

	<script>
					function editar(id_familiar,id_fila){
						//unhook();
  var url="editarFamiliar.php?iddatos="+id_familiar;
  window.open(url,"Nuevo","alwaysRaised=no,toolbar=no,menubar=no,status=no,resizable=no,width=650,height=525,location=no");
}

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
                    <h4><span class="all-tittles">Grupo Familiar de <?php echo $rnombre; ?></span></h4>
                </li>
				</center>      
			

    <li class="mobile-menu-button visible-xs" style="float: left !important;">
                    <i class="zmdi zmdi-menu"></i>
                </li>
			
            </ul>
        </nav>
		
		 
       
        
    
	           
			   
	   
	
    
           
		 <form class="form-horizontal" action="" method="post" id="frmfin" name="frmfin">
	  <input type="hidden" name="bandera" id="bandera"/>
                <input type="hidden" name="baccion" id="baccion"/>

<fieldset>

<!-- Form Name -->
<!-- <center><legend>Ingresar Alumno</legend></center> -->


<!-- Text input-->

<br>

<div class="form-group">
          <label class="col-md-1 control-label" for="nombre">Nombres Familiar</label>  
          <div class="col-md-3">
	  
		  <input type="text" id="nombre" name="nombre" class="form-control input-sm"/>
  
		  
          </div>

		  
		  <label class="control-label col-md-1" for="nombre">Apellidos Familiar</label>  
          <div class="col-md-3">
	
		  <input type="text" id="apellido" name="apellido" class="form-control input-sm"/>


		  </div>
		 
		  <label class="control-label col-md-1" for="nombre">Edad</label>  
          <div class="col-md-1">
	
		  <input type="text" id="edad" name="edad" class="form-control input-sm"/>


		  </div>
		  
		  </div>
		  
		
	<div class="form-group">	  
          <label class="col-md-1 control-label">Parentesco</label>
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
          <label class="control-label col-sm-1">Escolaridad</label>
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
  
  <label class="control-label col-sm-1">Ocupacion</label>
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

				<div class="form-group" id="ldiv1">
          <label class="col-md-1 control-label" id="lpotros">Escriba el parentesco</label>  
          <div class="col-md-2">
	  
		  <input type="text" id="potros" name="potros" class="form-control input-sm"/>
  
		  
		  </div>		
		  

		  <label class="col-md-2 control-label" id="lesco">Escriba la escolaridad</label>  
          <div class="col-md-2">
	  
		  <input type="text" id="otro_esco" name="otro_esco" class="form-control input-sm"/>
  
		  
		  </div>
		  

		  <label class="col-md-3 control-label" id="locupa">Escriba la ocupacion</label>  
          <div class="col-md-2">
	  
		  <input type="text" id="otro_ocupa" name="otro_ocupa" class="form-control input-sm"/>
  
		  
          </div>
  
				</div>
  <div class="form-group">		
  <label class="col-md-1 control-label" for="nombre">Ingreso promedio</label>  
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
		  
		  <label class="col-md-1 control-label" for="nombre">Lugar de Trabajo</label>  
          <div class="col-md-3">
	  
		  <input type="text" id="trabajo" name="trabajo" class="form-control input-sm"/>
  
		  
		  </div>
		  

		  <label class="col-md-1 control-label" for="nombre">Discapacidad</label>  
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

<div class="form-group" id="ldiv2">
          <label class="col-md-8 control-label" id="lpdis">Escriba la discapacidad</label>  
          <div class="col-md-2">
	  
		  <input type="text" id="dis" name="dis" class="form-control input-sm"/>
  
		  
		  </div>		
		  

  
				</div>


 
	
<!-- Button -->
<!-- Button -->
<div class="form-group">
  <label class="col-md-3 control-label" for="enviar"></label>
  <div class="col-md-5">
    <button type="button" id="bt_add" class="btn btn-success"><i class="zmdi zmdi-plus"></i> Agregar</button>
  

  
    <button type="reset" id="cancelar" name="cancelar" class="btn btn-danger"><i class="zmdi zmdi-undo"></i> Cancelar</button>
     <button type="button" id="btventa" name="btventa" class="btn btn-info" onClick="verificar()"><i class="zmdi zmdi-check-all"></i> Finalizar Registro Familiar</button>
   

  </div>
  </div>


</fieldset>





 <div class="panel panel-default"  style="overflow-y: scroll; height: 180px; width:1010px" >
 
<table id="tabla" class="table table-bordered">
		<thead>
			<tr class="encabezado">
				<td>N°</td>
				<td>Nombres</td>
				<td>Apellidos</td>
				<td>Edad</td>
				<td>Parentesco</td>
			
				<td></td>

			</tr>
		</thead>

<?php
  include("../config/conexion.php");
  //$query_s= pg_query($conexion, "select idpaciente,nombre,apellido,fechanac,direccion,telefono,fechacrea,padre,madre from paciente  where dui IS NULL order by apellido");
  $query_s=pg_query($conexion,"SELECT idfamiliar,nombres,apellidos,edad,parentesco,escolaridad,ocupacion,ingresos_pro,lugar_trabajo,discapacidad from familiares_cliente where idcliente='$idcliente' ");

  while($fila=pg_fetch_array($query_s)){
	 // echo $fila[1];
  ?>
<script>
cont++;
//alert(cont);
pa="fila"+cont;
//pa2=nombre;
</script>
<?php $cont2++;//ira contado a la par que el de javascript ?>
<tr id="fila<?php echo $cont2; ?>">


<td></td>


<td><input type="text" id="n<?php echo $cont2;?>" style="border: 0;" value="<?php echo $fila[1]; ?>" /></td>

<td><?php echo $fila[2]; ?></td>
<td><input id="c<?php echo $cont2; ?>" style="border: 0;" type="text" value="<?php echo $fila[3]; ?>"/>
</td><!--cantidad -->

<td><?php echo $fila[4]; ?></td>

<td><button onClick="eliminar('<?php echo $fila[0]; ?>','<?php echo "fila".$cont2; ?>')" type="button" class="btn btn-danger" >Eliminar</button>
<td><button onClick="editar('<?php echo $fila[0]; ?>','<?php echo "fila".$cont2; ?>')" type="button" class="btn btn-primary" >Editar o Verificar</button>

</tr>

<script>
	reordenar();
</script>

<?php

  }
?>


	</table>
	</div>
  


</form>
  
		   
		   
       
    	   
        <footer class="footer full-reset">
		<div class="footer-copyright full-reset all-tittles"><img src="../img/logoC.png" width ="45" height="45"/>Sistema Habitat para la humanidad 2020</div>
        </footer>
    </div>
	
</body>
</html>

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
?>