<?php session_start();
ini_set('display_errors', 1);
include("../config/conexion.php");
$idusuario=$_SESSION["idUsuario"];

$query_s= pg_query($conexion, "select id_u_a,idagencia from usuario_agencia where idusuario='$idusuario'");
while($fila=pg_fetch_array($query_s)){

$idagencia=$fila[1];

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
  	
	function r() { location.href="buscarEmpleado.php" } 
  
  
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
            	
              if (document.getElementById('nombre').value=="" ||
			      document.getElementById('apellido').value=="" ||
        //    document.getElementById('fechaN').value=="" ||  
            document.getElementById('direccion').value=="" || 
            document.getElementById('correo').value=="" ||
            document.getElementById('cargo').value=="" ||
            document.getElementById('dui').value=="" 
          //  document.getElementById('edad').value==""
            
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
                    <h4><span class="all-tittles">Registrar Empleado (Datos Generales)</span></h4>
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
  <label class="col-md-4 control-label" for="nombre">Nombres</label>  
  <div class="col-md-5" data-validate = "Escriba su usuario">
  <input type="text" id="nombre" name="nombre" placeholder="" class="form-control input-md" autocomplete="off" value="<?= (isset($_POST['nombre']))?$_POST['nombre']:""; ?>" required>
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombre">Apellidos</label>  
  <div class="col-md-5">
  <input type="text" id="apellido" name="apellido" placeholder="" class="form-control input-md" autocomplete="off" value="<?= (isset($_POST['apellido']))?$_POST['apellido']:""; ?>" required>
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombre">Direcci&oacuten</label>  
  <div class="col-md-5">
  <input type="text" id="direccion" name="direccion" placeholder="" class="form-control input-md" autocomplete="off" value="<?= (isset($_POST['direccion']))?$_POST['apellido']:""; ?>" required>
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">Correo Electronico</label>  
  <div class="col-md-3">
  <input id="correo" name="correo" type="text" class="form-control input-md" autocomplete="off" value="<?= (isset($_POST['correo']))?$_POST['correo']:""; ?>" required>
    
  </div>
</div>


<!-- Text input-->
<div class="form-group" >
  <label class="col-md-4 control-label" for="dui" id="label">DUI</label>  
  <div class="col-md-2">
  <input type="text" id="dui" name="dui" placeholder="" class="form-control input-md" autocomplete="off" value="<?= (isset($_POST['dui']))?$_POST['dui']:""; ?>" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombresv">Cargo</label>  
  <div class="col-md-2">
  <select id="cargo" name="cargo" class="form-control input-md" >
  <option value="" disabled selected>Escoja el cargo</option>

<?php
   include("../config/conexion.php");
   $query_s=pg_query($conexion,"select idcargo,nombre_cargo from cargo where idcargo!=1");


                   
                   while($fila=pg_fetch_array($query_s)){
				
       echo " <option value='$fila[0]'>$fila[1]</option>";										
       }

?>

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
$nombre=$_REQUEST["nombre"];//1
$edad=$_REQUEST["edad"];
$nombre= ucwords($nombre);
$apellido=$_REQUEST["apellido"];
$apellido=ucwords($apellido);//2
$correo=$_REQUEST["correo"];//3
//$fechan=$_REQUEST["fechaN"];//4
//$telefono=$_REQUEST["telefono"];//5
//$telefonoFamiliar=$_REQUEST["telefonoF"];//6
$direccion=$_REQUEST["direccion"];//7
//$estado_civil=$_REQUEST["estadoCivil"];//8
$dui=$_REQUEST["dui"];//9
$cargo=$_REQUEST["cargo"];//9
$estado=1;
//$departamento=$_REQUEST["departamento"];//10
//$municipio=$_REQUEST["municipio"];//11
//$zonaResidencia=$_REQUEST["zonaR"];//12
//$sexo=$_REQUEST["sexo"];//13
//$grupoF=$_REQUEST["grupoF"];
//$tiempoR=$_REQUEST["tiempoR"];
//$nit=$_REQUEST["nit"];//9

if($bandera=="add"){
	pg_query("BEGIN");
	

$query_s2=pg_query($conexion,"select * from usuario where dui='$dui' ");
	$rows = pg_num_rows($query_s2);
	

	if($rows==0){
		
        do{
            $usuariox=generar();
            $query_s=pg_query($conexion, "select * from usuario where nomusua=trim('$usuariox') or clave=trim('$usuariox')");
            $valor=pg_num_rows($query_s);
            }while($valor>0);
        do{
            $clavex=generar();
            $query_s=pg_query($conexion, "select * from usuario where nomusua=trim('$clavex') or clave=trim('$clavex')");
            $valor=pg_num_rows($query_s);
            }while($valor>0);
    
    
    

	
$result=pg_query($conexion,"insert into usuario(nombres,apellidos,direccion,correo,dui,nomusua,clave,idcargo,estado) values('$nombre','$apellido','$direccion','$correo','$dui','$usuariox','$clavex','$cargo','$estado' ) returning idusuario" );
$fila2=pg_fetch_array($result);///obteniendo el id de la insercion recien hecha
$idusua=$fila2[0];
$result2=pg_query($conexion,"insert into usuario_agencia(idagencia,idusuario) values('$idagencia','$idusua') ");	


$usuariox=base64_decode($usuariox);
$clavex=base64_decode($clavex);



$mail = "Usuario: ".$usuariox."\nContrase&ntilde;a: ".$clavex ;
//Titulo
$titulo = "EL ADMINISTRADOR A CREADO SU CUENTA, AQUI ESTAN SUS CREDENCIALES";
//cabecera
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
//dirección del remitente 
$headers .= "From: Sistema Habitat < oafa1995@gmail.com >\r\n";
//Enviamos el mensaje a tu_dirección_email 
$bool = mail($correo,$titulo,$mail,$headers);
if($bool){
//  echo "Mensaje enviado";





}else{
echo "Mensaje no enviado";
}

  


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
	echo "setTimeout ('r()', 1500);";
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
  

