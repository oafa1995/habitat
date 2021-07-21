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
	
	

				
		
	if(document.getElementById('correo').value==""){
			
		alertaError();
			
		}else{
			        	
                   $(document).ready(function() {
	
    
		
	var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);	
		
        if($("#correo").val().indexOf('@', 0) == -1 || $("#correo").val().indexOf('.', 0) == -1 || caract.test($('#correo').val())==false    ) {
           alertaErrorC();
   
			
        }else{
	
                    document.getElementById('bandera').value="add";
				
					document.frmsf.submit();			
			
		}

     //   alert('El email introducido es correcto.');
   
});		
			
						
			
}

}


	
	function alertaErrorLogin(){
	alertify.error("<h1>Error</h1>"+"<p>Usuario o contraseña no existen</p>"+"<img src='img/error.png'>").dismissOthers();	
		
	}

	function alertaErrorLogin2(){
	alertify.error("<h1>Error</h1>"+"<p>No tiene permitido el acceso hasta que el admnistrador lo apruebe</p>"+"<img src='img/error.png'>").dismissOthers();	
		
	}
	
	function alertaError(){
	alertify.error("<h1>Error</h1>"+"<p>No puede dejar vacio este campo</p>"+"<img src='img/error.png'>").dismissOthers();	
	}
	
	function alertaErrorLogin(){
	alertify.error("<h1>Error</h1>"+"<p>Usuario o contraseña no existen</p>"+"<img src='img/error.png'>").dismissOthers();	
		
	}

	function alertaExito(){
	alertify.success("<h1>Exito</h1>"+"<p>Se han enviado sus credenciales con exito a su correo</p>"+"<img src='img/bien.png'>").set({transition:'flipx'});
	}	
	
	
	function alertaErrorCorreo(){
	alertify.error("<h1>Error</h1>"+"<p>Este correo no esta vinculado con ninguna cuenta</p>"+"<img src='img/error.png'>").set({transition:'flipx'});
	}	
	
	function alertaErrorC(){
	alertify.error("<h1>Error</h1>"+"<p>Correo Electronico no valido</p>"+"<img src='img/error.png'>").dismissOthers();


	}
	
</script>




	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
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
				
						Recuperación de Contraseña
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Escriba su correo electronico">
						<span class="label-input100">Correo</span>
						<input class="input100" type="email" name="correo" id="correo" placeholder="Escriba su correo electrónico" autocomplete="off">
						<span class="focus-input100" data-symbol="&#9993;"></span>
					</div>

					<div class="text-right p-t-8 p-b-31">
						<a href="index.php">
							< Regresar a Inicio de Sesión
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
<!--===============================================================================================-->
	<script src="login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
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
include("config/conexion.php"); 
if(isset($_REQUEST["bandera"])){
	
$bandera=$_REQUEST["bandera"];
$correo=$_REQUEST["correo"];
$niv=0;

if($bandera=="add"){
pg_query("BEGIN");	
	
	
$query_s2=pg_query($conexion,"select * from usuario where correo='$correo' ");
	$rows = pg_num_rows($query_s2);

	if($rows==0){
	
	
	
	
	echo "<script language='javascript'>";
				echo "alertaErrorCorreo();";
				echo "</script>";
		  		  
		  
		  
	
	
	
		
	}else{
		
			 	  $query_s= pg_query($conexion,"select nomusua,clave from usuario where correo='$correo' ");

		
		 while($fila= pg_fetch_array($query_s)){
			 
			 
			 $nomUsuario=$fila[0];
			 $claveU=$fila[1];
		 }
		
		 $nomUsuario=base64_decode($nomUsuario);
         $claveU=base64_decode($claveU);
	
$mail = "usuario: ".$nomUsuario."\ncontraseña: ".$claveU ;
//Titulo
$titulo = "RECUPERACION DE CLAVE SISTEMA HABITAT";
//cabecera
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
//dirección del remitente 
$headers .= "From: Sistema HABITAT < oafa1995@oafa1995.heliohost.us >\r\n";
//Enviamos el mensaje a tu_dirección_email 
$bool = mail($correo,$titulo,$mail,$headers);
if($bool){
  //  echo "Mensaje enviado";
	
	
	echo "<script language='javascript'>";
				echo "alertaExito();";
				echo "</script>";
		  		  
	
	
}else{
    echo "Mensaje no enviado";
}
	
	}
	
	
	
	
	
	
	
	
}///////llave que cierra if de bandera add
	
	
}





?>
