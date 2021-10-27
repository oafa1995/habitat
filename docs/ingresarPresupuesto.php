<?php session_start();
include("../config/conexion.php");

$id=$_SESSION["idUsuario"];
$idsolicitud = $_REQUEST["iddatos"];

$query_s= pg_query($conexion,"select idagencia from usuario_agencia where idusuario='$id' ");
while($fila=pg_fetch_array($query_s)){
  $idagencia=$fila[0];
}

$query_s = pg_query($conexion, "SELECT idcliente from solicitud where idsolicitud='$idsolicitud'");
while ($fila = pg_fetch_array($query_s)) {
  //    $ridpaciente=$fila[0];
  $idcliente = $fila[0];
  // $rfecha=$fila[3];

}

$query_s = pg_query($conexion, "SELECT municipio from agencia where idagencia='$idagencia'");
while ($fila = pg_fetch_array($query_s)) {
  //    $ridpaciente=$fila[0];
  $nombre_agencia = $fila[0];
  // $rfecha=$fila[3];

}

$query_s = pg_query($conexion, "SELECT nombres,apellidos,direccion from cliente where idcliente='$idcliente'");
while ($fila = pg_fetch_array($query_s)) {
  //    $ridpaciente=$fila[0];
  $nombres_clientes = $fila[0];
  $apellidos_clientes = $fila[1];
  $nombre_completo=$nombres_clientes." ".$apellidos_clientes;
  $direccion=$fila[2];
  //$edad_cliente = $fila[2];
 // $estado_civil = $fila[3];
 // $direccion = $fila[4];
 // $telefono = $fila[5];
  // $rfecha=$fila[3];

}

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
   
   
   
    $('#unidad').on('keypress', function (e) {/////////validacion de numeros con dos decimales
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


  if (document.getElementById('fecha').value=="" ||
			      document.getElementById('mejoramiento').value=="" ||
            document.getElementById('dias_construccion').value=="" 
    
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
	
function pro(wawa){
   console.log(wawa);
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





<!-- Form Name -->
<br>





<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombre">Agencia</label>  
  <div class="col-md-5 validate-input" data-validate = "Escriba su usuario">
  <input type="text" id="agencia" name="agencia" placeholder="" class="form-control input-md" autocomplete="off"  readonly="readonly" value = "<?php echo $nombre_agencia; ?>">
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombre">Fecha</label>  
  <div class="col-md-2">
  <input type="date" id="fecha" name="fecha"  class="form-control input-md" autocomplete="off" value="<?= (isset($_POST['apellido']))?$_POST['apellido']:""; ?>" required>
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombre">Nombre: </label>  
  <div class="col-md-5 validate-input" data-validate = "Escriba su usuario">
  <input type="text" id="nombre" name="nombre" placeholder="" class="form-control input-md" autocomplete="off" value="<?php echo $nombre_completo; ?>" readonly>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombre">Direcci&oacuten</label>  
  <div class="col-md-5">
  <input type="text" id="direccion" name="direccion" placeholder="" class="form-control input-md" autocomplete="off" value="<?php echo $direccion; ?>" readonly>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombre">Mejoramiento a realizar</label>  
  <div class="col-md-5">
  <input type="text" id="mejoramiento" name="mejoramiento" placeholder="" class="form-control input-md" autocomplete="off" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombre">Días estimados para la construcción de la obra</label>  
  <div class="col-md-1">
  <input type="text" id="dias_construccion" name="dias_construccion" placeholder="" class="form-control input-md" autocomplete="off" required>
    
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
$fecha=$_REQUEST["fecha"];//1
$mejoramiento=$_REQUEST["mejoramiento"];
$dias_construccion=$_REQUEST["dias_construccion"];

$arreglo = [$fecha,$mejoramiento,$dias_construccion];



 // $result=pg_query($conexion,"insert into cliente(nombres,apellidos,sexo,direccion,telefono,correo,telefono_familiar,estado_civil,zona,municipio,departamento,edad,grupo_familiar,tiempo_residencia,dui,nit,parentesco,escolaridad,ocupacion,ingresos_pro,lugar_trabajo,discapacidad,otro_parentesco,otra_escolaridad,otra_ocupacion,otra_discapacidad) values('$nombre','$apellido','$sexo','$direccion',NULLIF('$telefono',''),NULLIF('$correo',''),NULLIF('$telefonoFamiliar',''),'$estado_civil','$zonaResidencia','$municipio','$departamento','$edad','$grupoF','$tiempoR','$dui','$nit','$parentesco','$escolaridad','$ocupacion','$ingreso_pro',NULLIF('$lugar_trabajo',''),'$discapacidad',NULLIF('$otro_p',''),NULLIF('$otra_e',''),NULLIF('$otra_o',''),NULLIF('$otra_d','') ) returning idcliente" );


 echo "<script language='javascript'>";
echo "window.open('tablasPresupuesto.php?arreglo=".serialize($arreglo)."', '_parent')";
 echo "</script>";
//
/*
$fila2=pg_fetch_array($result);///obteniendo el id de la insercion recien hecha
$idcli=$fila2[0];
 
$result2=pg_query($conexion,"insert into cliente_agencia (idcliente,idagencia) values ('$idcli','$idagencia') ");



	if(!$result ){
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
	echo "</script>";
				}
	
	*/
	//	
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
  

