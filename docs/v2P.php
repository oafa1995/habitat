<?php session_start();
 if($_SESSION['autenticado']!="yeah"){
header("Location: ../index.php");
	exit();
	}
include("../config/conexion.php");
$iddatos=$_REQUEST["iddatos"];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inicio</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../img/tittle.ico"  >
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
	
			
alertify.confirm("<center>ATENCI&Oacute;N!</center>", "<center><img src='../img/warning.png' width='250' height='250'></center>"+"<center><h1>Desea cerrar la sesión?</h1></center>", function(){ alertify.success('Ok') 

document.location.href="../config/fin.php";
}
                , function(){ alertify.error('No ha cerrado la sesión').dismissOthers()}).set('labels', {ok:'si', cancel:'no'}).set({transition:'zoom'});; 
		
		
		}
	
	
	 function alertaError(){
  alertify.error("<h1>Error</h1>"+"<p>El producto x tiene x unidades </p>"+"<img src='../img/error.png'>").dismissOthers();


  }
	
	</script>
	
	
	<script>
	
function ayuda(){
	  $(document).ready(function () {
	$("#ayuda").modal();
	  });
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
                
				
				
				
				             
				
				
				
				</figure>
			
				
                <li style="color:#fff; cursor:default;" title="Datos personales">
				<a href="datosPersonales.php"  style="color:#ffffff;">
                    <span class="all-tittles"><?php  if(isset($_SESSION)){
					
					$usu=$_SESSION["usuarioE"];
					$usu=base64_decode($usu);
					echo $usu;
					
					
					}
					
					
					
					?>
				
					</span>
	</a>               
			   </li>
				
				
				
               
               
			

    <li class="mobile-menu-button visible-xs" style="float: left !important;">
                    <i class="zmdi zmdi-menu"></i>
                </li>
			
            </ul>
        </nav>
		
		 
       
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Gestionar Reportes<small></small></h1>
            </div>
        </div>
		
			<fieldset>


		
  <div class="container-fluid"  style="margin: 50px 0;">
            <div class="row">
               
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Seleccione una opción:
                </div>
            </div>
        </div>
		
	   	
        <div class="container-fluid">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">



        
               
   
               
            <li role="presentation"><a href="madresSolterasPA.php?iddatos=<?php echo $iddatos; ?>"><i class="zmdi zmdi-print zmdi-hc-fw"></i>Madres Solteras</a></li>
                <li role="presentation"><a href="fuenteEmpleoPA.php?iddatos=<?php echo $iddatos; ?>"><i class="zmdi zmdi-print zmdi-hc-fw"></i>Fuentes de ingresos</a></li>
                <li role="presentation"><a href="remesasPA.php?iddatos=<?php echo $iddatos; ?>"><i class="zmdi zmdi-print zmdi-hc-fw"></i>Remesas</a></li>
                <li role="presentation"><a href="ingresosMensualesPA.php?iddatos=<?php echo $iddatos; ?>"><i class="zmdi zmdi-print zmdi-hc-fw"></i>Ingresos Mensuales</a></li>
                <li role="presentation"><a href="ultimoMesesPA.php?iddatos=<?php echo $iddatos; ?>"><i class="zmdi zmdi-print zmdi-hc-fw"></i>Ingresos ultimos tres meses</a></li>
				<li role="presentation"><a href="motivoAfectacionIngresosPA.php?iddatos=<?php echo $iddatos; ?>"><i class="zmdi zmdi-print zmdi-hc-fw"></i>Motivo afectación de ingresos</a></li>
				
            </ul>
          
		<!--	<br>
			<ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
				<li role="presentation"><a href="imprimirMateriaPrima.php"><i class="zmdi zmdi-print zmdi-hc-fw"></i>Materia Prima General</a></li>
                <li role="presentation"><a href="seleccionarTallerM.php"><i class="zmdi zmdi-print zmdi-hc-fw"></i>Materia Prima por Taller</a></li>
				<li role="presentation"><a href="imprimirTutores.php"><i class="zmdi zmdi-print zmdi-hc-fw"></i>Tutores Activos</a></li>
				<li role="presentation"><a href="imprimirParticipantes.php"><i class="zmdi zmdi-print zmdi-hc-fw"></i>Participantes Activos</a></li>
            </ul>
			<br>
			<ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
				<li role="presentation"><a href="imprimirProducto.php"><i class="zmdi zmdi-print zmdi-hc-fw"></i>Productos Generales</a></li>
                <li role="presentation"><a href="buscarParticipante2.php"><i class="zmdi zmdi-print zmdi-hc-fw"></i>Productos por Participante</a></li>
				<li role="presentation"><a href="asistenciaPorMes2.php"><i class="zmdi zmdi-print zmdi-hc-fw"></i>Asistencia Por Taller</a></li>
            </ul>
        </div> -->
	

 
	

        </div>
	   
	  
	   
	   
	   
	   
        <footer class="footer full-reset">
        <div class="footer-copyright full-reset all-tittles"><img src="../img/logoC.png" width ="45" height="45"/>Sistema Habitat Para La Humanidad 2021</div>
		   
        </footer>
    </div>

    
	
</body>
</html>

