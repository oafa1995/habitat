<?php session_start();
$idSolicitud = $_REQUEST["iddatos"]; // id de la solicitud de financiamiento

include("../config/conexion.php");

$query_s = pg_query($conexion, "SELECT idcliente from solicitud where idsolicitud='$idSolicitud'");
while ($fila = pg_fetch_array($query_s)) {
  //    $ridpaciente=$fila[0];
  $idcliente = $fila[0];
  // $rfecha=$fila[3];

}

$query_s = pg_query($conexion, "SELECT idagencia from cliente_agencia where idcliente='$idcliente'");
while ($fila = pg_fetch_array($query_s)) {
  //    $ridpaciente=$fila[0];
  $idagencia = $fila[0];
  // $rfecha=$fila[3];

}

$query_s = pg_query($conexion, "SELECT municipio from agencia where idagencia='$idagencia'");
while ($fila = pg_fetch_array($query_s)) {
  //    $ridpaciente=$fila[0];
  $nombre_agencia = $fila[0];
  // $rfecha=$fila[3];

}

$query_s = pg_query($conexion, "SELECT nombres,apellidos,edad,estado_civil,direccion,telefono from cliente where idcliente='$idcliente'");
while ($fila = pg_fetch_array($query_s)) {
  //    $ridpaciente=$fila[0];
  $nombres_clientes = $fila[0];
  $apellidos_clientes = $fila[1];
  $edad_cliente = $fila[2];
  $estado_civil = $fila[3];
  $direccion = $fila[4];
  $telefono = $fila[5];
  // $rfecha=$fila[3];

}

$query_s = pg_query($conexion, "SELECT id_situacion_vivienda from solicitud_situacion_vivienda where idsolicitud='$idSolicitud'");
while ($fila = pg_fetch_array($query_s)) {
  //    $ridpaciente=$fila[0];
  $id_situacion_vivienda = $fila[0];
  // $rfecha=$fila[3];

}

$query_s = pg_query($conexion, "SELECT tenencia from situacion_vivienda where id_situacion_vivienda='$id_situacion_vivienda'");
while ($fila = pg_fetch_array($query_s)) {
  //    $ridpaciente=$fila[0];
  $tenencia = $fila[0];
  // $rfecha=$fila[3];

}

$query_s = pg_query($conexion, "SELECT idsol_sit_e from solicitud_situacion_ec where idsolicitud='$idSolicitud'");
while ($fila = pg_fetch_array($query_s)) {
  //    $ridpaciente=$fila[0];
  $id_situacion_economica_familiar = $fila[0];
  // $rfecha=$fila[3];

}

$query_s = pg_query($conexion, "SELECT ingresos_hogar from situacion_economica_familiar where idsituacion='$id_situacion_economica_familiar'");
while ($fila = pg_fetch_array($query_s)) {
  //    $ridpaciente=$fila[0];
  $ingreso_hogar = $fila[0];
  // $rfecha=$fila[3];

}

$query_s = pg_query($conexion, "SELECT latitud,longitud,condicion_actual from datos_finales_es where idsolicitud='$idSolicitud'");
while ($fila = pg_fetch_array($query_s)) {
  //    $ridpaciente=$fila[0];
  $latitud = $fila[0];
  $longitud = $fila[1];
  $condicion_actual = $fila[2];
  // $rfecha=$fila[3];

}

//$familiares = array ();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

  <link rel="icon" href="../img/tittle.ico">
  <script src="../js/sweet-alert.min.js"></script>
  <link rel="stylesheet" href="../css/sweet-alert.css">
  <link rel="stylesheet" href="../css/material-design-iconic-font.min.css">
  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css">
  <link rel="stylesheet" href="../css/style.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script>
    window.jQuery || document.write('<script src="../js/jquery-1.11.2.min.js"><\/script>')
  </script>
  <script src="../js/modernizr.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="../js/main.js"></script>

  <style>
    table {
      table-layout: fixed;
      word-wrap: break-word;
    }
  </style>
  <style>
    @media print {
      body {
        -webkit-print-color-adjust: exact;
      }
    }
  </style>

  <title>Perfil</title>
</head>

