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
		


include("../config/conexion.php");

?>
<!DOCTYPE html>
<html>
<head>
    <title>Solicitudes de <?php echo $rnombre; ?></title>
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
    
    <script type="text/javascript" class="init">





 $(document).ready(function () {
        $('#grid').DataTable();
    });
</script>	
	

	
	<script>
	
function ayuda(){
	  $(document).ready(function () {
	$("#ayuda").modal();
	  });
}
	
	</script>
    
    	
<script type="text/javascript" class="init">
function llamarPaginaEditar(id){
	window.open("ingresarPresupuesto.php?iddatos="+id, '_parent');
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
				
        <center>
				<br>
				
                    <h4><span class="all-tittles"><b>Solicitudes de presupuesto aprobadas de: <?php echo $rnombre; ?> </b></span></h4>
                   
				</center>    	
  
        <div class="container-fluid"  style="margin: 50px 0;">
        <table id="grid" class="display" cellspacing="0" width="99%">
            <thead>
                <tr>
				
                    <th>Fecha</th>
               
                
                    <th>Estado</th>
             
			
                    <th width="3%">&nbsp;</th>

					       
		
                </tr>
            </thead>

               <tbody>
			    <?php
                        include("../config/conexion.php");
						$query_s= pg_query($conexion, "SELECT * FROM solicitud INNER JOIN 
                        ficha_tecnica ON solicitud.idsolicitud = ficha_tecnica.idsolicitud 
                        where solicitud.idcliente='$idcliente' 
                        and (ficha_tecnica.cubierta_techo+ficha_tecnica.estructura_techo+ficha_tecnica.columnas_contrafuertes+ficha_tecnica.paredes_estructurales+ficha_tecnica.paredes_livianas+ficha_tecnica.piso_evaluacion+ficha_tecnica.otros_evaluacion+ficha_tecnica.inundacion_cuerpo_c+ficha_tecnica.formacion_carcava+ficha_tecnica.obras_mitigacion+ficha_tecnica.despredimiento_taludes+ficha_tecnica.colapso_estructuras_c+ficha_tecnica.arboles_tendido+ficha_tecnica.otros_amenazas)
                        >=43
                      ");
						while($fila=pg_fetch_array($query_s)){
						?>
			   
            <tr>
  

             
                <td align="left" style="font-size:15px"><?php echo dameFecha($fila[2]); ?></td>
                <td align="left" style="font-size:15px"><?php echo "Ficha tecnica aprobada"; ?></td>


                <td class="text-center"><a class='btn btn-info btn-xs' onClick="llamarPaginaEditar('<?php echo $fila[0]; ?>')"><span class="glyphicon glyphicon-edit"></span> Ingresar Presupuesto</a></td>
              
			
			
				
            </tr>
            
		
	         <?php
						}
							?>
	   
	   </tbody>

    </table>
	
	</div>

        <div class="container">
           
	
	   
        </div>
	  
	   
	   
	   
	   
        <footer class="footer full-reset">
        <div class="footer-copyright full-reset all-tittles"><img src="../img/logoC.png" width ="45" height="45"/>Sistema Habitat Para La Humanidad 2021</div>
		   
        </footer>
    </div>

    
	
</body>
</html>
<?php 
function dameFecha($fecha){
	list($year,$mon,$day)=explode('-',$fecha);
	return date('d-m-Y',mktime(0,0,0,$mon,$day,$year));
	
	}

?>
 