<?php session_start();
if($_SESSION['autenticado']!="yeah"){
    header("Location: ../index.php");
      exit();
      }
      include("../config/conexion.php");

      date_default_timezone_set('America/El_Salvador');
    $cont2=0;

    


    
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
$acumulador=0;
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
                    <th>Edad (AÑOS)</th>
                    <th>Genero</th>
                    <th>No personas viviendo en la casa</th>
                    <th>Dirección</th>
                    <th>Fuente de Ingresos</th>
                    <th>Rango de Ingreso Total Ingreso Familia</th>
                    <th>condiciones de vivienda actual</th>
                    <th>Esatus de la propiedad</th>
                    <th>Nombre del dueño de la propiedad</th>
                    <th>Observacion</th>
                </tr>
            </thead>

               <tbody>
               
			    <?php
                $query_s= pg_query($conexion, "	select
                cliente.nombres,
                cliente.apellidos,
                cliente.edad,
                cliente.sexo,
                cliente.grupo_familiar,
                cliente.direccion,
                cliente.ocupacion,
                cliente.ingresos_pro,
                situacion_vivienda.materiales_paredes,
                situacion_vivienda.tenencia,
                situacion_vivienda.nombre,
                datos_finales_es.comentario_clave
                FROM
                cliente
                INNER JOIN solicitud ON solicitud.idcliente = cliente.idcliente
                INNER JOIN solicitud_situacion_vivienda ON solicitud_situacion_vivienda.idsolicitud = solicitud.idsolicitud
                INNER JOIN situacion_vivienda ON solicitud_situacion_vivienda.id_situacion_vivienda = situacion_vivienda.id_situacion_vivienda
                INNER JOIN datos_finales_es ON datos_finales_es.idsolicitud = solicitud.idsolicitud ");
                                  while($fila=pg_fetch_array($query_s)){
                                      $acumulador=$acumulador+1;
                              
                                ?>

            
            <tr>
                <td align="center" style="font-size:15px"><?php echo $acumulador; ?></td>
                <td align="center" style="font-size:15px"><?php echo $fila[0]; ?></td>
                <td align="center" style="font-size:15px"><?php echo $fila[1]; ?></td>
                <td align="center" style="font-size:15px"><?php echo $fila[2]; ?></td>
                <td align="center" style="font-size:15px"><?php echo $fila[3]; ?></td>
                <td align="center" style="font-size:15px"><?php echo $fila[4]; ?></td>
                <td align="center" style="font-size:15px"><?php echo $fila[5]; ?></td>
                <td align="center" style="font-size:15px"><?php echo $fila[6]; ?></td>
                <td align="center" style="font-size:15px"><?php echo $fila[7]; ?></td>
                <td align="center" style="font-size:15px"><?php echo $fila[8]; ?></td>
                <td align="center" style="font-size:15px"><?php echo $fila[9]; ?></td>
                <td align="center" style="font-size:15px"><?php echo $fila[10]; ?></td>
                <td align="center" style="font-size:15px"><?php echo $fila[11]; ?></td>
            </tr>




	         <?php
						}
							?>
	   
	   </tbody>
            <tr>

            </tr>
    </table>
	
	</div>
	   

	   
      
    
	
</body>
</html>

 