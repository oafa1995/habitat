<?php session_start();
if($_SESSION['autenticado']!="yeah"){
    header("Location: ../index.php");
      exit();
      }
      include("../config/conexion.php");

      date_default_timezone_set('America/El_Salvador');
    $cont2=0;
    $idcliente=$_REQUEST["iddatos"];
    $idsolicitud=$_REQUEST["iddatos2"];
  //  $anio_actual=date("Y");//año
    $idusuario=$_SESSION["idUsuario"];

    $query_s2=pg_query($conexion,"select nombres,apellidos,dui,sexo from cliente where idcliente='$idcliente' ");
	while($fila=pg_fetch_array($query_s2)){
        $nombre=$fila[0];
        $apellido=$fila[1];
        $dui=$fila[2];
        $sexo=$fila[3];
    }


    
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
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
echo "Calificación de Estudio socio-económico para selección de familias";
echo "<BR>";
echo "<b>Nombre de Jefe de Familia: </b>";
          echo $nombre." ".$apellido."   ";
          echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>DUI:</b> ";
echo $dui;
//                        } Genero del cliente
if($sexo == "masculino"){
    $puntajesexo=1;
    $acumulador=$acumulador+$puntajesexo;
                     }else{
                        $puntajesexo=2;
                        $acumulador=$acumulador+$puntajesexo;
                     }
                   
    
    ///Cantidad de familias en la casa 
     $query_s= pg_query($conexion, "select grupo_familiar from cliente where idcliente='$idcliente' ");
                while($fila=pg_fetch_array($query_s)){
                  $grupoF=$fila[0];
                     }
    
                     if($grupoF == "1"){
    $Pgrupo=0;
    $acumulador=$acumulador+0;
                     }else{
                        $Pgrupo=2;
                        $acumulador=$acumulador+2;
                     }
    
    /////edad familiarez
    $Pedad=0;
    $query_s= pg_query($conexion, "select familiares_cliente.edad
    FROM familiares_cliente
    WHERE familiares_cliente.idcliente ='$idcliente' ");
                while($fila=pg_fetch_array($query_s)){
                  $edadF=$fila[0];
                  if($edadF >= 60 || $edadF <= 18){
                     $Pedad= $Pedad +3;
                     $acumulador=$acumulador+3;
                      }else{
                         $Pedad=$Pedad +0;
                         $acumulador=$acumulador+0;
                      }
                     }
                     
    ////Escolaridad
    $query_s= pg_query($conexion, "select cliente.escolaridad
    FROM cliente
    WHERE cliente.idcliente ='$idcliente' ");
    while($fila=pg_fetch_array($query_s)){
    $escolaridad=$fila[0];
     }
    
     if($escolaridad == "ninguno"){
    $Pescolaridad=2;
    $acumulador=$acumulador+$Pescolaridad;
     }else{
        $Pescolaridad=1;
        $acumulador=$acumulador+$Pescolaridad;
     }
     ////Ocupacion
    $query_s= pg_query($conexion, "select cliente.ocupacion
    FROM cliente
    WHERE cliente.idcliente ='$idcliente' ");
    while($fila=pg_fetch_array($query_s)){
    $ocupacion=$fila[0];
     }
    
     if($ocupacion == "empleada domestica"){
    $Pocupacion=3;
    $acumulador=$acumulador+$Pocupacion;
     }elseif($ocupacion == "ninguna"){
        $Pocupacion=0;
        $acumulador=$acumulador+$Pocupacion;
     }elseif($ocupacion == "empleado" || $ocupacion == "estudiante" || $ocupacion == "sin trabajo" || $ocupacion == "otro" || $ocupacion == "oficios domesticos"){
        $Pocupacion=1;
        $acumulador=$acumulador+$Pocupacion;
     } else {
        $Pocupacion=2;
        $acumulador=$acumulador+$Pocupacion;
     }
      ////ingresos promedios jefe familia
    $query_s= pg_query($conexion, "select cliente.ingresos_pro
    FROM cliente
    WHERE cliente.idcliente = '$idcliente' ");
    while($fila=pg_fetch_array($query_s)){
    $ingresos=$fila[0];
     }
    
     if($ingresos == "100 a 200"){
    $Pingresos=4;
    $acumulador=$acumulador+$Pingresos;
     }elseif($ingresos == "200 a 300"){
        $Pingresos=2;
        $acumulador=$acumulador+$Pingresos;
     }elseif($ingresos == "mas mas 750"){
        $Pingresos=0;
        $acumulador=$acumulador+$Pingresos;
     } else {
        $Pingresos=1;
        $acumulador=$acumulador+$Pingresos;
     }
    ////discapacidad jefe familia
    $query_s= pg_query($conexion, "select cliente.discapacidad
    FROM cliente
    WHERE cliente.idcliente = '$idcliente' ");
    while($fila=pg_fetch_array($query_s)){
    $discapacidad=$fila[0];
     }
    
     if($discapacidad == "ninguna"){
    $Pdiscapacidad=0;
    $acumulador=$acumulador+$Pdiscapacidad;
     } else {
        $Pdiscapacidad=2;
        $acumulador=$acumulador+$Pdiscapacidad;
     }
       ////discapacidad familiares
    $query_s= pg_query($conexion, "select familiares_cliente.discapacidad
    FROM familiares_cliente
    WHERE familiares_cliente.idcliente = '$idcliente' ");
    while($fila=pg_fetch_array($query_s)){
        $discapacidad=$fila[0];
        if($discapacidad == "ninguna"){
            $Pdiscapacidad=$Pdiscapacidad + 0;
            $acumulador=$acumulador+0;
             } else {
                $Pdiscapacidad=$Pdiscapacidad +2;
                $acumulador=$acumulador+2;
             }
         }
    ////Fuente de ingresos
                     $query_s= pg_query($conexion, "select situacion_economica_familiar.principal_fuente_ingreso FROM situacion_economica_familiar INNER JOIN solicitud_situacion_ec ON solicitud_situacion_ec.idsituacion = situacion_economica_familiar.idsituacion WHERE solicitud_situacion_ec.idsolicitud ='$idsolicitud' ");
                     while($fila=pg_fetch_array($query_s)){
                           $fuente=$fila[0];
                              }
             
                              if($fuente == "Negocio"){
             $Pfuente=3;
             $acumulador=$acumulador+$Pfuente;
                              } elseif($fuente == "Oficio") {
                                $Pfuente=3;
                                $acumulador=$acumulador+$Pfuente;
                              } elseif($fuente == "Pensión") {
                                $Pfuente=2;
                                $acumulador=$acumulador+$Pfuente;
                              } else{
                                $Pfuente=1;
                                $acumulador=$acumulador+$Pfuente;
                              }
    ////recibe remesas
    $query_s= pg_query($conexion, "select situacion_economica_familiar.recibe_remesa FROM situacion_economica_familiar INNER JOIN solicitud_situacion_ec ON solicitud_situacion_ec.idsituacion = situacion_economica_familiar.idsituacion WHERE solicitud_situacion_ec.idsolicitud = '$idsolicitud' ");
                while($fila=pg_fetch_array($query_s)){
                  $remesa=$fila[0];
                     }
    
                     if($remesa == "Si"){
    $puntajeRemesa=1;
    $acumulador=$acumulador+$puntajeRemesa;
                     }else{
                        $puntajeRemesa=2;
                        $acumulador=$acumulador+$puntajeRemesa;
                     }
    ///total de ingresos mensuales
    $query_s= pg_query($conexion, "select 
    situacion_economica_familiar.ingresos_hogar
    FROM situacion_economica_familiar
    INNER JOIN solicitud_situacion_ec ON solicitud_situacion_ec.idsituacion = situacion_economica_familiar.idsituacion
    WHERE solicitud_situacion_ec.idsolicitud = '$idsolicitud' ");
                      while($fila=pg_fetch_array($query_s)){
                    $respuesta=$fila[0];
                       }
      
                       if($respuesta == "Entre 100 a 200"){
      $puntajeIngresos=3;
      $acumulador=$acumulador+$puntajeIngresos;
                       }elseif($respuesta == "Entre 201 a 300" ){
                          $puntajeIngresos=2;
                          $acumulador=$acumulador+$puntajeIngresos;
                       } elseif($respuesta == "Mayor a 750" || $respuesta == "Ninguno") {
                          $puntajeIngresos=0;
                          $acumulador=$acumulador+$puntajeIngresos;
                       } else {
                        $puntajeIngresos=1;
                        $acumulador=$acumulador+$puntajeIngresos;
                       }
    ////ingresos ultimos 3 meses
    $query_s= pg_query($conexion, "select situacion_economica_familiar.ingresos_afectados FROM situacion_economica_familiar INNER JOIN solicitud_situacion_ec ON solicitud_situacion_ec.idsituacion = situacion_economica_familiar.idsituacion WHERE solicitud_situacion_ec.idsolicitud = '$idsolicitud' ");
                while($fila=pg_fetch_array($query_s)){
                  $respuesta=$fila[0];
                     }
    
                     if($respuesta == "Disminuyeron"){
    $puntajeMeses=2;
    $acumulador=$acumulador+$puntajeMeses;
                     }elseif($respuesta == "Se mantuvieron"){
                        $puntajeMeses=1;
                        $acumulador=$acumulador+$puntajeMeses;
                     } else {
                         $puntajeMeses=0;
                         $acumulador=$acumulador+$puntajeMeses;
                     }
    ///Razon afecrtaron ingresos
    $query_s= pg_query($conexion, "select situacion_economica_familiar.razon_afectacion FROM situacion_economica_familiar INNER JOIN solicitud_situacion_ec ON solicitud_situacion_ec.idsituacion = situacion_economica_familiar.idsituacion WHERE solicitud_situacion_ec.idsolicitud = '$idsolicitud' ");
                while($fila=pg_fetch_array($query_s)){
                  $razon=$fila[0];
                     }
    
                     if($razon == "Enfermedad" || $razon == "Despedido de empleo" || $razon == "Inseguridad Social"){
    $puntajeRazon=3;
    $acumulador=$acumulador+$puntajeRazon;
                     }elseif($razon == "COVID" || $razon == "Desastre natural"){
                        $puntajeRazon=4;
                        $acumulador=$acumulador+$puntajeRazon;
                     } elseif($razon == "Disminución de las ventas") {
                         $puntajeRazon=2;
                         $acumulador=$acumulador+$puntajeRazon;
                     }elseif($razon == "Ninguno") {
                        $puntajeRazon=0;
                        $acumulador=$acumulador+$puntajeRazon;
                    } else{
                        $puntajeRazon=1;
                        $acumulador=$acumulador+$puntajeRazon;
                        
                     }
                     $acumuladorS1=$acumulador;
    ///Tenencia de la propiedad
    $query_s= pg_query($conexion, "select situacion_vivienda.tenencia FROM situacion_vivienda INNER JOIN solicitud_situacion_vivienda ON solicitud_situacion_vivienda.id_situacion_vivienda = situacion_vivienda.id_situacion_vivienda WHERE solicitud_situacion_vivienda.idsolicitud = '$idsolicitud' ");
                     while($fila=pg_fetch_array($query_s)){
                   $respuesta=$fila[0];
                      }
     
                      if($respuesta == "Propia"){
     $puntajeTenencia=3;
     $acumulador=$acumulador+$puntajeTenencia;
                      }elseif($respuesta == "Familiar" || $respuesta == "Prestada"){
                         $puntajeTenencia=2;
                         $acumulador=$acumulador+$puntajeTenencia;
                      } else {
                         $puntajeTenencia=1;
                         $acumulador=$acumulador+$puntajeTenencia;
                         
                      }
    ///registrada la escritura
                      $query_s= pg_query($conexion, "select situacion_vivienda.registrada FROM situacion_vivienda 
                      INNER JOIN solicitud_situacion_vivienda ON solicitud_situacion_vivienda.id_situacion_vivienda = situacion_vivienda.id_situacion_vivienda 
                      WHERE solicitud_situacion_vivienda.idsolicitud = '$idsolicitud' ");
                      while($fila=pg_fetch_array($query_s)){
                    $respuesta=$fila[0];
                       }
      
                       if($respuesta == "Si"){
      $puntajeEscritura=2;
      $acumulador=$acumulador+$puntajeEscritura;
                       }elseif($respuesta == "No"){
                          $puntajeEscritura=0;
                          $acumulador=$acumulador+$puntajeEscritura;
                       } else {
                          $puntajeEscritura=1;
                          $acumulador=$acumulador+$puntajeEscritura;
                          
                       }
    ///No ha legalizado la propiedad
    $query_s= pg_query($conexion, "select situacion_vivienda.pro_legal FROM situacion_vivienda 
    INNER JOIN solicitud_situacion_vivienda ON solicitud_situacion_vivienda.id_situacion_vivienda = situacion_vivienda.id_situacion_vivienda
    WHERE solicitud_situacion_vivienda.idsolicitud = '$idsolicitud' ");
                      while($fila=pg_fetch_array($query_s)){
                    $respuesta=$fila[0];
                       }
      
                       if($respuesta == "lotificacion ilegal"){
      $puntajeLegal=2;
      $acumulador=$acumulador+$puntajeLegal;
                       }elseif($respuesta == "razones economicas"){
                          $puntajeLegal=3;
                          $acumulador=$acumulador+$puntajeLegal;
                       } elseif($respuesta== "no aplica") {
                          $puntajeLegal=0;
                          $acumulador=$acumulador+$puntajeLegal;
                          
                       } else {
                        $puntajeLegal=1;
                        $acumulador=$acumulador+$puntajeLegal;
                        
                     }
    ///Numero de espacios
    $query_s= pg_query($conexion, "select situacion_vivienda.espacios FROM situacion_vivienda INNER JOIN solicitud_situacion_vivienda ON solicitud_situacion_vivienda.id_situacion_vivienda = situacion_vivienda.id_situacion_vivienda WHERE solicitud_situacion_vivienda.idsolicitud = '$idsolicitud' ");
                      while($fila=pg_fetch_array($query_s)){
                    $respuestaEspacios=$fila[0];
                       }
      
                       if($respuestaEspacios == "1"){
      $puntajeEspacios=2;
      $acumulador=$acumulador+$puntajeEspacios;
                       }elseif($respuestaEspacios == "2"){
                          $puntajeEspacios=1;
                          $acumulador=$acumulador+$puntajeEspacios;
                       } else {
                          $puntajeEspacios=0;
                          $acumulador=$acumulador+$puntajeEspacios;
                          
                       }
    /// material de la vivienda
    $query_s= pg_query($conexion, "select
    situacion_vivienda.materiales_paredes
    FROM situacion_vivienda INNER JOIN solicitud_situacion_vivienda ON solicitud_situacion_vivienda.id_situacion_vivienda = situacion_vivienda.id_situacion_vivienda
    WHERE solicitud_situacion_vivienda.idsolicitud = '$idsolicitud' ");
                      while($fila=pg_fetch_array($query_s)){
                    $respuestaMate=$fila[0];
                    if($respuestaMate=="Bloque" || $respuestaMate=="Ladrillo" || $respuestaMate=="Otro"){
                        $puntajeMaterial=1;
                        $acumulador=$acumulador+$puntajeMaterial;
                                         } else {
                                            $puntajeMaterial=3;
                                            $acumulador=$acumulador+$puntajeMaterial;
                                         }
                       }
    ///material de techo
    $query_s= pg_query($conexion, "select
    situacion_vivienda.materiales_techo
    FROM situacion_vivienda INNER JOIN solicitud_situacion_vivienda ON solicitud_situacion_vivienda.id_situacion_vivienda = situacion_vivienda.id_situacion_vivienda
    WHERE solicitud_situacion_vivienda.idsolicitud = '$idsolicitud' ");
                      while($fila=pg_fetch_array($query_s)){
                    $respuestaTecho=$fila[0];
                    if($respuestaTecho == "Plástico" || $respuestaTecho == "Palma"){
                        $puntajeTecho=3;
                        $acumulador=$acumulador+$puntajeTecho;
                                         } elseif($respuestaTecho == "Lámina") {
                                            $puntajeTecho=2;
                                            $acumulador=$acumulador+$puntajeTecho;
                                         } else {
                                            $puntajeTecho=1;
                                            $acumulador=$acumulador+$puntajeTecho;
                                         }
                       }
    ///material de piso
    $query_s= pg_query($conexion, "select
    situacion_vivienda.materiales_piso
    FROM situacion_vivienda INNER JOIN solicitud_situacion_vivienda ON solicitud_situacion_vivienda.id_situacion_vivienda = situacion_vivienda.id_situacion_vivienda
    WHERE solicitud_situacion_vivienda.idsolicitud = '$idsolicitud' ");
                      while($fila=pg_fetch_array($query_s)){
                    $respuestaPiso=$fila[0];
                    if($respuestaPiso == "Tierra"){
                        $puntajePiso=3;
                        $acumulador=$acumulador+$puntajePiso;
                                         } elseif($respuestaPiso == "Cemento") {
                                            $puntajePiso=2;
                                            $acumulador=$acumulador+$puntajePiso;
                                         } elseif($respuestaPiso == "Cerámica") {
                                            $puntajePiso=0;
                                            $acumulador=$acumulador+$puntajePiso;
                                         } else {
                                          $puntajePiso=1;
                                          $acumulador=$acumulador+$puntajePiso;
                                         }
                       }
    ///partes dañanas vivienda modificar ninguna y poner toda la vivienda
    $query_s= pg_query($conexion, "select
    situacion_vivienda.partes_danadas
    FROM situacion_vivienda INNER JOIN solicitud_situacion_vivienda ON solicitud_situacion_vivienda.id_situacion_vivienda = situacion_vivienda.id_situacion_vivienda
    WHERE solicitud_situacion_vivienda.idsolicitud = '$idsolicitud' ");
                      while($fila=pg_fetch_array($query_s)){
                    $respuestaPartes=$fila[0];
                       }
                       $acumuladorActual = $acumulador;
                       $palabras = explode(", ", $respuestaPartes);
                       $cantiPala = str_word_count($respuestaPartes);
                       for($i = 0; $i < $cantiPala; $i++){  
                    if($palabras[$i] == "Techo" || $palabras[$i] == "Paredes"){
                        $puntajePartes=2;
                        $acumulador=$acumulador+$puntajePartes;
                                         } elseif($palabras[$i] == "Piso" || $palabras[$i] == "Baño") {
                                            $puntajePartes=1;
                                            $acumulador=$acumulador+$puntajePartes;
                                         } elseif($palabras[$i] == "Toda la vivienda") {
                                            $puntajePartes=3;
                                            $acumulador=$acumulador+$puntajePartes;
                                         } elseif($palabras[$i] == "Ninguna") {
                                            $puntajePartes=0;
                                            $acumulador=$acumulador+$puntajePartes;
                                         } else {
                                          $puntajePartes=0.5;
                                          $acumulador=$acumulador+$puntajePartes;
                                         }
                                         }
                                         $puntajePartes=$acumulador - $acumuladorActual;
    /// agua potable
    $query_s= pg_query($conexion, "select
    situacion_vivienda.agua_potable
    FROM situacion_vivienda INNER JOIN solicitud_situacion_vivienda ON solicitud_situacion_vivienda.id_situacion_vivienda = situacion_vivienda.id_situacion_vivienda
    WHERE solicitud_situacion_vivienda.idsolicitud = '$idsolicitud' ");
                      while($fila=pg_fetch_array($query_s)){
                    $respuestaAgua=$fila[0];
                   ///echo $respuestaAgua;
                       }
                       if($respuestaAgua == "Si"){
      $puntajeAgua=0;
      $acumulador=$acumulador+$puntajeAgua;
                       } else {
                        $puntajeAgua=1;
                        $acumulador=$acumulador+$puntajeAgua;
                       }
    ///abastece agua potable
    $query_s= pg_query($conexion, "select
    situacion_vivienda.abastece_agua
    FROM situacion_vivienda INNER JOIN solicitud_situacion_vivienda ON solicitud_situacion_vivienda.id_situacion_vivienda = situacion_vivienda.id_situacion_vivienda
    WHERE solicitud_situacion_vivienda.idsolicitud = '$idsolicitud' ");
                      while($fila=pg_fetch_array($query_s)){
                    $respuestaAbastece=$fila[0];
                   //echo $respuestaAbastece;
                       }
                       if($respuestaAbastece == "Domiciliar"){
      $puntajeAbastece=0;
      $acumulador=$acumulador+$puntajeAbastece;
                       } elseif($respuestaAbastece == "Otro") {
                        $puntajeAbastece=1;
                        $acumulador=$acumulador+$puntajeAbastece;
                       } else {
                        $puntajeAbastece=2;
                        $acumulador=$acumulador+$puntajeAbastece;
                       }
    ///energia electrica
    $query_s= pg_query($conexion, "select
    situacion_vivienda.energia_electrica
    FROM situacion_vivienda INNER JOIN solicitud_situacion_vivienda ON solicitud_situacion_vivienda.id_situacion_vivienda = situacion_vivienda.id_situacion_vivienda
    WHERE solicitud_situacion_vivienda.idsolicitud = '$idsolicitud' ");
                      while($fila=pg_fetch_array($query_s)){
                    $respuestaEnergia=$fila[0];
                   ///echo $respuestaAgua;
                       }
                       if($respuestaEnergia == "Si"){
      $puntajeEnergia=0;
      $acumulador=$acumulador+$puntajeEnergia;
                       } else {
                        $puntajeEnergia=1;
                        $acumulador=$acumulador+$puntajeEnergia;
                       }
    ///energia electrica abastece
    $query_s= pg_query($conexion, "select
    situacion_vivienda.abastece_energia
    FROM situacion_vivienda INNER JOIN solicitud_situacion_vivienda ON solicitud_situacion_vivienda.id_situacion_vivienda = situacion_vivienda.id_situacion_vivienda
    WHERE solicitud_situacion_vivienda.idsolicitud = '$idsolicitud' ");
                      while($fila=pg_fetch_array($query_s)){
                    $respuestaEnergia2=$fila[0];
                   ///echo $respuestaAgua;
                       }
                       if($respuestaEnergia2 == "Propia"){
                         $puntajeEnergia2=0;
                         $acumulador=$acumulador+$puntajeEnergia2;
                       } elseif($respuestaEnergia2 == "Otros") {
                        $puntajeEnergia2=1;
                        $acumulador=$acumulador+$puntajeEnergia2;
                       } else {
                        $puntajeEnergia2=2;
                        $acumulador=$acumulador+$puntajeEnergia2;
                       }
    ///servicio sanitario
    $query_s= pg_query($conexion, "select
    situacion_vivienda.tipo_sanitario
    FROM situacion_vivienda INNER JOIN solicitud_situacion_vivienda ON solicitud_situacion_vivienda.id_situacion_vivienda = situacion_vivienda.id_situacion_vivienda
    WHERE solicitud_situacion_vivienda.idsolicitud = '$idsolicitud' ");
                      while($fila=pg_fetch_array($query_s)){
                    $respuestaSanitario=$fila[0];
                   ///echo $respuestaAgua;
                       }
                       if($respuestaSanitario == "Letrina de fosa" || $respuestaSanitario == "Letrina Abonera"){
                         $puntajeSanitario=1;
                         $acumulador=$acumulador+$puntajeSanitario;
                       } elseif($respuestaSanitario == "Sistema de lavar") {
                        $puntajeSanitario=0;
                        $acumulador=$acumulador+$puntajeSanitario;
                       } else {
                        $puntajeSanitario=2;
                        $acumulador=$acumulador+$puntajeSanitario;
                       }
    ///combustible para cocinar
    $query_s= pg_query($conexion, "select
    situacion_vivienda.combustible_cocina
    FROM situacion_vivienda INNER JOIN solicitud_situacion_vivienda ON solicitud_situacion_vivienda.id_situacion_vivienda = situacion_vivienda.id_situacion_vivienda
    WHERE solicitud_situacion_vivienda.idsolicitud = '$idsolicitud' ");
                      while($fila=pg_fetch_array($query_s)){
                    $respuestaCombustible=$fila[0];
                   ///echo $respuestaAgua;
                       }
                       if($respuestaCombustible == "Leña" || $respuestaCombustible == "Carbon"){
      $puntajeCombustible=1;
      $acumulador=$acumulador+$puntajeCombustible;
                       } else {
                        $puntajeCombustible=0;
                        $acumulador=$acumulador+$puntajeCombustible;
                       }
    ///equipamiento de la casa
    $query_s= pg_query($conexion, "select
    situacion_vivienda.equipo_vivienda
    FROM situacion_vivienda INNER JOIN solicitud_situacion_vivienda ON solicitud_situacion_vivienda.id_situacion_vivienda = situacion_vivienda.id_situacion_vivienda
    WHERE solicitud_situacion_vivienda.idsolicitud = '$idsolicitud' ");
                      while($fila=pg_fetch_array($query_s)){
                    $respuestaEquipo=$fila[0];
                       }
                       
                       if($respuestaEquipo == "Ninguno"){
                        $puntajeEquipo=2;
                        $acumulador=$acumulador+$puntajeEquipo;
                    } elseif($respuestaEquipo =="Todos los anteriores") {
                        $puntajeEquipo=1.2;
                        $acumulador=$acumulador+$puntajeEquipo;
                    } else {
                        $acumuladorActual = $acumulador;
                       $palabras = explode(", ", $respuestaEquipo);
                       $cantiPala = count($palabras);
                       for($i = 0; $i < $cantiPala; $i++){
                        $puntajeEquipo=0.15;
                        $acumulador=$acumulador+$puntajeEquipo;
                                         }
                                        }
                                        $puntajeEquipo=$acumulador - $acumuladorActual;
    /// tiene telefono celular
    $query_s= pg_query($conexion, "select
    situacion_vivienda.posee_telefono
    FROM situacion_vivienda INNER JOIN solicitud_situacion_vivienda ON solicitud_situacion_vivienda.id_situacion_vivienda = situacion_vivienda.id_situacion_vivienda
    WHERE solicitud_situacion_vivienda.idsolicitud = '$idsolicitud' ");
                      while($fila=pg_fetch_array($query_s)){
                    $respuestaTelefono=$fila[0];
                   ///echo $respuestaAgua;
                       }
                       if($respuestaTelefono=="Si"){
      $puntajeTelefono=1;
      $acumulador=$acumulador+$puntajeTelefono;
                       } else {
                        $puntajeTelefono=2;
                        $acumulador=$acumulador+$puntajeTelefono;
                       }
    //// tiene cable de television
    $query_s= pg_query($conexion, "select
    situacion_vivienda.cable 
    FROM situacion_vivienda INNER JOIN solicitud_situacion_vivienda ON solicitud_situacion_vivienda.id_situacion_vivienda = situacion_vivienda.id_situacion_vivienda
    WHERE solicitud_situacion_vivienda.idsolicitud = '$idsolicitud' ");
                      while($fila=pg_fetch_array($query_s)){
                    $respuestaCable=$fila[0];
                   ///echo $respuestaAgua;
                       }
                       if($respuestaCable=="Si"){
      $puntajeCable=0;
      $acumulador=$acumulador+$puntajeCable;
                       } else {
                        $puntajeCable=1;
                        $acumulador=$acumulador+$puntajeCable;
                       }
    /// tiene internet
    $query_s= pg_query($conexion, "select
    situacion_vivienda.internet 
    FROM situacion_vivienda INNER JOIN solicitud_situacion_vivienda ON solicitud_situacion_vivienda.id_situacion_vivienda = situacion_vivienda.id_situacion_vivienda
    WHERE solicitud_situacion_vivienda.idsolicitud = '$idsolicitud' ");
                      while($fila=pg_fetch_array($query_s)){
                    $respuestaInter=$fila[0];
                   ///echo $respuestaAgua;
                       }
                       if($respuestaInter=="Si"){
      $puntajeInter=0;
      $acumulador=$acumulador+$puntajeInter;
                       } else {
                        $puntajeInter=1;
                        $acumulador=$acumulador+$puntajeInter;
                       }
    ///Afectacion de vivienda
    $query_s= pg_query($conexion, "select
    situacion_vivienda.vivienda_afectada 
    FROM situacion_vivienda INNER JOIN solicitud_situacion_vivienda ON solicitud_situacion_vivienda.id_situacion_vivienda = situacion_vivienda.id_situacion_vivienda
    WHERE solicitud_situacion_vivienda.idsolicitud = '$idsolicitud' ");
                      while($fila=pg_fetch_array($query_s)){
                    $respuestaAfectada=$fila[0];
                   ///echo $respuestaAgua;
                       }
                       if($respuestaAfectada=="Si"){
      $puntajeAfectada=3;
      $acumulador=$acumulador+$puntajeAfectada;
                       } else {
                        $puntajeAfectada=0;
                        $acumulador=$acumulador+$puntajeAfectada;
                       }
    ///// evento de afectacion 
    $query_s= pg_query($conexion, "select
    situacion_vivienda.evento_dano
    FROM situacion_vivienda INNER JOIN solicitud_situacion_vivienda ON solicitud_situacion_vivienda.id_situacion_vivienda = situacion_vivienda.id_situacion_vivienda
    WHERE solicitud_situacion_vivienda.idsolicitud = '$idsolicitud' ");
                      while($fila=pg_fetch_array($query_s)){
                    $respuestaEvento=$fila[0];
                   ///echo $respuestaAgua;
                       }
                       if($respuestaEvento=="Ninguno"){
      $puntajeEvento=0;
      $acumulador=$acumulador+$puntajeEvento;
                       } else {
                        $puntajeEvento=1;
                        $acumulador=$acumulador+$puntajeEvento;
                       }
    ///// nivel de afectacion 
    $query_s= pg_query($conexion, "select
    situacion_vivienda.nivel_afectacion 
    FROM situacion_vivienda INNER JOIN solicitud_situacion_vivienda ON solicitud_situacion_vivienda.id_situacion_vivienda = situacion_vivienda.id_situacion_vivienda
    WHERE solicitud_situacion_vivienda.idsolicitud = '$idsolicitud' ");
                      while($fila=pg_fetch_array($query_s)){
                    $respuestaNivel=$fila[0];
                   ///echo $respuestaAgua;
                       }
                       if($respuestaNivel=="Pérdida completa de vivienda"){
      $puntajeNivel=3;
      $acumulador=$acumulador+$puntajeNivel;
                       } else {
                        $puntajeNivel=2;
                        $acumulador=$acumulador+$puntajeNivel;
                       }
    /// Riesgo de la comunidad
    $query_s= pg_query($conexion, "select
    situacion_vivienda.riesgo_comunidad
    FROM situacion_vivienda INNER JOIN solicitud_situacion_vivienda ON solicitud_situacion_vivienda.id_situacion_vivienda = situacion_vivienda.id_situacion_vivienda
    WHERE solicitud_situacion_vivienda.idsolicitud = '$idsolicitud' ");
                      while($fila=pg_fetch_array($query_s)){
                    $respuestaRiesgo=$fila[0];
                   ///echo $respuestaAgua;
                       }
                       if($respuestaRiesgo=="Si"){
      $puntajeRiesgo=2;
                       } else {
                        $puntajeRiesgo=0;
                        $acumulador=$acumulador+ 0;
                       }
    //// riesgo fisico
    $query_s= pg_query($conexion, "select
    situacion_vivienda.riesgo_fisico
    FROM situacion_vivienda INNER JOIN solicitud_situacion_vivienda ON solicitud_situacion_vivienda.id_situacion_vivienda = situacion_vivienda.id_situacion_vivienda
    WHERE solicitud_situacion_vivienda.idsolicitud = '$idsolicitud' ");
    while($fila=pg_fetch_array($query_s)){
        $respuestaRiesgo=$fila[0];
       ///echo $respuestaAgua;
           }
           $acumuladorActual = $acumulador;
           if($respuestaRiesgo=="Ninguno"){
    $puntajeRiesgo=$puntajeRiesgo +0;
           } else {
            $puntajeRiesgo=$puntajeRiesgo +1;
           }
           $acumulador = $acumuladorActual + $puntajeRiesgo;
    //// riesgo social
    $query_s= pg_query($conexion, "select
    situacion_vivienda.riesgo_social
    FROM situacion_vivienda INNER JOIN solicitud_situacion_vivienda ON solicitud_situacion_vivienda.id_situacion_vivienda = situacion_vivienda.id_situacion_vivienda
    WHERE solicitud_situacion_vivienda.idsolicitud = '$idsolicitud' ");
    while($fila=pg_fetch_array($query_s)){
        $respuestaRiesgo=$fila[0];
       ///echo $respuestaAgua;
           }
           $puntajeRiesgo2=0;
           if($respuestaRiesgo=="Ninguno"){
    $puntajeRiesgo2=$puntajeRiesgo2 +0;
           } else {
            $puntajeRiesgo2=$puntajeRiesgo2 +1;
           }
           if($puntajeRiesgo2 == $puntajeRiesgo){
               $puntajeRiesgo=$puntajeRiesgo + $puntajeRiesgo2;
            $acumulador=$acumulador+$puntajeRiesgo;
           }
    ////Acumulador seccion 2
    $acumuladorS2=$acumulador-$acumuladorS1;
    ////
    //// califica su salud familiar
    $query_s= pg_query($conexion, "select situacion_salud.salud_familiar
    FROM situacion_salud
    INNER JOIN solicitud_situacion_salud ON solicitud_situacion_salud.id_situacion_salud = situacion_salud.id_situacion_salud
    WHERE solicitud_situacion_salud.idsolicitud = '$idsolicitud' ");
                      while($fila=pg_fetch_array($query_s)){
                    $respuestaCalificacion=$fila[0];
                   ///echo $respuestaAgua;
                       }
                       if($respuestaCalificacion=="Regular"){
      $puntajeCalificacion=1;
      $acumulador=$acumulador+$puntajeCalificacion;
                       } elseif($respuestaCalificacion=="Mala") {
                        $puntajeCalificacion=2;
                        $acumulador=$acumulador+$puntajeCalificacion;
                       } else {
                        $puntajeCalificacion=0;
                        $acumulador=$acumulador+$puntajeCalificacion;
                       }
    //// enfermedad cronica
    $query_s= pg_query($conexion, "select situacion_salud.familiar_cronico
    FROM situacion_salud
    INNER JOIN solicitud_situacion_salud ON solicitud_situacion_salud.id_situacion_salud = situacion_salud.id_situacion_salud
    WHERE solicitud_situacion_salud.idsolicitud = '$idsolicitud' ");
                      while($fila=pg_fetch_array($query_s)){
                    $respuestaEfer=$fila[0];
                   ///echo $respuestaAgua;
                       }
                       if($respuestaEfer=="Si"){
      $puntajeEfer=2;
      $acumulador=$acumulador+$puntajeEfer;
                       } else {
                        $puntajeEfer=0;
                        $acumulador=$acumulador+$puntajeEfer;
                       }
    //// que enfermedad cronica posee 
    $query_s= pg_query($conexion, "select situacion_salud.enfermedad_cronica
    FROM situacion_salud
    INNER JOIN solicitud_situacion_salud ON solicitud_situacion_salud.id_situacion_salud = situacion_salud.id_situacion_salud
    WHERE solicitud_situacion_salud.idsolicitud = '$idsolicitud' ");
                      while($fila=pg_fetch_array($query_s)){
                    $respuestaEnfermedad=$fila[0];
                   ///echo $respuestaAgua;
                       }
                       $acumuladorActual = $acumulador;
                       $palabras = explode(", ", $respuestaEnfermedad);
                       $cantiPala = count($palabras);
                       for($i = 0; $i < $cantiPala; $i++){
                       if($palabras[$i]=="Otros"){
                        $puntajeEnfermedad=0.5;
                        $acumulador=$acumulador+$puntajeEnfermedad;
                       } elseif($palabras[$i]=="COVID-19") {
                        $puntajeEnfermedad=1;
                        $acumulador=$acumulador+$puntajeEnfermedad;
                       } elseif($palabras[$i]=="Cancer" || $palabras[$i]=="Insuficiencia Renal") {
                        $puntajeEnfermedad=3;
                        $acumulador=$acumulador+$puntajeEnfermedad;
                       } elseif ($palabras[$i]=="Ninguna") {
                        $puntajeEnfermedad=0;
                        $acumulador=$acumulador+$puntajeEnfermedad;
                       } else {
                        $puntajeEnfermedad=2;
                        $acumulador=$acumulador+$puntajeEnfermedad;
                       }
                    }
                    $puntajeEnfermedad=$acumulador-$acumuladorActual;
    //// tratamiento medico
    $query_s= pg_query($conexion, "select situacion_salud.tratamiento
    FROM situacion_salud
    INNER JOIN solicitud_situacion_salud ON solicitud_situacion_salud.id_situacion_salud = situacion_salud.id_situacion_salud
    WHERE solicitud_situacion_salud.idsolicitud = '$idsolicitud' ");
                      while($fila=pg_fetch_array($query_s)){
                    $respuestaTratamiento=$fila[0];
                   ///echo $respuestaAgua;
                       }
                       if($respuestaTratamiento=="Si"){
      $puntajeTratamiento=0;
      $acumulador=$acumulador+$puntajeTratamiento;
                       } elseif($respuestaTratamiento=="No") {
                        $puntajeTratamiento=2;
                        $acumulador=$acumulador+$puntajeTratamiento;
                       } else {
                        $puntajeTratamiento=0;
                        $acumulador=$acumulador+$puntajeTratamiento;
                       }
    //// preocupacion por comida 
    $query_s= pg_query($conexion, "select situacion_salud.acceso_alimento
    FROM situacion_salud
    INNER JOIN solicitud_situacion_salud ON solicitud_situacion_salud.id_situacion_salud = situacion_salud.id_situacion_salud
    WHERE solicitud_situacion_salud.idsolicitud = '$idsolicitud' ");
                      while($fila=pg_fetch_array($query_s)){
                    $respuestaComida=$fila[0];
                   ///echo $respuestaAgua;
                       }
                       if($respuestaComida=="Si"){
      $puntajeComida=2;
      $acumulador=$acumulador+$puntajeComida;
                       } elseif ($respuestaComida=="No") {
                        $puntajeComida=0;
                        $acumulador=$acumulador+$puntajeComida;
                       } else {
                        $puntajeComida=1;
                        $acumulador=$acumulador+$puntajeComida;
                       }
    //// en 3 meses se han quedado sin comida
    $query_s= pg_query($conexion, "select situacion_salud.desayuno
    FROM situacion_salud
    INNER JOIN solicitud_situacion_salud ON solicitud_situacion_salud.id_situacion_salud = situacion_salud.id_situacion_salud
    WHERE solicitud_situacion_salud.idsolicitud = '$idsolicitud' ");
                      while($fila=pg_fetch_array($query_s)){
                    $respuestaComida2=$fila[0];
                   ///echo $respuestaAgua;
                       }
                       if($respuestaComida2=="Si"){
      $puntajeComida2=2;
      $acumulador=$acumulador+$puntajeComida2;
                       } elseif ($respuestaComida2=="No") {
                        $puntajeComida2=0;
                        $acumulador=$acumulador+$puntajeComida2;
                       } else {
                        $puntajeComida2=1;
                        $acumulador=$acumulador+$puntajeComida2;
                       }
    //// menor sin comer
    $query_s= pg_query($conexion, "select situacion_salud.desayuno
    FROM situacion_salud
    INNER JOIN solicitud_situacion_salud ON solicitud_situacion_salud.id_situacion_salud = situacion_salud.id_situacion_salud
    WHERE solicitud_situacion_salud.idsolicitud = '$idsolicitud' ");
                      while($fila=pg_fetch_array($query_s)){
                    $respuestaMenor=$fila[0];
                   ///echo $respuestaAgua;
                       }
                       if($respuestaMenor=="Si"){
      $puntajeMenor=2;
      $acumulador=$acumulador+$puntajeMenor;
                       } elseif ($respuestaMenor=="No") {
                        $puntajeMenor=0;
                        $acumulador=$acumulador+$puntajeMenor;
                       } else {
                        $puntajeMenor=1;
                        $acumulador=$acumulador+$puntajeMenor;
                       }
                       
    ////Acumulador seccion 3
    $acumuladorS3=$acumulador-$acumuladorS1-$acumuladorS2;
    ////
                      ?>
    
    
                
 

     
     
     
        
        



    
        <div class="container-fluid"  style="margin: 50px 0;">
        <table id="grid" class="table table-bordered" cellspacing="1" width="100%">
        <thead class="thead-dark">
                <tr class="table-dark">
                    <th>Sección</th>
                    <th>Descripción</th>
                    <th># Pregunta</th>
                    <th>Literal</th>
                    <th>Puntos</th>
                  
            
             
			
		
                </tr>
            </thead>

               <tbody>
			    <?php
                        include("../config/conexion.php");
			//			$query_s= pg_query($conexion, "select idcliente,nombres,apellidos,dui,telefono,direccion,municipio,departamento from cliente");
		//				while($fila=pg_fetch_array($query_s)){
						?>
            <tr>
                <td align="center" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "1"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "2"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "3"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajesexo; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "4"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "5"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "6"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "Composición de Grupo Familiar"; ?></td>
                <td align="center" style="font-size:15px"><?php echo "7"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "8"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $Pgrupo; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "a"; ?></td>
                <td align="center" style="font-size:15px"><?php echo $Pedad; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "b"; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "c"; ?></td>
                <td align="center" style="font-size:15px"><?php echo $Pescolaridad; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "11"; ?></td>
                <td align="center" style="font-size:15px"><?php echo "d"; ?></td>
                <td align="center" style="font-size:15px"><?php echo $Pocupacion; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "e"; ?></td>
                <td align="center" style="font-size:15px"><?php echo $Pingresos; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "f"; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="center" style="font-size:15px"><?php echo "I. Datos Generales"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "g"; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "h"; ?></td>
                <td align="center" style="font-size:15px"><?php echo $Pdiscapacidad; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "12"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $Pfuente; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "13"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeRemesa; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "14"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "15"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "16"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "Situación Económica Familiar"; ?></td>
                <td align="center" style="font-size:15px"><?php echo "17"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeIngresos; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "18"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "19"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "20"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "21"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "22"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeMeses; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "23"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeRazon; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo "<b>SubTotal puntaje Sección I: </b>" .$acumuladorS1; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "24"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeTenencia; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "25"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeEscritura; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "26"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeLegal; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "Características de la vivienda"; ?></td>
                <td align="center" style="font-size:15px"><?php echo "27"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeEspacios; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "28"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeMaterial; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "29"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeTecho; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "30"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajePiso; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "31"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajePartes; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "32"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeAgua; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "33"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeAbastece; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "34"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeEnergia; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "Acceso a Servicios Básicos"; ?></td>
                <td align="center" style="font-size:15px"><?php echo "35"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeEnergia2; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "36"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeSanitario; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "37"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="center" style="font-size:15px"><?php echo "II. Vivienda"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "38"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "39"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeCombustible; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "40"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeEquipo; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "41"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeTelefono; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "Equipamiento de la Vivienda"; ?></td>
                <td align="center" style="font-size:15px"><?php echo "42"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "43"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeCable; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "44"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeInter; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "45"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeAfectada; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "46"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeEvento; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "47"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeNivel; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "Gestión de Riesgo"; ?></td>
                <td align="center" style="font-size:15px"><?php echo "48"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "49"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeRiesgo; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "50"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "51"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo "<b>SubTotal puntaje Sección II: </b>" .$acumuladorS2; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "52"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeCalificacion; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "53"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeEfer; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "54"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeEnfermedad; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "55"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeTratamiento; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "56"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "57"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "58"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="center" style="font-size:15px"><?php echo "III. Salud"; ?></td>
                <td align="center" style="font-size:15px"><?php echo "Condiciones de Salud Familiar"; ?></td>
                <td align="center" style="font-size:15px"><?php echo "59"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "60"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "61"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "62"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeComida; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "63"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeComida2; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "64"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $puntajeMenor; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "65"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "66"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo "<b>SubTotal puntaje Sección III: </b>" .$acumuladorS3; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "67"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "68"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "69"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="center" style="font-size:15px"><?php echo "IV. Organización Comunitaria"; ?></td>
                <td align="center" style="font-size:15px"><?php echo "Organización y convivencia comunitaria"; ?></td>
                <td align="center" style="font-size:15px"><?php echo "70"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "71"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "72"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "73"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="center" style="font-size:15px"><?php echo "V. Enfoque de Género"; ?></td>
                <td align="center" style="font-size:15px"><?php echo "Enfoque de Género"; ?></td>
                <td align="center" style="font-size:15px"><?php echo "74"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo "75"; ?></td>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="center" style="font-size:15px"><?php echo $pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>
                <td align="left" style="font-size:15px"><?php echo "<b>SubTotal puntaje Sección IV y V: </b>" .$pCero; ?></td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px"><?php echo ""; ?></td>

            <?php if($acumulador<45) {?>  
                <td align="left" style="font-size:15px;"><?php echo "<p style='color:#FF0000 !important;'>Total de puntaje de las 5 Secciones: " .$acumulador."</p>"; ?></td>
            <?php }?>
            <?php if($acumulador>=45) {?>  
                <td align="left" style="font-size:15px;"><?php echo "<p style='color:#008000 !important;'>Total de puntaje de las 5 Secciones: " .$acumulador."</p>"; ?></td>
            <?php }?>

            </tr>




	         <?php
			//			}
							?>
	   
	   </tbody>
            <tr>
            <td align="left" style="font-size:15px"><?php echo ""; ?></td>

            <?php if($acumulador>=45) {?>  
            <td align="left" style="font-size:15px"><?php echo "<h3><p style='color:#008000 !important;font-weight: bold;'>CALIFICA</p></h3>"; ?></td>
            <?php }?>
            
            <?php if($acumulador<45) {?>  
                <td align="left" style="font-size:15px;"><?php echo "<h3><p style='color:#FF0000 !important;font-weight: bold;'>NO CALIFICA</p></h3>"; ?></td>
            <?php }?>

            </tr>
    </table>
	
	</div>
	   

	   
      
    
	
</body>
</html>

 