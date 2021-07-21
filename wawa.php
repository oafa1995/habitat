<?php session_start();

?>
<!DOCTYPE html>
<html >
<head>


	<title>Login</title>


	<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>



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

<style>

.validate-input {
  position: relative;
}

.alert-validate::before {
  content: attr(data-validate);
  position: absolute;
  max-width: 70%;
  background-color: #fff;
  border: 1px solid #c80000;
  border-radius: 2px;
  padding: 4px 25px 4px 10px;
  bottom: calc((100% - 20px) / 2);
  -webkit-transform: translateY(50%);
  -moz-transform: translateY(50%);
  -ms-transform: translateY(50%);
  -o-transform: translateY(50%);
  transform: translateY(50%);
  right: 2px;
  pointer-events: none;

  font-family: Poppins-Regular;
  color: #c80000;
  font-size: 13px;
  line-height: 1.4;
  text-align: left;

  visibility: hidden;
  opacity: 0;

  -webkit-transition: opacity 0.4s;
  -o-transition: opacity 0.4s;
  -moz-transition: opacity 0.4s;
  transition: opacity 0.4s;
}

.alert-validate::after {
  content: "\f06a";
  font-family: FontAwesome;
  display: block;
  position: absolute;
  color: #c80000;
  font-size: 16px;
  bottom: calc((100% - 20px) / 2);
  -webkit-transform: translateY(50%);
  -moz-transform: translateY(50%);
  -ms-transform: translateY(50%);
  -o-transform: translateY(50%);
  transform: translateY(50%);
  right: 8px;
}

.alert-validate:hover:before {
  visibility: visible;
  opacity: 1;
}

@media (max-width: 992px) {
  .alert-validate::before {
    visibility: visible;
    opacity: 1;
  }
}


</style>

</head>
<body>
	
	<div >
		<div class="container-login100" style="background-image: url('login/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				
				<form class="login100-form validate-form" role="form" action="" method="post" id="frmsf" name="frmsf">
				<input type="hidden" name="bandera" id="bandera"/>
<input type="hidden" name="baccion" id="baccion"/>
				
<form class="form-horizontal validate-form" action="" method="post" id="frmcdi" name="frmcdi">
	   <input type="hidden" name="bandera" id="bandera"/>
<input type="hidden" name="baccion" id="baccion"/>





<!-- Form Name -->
<br>





<!-- Text input-->
<div class="form-group" data-validate = "Escriba su usuario">
  <label class="col-md-4 control-label" for="nombre">Nombre del empleado  </label>  
  <div class="col-md-5 validate-input" data-validate = "Escriba su usuario">
  <input type="text"  id="nombre" name="nombre" placeholder="" class="form-control input-md input100" autocomplete="off" value="<?= (isset($_POST['nombre']))?$_POST['nombre']:""; ?>" >
  

  </div>
</div>

<button class="login100-form-btn" onClick="verificar()">Entrar</button>

</form>


	
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
	
	
	 $query_s2= pg_query($conexion,"select * from usuario where nomusua=trim('$usuariox') and clave=trim('$clavex') and nivel=0 ");
	
	$rows = pg_num_rows($query_s2);
	
	
	if($rows==0){
	
	 	  $query_s= pg_query($conexion,"select * from usuario where nomusua=trim('$usuariox') and clave=trim('$clavex') ");
	  
	 
	 	
		  
		 
	  while($fila= pg_fetch_array($query_s)){
		  $_SESSION["idUsuario"]=$fila[0];
		  $_SESSION["nombresE"]=$fila[5];
		  $_SESSION["apellidosE"]=$fila[6];
		  $_SESSION["usuarioE"]=$fila[3];
		  $_SESSION["nivelUsuario"]=$fila[10];
		  
		
		  
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