<body>

  <section class="main container">
    <div class="container">
      <article class="post clearfix"><a href="#" class="thumb pull-left"><img src="../img/habitat.jpg" alt="espere un momento" class="img-responsive" width="150" height="60"></a>

        <a class="thumb pull-right"><img src="../img/fedecredito.png" alt="espere un momento" class="img-responsive" width="150" height="60"></a>

      </article>
    </div>
  </section>




  <table class="table table-bordered">
    <thead>

    </thead>
    <tbody>

      <tr>
        <td scope="col" colspan="4" style="color: #000;	background-color: #92cddc !important;;">
          <center>
            <h4><strong>Asociaci??n HPH El Salvador</strong></h4>
          </center>
        </td>

      </tr>

      <tr>
        <th scope="row" colspan="4">
          <h4><strong>Agencia:</strong> <?php echo $nombre_agencia; ?> </h4>
        </th>

      </tr>
      <tr>
        <th class="col-md-2" scope="row" colspan="4">
          <center>
            <h4><strong>Perfil de familia</strong></h4>
          </center>
        </th>
      </tr>
      <tr>
        <th scope="row">Nombre del proyecto:</th>
        <td colspan="3">"Reconstrucc??n de viviendas afectadas por Tormenta Amanda - Sistema FEDECREDITO y H??bitat para la Humanidad El Salvador"</td>

      </tr>

      <tr>
        <th scope="row">Nombre del titular/jefe/a de familia:</th>
        <td colspan="3"><?php echo $nombres_clientes . " " . $apellidos_clientes; ?></td>

      </tr>

      <tr>
        <th scope="row">Edad:</th>
        <td colspan="3"><?php echo $edad_cliente; ?></td>

      </tr>

      <tr>
        <th scope="row">Estado Civil:</th>
        <td colspan="3"><?php echo ucfirst($estado_civil); ?></td>

      </tr>


      <tr>
        <th scope="row">Direcci??n de construcci??n:</th>
        <td colspan="3"><?php echo ucfirst($direccion); ?></td>

      </tr>

      <tr>
        <th scope="row">Telefono:</th>
        <td colspan="3"><?php echo ($telefono); ?></td>

      </tr>


      <tr>
        <th scope="row" colspan="4" style="color: #000;	background-color: #92cddc !important;;">
          <center>
            <h4><strong>Integrantes de la familia</strong></h4>
          </center>
        </th>
      </tr>


      <tr>
        <th scope="row" colspan="1">Nombre Completo </th>
        <th scope="row" colspan="1">Parentesco </th>
        <th scope="row" colspan="1">Ocupaci??n</th>
        <th scope="row" colspan="1">Edad</th>
      </tr>

      <?php
      $query_s = pg_query($conexion, "SELECT familiares_cliente.nombres, familiares_cliente.apellidos, familiares_cliente.parentesco, familiares_cliente.ocupacion, familiares_cliente.edad
FROM familiares_cliente
WHERE familiares_cliente.idcliente ='$idcliente' ");
      while ($fila = pg_fetch_array($query_s)) {
        $nf = $fila[0];
        $af = $fila[1];
        $pare = $fila[2];
        $ocupa = $fila[3];
        $edad = $fila[4];

      ?>
        <tr>
          <td scope="row" colspan="1"> <?php echo $nf . ' ' . $af; ?></td>
          <td scope="row" colspan="1"> <?php echo ucfirst($pare); ?></td>
          <td scope="row" colspan="1"><?php echo ucfirst($ocupa); ?></td>
          <td scope="row" colspan="1"><?php echo ucfirst($edad) ?></td>
        </tr>

      <?php } ?>


      <tr>
        <th scope="row" colspan="4" style="color: #000;	background-color: #92cddc !important;;">
          <center>
            <h4><strong>Situaci??n actual de la vivienda</strong></h4>
          </center>
        </th>
      </tr>

      <tr>
        <th scope="row" colspan="2"> Tipo de tenencia de la propiedad/inmueble: </th>
        <td scope="row" colspan="2"> <?php echo ucfirst($tenencia); ?></td>

      </tr>

      <tr>
        <th scope="row" colspan="2"> Condicion/estado fisico de la Vivienda Actual: </th>
        <td scope="row" colspan="2"> <?php echo $condicion_actual;  ?></td>

      </tr>

      <tr>
        <th scope="row" colspan="2"> Justificaci??n de la necesidad de Vivienda: </th>
        <td scope="row" colspan="2"> <?php  ?></td>

      </tr>
      <tr>
        <th scope="row" colspan="2"> Nombre de la persona de la familia que apoyar?? la construcci??n: </th>
        <td scope="row" colspan="2"> <?php  ?></td>

      </tr>



      <tr>
        <th scope="row" colspan="4" style="color: #000;	background-color: #92cddc !important;;">
          <center>
            <h4><strong>Situaci??n economica</strong></h4>
          </center>
        </th>
      </tr>

      <tr>
        <th scope="row" colspan="2">Ingreso Mensual de la familia ($): </th>
        <td scope="row" colspan="2"> <?php echo $ingreso_hogar; ?></td>

      </tr>


      <tr>
        <th scope="row" colspan="2">Cuantas personas aportan al ingreso familiar: </th>
        <td scope="row" colspan="2"> <?php 
      

        $nombre_familiar='';// declarando vacia la variable para evitar basura en el acumulador de cadenas
        
                                              $query_s = pg_query($conexion, "SELECT idfamiliar,nombres,apellidos,ingresos_pro from familiares_cliente where idcliente='$idcliente' and ingresos_pro!='ninguno' ");
                                            $cantidadF= pg_num_rows($query_s);
        
                                            echo $cantidadF;
        ?></td>

      </tr>

      <tr>
        <th scope="row" colspan="2">Quienes Generan el ingreso: </th>
        <td scope="row" colspan="2"> <?php

$parentesco_familiar='';// declarando vacia la variable para evitar basura en el acumulador de cadenas

                                      $query_s = pg_query($conexion, "SELECT idfamiliar,parentesco,ingresos_pro from familiares_cliente where idcliente='$idcliente' and ingresos_pro!='ninguno' ");
                                      while ($fila = pg_fetch_array($query_s)) {
                                        //    $ridpaciente=$fila[0];

                                        $parentesco_familiar.= ucfirst($fila[1]).", ";
                                      


                                      }

                                      echo substr($parentesco_familiar, 0, -2);// se quita el espacion y la coma

                                      ?></td>

      </tr>

      <tr>
        <th scope="row" colspan="2">Tipos de empleos/oficios: </th>
        <td scope="row" colspan="2"> <?php 
        

        $ocupaciones='';// declarando vacia la variable para evitar basura en el acumulador de cadenas

        $query_s = pg_query($conexion, "SELECT idfamiliar,ocupacion,ingresos_pro from familiares_cliente where idcliente='$idcliente' and ingresos_pro!='ninguno' ");
        while ($fila = pg_fetch_array($query_s)) {
          //    $ridpaciente=$fila[0];

          $ocupaciones.= ucfirst($fila[1]).", ";
        


        }

        echo substr($ocupaciones, 0, -2);// se quita el espacion y la coma


        
        ?></td>

      </tr>

      <tr>
        <th scope="row" colspan="2">: </th>
        <td scope="row" colspan="2"> <?php
         $lugar_trabajo='';// declarando vacia la variable para evitar basura en el acumulador de cadenas

         $query_s = pg_query($conexion, "SELECT idfamiliar,lugar_trabajo,ingresos_pro from familiares_cliente where idcliente='$idcliente' and ingresos_pro!='ninguno' ");
         while ($fila = pg_fetch_array($query_s)) {
           //    $ridpaciente=$fila[0];
 
           $lugar_trabajo.= ucfirst($fila[1]).", ";
         
 
 
         }
 
         echo substr($lugar_trabajo, 0, -2);// se quita el espacion y la coma
 
 
        
        ?></td>

      </tr>
      <tr>
        <td scope="row" colspan="4" style="color: #000;	background-color: #92cddc !important;;">
          <center>
            <h4><strong>SOLUCION HABITACIONAL HPH</strong></h4>
          </center>
        </td>
      </tr>


      <tr>
        <th scope="row" colspan="2">Modelo de Vivienda o soluci??n habitacional: </th>
        <td scope="row" colspan="2"> <?php  ?></td>

      </tr>

      <tr>
        <th scope="row" colspan="2">Monto a financiar: </th>
        <td scope="row" colspan="2"> <?php  ?></td>

      </tr>
      <tr>
        <th scope="row" colspan="2">Modalidad del financiamiento: </th>
        <td scope="row" colspan="2"> <?php  ?></td>

      </tr>

      <tr>
        <th scope="row" colspan="2">Origen de los fondos: </th>
        <td scope="row" colspan="2"> <?php  ?></td>

      </tr>


      <tr>
        <td scope="row" colspan="4">
          <center>
            <h4><strong>COMENTARIOS ADICIONALES</strong></h4>
          </center>
        </td>
      </tr>


      <tr>

        <td scope="row" colspan="4"> <?php  ?></td>
      </tr>



      <tr>
        <td scope="row" colspan="4">
          <center>
            <h4><strong>FOTOS DE FAMILIA A BENEFICIAR</strong></h4>
          </center>
        </td>
      </tr>


      <tr>

        <td scope="row" colspan="4"> <?php  ?></td>
      </tr>


      <tr>
        <td scope="row" colspan="4">
          <center>
            <h4><strong>FOTOS DE FAMILIA Y TERRENO</strong></h4>
          </center>
        </td>
      </tr>


      <tr>

        <td scope="row" colspan="4"> <?php  ?></td>
      </tr>


      <tr>
        <td scope="row" colspan="4">
          <center>
            <h4><strong>UBICACI??N </strong></h4>
          </center>
        </td>

      </tr>

      <tr>
        <th scope="row" colspan="2">Nombre: </th>
        <td scope="row" colspan="2"> <?php echo $nombres_clientes . ' ' . $apellidos_clientes; ?></td>

      </tr>
      <tr>
        <th scope="row" colspan="2">Direccion de Construcci??n: </th>
        <td scope="row" colspan="2"> <?php  ?></td>

      </tr>

      <tr>
        <th scope="row" colspan="2">Tel??fono: </th>
        <td scope="row" colspan="2"> <?php echo $telefono; ?></td>

      </tr>

      <tr>
        <th scope="row" colspan="2">Coordenadas de ubicaci??n: </th>
        <td scope="row" colspan="1"><strong>Latitud: <?php echo $latitud; ?></strong> </td>
        <td scope="row" colspan="1"><strong>Longitud: <?php echo $longitud; ?></strong></td>
      </tr>

    </tbody>
  </table>

</body>

</html>