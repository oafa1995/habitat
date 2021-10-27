<?php
                      
                      $acumulador=0;
$sexo=$filaw[8];
$idcliente=$filaw[0];
$idsolicitud=$filaw[9];

if(!isset($filaw[11])){

   $rr="";
}else{
   $rr=$filaw[11];
}





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
   
   