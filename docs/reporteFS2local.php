<?php session_start();
if($_SESSION['autenticado']!="yeah"){
    header("Location: ../index.php");
      exit();
      }
      include("../config/conexion.php");

      date_default_timezone_set('America/El_Salvador');
    $cont2=0;

    $idu=$_SESSION["idUsuario"];
$query_s777= pg_query($conexion,"select idagencia from usuario_agencia where idusuario='$idu' ");
	  		 
while($fila= pg_fetch_array($query_s777)){
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

print();

function llamarPaginaEditar(id){
	window.open("editarCliente.php?iddatos="+id, '_parent');
	}

    function llamarPaginaEditar2(id){
	window.open("solicitudes.php?iddatos="+id, '_parent');
	}

    function llamarPaginaFamiliares(id){
	window.open("familiaresCliente2.php?iddatos="+id, '_parent');
	}


</script>

<style>
@media print {
body {-webkit-print-color-adjust: exact;}
}</style>

</head>
<body>
</div>
</div>
<center>
 
<section class="main container">
<div class="container">
<article class="post clearfix"><a href="#" class="thumb pull-left"><img src="../img/habitat.jpg" alt="espere un momento" class="img-responsive" width="100" height="100"></a>

<a class="thumb pull-right"><img src="../img/fedecredito.png" alt="espere un momento" class="img-responsive" width="100" height="100"></a>

</article>
</div>
</section> 
<?php
$numeroCliente=0;
$acumuladorS1=0;
$acumuladorS2=0;
$acumuladorS3=0;
$pCero=0;
include("../config/conexion.php");
				//		$query_s= pg_query($conexion, "select idcliente,nombres,apellidos,dui from cliente where idcliente='$idcliente' ");
				//		while($fila=pg_fetch_array($query_s)){ 

echo "<b>Proyecto:</b> “Reconstrucción de viviendas afectadas por Tormenta Amanda, Sistema FEDECRÉDITO y Hábitat para la Humanidad El Salvador”";
echo "<BR>";
echo "Agencia: San Vicente, Comunidad Hacienda Miramar, Municipio de San Vicente";
echo "<BR>";
echo "Nomina de familias seleccionadas";

        
						?>



    
        <div class="container-fluid"  style="margin: 50px 0;">
        <table id="grid" class="table table-bordered" cellspacing="1" width="100%">
        <thead class="thead-dark">

                <tr class="table-dark">
                    <th>No.</th>
                    <th>Nombres Solicitante</th>
                    <th>Apellidos Solicitante</th>
                    <th>DUI</th>
                    <th>NIT</th>
                    <th>Sexo</th>
                    <th>Puntaje Sección 1</th>
                    <th>Puntaje Sección 2</th>
                    <th>Puntaje Sección 3</th>
                    <th>Puntaje Sección 4</th>
                    <th>Puntaje Total</th>
                    <th>Estado</th>
                  
            
             
			
		
                </tr>
            </thead>

               <tbody>
               
               <?php
        include("../config/conexion.php");
					//	$query_s= pg_query($conexion, "select idcliente,nombres,apellidos,dui,telefono,direccion,municipio,departamento from cliente");
						$query_sw= pg_query($conexion, "SELECT c.idcliente,c.nombres,c.apellidos,c.dui,c.telefono,c.direccion,c.municipio,c.departamento,c.sexo,s.idsolicitud,s.fecha,sv.materiales_paredes,c.nit from cliente as c,solicitud as s,situacion_economica_familiar as sef,solicitud_situacion_ec as secf,situacion_salud as ss,solicitud_situacion_salud as sss,situacion_vivienda as sv,solicitud_situacion_vivienda ssv,situacion_organizacion as so,solicitud_situacion_organizacion sso,situacion_enfoque_genero as sg,solicitud_situacion_enfoque_genero ssg,datos_finales_es as df,cliente_agencia as cla WHERE c.idcliente=s.idcliente and s.idsolicitud=secf.idsolicitud and sef.idsituacion=secf.idsituacion and ss.id_situacion_salud=sss.id_situacion_salud and sss.idsolicitud=s.idsolicitud and sv.id_situacion_vivienda=ssv.id_situacion_vivienda and ssv.idsolicitud=s.idsolicitud and so.id_situacion_organizacion=sso.id_situacion_organizacion and sso.idsolicitud=s.idsolicitud and sg.id_situacion_enfoque_genero=ssg.id_situacion_enfoque_genero and ssg.idsolicitud=s.idsolicitud and df.idsolicitud=s.idsolicitud and cla.idcliente=c.idcliente and cla.idagencia='$idagencia' ");
						while($filaw=pg_fetch_array($query_sw)){
			  ?> 



<?php include("../docs/paraGraficar.php"); ?>
            
<?php
$aux=0;
$aux=$acumulador;
$aux1=0;
$aux1=$acumuladorS1;
$aux2=0;
$aux2=$acumuladorS2;
$aux3=0;
$aux3=$acumuladorS3;

if($acumulador>=45){ 
   $numeroCliente=$numeroCliente+1;
   ?>

            <tr>
                <td align="center" style="font-size:15px"><?php echo $numeroCliente; ?></td>
                <td align="center" style="font-size:15px"><?php echo $filaw[1]; ?></td>
                <td align="center" style="font-size:15px"><?php echo $filaw[2]; ?></td>
                <td align="center" style="font-size:15px"><?php echo $filaw[3]; ?></td>
                <td align="center" style="font-size:15px"><?php echo $filaw[12]; ?></td>
                <td align="center" style="font-size:15px"><?php echo $filaw[8]; ?></td>
                <td align="center" style="font-size:15px"><?php echo $aux1; ?></td>
                <td align="center" style="font-size:15px"><?php echo $aux2; ?></td>
                <td align="center" style="font-size:15px"><?php echo $aux3; ?></td>
                <td align="center" style="font-size:15px"><?php echo "0"; ?></td>
                <td align="center" style="font-size:15px"><?php echo $aux; ?></td>
                <td align="center" style="font-size:15px"><?php echo 'CALIFICA'; ?></td>
                
            </tr>




	         <?php
						}
							?>
                     	<?php	}?>
	   
	   </tbody>
            <tr>

            </tr>
    </table>
	
	</div>
	   

     
	
</body>
</html>

 