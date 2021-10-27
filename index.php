<?php session_start();
	date_default_timezone_set('America/El_Salvador');
?>
<!DOCTYPE html>
<html >
<head>


	<title>Login </title>

	<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>



<!-- Compiled and minified Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- Minified JS library -->
<script src="js/jquery.min.js"></script>
<!-- Compiled and minified Bootstrap JavaScript -->
<script src="js/bootstrap.min.js" ></script>


<!-- Compiled and minified Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- Minified JS library -->
<script src="js/jquery.min.js"></script>
<!-- Compiled and minified Bootstrap JavaScript -->
<script src="js/bootstrap.min.js" ></script>




<!-- include alertify.css -->
<link rel="stylesheet" href="alertas/build/css/alertify.css">

<!-- include boostrap theme  -->
<link rel="stylesheet" href="alertas/build/css/themes/bootstrap.css">

<!-- include alertify script -->
<script src="alertas/build/alertify.js"></script>

<script type="text/javascript">
//override defaults
alertify.defaults.transition = "slide";
alertify.defaults.theme.ok = "btn btn-primary";
alertify.defaults.theme.cancel = "btn btn-danger";
alertify.defaults.theme.input = "form-control";
</script>

<!------ Include the above in your HEAD tag ---------->




 <script language="javascript">
function verificar(){
	if(document.getElementById('usuariox').value=="" || document.getElementById('clavex').value==""){
		alertaError();
			
		}else{
			document.getElementById('bandera').value="add";
					
					document.frmsf.submit();
			}
			
			
}

function alertaError(){
	alertify.error("<h1>Error</h1>"+"<p>Campos sin llenar</p>"+"<img src='img/error.png'>").dismissOthers();	
	}
	
	function alertaErrorLogin(){
	alertify.error("<h1>Error</h1>"+"<p>Usuario o contraseña no existen</p>"+"<img src='img/error.png'>").dismissOthers();	
		
	}

	function alertaErrorLogin2(){
	alertify.error("<h1>Error</h1>"+"<p>No tiene permitido el acceso hasta que el admnistrador lo apruebe</p>"+"<img src='img/error.png'>").dismissOthers();	
		
	}
	
	
</script>


<script type="text/javascript">
function boton(e) {
 tecla = (document.all) ? e.keyCode : e.which;
  if (tecla==13) verificar();
}

</script>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<link rel="icon" href="img/tittle.ico"  >
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div >
		<div class="container-login100" style="background-image: url('login/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				
				<form class="login100-form validate-form" role="form" action="" method="post" id="frmsf" name="frmsf">
				<input type="hidden" name="bandera" id="bandera"/>
<input type="hidden" name="baccion" id="baccion"/>
				<center>
				<h5>
				Sistema Habitat	<img src="img/logoC.png" width="50" height="50">
</h5>

</center>
				<span class="login100-form-title p-b-5">
				
						Inicio de Sesión
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Escriba su usuario">
						<span class="label-input100">Usuario</span>
						<input class="input100" type="text" name="usuariox" id="usuariox" onkeypress="boton(event)" placeholder="Escriba su usuario" autocomplete="off">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Escriba su contraseña">
						<span class="label-input100">Contraseña</span>
						<input class="input100" type="password" name="clavex" id="clavex" onkeypress="boton(event)" placeholder="Escriba su contraseña" autocomplete="off">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="recuperarClave.php">
							Olvido su contraseña?
						</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
						

							<button class="login100-form-btn" onClick="verificar()">Entrar</button>


						</div>
					</div>

					
				
				</form>
			</div>
		</div>
	</div>

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/daterangepicker/moment.min.js"></script>
	<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="login/js/main.js"></script>



</body>


</html>

<?php

if(isset($_REQUEST["bandera"])){
    $bandera=$_REQUEST["bandera"];
	$usuariox=$_REQUEST["usuariox"];
    $usuariox=base64_encode($usuariox);
	$clavex=$_REQUEST["clavex"];
    $clavex=base64_encode($clavex);
	
	
	include("config/conexion.php");
	
	if($bandera=="add"){
	pg_query("BEGIN");
	
	
	 $query_s2= pg_query($conexion,"select * from usuario as us,cargo as es where us.nomusua=trim('$usuariox') and us.clave=trim('$clavex') and us.idcargo=es.idcargo and us.estado=0 ");
	
	$rows = pg_num_rows($query_s2);
	
	
	if($rows==0){
	//hacer que se saque lo de la agencia
	 	  $query_s= pg_query($conexion,"select u.idusuario,u.nombres,u.apellidos,u.nomusua,e.nivel,e.nombre_cargo from usuario as u,cargo as e where u.nomusua=trim('$usuariox') and u.clave=trim('$clavex') and u.idcargo=e.idcargo ");
	  
	 
	 	
		  
		 
	  while($fila= pg_fetch_array($query_s)){
		  $_SESSION["idUsuario"]=$fila[0];
		  $_SESSION["nombresE"]=$fila[1];
		  $_SESSION["apellidosE"]=$fila[2];
		  $_SESSION["usuarioE"]=$fila[3];
		  $_SESSION["nivelUsuario"]=$fila[4];
		  $_SESSION["cargo"]=$fila[5];
		
		  $fecha=date('Y-m-d h:i:s A');
		  $result2=pg_query($conexion,"insert into usuario_bitacora(fecha_hora,idusuario) values('$fecha','$fila[0]') ");
		  pg_query("commit");
		  

		  $_SESSION["autenticado"]="yeah";
		  echo "<script language='javascript'>";
		  echo "location.href='docs/index.php';";
		  echo "</script>"; 
	    
		  
		  		  
		  }
	  
echo "<script language='javascript'>";
		echo "alertaErrorLogin();";
		echo "</script>";
		
		
	}else{
		
		echo "<script language='javascript'>";
		echo "alertaErrorLogin2();";
		echo "</script>";
		
	}
	
	}
}
?>