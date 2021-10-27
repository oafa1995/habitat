<?php session_start();
 if($_SESSION['autenticado']!="yeah"){
header("Location: ../index.php");
	exit();
	}


include("../config/conexion.php");

$id=$_SESSION["idUsuario"];

$query_s= pg_query($conexion,"select idagencia from usuario_agencia where idusuario='$id' ");
while($fila=pg_fetch_array($query_s)){
  $idagencia=$fila[0];
}


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


    function llamarPaginaEditar2(id){
	window.open("solicitudesFicha.php?iddatos="+id, '_parent');
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
				
				
				
               <center>
				<br>
				 <li style="color:#fff; cursor:default;">
                    <h4><span class="all-tittles">Buscar Solicitante</span></h4>
                </li>
				</center>    
               
			

    <li class="mobile-menu-button visible-xs" style="float: left !important;">
                    <i class="zmdi zmdi-menu"></i>
                </li>
			
            </ul>
        </nav>
		
         
        <div class="container-fluid"  style="margin: 50px 0;">
        <table id="grid" class="display" cellspacing="0" width="99%">
            <thead>
                <tr>
				
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Dui</th>
                    <th>Tel&eacutefono/Celular</th>
                    <th>Direcci&oacuten</th>
                    <th>Municipio</th>
                    <th>Departamento</th>
            
             
			
                    <th width="3%">&nbsp;</th>

			
		
                </tr>
            </thead>

               <tbody>
			    <?php
                        include("../config/conexion.php");
						$query_sw= pg_query($conexion, "SELECT c.idcliente,c.nombres,c.apellidos,c.dui,c.telefono,c.direccion,c.municipio,c.departamento,c.sexo,s.idsolicitud,s.fecha,sv.materiales_paredes from cliente as c,solicitud as s,situacion_economica_familiar as sef,solicitud_situacion_ec as secf,situacion_salud as ss,solicitud_situacion_salud as sss,situacion_vivienda as sv,solicitud_situacion_vivienda ssv,situacion_organizacion as so,solicitud_situacion_organizacion sso,situacion_enfoque_genero as sg,solicitud_situacion_enfoque_genero ssg,datos_finales_es as df,cliente_agencia as cla WHERE c.idcliente=s.idcliente and s.idsolicitud=secf.idsolicitud and sef.idsituacion=secf.idsituacion and ss.id_situacion_salud=sss.id_situacion_salud and sss.idsolicitud=s.idsolicitud and sv.id_situacion_vivienda=ssv.id_situacion_vivienda and ssv.idsolicitud=s.idsolicitud and so.id_situacion_organizacion=sso.id_situacion_organizacion and sso.idsolicitud=s.idsolicitud and sg.id_situacion_enfoque_genero=ssg.id_situacion_enfoque_genero and ssg.idsolicitud=s.idsolicitud and df.idsolicitud=s.idsolicitud and cla.idcliente=c.idcliente and cla.idagencia='$idagencia' ");
						while($filaw=pg_fetch_array($query_sw)){
						?>
			   
<?php include("../docs/paraGraficar.php");
$aux=0;
$aux=$acumulador;
if($acumulador>=45){
?>
            <tr>
                <td align="left" style="font-size:15px"><?php echo $filaw[1];  ?></td>
                <td align="left" style="font-size:15px"><?php echo $filaw[2];  ?></td>
                <td align="left" style="font-size:15px"><?php echo $filaw[3];  ?></td>
                <td align="left" style="font-size:15px"><?php echo $filaw[4];  ?></td>
                <td align="left" style="font-size:15px"><?php echo $filaw[5];  ?></td>
                <td align="left" style="font-size:15px"><?php echo $filaw[6];  ?></td>
                <td align="left" style="font-size:15px"><?php echo $filaw[7];  ?></td>
           

             
                <td class="text-center"><a class='btn btn-success btn-xs' onClick="llamarPaginaEditar2('<?php echo $filaw[0]; ?>')"><span class="glyphicon glyphicon-edit"></span> Ingresar Ficha</a></td>

			
			
				
            </tr>
            
		
	         <?php
             }
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

 