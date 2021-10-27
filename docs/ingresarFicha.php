<?php session_start();
include("../config/conexion.php");

$id = $_SESSION["idUsuario"];
$idsolicitud = $_REQUEST["iddatos"];

$query_s = pg_query($conexion, "select idagencia from usuario_agencia where idusuario='$id' ");
while ($fila = pg_fetch_array($query_s)) {
    $idagencia = $fila[0];
}

$query_s = pg_query($conexion, "SELECT idcliente from solicitud where idsolicitud='$idsolicitud'");
while ($fila = pg_fetch_array($query_s)) {
    //    $ridpaciente=$fila[0];
    $idcliente = $fila[0];
    // $rfecha=$fila[3];

}

$query_s = pg_query($conexion, "SELECT municipio from agencia where idagencia='$idagencia'");
while ($fila = pg_fetch_array($query_s)) {
    //    $ridpaciente=$fila[0];
    $nombre_agencia = $fila[0];
    // $rfecha=$fila[3];

}

$query_s = pg_query($conexion, "SELECT nombres,apellidos,direccion,zona from cliente where idcliente='$idcliente'");
while ($fila = pg_fetch_array($query_s)) {
    //    $ridpaciente=$fila[0];
    $nombres_clientes = $fila[0];
    $apellidos_clientes = $fila[1];
    $nombre_completo = $nombres_clientes . " " . $apellidos_clientes;
    $direccion = $fila[2];
    $zona = $fila[3];
    
    //$edad_cliente = $fila[2];
    // $estado_civil = $fila[3];
    // $direccion = $fila[4];
    // $telefono = $fila[5];
    // $rfecha=$fila[3];

}


$query_s = pg_query($conexion, "SELECT edad,discapacidad from familiares_cliente where idcliente='$idcliente'");
$tercera_edad=0;
$adultos=0;
$ninos=0;
$discapacitados=0;
while ($fila = pg_fetch_array($query_s)) {
    //    $ridpaciente=$fila[0];
    if($fila[0]>=60){
    $tercera_edad++;
    }
    if($fila[0]>=18 && $fila[0]<60){
    $adultos++;
    }
    if($fila[0]<18){
        $ninos++;
        }
        if($fila[1]!="ninguna"){
            $discapacitados++;
        }

}



$query_s = pg_query($conexion, "SELECT id_situacion_vivienda from solicitud_situacion_vivienda where idsolicitud='$idsolicitud'");
while ($fila = pg_fetch_array($query_s)) {
    //    $ridpaciente=$fila[0];
    $id_situacion_vivienda = $fila[0];
    // $rfecha=$fila[3];

}


$query_s = pg_query($conexion, "SELECT nombre from situacion_vivienda where id_situacion_vivienda='$id_situacion_vivienda'");
while ($fila = pg_fetch_array($query_s)) {
    //    $ridpaciente=$fila[0];
    $propietario_vivienda = $fila[0];
    // $rfecha=$fila[3];

}

$query_s = pg_query($conexion, "SELECT latitud,longitud,condicion_actual from datos_finales_es where idsolicitud='$idsolicitud'");
while ($fila = pg_fetch_array($query_s)) {
    //    $ridpaciente=$fila[0];
    $latitud = $fila[0];
    $longitud = $fila[1];
    $condicion_actual = $fila[2];
    // $rfecha=$fila[3];

}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Presupuesto de construccion</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../img/tittle.ico">

    <script src="../js/jquery.min.js"></script>
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

    <script src="../js/jquery.maskedinput.js"></script>
    <script src="../js/jquery.numeric.js"></script>


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



<script>
 


    function suma1(formulario){
     
        sumaAB(formulario);
    //    console.log(formulario.id);
let total1=0;
nombre="";
for(i=0;i<formulario.elements.length;i++){
    if(formulario.elements[i].type=="radio" && nombre!=formulario.elements[i].name && formulario.elements[i].className=='sumatoria1' ){
     //   console.log(document.getElementById(formulario.id).getElementsByClassName('sumatoria1').val);
        nombre=formulario.elements[i].name;
        grupo=document.getElementsByName(nombre);
        for(j=0;j<grupo.length;j++){
            if(grupo[j].checked){
                total1+=parseInt(grupo[j].value);
            }
        }
    }else if (formulario.elements[i].type=="checkbox"){
        if(formulario.elements[i].checked){
                total1+=parseInt(formulario.elements[i].value);
        }
    }
}

    document.frmcdi.total1.value = total1;  
      document.frmcdi.totalAA.value = total1;
 //  console.log(total);
}    

function suma2(formulario){
    sumaAB(formulario);
let total2=0;
nombre="";
for(i=0;i<formulario.elements.length;i++){
    if(formulario.elements[i].type=="radio" && nombre!=formulario.elements[i].name && formulario.elements[i].className=='sumatoria2'){
        nombre=formulario.elements[i].name;
        grupo=document.getElementsByName(nombre);
        for(j=0;j<grupo.length;j++){
            if(grupo[j].checked){
                total2+=parseInt(grupo[j].value);
            }
        }
    }else if (formulario.elements[i].type=="checkbox"){
        if(formulario.elements[i].checked){
                total2+=parseInt(formulario.elements[i].value);
        }
    }
}

    document.frmcdi.total2.value = total2;
    document.frmcdi.totalBB.value = total2;

  // console.log(total);
}


function sumaAB(formulario){
        console.log(formulario.id);
let totalAB=0;
nombre="";
for(i=0;i<formulario.elements.length;i++){
    if(formulario.elements[i].type=="radio" && nombre!=formulario.elements[i].name && !isNaN(formulario.elements[i].value) ){
     //   console.log(document.getElementById(formulario.id).getElementsByClassName('sumatoria1').val);
        nombre=formulario.elements[i].name;
        grupo=document.getElementsByName(nombre);
        for(j=0;j<grupo.length;j++){
            if(grupo[j].checked){
                totalAB+=parseInt(grupo[j].value);
            }
        }
    }else if (formulario.elements[i].type=="checkbox"){
        if(formulario.elements[i].checked){
                totalAB+=parseInt(formulario.elements[i].value);
        }
    }
}
console.log(totalAB);
if(totalAB<28){
        document.getElementById("totalAB").style.color='red';
        document.getElementById("ar_ap").value='No Aplica';
        document.getElementById("ar_ap").style.color='red';
    }else if(totalAB>=29 && totalAB<=42){
        document.getElementById("totalAB").style.color='#0056FC';
        document.getElementById("ar_ap").value='En espera';
        document.getElementById("ar_ap").style.color='#0056FC';

    }else if(totalAB>=43){

        document.getElementById("totalAB").style.color='green';
        document.getElementById("ar_ap").value='Aplica';
        document.getElementById("ar_ap").style.color='green';


    }
    document.frmcdi.totalAB.value = totalAB;
 
   
 //  console.log(total);
}    

//     function sumar(num,idRadio){
//         var radio = document.getElementById(idRadio);
//         if(radio.checked){
//  //   num = prompt('introdusca numero:','');
//   //  suma=Number(suma)+Number(num);
//   //  if(suma==0){
//   //      suma+=1;
//   //  }
//     console.log(suma);
//   }else{
//     suma=Number(suma)+Number(num);
// console.log(suma);
//   }
// }


// function restar(num){
//      //   var radio = document.getElementById(idRadio);
//      //   if(radio.checked){
//  //   num = prompt('introdusca numero:','');
//  if(suma==Number(1)){
// suma=1;
//  }else{
//     suma=Number(suma)+Number(num);
//     console.log(suma);
//  }

//   //  if(suma==0){
//   //      suma+=1;
//   //  }
  
//  // }else{

//   //}
// }


// </script>



    <script>
        $(document).ready(function() {










            /////////////////////////////////////////validacion nombre 
            $("#nombre").keypress(function(key) {
                window.console.log(key.charCode)
                if ((key.charCode < 97 || key.charCode > 122) //letras mayusculas
                    &&
                    (key.charCode < 65 || key.charCode > 90) //letras minusculas
                    &&
                    (key.charCode != 8) //retroceso
                    &&
                    (key.charCode != 241) //ñ
                    &&
                    (key.charCode != 209) //Ñ
                    &&
                    (key.charCode != 32) //espacio
                    &&
                    (key.charCode != 225) //á
                    &&
                    (key.charCode != 233) //é
                    &&
                    (key.charCode != 237) //í
                    &&
                    (key.charCode != 243) //ó
                    &&
                    (key.charCode != 250) //ú
                    &&
                    (key.charCode != 193) //Á
                    &&
                    (key.charCode != 201) //É
                    &&
                    (key.charCode != 205) //Í
                    &&
                    (key.charCode != 211) //Ó
                    &&
                    (key.charCode != 218) //Ú

                )
                    return false;
            });

            ///////////////////////////validacion apellido


            $("#apellido").keypress(function(key) {
                window.console.log(key.charCode)
                if ((key.charCode < 97 || key.charCode > 122) //letras mayusculas
                    &&
                    (key.charCode < 65 || key.charCode > 90) //letras minusculas
                    &&
                    (key.charCode != 8) //retroceso
                    &&
                    (key.charCode != 241) //ñ
                    &&
                    (key.charCode != 209) //Ñ
                    &&
                    (key.charCode != 32) //espacio
                    &&
                    (key.charCode != 225) //á
                    &&
                    (key.charCode != 233) //é
                    &&
                    (key.charCode != 237) //í
                    &&
                    (key.charCode != 243) //ó
                    &&
                    (key.charCode != 250) //ú
                    &&
                    (key.charCode != 193) //Á
                    &&
                    (key.charCode != 201) //É
                    &&
                    (key.charCode != 205) //Í
                    &&
                    (key.charCode != 211) //Ó
                    &&
                    (key.charCode != 218) //Ú

                )
                    return false;
            });






        });
    </script>




    <script>
        $(function($) {
            $("#telefono").mask("9999-9999");
            $("#telefonoF").mask("9999-9999");
            $("#nit").mask("9999-999999-999-9");

            // $("#telefono").unmask();  

            $("#dui_inspector").mask("99999999-9"); ////////////mascara de entrada para telefono
            $("#dui_atendio").mask("99999999-9");
            $("#hora").mask("99:99");



            $('#ancho').on('keypress', function(e) { /////////validacion de numeros con dos decimales
                // Backspace = 8, Enter = 13, ’0′ = 48, ’9′ = 57, ‘.’ = 46
                var field = $(this);
                key = e.keyCode ? e.keyCode : e.which;

                if (key == 8) return true;
                if (key > 47 && key < 58) {
                    if (field.val() === "") return true;
                    var existePto = (/[.]/).test(field.val());
                    if (existePto === false) {
                        regexp = /.[0-9]{10}$/;
                    } else {
                        regexp = /.[0-9]{2}$/;
                    }

                    return !(regexp.test(field.val()));
                }
                if (key == 46) {
                    if (field.val() === "") return false;
                    regexp = /^[0-9]+$/;
                    return regexp.test(field.val());
                }
                return false;
            });


            $('#largo').on('keypress', function(e) { /////////validacion de numeros con dos decimales
                // Backspace = 8, Enter = 13, ’0′ = 48, ’9′ = 57, ‘.’ = 46
                var field = $(this);
                key = e.keyCode ? e.keyCode : e.which;

                if (key == 8) return true;
                if (key > 47 && key < 58) {
                    if (field.val() === "") return true;
                    var existePto = (/[.]/).test(field.val());
                    if (existePto === false) {
                        regexp = /.[0-9]{10}$/;
                    } else {
                        regexp = /.[0-9]{2}$/;
                    }

                    return !(regexp.test(field.val()));
                }
                if (key == 46) {
                    if (field.val() === "") return false;
                    regexp = /^[0-9]+$/;
                    return regexp.test(field.val());
                }
                return false;
            });



            $('#area').on('keypress', function(e) { /////////validacion de numeros con dos decimales
                // Backspace = 8, Enter = 13, ’0′ = 48, ’9′ = 57, ‘.’ = 46
                var field = $(this);
                key = e.keyCode ? e.keyCode : e.which;

                if (key == 8) return true;
                if (key > 47 && key < 58) {
                    if (field.val() === "") return true;
                    var existePto = (/[.]/).test(field.val());
                    if (existePto === false) {
                        regexp = /.[0-9]{10}$/;
                    } else {
                        regexp = /.[0-9]{2}$/;
                    }

                    return !(regexp.test(field.val()));
                }
                if (key == 46) {
                    if (field.val() === "") return false;
                    regexp = /^[0-9]+$/;
                    return regexp.test(field.val());
                }
                return false;
            });





            $('#anchof').on('keypress', function(e) { /////////validacion de numeros con dos decimales
                // Backspace = 8, Enter = 13, ’0′ = 48, ’9′ = 57, ‘.’ = 46
                var field = $(this);
                key = e.keyCode ? e.keyCode : e.which;

                if (key == 8) return true;
                if (key > 47 && key < 58) {
                    if (field.val() === "") return true;
                    var existePto = (/[.]/).test(field.val());
                    if (existePto === false) {
                        regexp = /.[0-9]{10}$/;
                    } else {
                        regexp = /.[0-9]{2}$/;
                    }

                    return !(regexp.test(field.val()));
                }
                if (key == 46) {
                    if (field.val() === "") return false;
                    regexp = /^[0-9]+$/;
                    return regexp.test(field.val());
                }
                return false;
            });


            $('#largof').on('keypress', function(e) { /////////validacion de numeros con dos decimales
                // Backspace = 8, Enter = 13, ’0′ = 48, ’9′ = 57, ‘.’ = 46
                var field = $(this);
                key = e.keyCode ? e.keyCode : e.which;

                if (key == 8) return true;
                if (key > 47 && key < 58) {
                    if (field.val() === "") return true;
                    var existePto = (/[.]/).test(field.val());
                    if (existePto === false) {
                        regexp = /.[0-9]{10}$/;
                    } else {
                        regexp = /.[0-9]{2}$/;
                    }

                    return !(regexp.test(field.val()));
                }
                if (key == 46) {
                    if (field.val() === "") return false;
                    regexp = /^[0-9]+$/;
                    return regexp.test(field.val());
                }
                return false;
            });



            $('#areaf').on('keypress', function(e) { /////////validacion de numeros con dos decimales
                // Backspace = 8, Enter = 13, ’0′ = 48, ’9′ = 57, ‘.’ = 46
                var field = $(this);
                key = e.keyCode ? e.keyCode : e.which;

                if (key == 8) return true;
                if (key > 47 && key < 58) {
                    if (field.val() === "") return true;
                    var existePto = (/[.]/).test(field.val());
                    if (existePto === false) {
                        regexp = /.[0-9]{10}$/;
                    } else {
                        regexp = /.[0-9]{2}$/;
                    }

                    return !(regexp.test(field.val()));
                }
                if (key == 46) {
                    if (field.val() === "") return false;
                    regexp = /^[0-9]+$/;
                    return regexp.test(field.val());
                }
                return false;
            });



        });
    </script>


    <style>
        #nombre {
            text-transform: capitalize;
        }

        #apellido {
            text-transform: capitalize;
        }
    </style>




    <script type="text/javascript">
        ///////////////validar solo numeros enteros
        $(document).ready(function() {

            $('#edad').on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
        });
    </script>


    <script type="text/javascript" class="init">
        function alertaError() {
            alertify.error("<h1>Error</h1>" + "<p>No ha agregado ningun cliente</p>" + "<img src='../img/error.png'>").dismissOthers();

        }

        function r() {
            location.href = "buscarClienteFicha.php"
            //   window.open("editarMedicina.php?iddatos="+id, '_parent');
        }


        function alertaExito() {
            alertify.success("<h1>Exito</h1>" + "<p>Datos ingresados correctamente</p>" + "<img src='../img/bien.png'>").set({
                transition: 'flipx'
            });
        }

        function alertaErrorIngresar() {
            alertify.error("<h1>Error</h1>" + "<p>No se puedo ingresar el paciente </p>" + "<img src='../img/error.png'>").dismissOthers();


        }

        function alertaErrorA() {
            alertify.error("<h1>Error</h1>" + "<p>Campos vacios </p>" + "<img src='../img/error.png'>").dismissOthers();


        }

        function alertaErrorB() {
            alertify.error("<h1>Error</h1>" + "<p>LA fecha no es correcta </p>" + "<img src='../img/error.png'>").dismissOthers();


        }

        function alertaErrorC() {
            alertify.error("<h1>Error</h1>" + "<p>El correo no tiene el formato correcto </p>" + "<img src='../img/error.png'>").dismissOthers();


        }

        function alertaErrorD() {
            alertify.error("<h1>Error</h1>" + "<p>Email mal digitado </p>" + "<img src='../img/error.png'>").dismissOthers();


        }

        function alertaErrorE() {
            alertify.error("<h1>Error</h1>" + "<p>Nit mal digitado </p>" + "<img src='../img/error.png'>").dismissOthers();


        }

        function alertaError2() {
            alertify.notify("<h1>Aviso</h1>" + "<p>Este campo no es editable, es generado según la fecha de nacimiento</p>" + "<img src='../img/advertencia.png' width='200' height='170'>").dismissOthers();
        }

        function verificar() {


        //    $(document).ready(function() {


                if (document.getElementById('fecha').value == "" ||
                    document.getElementById('ancho').value == "" ||
                    document.getElementById('largo').value == "" ||
                    document.getElementById('area').value == "" ||
                    document.getElementById('anchof').value == "" ||
                    document.getElementById('largof').value == "" ||
                    document.getElementById('areaf').value == ""  ||
                
              document.getElementById('construccione').value == ""  ||
              document.getElementById('construccionh').value == ""  ||
              document.getElementById('sdemolicion').value == ""  ||
              document.getElementById('inmuebled').value == ""  ||
              document.getElementById('exca_per').value == ""  ||
              document.getElementById('tap_muros').value == ""  ||
              document.getElementById('aceras').value == ""  ||
              document.getElementById('acceso_pav').value == ""  ||
              document.getElementById('cordones').value == ""  ||
              document.getElementById('cunetas').value == ""  ||
              document.getElementById('icomunitaria').value == ""  ||
              document.getElementById('parques').value == ""  ||
              document.getElementById('s_fosa').value == ""  ||
              document.getElementById('letrina_hoyo').value == ""  ||
              document.getElementById('letrina_abonera').value == ""  ||
              document.getElementById('pila').value == ""  ||
              document.getElementById('ca_lluvias').value == ""  ||
              document.getElementById('po_abastecimiento').value == ""  ||
              document.getElementById('s_aguap').value == ""  ||
              document.getElementById('s_energia').value == ""  ||
              document.getElementById('drenaje_lluvia').value == ""  ||
              document.getElementById('drenaje_residual').value == ""  ||
              document.getElementById('alumbrado_publico').value == ""  ||
              document.getElementById('recoleccion_desechos').value == ""  ||
              document.getElementById('servicio_transporte').value == ""  ||       
            document.getElementById('comentarios_primero').value == ""  || 
            document.getElementById('vias_acceso').value == ""  ||
       

              document.getElementById('f_mojones').value == ""  ||
              document.getElementById('f_linderos').value == ""  ||
              document.getElementById('f_mherramientas').value == ""  ||
              document.getElementById('a_construccion').value == ""  ||
              document.getElementById('f_aguap').value == ""  ||
              document.getElementById('f_energia').value == ""  ||
              document.getElementById('cubierta_techo').value == ""  ||
              document.getElementById('estructura_techo').value == ""  ||
              document.getElementById('columnas_contrafuertes').value == ""  ||
              document.getElementById('paredes_estructurales').value == ""  ||
              document.getElementById('paredes_livianas').value == ""  ||
              document.getElementById('piso_evaluacion').value == ""  ||
              document.getElementById('otros_evaluacion').value == ""  ||
              document.getElementById('comentarios_danos').value == ""  ||


            //   document.getElementById('e_inexistente').value == ""  ||
            //   document.getElementById('e_leve').value == ""  ||
            //   document.getElementById('e_moderado').value == ""  ||
            //   document.getElementById('e_severo').value == ""  ||
            //   document.getElementById('e_colapso').value == ""  ||

              document.getElementById('inundacion_cuerpo_c').value == "" ||  
              document.getElementById('formacion_carcava').value == "" ||  
              document.getElementById('obras_mitigacion').value == "" ||  
              document.getElementById('despredimiento_taludes').value == "" ||  
              document.getElementById('colapso_estructuras_c').value == "" ||  
              document.getElementById('arboles_tendido').value == "" ||  
              document.getElementById('otros_amenazas').value == "" ||  
              document.getElementById('comentarios_amenazas').value == "" ||  
            //   document.getElementById('d_inexistente').value == "" ||  
            //   document.getElementById('d_leve').value == "" ||  
            //   document.getElementById('d_moderado').value == "" ||  
            //   document.getElementById('d_severo').value == "" ||  
            //   document.getElementById('d_inminente').value == "" ||  
              document.getElementById('archivo').value == "" ||  
               document.getElementById('archivo2').value == "" ||  
               document.getElementById('archivo3').value == ""   ||
            

               document.getElementById('nombre_inspector').value == ""   ||
               document.getElementById('dui_inspector').value == ""   ||
               document.getElementById('firma_inspector').value == ""   ||
               document.getElementById('nombre_atendio').value == ""   ||
               document.getElementById('dui_atendio').value == ""   ||
               document.getElementById('firma_atendio').value == ""   ||
               document.getElementById('hora').value == ""

                ) {
                    alertaErrorA();
                    //    document.getElementById('bandera').value="";
                    //   var hoja = document.createElement('style')
                    //hoja.innerHTML = ".form-group input:invalid{border-left-color: firebrick;}";
                    //document.body.appendChild(hoja);
                } else {
                    document.getElementById('bandera').value = "add";

                    document.frmcdi.submit();

                }




         //   });






        }



        function Salir() {


            alertify.confirm("<center>ATENCI&Oacute;N!</center>", "<center><img src='../img/warning.png' width='250' height='250'></center>" + "<center><h1>Desea cerrar la sesión?</h1></center>", function() {
                alertify.success('Ok')

                document.location.href = "../config/fin.php";
            }, function() {
                alertify.error('No ha cerrado la sesión').dismissOthers()
            }).set('labels', {
                ok: 'si',
                cancel: 'no'
            }).set({
                transition: 'zoom'
            });;


        }
    </script>


    <script>
        function ayuda() {
            $(document).ready(function() {
                $("#ayuda").modal();
            });
        }

        function pro(wawa) {
            console.log(wawa);
        }
    </script>


    <style>
        /*.form-group input:invalid{
    border-left-color: salmon;
}*/
    </style>


    <style>
        #nombre {
            text-transform: capitalize;
        }

        #apellido {
            text-transform: capitalize;
        }
    </style>





</head>


<body>



    <div class="navbar-lateral full-reset">
        <div class="visible-xs font-movile-menu mobile-menu-button"></div>
        <div class="full-reset container-menu-movile custom-scroll-containers">
            <div class="logo full-reset all-tittles" style="background-color:#0095FF;">

                <i class="visible-xs zmdi zmdi-close pull-left mobile-menu-button" style=" line-height: 55px; cursor: pointer; padding: 0 10px; margin-left: 7px;"></i>
                sistema habitat
            </div>
            <figure>
                <img src="../img/logo.png" alt="CDI" class="img-responsive center-box" style="width:45%;">
            </figure>
            <div class="full-reset nav-lateral-list-menu"> <?php include("menu.php"); ?> </div>
        </div>
    </div>
    <div class="content-page-container full-reset custom-scroll-containers">




        <nav class="navbar-user-top full-reset">




            <ul class="list-unstyled full-reset">



                <li onClick="Salir()" data-placement="bottom" title="Salir del sistema">
                    <i class="zmdi zmdi-power"></i>
                </li>



                <figure>


                    <img src="../assets/img/user01.png" alt="user-picture" class="img-responsive img-circle center-box">
                    <!--aqui va la foto del usuario -->








                </figure>


                <li style="color:#fff; cursor:default;" title="Datos personales">
                    <a href="datosPersonales.php" style="color:#ffffff;">
                        <span class="all-tittles"><?php if (isset($_SESSION)) {

                                                        $usu = $_SESSION["usuarioE"];
                                                        $usu = base64_decode($usu);
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
            <h4><span class="all-tittles"><b>FICHA DE INSPECCIÓN PARA VIVIENDA</b></span></h4>
        </center>

        <div class="container">
            <form class="form-horizontal" action="" method="post" id="frmcdi" name="frmcdi" enctype="multipart/form-data">
                <input type="hidden" name="bandera" id="bandera" />
                <input type="hidden" name="baccion" id="baccion" />





                <!-- Form Name -->
                <br>



                <p style="text-align: center;">1. INFORMACIÓN GENERAL</p>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Agencia</label>
                    <div class="col-md-5 validate-input col-sm-6" data-validate="Escriba su usuario">
                        <input type="text" id="agencia" name="agencia" placeholder="" class="form-control input-md" autocomplete="off" readonly="readonly" value="<?php echo $nombre_agencia; ?>">

                    </div>
                </div>


                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Hora
                    </label>
                    <div class="col-md-2">
                        <input type="text" id="hora" name="hora" class="form-control input-md" autocomplete="off" value="<?= (isset($_POST['apellido'])) ? $_POST['apellido'] : ""; ?>" required>

                    </div>
                </div>





                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Nombre: </label>
                    <div class="col-md-5 validate-input" data-validate="Escriba su usuario">
                        <input type="text" id="nombre" name="nombre" placeholder="" class="form-control input-md" autocomplete="off" value="<?php echo $nombre_completo; ?>" readonly>

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Grupo Familiar </label>
                    <div class="col-md-5" data-validate="Escriba su usuario">
              
                    <textarea id="grupo_F" name="grupo_F" disabled value="Inexistente" class="form-control" rows="1"><?php echo "Tercer edad: ".$tercera_edad; ?>
                      <?php  echo "Adultos: ".$adultos;?>
                       <?php  echo  "Niños: ".$ninos;?>
                      <?php  echo "Discapacitados: ".$discapacitados; ?>
                        </textarea>







                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Direcci&oacuten</label>
                    <div class="col-md-5">
                        <input type="text" id="direccion" name="direccion" placeholder="" class="form-control input-md" autocomplete="off" value="<?php echo $direccion; ?>" readonly>

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Propietario del terreno</label>
                    <div class="col-md-5">
                        <input type="text" id="propietario" name="propietario" placeholder="" class="form-control input-md" autocomplete="off" value="<?php echo $propietario_vivienda; ?>" readonly>

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Latitud</label>
                    <div class="col-md-2">
                        <input type="text" id="latitud" name="latitud" placeholder="" class="form-control input-md" autocomplete="off" value="<?php echo $latitud; ?>" readonly>

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Longitud</label>
                    <div class="col-md-2">
                        <input type="text" id="longitud" name="longitud" placeholder="" class="form-control input-md" autocomplete="off" value="<?php echo $longitud; ?>" readonly>

                    </div>
                </div>


                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Inmueble</label>
                    <div class="col-md-2">
                        <input type="text" id="zona" name="zona" placeholder="" class="form-control input-md" autocomplete="off" value="<?php echo $zona; ?>" readonly>

                    </div>
                </div>

                <div>
                    <b>
                        DIMENSIONES DISPONIBLES PARA CONSTRUIR VIVIENDA:
                    </b>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Ancho: </label>
                    <div class="col-md-2 validate-input" data-validate="Escriba su usuario">
                        <input type="number" id="ancho" name="ancho" placeholder="" class="form-control input-md" autocomplete="off">

                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Largo: </label>
                    <div class="col-md-2 validate-input" data-validate="Escriba su usuario">
                        <input type="number" id="largo" name="largo" placeholder="" class="form-control input-md" autocomplete="off">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Area(M<sup>2</sup>): </label>
                    <div class="col-md-2 validate-input" data-validate="Escriba su usuario">
                        <input type="number" id="area" name="area" placeholder="" class="form-control input-md" autocomplete="off">

                    </div>
                </div>


                <br>

                <div>
                    <b>
                        DIMENSIONES DISPONIBLES PARA AMPLIACIONES FUTURAS:
                    </b>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Ancho: </label>
                    <div class="col-md-2 validate-input" data-validate="Escriba su usuario">
                        <input type="number" id="anchof" name="anchof" placeholder="" class="form-control input-md" autocomplete="off">

                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Largo: </label>
                    <div class="col-md-2 validate-input" data-validate="Escriba su usuario">
                        <input type="number" id="largof" name="largof" placeholder="" class="form-control input-md" autocomplete="off">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Area(M<sup>2</sup>): </label>
                    <div class="col-md-2 validate-input" data-validate="Escriba su usuario">
                        <input type="number" id="areaf" name="areaf" placeholder="" class="form-control input-md" autocomplete="off">

                    </div>
                </div>

                <br>
                <p style="text-align: center;"><b>2. CONSTRUCCIONES</b></p>


                <div class="form-group">
                    <label class="col-md-4 control-label" for="construccione">Construccion existente </label>

                    <div class="col-md-3" data-validate="Escriba su usuario">

                        Si <input class="form-check-input" type="radio" id="construccione" name="construccione" value="Si">
                        &nbsp;&nbsp;
                        No <input class="form-check-input" type="radio" id="construccione" name="construccione" value="No">

                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Construccion Habitada </label>
                    <div class="col-md-2" data-validate="Escriba su usuario">
                        Si <input type="radio" id="construccionh" name="construccionh" value="Si">
                        &nbsp;&nbsp; No <input type="radio" id="construccionh" name="construccionh" value="No">

                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Se requiere demoliciones </label>
                    <div class="col-md-2" data-validate="Escriba su usuario">
                        Si <input type="radio" id="sdemolicion" name="sdemolicion" value="Si">
                        &nbsp;&nbsp; No <input type="radio" id="sdemolicion" name="sdemolicion" value="No">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Inmueble delimitado (cercos o mojones) </label>
                    <div class="col-md-2" data-validate="Escriba su usuario">
                        Si <input type="radio" id="inmuebled" name="inmuebled" value="Si">
                        &nbsp;&nbsp; No <input type="radio" id="inmuebled" name="inmuebled" value="No">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Excavaciones o perforaciones </label>
                    <div class="col-md-2" data-validate="Escriba su usuario">
                        Si <input type="radio" id="exca_per" name="exca_per" value="Si">
                        &nbsp;&nbsp; No <input type="radio" id="exca_per" name="exca_per" value="No">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Tapiales o muros </label>
                    <div class="col-md-2" data-validate="Escriba su usuario">
                        Si <input type="radio" id="tap_muros" name="tap_muros" value="Si">
                        &nbsp;&nbsp; No <input type="radio" id="tap_muros" name="tap_muros" value="No">

                    </div>
                </div>


                <br>
                <p style="text-align: center;"><b>3. INFRAESTRUCTURA</b></p>


                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Aceras </label>
                    <div class="col-md-2" data-validate="Escriba su usuario">
                        Si <input type="radio" id="aceras" name="aceras" value="Si">
                        &nbsp;&nbsp; No <input type="radio" id="aceras" name="aceras" value="No">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Acceso a pavimento </label>
                    <div class="col-md-2" data-validate="Escriba su usuario">
                        Si <input type="radio" id="acceso_pav" name="acceso_pav" value="Si">
                        &nbsp;&nbsp; No <input type="radio" id="acceso_pav" name="acceso_pav" value="No">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Cordones </label>
                    <div class="col-md-2" data-validate="Escriba su usuario">
                        Si <input type="radio" id="cordones" name="cordones" value="Si">
                        &nbsp;&nbsp; No <input type="radio" id="cordones" name="cordones" value="No">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Cunetas </label>
                    <div class="col-md-2" data-validate="Escriba su usuario">
                        Si <input type="radio" id="cunetas" name="cunetas" value="Si">
       &nbsp;&nbsp;   No <input type="radio" id="cunetas" name="cunetas" value="No">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Infraestructura comunitaria </label>
                    <div class="col-md-2" data-validate="Escriba su usuario">
                        Si <input type="radio" id="icomunitaria" name="icomunitaria" value="Si">
                        &nbsp;&nbsp; No <input type="radio" id="icomunitaria" name="icomunitaria" value="No">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Parques cercanos </label>
                    <div class="col-md-2" data-validate="Escriba su usuario">
                        Si <input type="radio" id="parques" name="parques" value="Si">
                        &nbsp;&nbsp; No <input type="radio" id="parques" name="parques" value="No">

                    </div>
                </div>

                <p style="text-align: center;"><b>4. SANEAMIENTO</b></p>


                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Sistema de fosa séptica </label>
                    <div class="col-md-2" data-validate="Escriba su usuario">
                        Si <input type="radio" id="s_fosa" name="s_fosa" value="Si">
                        &nbsp;&nbsp; No <input type="radio" id="s_fosa" name="s_fosa" value="No">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Letrina de hoyo seco </label>
                    <div class="col-md-2" data-validate="Escriba su usuario">
                        Si <input type="radio" id="letrina_hoyo" name="letrina_hoyo" value="Si">
                        &nbsp;&nbsp; No <input type="radio" id="letrina_hoyo" name="letrina_hoyo" value="No">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Letrina abonera </label>
                    <div class="col-md-2" data-validate="Escriba su usuario">
                        Si <input type="radio" id="letrina_abonera" name="letrina_abonera" value="Si">
                        &nbsp;&nbsp; No <input type="radio" id="letrina_abonera" name="letrina_abonera" value="No">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Pila </label>
                    <div class="col-md-2" data-validate="Escriba su usuario">
                        Si <input type="radio" id="pila" name="pila" value="Si">
                        &nbsp;&nbsp; No <input type="radio" id="pila" name="pila" value="No">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Capatación de aguas lluvias </label>
                    <div class="col-md-2" data-validate="Escriba su usuario">
                        Si <input type="radio" id="ca_lluvias" name="ca_lluvias" value="Si">
                        &nbsp;&nbsp; No <input type="radio" id="ca_lluvias" name="ca_lluvias" value="No">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Pozos de abastecimiento </label>
                    <div class="col-md-2" data-validate="Escriba su usuario">
                        Si <input type="radio" id="po_abastecimiento" name="po_abastecimiento" value="Si">
                        &nbsp;&nbsp; No <input type="radio" id="po_abastecimiento" name="po_abastecimiento" value="No">

                    </div>
                </div>


                <p style="text-align: center;"><b>5. SERVICIOS BÁSICOS</b></p>


                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Servicio de agua potable activo </label>
                    <div class="col-md-2" data-validate="Escriba su usuario">
                        Si <input type="radio" id="s_aguap" name="s_aguap" value="Si">
                        &nbsp;&nbsp; No <input type="radio" id="s_aguap" name="s_aguap" value="No">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Servicio de energia electrica activo </label>
                    <div class="col-md-2" data-validate="Escriba su usuario">
                        Si <input type="radio" id="s_energia" name="s_energia" value="Si">
                        &nbsp;&nbsp; No <input type="radio" id="s_energia" name="s_energia" value="No">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Drenajes de agua lluvia </label>
                    <div class="col-md-2" data-validate="Escriba su usuario">
                        Si <input type="radio" id="drenaje_lluvia" name="drenaje_lluvia" value="Si">
                        &nbsp;&nbsp; No <input type="radio" id="drenaje_lluvia" name="drenaje_lluvia" value="No">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Drenaje de aguas residuales </label>
                    <div class="col-md-2" data-validate="Escriba su usuario">
                        Si <input type="radio" id="drenaje_residual" name="drenaje_residual" value="Si">
                        &nbsp;&nbsp; No <input type="radio" id="drenaje_residual" name="drenaje_residual" value="No">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Alumbrado público </label>
                    <div class="col-md-2" data-validate="Escriba su usuario">
                        Si <input type="radio" id="alumbrado_publico" name="alumbrado_publico" value="Si">
                        &nbsp;&nbsp; No <input type="radio" id="alumbrado_publico" name="alumbrado_publico" value="No">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Recolección de desechos </label>
                    <div class="col-md-2" data-validate="Escriba su usuario">
                        Si <input type="radio" id="recoleccion_desechos" name="recoleccion_desechos" value="Si">
                        &nbsp;&nbsp; No <input type="radio" id="recoleccion_desechos" name="recoleccion_desechos" value="No">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Servicio de transporte </label>
                    <div class="col-md-2" data-validate="Escriba su usuario">
                        Si <input type="radio" id="servicio_transporte" name="servicio_transporte" value="Si">
                        &nbsp;&nbsp; No <input type="radio" id="servicio_transporte" name="servicio_transporte" value="No">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Comentarios/observaciones: </label>
                    <div class="col-md-5" data-validate="Escriba su usuario">
                        <textarea id="comentarios_primero" name="comentarios_primero" value="Inexistente" class="form-control" rows="3"></textarea>







                    </div>
                </div>


            


        

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">6. VÍAS DE ACCESO</label>
                   
                    Carretera/ Calle Pavimentada <input type="radio" id="vias_acceso" name="vias_acceso" value="Carretera/ Calle Pavimentada">
                        &nbsp;&nbsp; Calle rural <input type="radio" id="vias_acceso" name="vias_acceso" value="Calle rural" >
                        &nbsp;&nbsp; Servidumbre <input type="radio" id="vias_acceso" name="vias_acceso" value="Servidumbre" >
                        &nbsp;&nbsp; Pasaje peatonal <input type="radio" id="vias_acceso" name="vias_acceso" value="Pasaje peatonal" >

                 
                </div>

           

                <p>El o la solicitante se comprometen a facilitar: </p>



                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Mojones del lote </label>
                    <div class="col-md-2" data-validate="Escriba su usuario">
                        Si <input type="radio" id="f_mojones" name="f_mojones" value="Si">
                        &nbsp;&nbsp; No <input type="radio" id="f_mojones" name="f_mojones" value="No">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Linderos del lote </label>
                    <div class="col-md-2" data-validate="Escriba su usuario">
                        Si <input type="radio" id="f_linderos" name="f_linderos" value="Si">
                        &nbsp;&nbsp; No <input type="radio" id="f_linderos" name="f_linderos" value="No">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Resguardo de materiales y herramientas </label>
                    <div class="col-md-2" data-validate="Escriba su usuario">
                        Si <input type="radio" id="f_mherramientas" name="f_mherramientas" value="Si">
                        &nbsp;&nbsp; No <input type="radio" id="f_mherramientas" name="f_mherramientas" value="No">

                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Auxiliares de construcción </label>
                    <div class="col-md-2" data-validate="Escriba su usuario">
                        Si <input type="radio" id="a_construccion" name="a_construccion" value="Si">
                        &nbsp;&nbsp; No <input type="radio" id="a_construccion" name="a_construccion" value="No">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Agua potable para </label>
                    <div class="col-md-2" data-validate="Escriba su usuario">
                        Si <input type="radio" id="f_aguap" name="f_aguap" value="Si">
                        &nbsp;&nbsp; No <input type="radio" id="f_aguap" name="f_aguap" value="No">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Energía eléctrica </label>
                    <div class="col-md-2" data-validate="Escriba su usuario">
                        Si <input type="radio" id="f_energia" name="f_energia" value="Si">
                        &nbsp;&nbsp; No <input type="radio" id="f_energia" name="f_energia" value="No">

                    </div>
                </div>



                <p style="text-align: center;"><b>7. EVALUACIÓN DE DAÑOS A INFRAESTRUCTURA</b></p>


                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Cubierta de techo (Lamina, tejas, etc) </label>
                
              
                        Inexistente <input type="radio" id="cubierta_techo" name="cubierta_techo" onclick="suma1(this.form)"value="1" class="sumatoria1">
                

                  &nbsp;&nbsp; Leve <input type="radio" id="cubierta_techo" name="cubierta_techo" onclick="suma1(this.form)"value="2" >
          &nbsp;&nbsp; Moderado <input type="radio" id="cubierta_techo" name="cubierta_techo"     onclick="suma1(this.form)" value="3" >
                &nbsp;&nbsp; Severo <input type="radio" id="cubierta_techo" name="cubierta_techo" onclick="suma1(this.form)" value="4" >
               &nbsp;&nbsp; Colapso <input type="radio" id="cubierta_techo" name="cubierta_techo" onclick="suma1(this.form)" value="5" >


                  
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Estructura de techo (polines, macomber, etc) </label>
               
                        Inexistente <input type="radio" id="estructura_techo" name="estructura_techo" onclick="suma1(this.form)"value="1" class="sumatoria1">
                  &nbsp;&nbsp; Leve <input type="radio" id="estructura_techo" name="estructura_techo" onclick="suma1(this.form)"value="2" >
              &nbsp;&nbsp; Moderado <input type="radio" id="estructura_techo" name="estructura_techo" onclick="suma1(this.form)" value="3">
                &nbsp;&nbsp; Severo <input type="radio" id="estructura_techo" name="estructura_techo" onclick="suma1(this.form)" value="4">
               &nbsp;&nbsp; Colapso <input type="radio" id="estructura_techo" name="estructura_techo" onclick="suma1(this.form)" value="5" >


              
                </div>



                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Columnas o contrafuertes </label>
            
                        Inexistente <input type="radio" id="columnas_contrafuertes" name="columnas_contrafuertes" onclick="suma1(this.form)"value="1" class="sumatoria1"  >
                  &nbsp;&nbsp; Leve <input type="radio" id="columnas_contrafuertes" name="columnas_contrafuertes" onclick="suma1(this.form)"value="2"   >
              &nbsp;&nbsp; Moderado <input type="radio" id="columnas_contrafuertes" name="columnas_contrafuertes" onclick="suma1(this.form)" value="3"   >
                &nbsp;&nbsp; Severo <input type="radio" id="columnas_contrafuertes" name="columnas_contrafuertes" onclick="suma1(this.form)" value="4"   >
               &nbsp;&nbsp; Colapso <input type="radio" id="columnas_contrafuertes" name="columnas_contrafuertes" onclick="suma1(this.form)" value="5"   >


                


                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Paredes estructurales (bloque, concreto, adobe, etc.) </label>
   
                        Inexistente <input type="radio" id="paredes_estructurales" name="paredes_estructurales" onclick="suma1(this.form)"value="1"  class="sumatoria1" >
                  &nbsp;&nbsp; Leve <input type="radio" id="paredes_estructurales" name="paredes_estructurales" onclick="suma1(this.form)"value="2"    >
              &nbsp;&nbsp; Moderado <input type="radio" id="paredes_estructurales" name="paredes_estructurales" onclick="suma1(this.form)" value="3"   >
                &nbsp;&nbsp; Severo <input type="radio" id="paredes_estructurales" name="paredes_estructurales" onclick="suma1(this.form)" value="4"   >
               &nbsp;&nbsp; Colapso <input type="radio" id="paredes_estructurales" name="paredes_estructurales" onclick="suma1(this.form)" value="5"   >


             
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Paredes livianas (tablayeso, lámina, etc.) </label>
           
                        Inexistente <input type="radio" id="paredes_livianas" name="paredes_livianas" onclick="suma1(this.form)"value="1"    class="sumatoria1"  >
                  &nbsp;&nbsp; Leve <input type="radio" id="paredes_livianas" name="paredes_livianas" onclick="suma1(this.form)"value="2"   >
              &nbsp;&nbsp; Moderado <input type="radio" id="paredes_livianas" name="paredes_livianas" onclick="suma1(this.form)" value="3" >
                &nbsp;&nbsp; Severo <input type="radio" id="paredes_livianas" name="paredes_livianas" onclick="suma1(this.form)" value="4"   >
               &nbsp;&nbsp; Colapso <input type="radio" id="paredes_livianas" name="paredes_livianas" onclick="suma1(this.form)" value="5">


               
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Piso (concreto, cerámico, ladrillo, tierra, etc.)</label>
            
                        Inexistente <input type="radio" id="piso_evaluacion" name="piso_evaluacion" onclick="suma1(this.form)"value="1"  class="sumatoria1">
                  &nbsp;&nbsp; Leve <input type="radio" id="piso_evaluacion" name="piso_evaluacion" onclick="suma1(this.form)"value="2" >
              &nbsp;&nbsp; Moderado <input type="radio" id="piso_evaluacion" name="piso_evaluacion" onclick="suma1(this.form)" value="3">
                &nbsp;&nbsp; Severo <input type="radio" id="piso_evaluacion" name="piso_evaluacion" onclick="suma1(this.form)" value="4">
               &nbsp;&nbsp; Colapso <input type="radio" id="piso_evaluacion" name="piso_evaluacion" onclick="suma1(this.form)" value="5" >


                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Otros: </label>
      
                        Inexistente <input type="radio" id="otros_evaluacion" name="otros_evaluacion" onclick="suma1(this.form)"value="1"  class="sumatoria1">
                  &nbsp;&nbsp; Leve <input type="radio" id="otros_evaluacion" name="otros_evaluacion" onclick="suma1(this.form)"value="2"  >
              &nbsp;&nbsp; Moderado <input type="radio" id="otros_evaluacion" name="otros_evaluacion" onclick="suma1(this.form)" value="3" >
                &nbsp;&nbsp; Severo <input type="radio" id="otros_evaluacion" name="otros_evaluacion" onclick="suma1(this.form)" value="4" >
               &nbsp;&nbsp; Colapso <input type="radio" id="otros_evaluacion" name="otros_evaluacion" onclick="suma1(this.form)" value="5" >


                
                </div>

                <!-- Text input-->
                <div class="form-group">
  <label class="col-md-4 col-sm-2 control-label" for="total">Total A</label>  
  <div class="col-md-1 col-sm-2 validate-input" data-validate = "Escriba su usuario">
  <input type="text" id="total1" name="total1" placeholder="" class="form-control input-md" autocomplete="off" required disabled>
    
  </div>
</div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Comentarios: </label>
                    <div class="col-md-5" data-validate="Escriba su usuario">
                        <textarea id="comentarios_danos" name="comentarios_danos" value="Inexistente" class="form-control" rows="3"></textarea>







                    </div>
                </div>
                <br>

                <!--


 <p style="text-align: center;"><b>Descripción de niveles de  tipos  daños en elementos:</b></p>

 <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Inexistente: </label>
                    <div class="col-md-5" data-validate="Escriba su usuario">
                        <textarea id="e_inexistente" name="e_inexistente"  class="form-control" rows="2"></textarea>



                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Leve: </label>
                    <div class="col-md-5" data-validate="Escriba su usuario">
                        <textarea id="e_leve" name="e_leve" class="form-control" rows="2"></textarea>



                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Moderado: </label>
                    <div class="col-md-5" data-validate="Escriba su usuario">
                        <textarea id="e_moderado" name="e_moderado" class="form-control" rows="2"></textarea>



                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Severo: </label>
                    <div class="col-md-5" data-validate="Escriba su usuario">
                        <textarea id="e_severo" name="e_severo" class="form-control" rows="2"></textarea>



                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Colapso: </label>
                    <div class="col-md-5" data-validate="Escriba su usuario">
                        <textarea id="e_colapso" name="e_colapso" class="form-control" rows="2"></textarea>



                    </div>
                </div>
                                                -->
<br>

<br>

<!-- wawawa-->

                <p style="text-align: center;"><b>8. EVALUACIÓN DE AMENAZAS Y VULNERABILIDADES DEL ENTORNO</b></p>


                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Inundación por cuerpo de agua cercano (rio, quebrada, etc) </label>
                        Inexistente <input type="radio" id="inundacion_cuerpo_c" name="inundacion_cuerpo_c"           onclick="suma2(this.form)"value="1"       class="sumatoria2"    >
                        &nbsp;&nbsp; Leve <input type="radio" id="inundacion_cuerpo_c" name="inundacion_cuerpo_c"     onclick="suma2(this.form)"value="2"     >
                        &nbsp;&nbsp; Moderado <input type="radio" id="inundacion_cuerpo_c" name="inundacion_cuerpo_c" onclick="suma2(this.form)" value="3" >
                        &nbsp;&nbsp; Severo <input type="radio" id="inundacion_cuerpo_c" name="inundacion_cuerpo_c"   onclick="suma2(this.form)" value="4"   >
                        &nbsp;&nbsp; Colapso <input type="radio" id="inundacion_cuerpo_c" name="inundacion_cuerpo_c"  onclick="suma2(this.form)" value="5"   >


                 
                </div>



                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Formación de carcava cercana a la vivienda </label>
                        Inexistente <input type="radio" id="formacion_carcava" name="formacion_carcava"          onclick="suma2(this.form)"value="1" class="sumatoria2" >
                        &nbsp;&nbsp; Leve <input type="radio" id="formacion_carcava" name="formacion_carcava"    onclick="suma2(this.form)"value="2" >
                        &nbsp;&nbsp; Moderado <input type="radio" id="formacion_carcava" name="formacion_carcava"onclick="suma2(this.form)" value="3"  >
                        &nbsp;&nbsp; Severo <input type="radio" id="formacion_carcava" name="formacion_carcava"  onclick="suma2(this.form)" value="4"  >
                        &nbsp;&nbsp; Colapso <input type="radio" id="formacion_carcava" name="formacion_carcava" onclick="suma2(this.form)" value="5"   >


                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Obras de mitigación afectadas (muros de retención, contención, etc.)</label>
                        Inexistente <input type="radio" id="obras_mitigacion" name="obras_mitigacion"            onclick="suma2(this.form)"value="1"   class="sumatoria2"    >
                        &nbsp;&nbsp; Leve <input type="radio" id="obras_mitigacion" name="obras_mitigacion"      onclick="suma2(this.form)"value="2"        >
                        &nbsp;&nbsp; Moderado <input type="radio" id="obras_mitigacion" name="obras_mitigacion"  onclick="suma2(this.form)" value="3"   >
                        &nbsp;&nbsp; Severo <input type="radio" id="obras_mitigacion" name="obras_mitigacion"    onclick="suma2(this.form)" value="4"  >  
                        &nbsp;&nbsp; Colapso <input type="radio" id="obras_mitigacion" name="obras_mitigacion"   onclick="suma2(this.form)" value="5"    >


                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Desprendimiento de tierra en taludes cercanos</label>
                        Inexistente <input type="radio" id="despredimiento_taludes" name="despredimiento_taludes"            onclick="suma2(this.form)"value="1" class="sumatoria2"  >
                        &nbsp;&nbsp; Leve <input type="radio" id="despredimiento_taludes" name="despredimiento_taludes"      onclick="suma2(this.form)"value="2"   >
                        &nbsp;&nbsp; Moderado <input type="radio" id="despredimiento_taludes" name="despredimiento_taludes"  onclick="suma2(this.form)" value="3"   >
                        &nbsp;&nbsp; Severo <input type="radio" id="despredimiento_taludes" name="despredimiento_taludes"    onclick="suma2(this.form)" value="4"   >
                        &nbsp;&nbsp; Colapso <input type="radio" id="despredimiento_taludes" name="despredimiento_taludes"   onclick="suma2(this.form)" value="5"  >


                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Colapso de estructuras cercanas (viviendas, taludes, muros, pozos, etc)</label>
                        Inexistente <input type="radio" id="colapso_estructuras_c" name="colapso_estructuras_c"           onclick="suma2(this.form)"value="1"  class="sumatoria2"   >
                        &nbsp;&nbsp; Leve <input type="radio" id="colapso_estructuras_c" name="colapso_estructuras_c"     onclick="suma2(this.form)"value="2"   >
                        &nbsp;&nbsp; Moderado <input type="radio" id="colapso_estructuras_c" name="colapso_estructuras_c" onclick="suma2(this.form)" value="3"  >
                        &nbsp;&nbsp; Severo <input type="radio" id="colapso_estructuras_c" name="colapso_estructuras_c"   onclick="suma2(this.form)" value="4"  >
                        &nbsp;&nbsp; Colapso <input type="radio" id="colapso_estructuras_c" name="colapso_estructuras_c"  onclick="suma2(this.form)" value="5"  >


                   
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Arboles y/o tendido electrico</label>
                        Inexistente <input type="radio" id="arboles_tendido" name="arboles_tendido"           onclick="suma2(this.form)"value="1"  class="sumatoria2" >
                        &nbsp;&nbsp; Leve <input type="radio" id="arboles_tendido" name="arboles_tendido"     onclick="suma2(this.form)"value="2"  >
                        &nbsp;&nbsp; Moderado <input type="radio" id="arboles_tendido" name="arboles_tendido" onclick="suma2(this.form)" value="3"  >
                        &nbsp;&nbsp; Severo <input type="radio" id="arboles_tendido" name="arboles_tendido"   onclick="suma2(this.form)" value="4">
                        &nbsp;&nbsp; Colapso <input type="radio" id="arboles_tendido" name="arboles_tendido"  onclick="suma2(this.form)" value="5" >


              
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Otros:</label>

                        Inexistente <input type="radio" id="otros_amenazas" name="otros_amenazas"           onclick="suma2(this.form)"value="1"   class="sumatoria2"     >
                        &nbsp;&nbsp; Leve <input type="radio" id="otros_amenazas" name="otros_amenazas"     onclick="suma2(this.form)"value="2"        >
                        &nbsp;&nbsp; Moderado <input type="radio" id="otros_amenazas" name="otros_amenazas" onclick="suma2(this.form)" value="3"     >
                        &nbsp;&nbsp; Severo <input type="radio" id="otros_amenazas" name="otros_amenazas"   onclick="suma2(this.form)" value="4"  >
                        &nbsp;&nbsp; Colapso <input type="radio" id="otros_amenazas" name="otros_amenazas"  onclick="suma2(this.form)" value="5"  >


                </div>

                    <!-- Text input-->
                    <div class="form-group">
  <label class="col-md-4 col-sm-2 control-label" for="total">Total B</label>  
  <div class="col-md-1 col-sm-2 validate-input" data-validate = "Escriba su usuario">
  <input type="text" id="total2" name="total2" placeholder="" class="form-control input-md" autocomplete="off" required disabled>
    
  </div>
</div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Comentarios: </label>
                    <div class="col-md-5" data-validate="Escriba su usuario">
                        <textarea id="comentarios_amenazas" name="comentarios_amenazas"  class="form-control" rows="3"></textarea>



                    </div>
                </div>




<br><br><br>


<!--


 <p style="text-align: center;"><b>Descripción de niveles de  tipos  de amenazas y vulnerabilidades:</b></p>

 <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Inexistente: </label>
                    <div class="col-md-5" data-validate="Escriba su usuario">
                        <textarea id="d_inexistente" name="d_inexistente"  class="form-control" rows="2"></textarea>



                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Leve: </label>
                    <div class="col-md-5" data-validate="Escriba su usuario">
                        <textarea id="d_leve" name="d_leve" class="form-control" rows="2"></textarea>



                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Moderado: </label>
                    <div class="col-md-5" data-validate="Escriba su usuario">
                        <textarea id="d_moderado" name="d_moderado" class="form-control" rows="2"></textarea>



                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Severo: </label>
                    <div class="col-md-5" data-validate="Escriba su usuario">
                        <textarea id="d_severo" name="d_severo" class="form-control" rows="2"></textarea>



                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Inminente: </label>
                    <div class="col-md-5" data-validate="Escriba su usuario">
                        <textarea id="d_inminente" name="d_inminente" class="form-control" rows="2"></textarea>



                    </div>
                </div>
                                                -->
<br>

<br>
<p style="text-align: center;"><b>9. Factibilidad técnica del proyecto</b></p>

    <!-- Text input-->
    <div class="form-group">
  <label class="col-md-4 col-sm-2 control-label" for="total">A - CALIFICACIÓN TOTAL DE EVALUACIÓN DE DAÑOS A INFRAESTRUCTURA:</label>  
  <div class="col-md-1 col-sm-2 validate-input" data-validate = "Escriba su usuario">
  <input type="text" id="totalAA" name="totalAA" placeholder="" class="form-control input-md" autocomplete="off" required disabled>
    
  </div>
</div>

    <!-- Text input-->
    <div class="form-group">
  <label class="col-md-4 col-sm-2 control-label" for="total">B - CALIFICACIÓN TOTAL DE EVALUACIÓN DE AMENAZAS Y VULNERABILIDADES DEL ENTORNO:</label>  
  <div class="col-md-1 col-sm-2 validate-input" data-validate = "Escriba su usuario">
  <input type="text" id="totalBB" name="totalBB" placeholder="" class="form-control input-md" autocomplete="off" required disabled>
    
  </div>
</div>

    <!-- Text input-->
    <div class="form-group">
  <label class="col-md-4 col-sm-2 control-label" for="total">CALIFICACIÓN TOTAL DE FACTIBILIDAD (A+B)</label>  
  <div class="col-md-1 col-sm-2 validate-input" data-validate = "Escriba su usuario">
  <input type="text" id="totalAB" name="totalAB" placeholder="" style="font-size: 35px;font-weight: 900;" class="form-control input-md" autocomplete="off" required disabled>
    
  </div>
</div>

    <!-- Text input-->
    <div class="form-group">
  <label class="col-md-4 col-sm-2 control-label" for="ar_ap">Estado</label>  
  <div class="col-md-2 col-sm-7 validate-input" data-validate = "Escriba su usuario">
  <input type="text" id="ar_ap" name="ar_ap" placeholder="" style="font-size: 25px;font-weight: 900;" class="form-control input-md" autocomplete="off" required disabled>
    
  </div>
</div>

<br><br><br>
<p style="text-align: center;"><b>Realizó la inspección:</b></p>
<div class="form-group">
  <label class="col-md-4 control-label" for="nombre_inspector">Nombre</label>  
  <div class="col-md-3">
  <input id="nombre_inspector" name="nombre_inspector" type="text" class="form-control input-md" autocomplete="off" required>
    
  </div>
</div><!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" for="nombre_inspector">Dui</label>  
  <div class="col-md-3">
  <input id="dui_inspector" name="dui_inspector" type="text" placeholder="" class="form-control input-md" autocomplete="off" required>
    
  </div>
</div><!-- Text input-->


<div class="form-group">
  <label class="col-md-4 control-label" for="salario" id="lfoto">Firma</label>  
<div class="col-md-4">
  <input type="text" id="url-archivo" readonly class="form-control input-md mask-telefono" autocomplete="off"/>
</div>
<div class="col-md-4">
<label class="cargar3" id="s">
Suba la firma del inspector<span>
<input type="file" id="firma_inspector" name="firma_inspector" required/>
</span>
</label>
</div>

<br><br><br>

<br><br><br>
<p style="text-align: center;"><b>ATENDIÓ LA VISITA:</b></p>
<div class="form-group">
  <label class="col-md-4 control-label" for="nombre_inspector">Nombre</label>  
  <div class="col-md-3">
  <input id="nombre_atendio" name="nombre_atendio" type="text" class="form-control input-md" autocomplete="off" required>
    
  </div>
</div><!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" for="nombre_inspector">Dui</label>  
  <div class="col-md-3">
  <input id="dui_atendio" name="dui_atendio" type="text" placeholder="" class="form-control input-md" autocomplete="off" required>
    
  </div>
</div><!-- Text input-->


<div class="form-group">
  <label class="col-md-4 control-label" for="salario" id="lfoto">Firma</label>  
<div class="col-md-4">
  <input type="text" id="url-archivo" readonly class="form-control input-md mask-telefono" autocomplete="off"/>
</div>
<div class="col-md-4">
<label class="cargar3" id="s">
Suba la firma del inspector<span>
<input type="file" id="firma_atendio" name="firma_atendio" required/>
</span>
</label>
</div>

<br><br><br><br><br><br>
<p style="text-align: center;"><b>10. Esquema de ubicación</b></p>


<div class="form-group">
  <label class="col-md-4 control-label" for="salario" id="lfoto"></label>  
<div class="col-md-4">
  <input type="text" id="url-archivo" readonly class="form-control input-md mask-telefono" autocomplete="off"/>
</div>
<div class="col-md-4">
<label class="cargar3" id="s">
subir<span>
<input type="file" id="archivo" name="archivo" required/>
</span>
</label>
</div>


</div>

<p style="text-align: center;"><b>11.ESQUEMA DE UBICACIÓN DE LA VIVIENDA DENTRO DEL LOTE</b></p>


<div class="form-group">
  <label class="col-md-4 control-label" for="salario" id="lfoto"></label>  
<div class="col-md-4">
  <input type="text" id="url-archivo" readonly class="form-control input-md mask-telefono" autocomplete="off"/>
</div>
<div class="col-md-4">
<label class="cargar3" id="s">
subir<span>
<input type="file" id="archivo2" name="archivo2" required/>
</span>
</label>
</div>


</div>

<p style="text-align: center;"><b>12. COMENTARIOS ADICIONALES PARA PROCESO CONSTRUCTIVO</b></p>

<div class="form-group">
                    <label class="col-md-4 control-label" for="nombre">Comentarios: </label>
                    <div class="col-md-5" data-validate="Escriba su usuario">
                        <textarea id="archivo3" name="archivo3"  class="form-control" rows="3"></textarea>



                    </div>
                </div>


                <!-- Button -->
                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="enviar"></label>
                    <div class="col-md-4">
                        <button type="button" id="enviar" name="enviar" class="btn btn-success" onClick="verificar()">Guardar</button>
                        <button type="reset" id="cancelar" name="cancelar" class="btn btn-danger">Cancelar</button>
                    </div>
                </div>




            </form>

        </div>



















        <footer class="footer full-reset">
            <div class="footer-copyright full-reset all-tittles"><img src="../img/logoC.png" width="45" height="45" />Sistema Habitat Para La Humanidad 2021</div>

        </footer>
    </div>



</body>


</html>
<?php

include("../config/conexion.php");
if (isset($_REQUEST["bandera"])) {

    $bandera = $_REQUEST["bandera"];

$fecha = $_REQUEST["fecha"];
$ancho = $_REQUEST["ancho"];
$largo = $_REQUEST["largo"];
$area  = $_REQUEST["area"];
$anchof  = $_REQUEST["anchof"];
$largof  = $_REQUEST["largof"];
$areaf  = $_REQUEST["areaf"];
$construccione  = $_REQUEST["construccione"];
$construccionh  = $_REQUEST["construccionh"];
$sdemolicion  = $_REQUEST["sdemolicion"];
$inmuebled  = $_REQUEST["inmuebled"];
$exca_per  = $_REQUEST["exca_per"];
$tap_muros  = $_REQUEST["tap_muros"];
$aceras  = $_REQUEST["aceras"];
$acceso_pav  = $_REQUEST["acceso_pav"];
$cordones  = $_REQUEST["cordones"];
$cunetas  = $_REQUEST["cunetas"];
$icomunitaria  = $_REQUEST["icomunitaria"];
$parques  = $_REQUEST["parques"];
$s_fosa  = $_REQUEST["s_fosa"];
$letrina_hoyo  = $_REQUEST["letrina_hoyo"];
$letrina_abonera  = $_REQUEST["letrina_abonera"];
$pila  = $_REQUEST["pila"];
$ca_lluvias  = $_REQUEST["ca_lluvias"];
$po_abastecimiento  = $_REQUEST["po_abastecimiento"];
$s_aguap  = $_REQUEST["s_aguap"];
$s_energia  = $_REQUEST["s_energia"];
$drenaje_lluvia  = $_REQUEST["drenaje_lluvia"];
$drenaje_residual  = $_REQUEST["drenaje_residual"];
$alumbrado_publico  = $_REQUEST["alumbrado_publico"];
$recoleccion_desechos  = $_REQUEST["recoleccion_desechos"];
$servicio_transporte  = $_REQUEST["servicio_transporte"];
$comentarios_primero  = $_REQUEST["comentarios_primero"];
$vias_acceso  = $_REQUEST["vias_acceso"];
$f_mojones  = $_REQUEST["f_mojones"];
$f_linderos  = $_REQUEST["f_linderos"];
$f_mherramientas  = $_REQUEST["f_mherramientas"];
$a_construccion  = $_REQUEST["a_construccion"];
$f_aguap  = $_REQUEST["f_aguap"];
$f_energia  = $_REQUEST["f_energia"];
$cubierta_techo  = $_REQUEST["cubierta_techo"];
$estructura_techo  = $_REQUEST["estructura_techo"];
$columnas_contrafuertes  = $_REQUEST["columnas_contrafuertes"];
$paredes_estructurales  = $_REQUEST["paredes_estructurales"];
$paredes_livianas  = $_REQUEST["paredes_livianas"];
$piso_evaluacion  = $_REQUEST["piso_evaluacion"];
$otros_evaluacion  = $_REQUEST["otros_evaluacion"];
$comentarios_danos  = $_REQUEST["comentarios_danos"];
// $e_inexistente  = $_REQUEST["e_inexistente"];
// $e_leve  = $_REQUEST["e_leve"];
// $e_moderado  = $_REQUEST["e_moderado"];
// $e_severo  = $_REQUEST["e_severo"];
// $e_colapso  = $_REQUEST["e_colapso"];
$inundacion_cuerpo_c  = $_REQUEST["inundacion_cuerpo_c"];
$formacion_carcava  = $_REQUEST["formacion_carcava"];
$obras_mitigacion  = $_REQUEST["obras_mitigacion"];
$despredimiento_taludes  = $_REQUEST["despredimiento_taludes"];
$colapso_estructuras_c  = $_REQUEST["colapso_estructuras_c"];
$arboles_tendido  = $_REQUEST["arboles_tendido"];
$otros_amenazas  = $_REQUEST["otros_amenazas"];
$comentarios_amenazas  = $_REQUEST["comentarios_amenazas"];
// $d_inexistente  = $_REQUEST["d_inexistente"];
// $d_leve  = $_REQUEST["d_leve"];
// $d_moderado  = $_REQUEST["d_moderado"];
// $d_severo  = $_REQUEST["d_severo"];
// $d_inminente  = $_REQUEST["d_inminente"];
//$archivo  = $_REQUEST["archivo"];
//$archivo2  = $_REQUEST["archivo2"];
//$archivo3  = $_REQUEST["archivo3"];
$nombre_inspector  = $_REQUEST["nombre_inspector"];
$dui_inspector  = $_REQUEST["dui_inspector"];
///$firma_inspector  = $_REQUEST["firma_inspector"];
$nombre_atendio  = $_REQUEST["nombre_atendio"];
$dui_atendio  = $_REQUEST["dui_atendio"];
//$firma_atendio  = $_REQUEST["firma_atendio"];

$temp = $_FILES['archivo']['tmp_name']; // tmp name (no se puede cambiar el nombre nos devuelve la ubicación temporal del archivo. 
$name = $_FILES['archivo']['name']; // nombre original del archivo 
$tamanoBytes = $_FILES['archivo']['size']; // En bytes 
$tipoFile = $_FILES['archivo']['type'];



$temp2 = $_FILES['archivo2']['tmp_name']; // tmp name (no se puede cambiar el nombre nos devuelve la ubicación temporal del archivo. 
$name2 = $_FILES['archivo2']['name']; // nombre original del archivo 
$tamanoBytes2 = $_FILES['archivo2']['size']; // En bytes 
$tipoFile2 = $_FILES['archivo2']['type'];


$archivo3  = $_REQUEST["archivo3"];


$temp4 = $_FILES['firma_inspector']['tmp_name']; // tmp name (no se puede cambiar el nombre nos devuelve la ubicación temporal del archivo. 
$name4 = $_FILES['firma_inspector']['name']; // nombre original del archivo 
$tamanoBytes4 = $_FILES['firma_inspector']['size']; // En bytes 
$tipoFile4 = $_FILES['firma_inspector']['type'];

$temp5 = $_FILES['firma_atendio']['tmp_name']; // tmp name (no se puede cambiar el nombre nos devuelve la ubicación temporal del archivo. 
$name5 = $_FILES['firma_atendio']['name']; // nombre original del archivo 
$tamanoBytes5 = $_FILES['firma_atendio']['size']; // En bytes 
$tipoFile5 = $_FILES['firma_atendio']['type'];



$hora  = $_REQUEST["hora"];



  // VALIDAR PESO DEL ARCHIVO. LIMITAR SUBIDA POR PESO 
    // LIMITAMOS A 300KB 
    $kiloBytes = $tamanoBytes/1024; // esto nos da la cantidad de kb 
    if($kiloBytes > 300000){ 
    echo "El archivo supera los 3000 KB &lt;br/&gt;";  
    
    } else{
        $v1=1;
    }
    
    // VALIDAR POR TIPO DE ARCHIVO. 
    // COMPROBAMOS LA EXTENSIÓN DEL ARCHIVO SÓLO ADMITIMOS JPH, GIF Y PNG 
    if($tipoFile == "image/jpeg" || $tipoFile == "image/gif" || $tipoFile == "image/png"){ 
    $v1=1;
    } 
    else{ 
    
    } 
    
    
    // LE ASIGNAMOS UN NOMBRE DE EXTENSIÓN A LOS ARCHIVOS GRÁFICOS 
    switch ($tipoFile) 
    { 
    case 'image/jpeg': 
    $ext = ".jpg"; 
    break;
    
    case 'image/gif': 
    $ext = ".gif"; 
    break; 
    
    case 'image/png': 
    $ext = ".png"; 
    break; 
    }
    
    // VALOR ALEATORIO CON EL QUE SE ALMACENARÁ EL ARCHIVO 
    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; 
    $cad = ""; 
    // 18 ES EL LARGO DEL STRING RANDOM, ESTE SERÁ EL TAMAÑO DEL NOMBRE DEL ARCHIVO 
    for($i=0;$i<18;$i++) { 
    $cad .= substr($str,rand(0,62),1); 
    }
    
    // REEMPLAZAR EN CASO DE NOMBRE COMPUESTOS LOS ESPACIOS POR GUIÓN BAJO 
    //$alea1 = str_replace(" ","_",$alea1);
    
    $alea1 = $cad.$ext; 
    echo "Alea: " .$alea1 ."&lt;br/&gt;";
    
    //copy($temp,$alea1); 
    $fecha = date("y-m-d");
    
    
    // Indicamos el directorio donde se guardará el archivo 
    $dir = "../inspeccion/"; 
    move_uploaded_file ($temp,"$dir/$alea1");
    


  ////////**************** *////////////////////////////////




// VALIDAR PESO DEL ARCHIVO. LIMITAR SUBIDA POR PESO 
    // LIMITAMOS A 300KB 
    $kiloBytes2 = $tamanoBytes2/1024; // esto nos da la cantidad de kb 
    if($kiloBytes2 > 300000){ 
    echo "El archivo supera los 3000 KB &lt;br/&gt;";  
    
    } else{
        $v2=1;
    }
    
    // VALIDAR POR TIPO DE ARCHIVO. 
    // COMPROBAMOS LA EXTENSIÓN DEL ARCHIVO SÓLO ADMITIMOS JPH, GIF Y PNG 
    if($tipoFile2 == "image/jpeg" || $tipoFile2 == "image/gif" || $tipoFile2 == "image/png"){ 
    $v2=1;
    } 
    else{ 
    
    } 
    
    
    // LE ASIGNAMOS UN NOMBRE DE EXTENSIÓN A LOS ARCHIVOS GRÁFICOS 
    switch ($tipoFile2) 
    { 
    case 'image/jpeg': 
    $ext = ".jpg"; 
    break;
    
    case 'image/gif': 
    $ext = ".gif"; 
    break; 
    
    case 'image/png': 
    $ext = ".png"; 
    break; 
    }
  
    // VALOR ALEATORIO CON EL QUE SE ALMACENARÁ EL ARCHIVO 
    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; 
    $cad = ""; 
    // 18 ES EL LARGO DEL STRING RANDOM, ESTE SERÁ EL TAMAÑO DEL NOMBRE DEL ARCHIVO 
    for($i=0;$i<18;$i++) { 
    $cad .= substr($str,rand(0,62),1); 
    }
    
    // REEMPLAZAR EN CASO DE NOMBRE COMPUESTOS LOS ESPACIOS POR GUIÓN BAJO 
    //$alea1 = str_replace(" ","_",$alea1);
    
    $alea2 = $cad.$ext; 
    echo "Alea: " .$alea2 ."&lt;br/&gt;";
    
    //copy($temp,$alea1); 
    $fecha = date("y-m-d");
    
    
    // Indicamos el directorio donde se guardará el archivo 
    $dir = "../inspeccion/"; 
    move_uploaded_file ($temp2,"$dir/$alea2");


//$query_s2=pg_query($conexion,"select * from cliente where dui='$dui' ");
//	$rows = pg_num_rows($query_s2);
	

	

/////////////////////////////////////////////////
/////////////////////////////////////////////////
/////////////////////////////////////////////////

  // VALIDAR PESO DEL ARCHIVO. LIMITAR SUBIDA POR PESO 
    // LIMITAMOS A 300KB 
    $kiloBytes = $tamanoBytes/1024; // esto nos da la cantidad de kb 
    if($kiloBytes > 300000){ 
    echo "El archivo supera los 3000 KB &lt;br/&gt;";  
    
    } else{
        $v1=1;
    }
    
    // VALIDAR POR TIPO DE ARCHIVO. 
    // COMPROBAMOS LA EXTENSIÓN DEL ARCHIVO SÓLO ADMITIMOS JPH, GIF Y PNG 
    if($tipoFile == "image/jpeg" || $tipoFile == "image/gif" || $tipoFile == "image/png"){ 
    $v2=1;
    } 
    else{ 
    
    } 
    
    
    // LE ASIGNAMOS UN NOMBRE DE EXTENSIÓN A LOS ARCHIVOS GRÁFICOS 
    switch ($tipoFile) 
    { 
    case 'image/jpeg': 
    $ext = ".jpg"; 
    break;
    
    case 'image/gif': 
    $ext = ".gif"; 
    break; 
    
    case 'image/png': 
    $ext = ".png"; 
    break; 
    }
    
    // VALOR ALEATORIO CON EL QUE SE ALMACENARÁ EL ARCHIVO 
    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; 
    $cad = ""; 
    // 18 ES EL LARGO DEL STRING RANDOM, ESTE SERÁ EL TAMAÑO DEL NOMBRE DEL ARCHIVO 
    for($i=0;$i<18;$i++) { 
    $cad .= substr($str,rand(0,62),1); 
    }
    
    // REEMPLAZAR EN CASO DE NOMBRE COMPUESTOS LOS ESPACIOS POR GUIÓN BAJO 
    //$alea1 = str_replace(" ","_",$alea1);
    
    $alea1 = $cad.$ext; 
    echo "Alea: " .$alea1 ."&lt;br/&gt;";
    
    //copy($temp,$alea1); 
    $fecha = date("y-m-d");
    
    
    // Indicamos el directorio donde se guardará el archivo 
    $dir = "../inspeccion/"; 
    move_uploaded_file ($temp,"$dir/$alea1");
    


  ////////**************** *////////////////////////////////




// VALIDAR PESO DEL ARCHIVO. LIMITAR SUBIDA POR PESO 
    // LIMITAMOS A 300KB 
    $kiloBytes2 = $tamanoBytes2/1024; // esto nos da la cantidad de kb 
    if($kiloBytes2 > 300000){ 
    echo "El archivo supera los 3000 KB &lt;br/&gt;";  
    
    } else{
        $v2=1;
    }
    
    // VALIDAR POR TIPO DE ARCHIVO. 
    // COMPROBAMOS LA EXTENSIÓN DEL ARCHIVO SÓLO ADMITIMOS JPH, GIF Y PNG 
    if($tipoFile2 == "image/jpeg" || $tipoFile2 == "image/gif" || $tipoFile2 == "image/png"){ 
    $v2=1;
    } 
    else{ 
    
    } 
    
    
    // LE ASIGNAMOS UN NOMBRE DE EXTENSIÓN A LOS ARCHIVOS GRÁFICOS 
    switch ($tipoFile2) 
    { 
    case 'image/jpeg': 
    $ext = ".jpg"; 
    break;
    
    case 'image/gif': 
    $ext = ".gif"; 
    break; 
    
    case 'image/png': 
    $ext = ".png"; 
    break; 
    }
  
    // VALOR ALEATORIO CON EL QUE SE ALMACENARÁ EL ARCHIVO 
    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; 
    $cad = ""; 
    // 18 ES EL LARGO DEL STRING RANDOM, ESTE SERÁ EL TAMAÑO DEL NOMBRE DEL ARCHIVO 
    for($i=0;$i<18;$i++) { 
    $cad .= substr($str,rand(0,62),1); 
    }
    
    // REEMPLAZAR EN CASO DE NOMBRE COMPUESTOS LOS ESPACIOS POR GUIÓN BAJO 
    //$alea1 = str_replace(" ","_",$alea1);
    
    $alea2 = $cad.$ext; 
    echo "Alea: " .$alea2 ."&lt;br/&gt;";
    
    //copy($temp,$alea1); 
    $fecha = date("y-m-d");
    
    
    // Indicamos el directorio donde se guardará el archivo 
    $dir = "../inspeccion/"; 
    move_uploaded_file ($temp2,"$dir/$alea2");


//$query_s2=pg_query($conexion,"select * from cliente where dui='$dui' ");
//	$rows = pg_num_rows($query_s2);
	

	

/////////////////////////////////////////////////
/////////////////////////////////////////////////
/////////////////////////////////////////////////

// // VALIDAR PESO DEL ARCHIVO. LIMITAR SUBIDA POR PESO 
//     // LIMITAMOS A 300KB 
//     $kiloBytes3 = $tamanoBytes3/1024; // esto nos da la cantidad de kb 
//     if($kiloBytes3 > 300000){ 
//     echo "El archivo supera los 3000 KB &lt;br/&gt;";  
    
//     } else{
//         $v3=1;
//     }
    
//     // VALIDAR POR TIPO DE ARCHIVO. 
//     // COMPROBAMOS LA EXTENSIÓN DEL ARCHIVO SÓLO ADMITIMOS JPH, GIF Y PNG 
//     if($tipoFile3 == "image/jpeg" || $tipoFile3 == "image/gif" || $tipoFile3 == "image/png"){ 
//     $v3=1;
//     } 
//     else{ 
    
//     } 
    
    
//     // LE ASIGNAMOS UN NOMBRE DE EXTENSIÓN A LOS ARCHIVOS GRÁFICOS 
//     switch ($tipoFile3) 
//     { 
//     case 'image/jpeg': 
//     $ext = ".jpg"; 
//     break;
    
//     case 'image/gif': 
//     $ext = ".gif"; 
//     break; 
    
//     case 'image/png': 
//     $ext = ".png"; 
//     break; 
//     }
  
//     // VALOR ALEATORIO CON EL QUE SE ALMACENARÁ EL ARCHIVO 
//     $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; 
//     $cad = ""; 
//     // 18 ES EL LARGO DEL STRING RANDOM, ESTE SERÁ EL TAMAÑO DEL NOMBRE DEL ARCHIVO 
//     for($i=0;$i<18;$i++) { 
//     $cad .= substr($str,rand(0,62),1); 
//     }
    
//     // REEMPLAZAR EN CASO DE NOMBRE COMPUESTOS LOS ESPACIOS POR GUIÓN BAJO 
//     //$alea1 = str_replace(" ","_",$alea1);
    
//     $alea3 = $cad.$ext; 
//     echo "Alea: " .$alea3 ."&lt;br/&gt;";
    
//     //copy($temp,$alea1); 
//     $fecha = date("y-m-d");
    
    
//     // Indicamos el directorio donde se guardará el archivo 
//     $dir = "../viviendantes/"; 
//     move_uploaded_file ($temp3,"$dir/$alea3");


// //$query_s2=pg_query($conexion,"select * from cliente where dui='$dui' ");
// //	$rows = pg_num_rows($query_s2);
	

////////////////////////////////////////////////////


// VALIDAR PESO DEL ARCHIVO. LIMITAR SUBIDA POR PESO 
    // LIMITAMOS A 300KB 
    $kiloBytes4 = $tamanoBytes4/1024; // esto nos da la cantidad de kb 
    if($kiloBytes5 > 300000){ 
    echo "El archivo supera los 3000 KB &lt;br/&gt;";  
    
    } else{
        $v4=1;
    }
    
    // VALIDAR POR TIPO DE ARCHIVO. 
    // COMPROBAMOS LA EXTENSIÓN DEL ARCHIVO SÓLO ADMITIMOS JPH, GIF Y PNG 
    if($tipoFile4 == "image/jpeg" || $tipoFile4 == "image/gif" || $tipoFile4 == "image/png"){ 
    $v4=1;
    } 
    else{ 
    
    } 
    
    
    // LE ASIGNAMOS UN NOMBRE DE EXTENSIÓN A LOS ARCHIVOS GRÁFICOS 
    switch ($tipoFile4) 
    { 
    case 'image/jpeg': 
    $ext = ".jpg"; 
    break;
    
    case 'image/gif': 
    $ext = ".gif"; 
    break; 
    
    case 'image/png': 
    $ext = ".png"; 
    break; 
    }
  
    // VALOR ALEATORIO CON EL QUE SE ALMACENARÁ EL ARCHIVO 
    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; 
    $cad = ""; 
    // 18 ES EL LARGO DEL STRING RANDOM, ESTE SERÁ EL TAMAÑO DEL NOMBRE DEL ARCHIVO 
    for($i=0;$i<18;$i++) { 
    $cad .= substr($str,rand(0,62),1); 
    }
    
    // REEMPLAZAR EN CASO DE NOMBRE COMPUESTOS LOS ESPACIOS POR GUIÓN BAJO 
    //$alea1 = str_replace(" ","_",$alea1);
    
    $alea4 = $cad.$ext; 
    echo "Alea: " .$alea4 ."&lt;br/&gt;";
    
    //copy($temp,$alea1); 
    $fecha = date("y-m-d");
    
    
    // Indicamos el directorio donde se guardará el archivo 
    $dir = "../inspeccion/"; 
    move_uploaded_file ($temp4,"$dir/$alea4");


////////////////////////////////////////////
/////////////////////////////////////////////////


////////////////////////////////////////////////////


// VALIDAR PESO DEL ARCHIVO. LIMITAR SUBIDA POR PESO 
    // LIMITAMOS A 300KB 
    $kiloBytes5 = $tamanoBytes5/1024; // esto nos da la cantidad de kb 
    if($kiloBytes5 > 300000){ 
    echo "El archivo supera los 3000 KB &lt;br/&gt;";  
    
    } else{
        $v5=1;
    }
    
    // VALIDAR POR TIPO DE ARCHIVO. 
    // COMPROBAMOS LA EXTENSIÓN DEL ARCHIVO SÓLO ADMITIMOS JPH, GIF Y PNG 
    if($tipoFile5 == "image/jpeg" || $tipoFile5 == "image/gif" || $tipoFile5 == "image/png"){ 
    $v5=1;
    } 
    else{ 
    
    } 
    
    
    // LE ASIGNAMOS UN NOMBRE DE EXTENSIÓN A LOS ARCHIVOS GRÁFICOS 
    switch ($tipoFile5) 
    { 
    case 'image/jpeg': 
    $ext = ".jpg"; 
    break;
    
    case 'image/gif': 
    $ext = ".gif"; 
    break; 
    
    case 'image/png': 
    $ext = ".png"; 
    break; 
    }
  
    // VALOR ALEATORIO CON EL QUE SE ALMACENARÁ EL ARCHIVO 
    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; 
    $cad = ""; 
    // 18 ES EL LARGO DEL STRING RANDOM, ESTE SERÁ EL TAMAÑO DEL NOMBRE DEL ARCHIVO 
    for($i=0;$i<18;$i++) { 
    $cad .= substr($str,rand(0,62),1); 
    }
    
    // REEMPLAZAR EN CASO DE NOMBRE COMPUESTOS LOS ESPACIOS POR GUIÓN BAJO 
    //$alea1 = str_replace(" ","_",$alea1);
    
    $alea5 = $cad.$ext; 
    echo "Alea: " .$alea5 ."&lt;br/&gt;";
    
    //copy($temp,$alea1); 
    $fecha = date("y-m-d");
    
    
    // Indicamos el directorio donde se guardará el archivo 
    $dir = "../inspeccion/"; 
    move_uploaded_file ($temp5,"$dir/$alea5");


////////////////////////////////////////////
/////////////////////////////////////////////////



//$query_s2=pg_query($conexion,"select * from cliente where dui='$dui' ");
//	$rows = pg_num_rows($query_s2);
	

   // $arreglo = [$fecha, $mejoramiento, $dias_construccion];



    // $result=pg_query($conexion,"insert into cliente(nombres,apellidos,sexo,direccion,telefono,correo,telefono_familiar,estado_civil,zona,municipio,departamento,edad,grupo_familiar,tiempo_residencia,dui,nit,parentesco,escolaridad,ocupacion,ingresos_pro,lugar_trabajo,discapacidad,otro_parentesco,otra_escolaridad,otra_ocupacion,otra_discapacidad) values('$nombre','$apellido','$sexo','$direccion',NULLIF('$telefono',''),NULLIF('$correo',''),NULLIF('$telefonoFamiliar',''),'$estado_civil','$zonaResidencia','$municipio','$departamento','$edad','$grupoF','$tiempoR','$dui','$nit','$parentesco','$escolaridad','$ocupacion','$ingreso_pro',NULLIF('$lugar_trabajo',''),'$discapacidad',NULLIF('$otro_p',''),NULLIF('$otra_e',''),NULLIF('$otra_o',''),NULLIF('$otra_d','') ) returning idcliente" );


  
    /*
$fila2=pg_fetch_array($result);///obteniendo el id de la insercion recien hecha
$idcli=$fila2[0];
 
$result2=pg_query($conexion,"insert into cliente_agencia (idcliente,idagencia) values ('$idcli','$idagencia') ");

	*/

    $result=pg_query($conexion,"INSERT into ficha_tecnica(fecha,
    ancho,
    largo,
    area,
    anchof,
    largof,
    areaf,
    construccione,
    construccionh,
    sdemolicion,
    inmuebled,
    exca_per,
    tap_muros,
    aceras,
    acceso_pav,
    cordones,
    cunetas,
    icomunitaria,
    parques,
    s_fosa,
    letrina_hoyo,
    letrina_abonera,
    pila,
    ca_lluvias,
    po_abastecimiento,
    s_aguap,
    s_energia,
    drenaje_lluvia,
    drenaje_residual,
    alumbrado_publico,
    recoleccion_desechos,
    servicio_transporte,
    comentarios_primero,
    vias_acceso,
    f_mojones,
    f_linderos,
    f_mherramientas,
    a_construccion,
    f_aguap,
    f_energia,
    cubierta_techo,
    estructura_techo,
    columnas_contrafuertes,
    paredes_estructurales,
    paredes_livianas,
    piso_evaluacion,
    otros_evaluacion,
    comentarios_danos,
    e_inexistente,
    e_leve,
    e_moderado,
    e_severo,
    e_colapso,
    inundacion_cuerpo_c,
    formacion_carcava,
    obras_mitigacion,
    despredimiento_taludes,
    colapso_estructuras_c,
    arboles_tendido,
    otros_amenazas,
    comentarios_amenazas,
    d_inexistente,
    d_leve,
    d_moderado,
    d_severo,
    d_inminente,
    archivo,
    archivo2,
    archivo3,
    nombre_inspector,
    dui_inspector,
    firma_inspector,
    nombre_atendio,
    dui_atendio,
    firma_atendio,
    idsolicitud,
    hora
    ) values ('$fecha',
    '$ancho',
    '$largo',
    '$area',
    '$anchof',
    '$largof',
    '$areaf',
    '$construccione',
    '$construccionh',
    '$sdemolicion',
    '$inmuebled',
    '$exca_per',
    '$tap_muros',
    '$aceras',
    '$acceso_pav',
    '$cordones',
    '$cunetas',
    '$icomunitaria',
    '$parques',
    '$s_fosa',
    '$letrina_hoyo',
    '$letrina_abonera',
    '$pila',
    '$ca_lluvias',
    '$po_abastecimiento',
    '$s_aguap',
    '$s_energia',
    '$drenaje_lluvia',
    '$drenaje_residual',
    '$alumbrado_publico',
    '$recoleccion_desechos',
    '$servicio_transporte',
    '$comentarios_primero',
    '$vias_acceso',
    '$f_mojones',
    '$f_linderos',
    '$f_mherramientas',
    '$a_construccion',
    '$f_aguap',
    '$f_energia',
    '$cubierta_techo',
    '$estructura_techo',
    '$columnas_contrafuertes',
    '$paredes_estructurales',
    '$paredes_livianas',
    '$piso_evaluacion',
    '$otros_evaluacion',
    '$comentarios_danos',
    -- '$e_inexistente',
    -- '$e_leve',
    -- '$e_moderado',
    -- '$e_severo',
    -- '$e_colapso',
    '$inundacion_cuerpo_c',
    '$formacion_carcava',
    '$obras_mitigacion',
    '$despredimiento_taludes',
    '$colapso_estructuras_c',
    '$arboles_tendido',
    '$otros_amenazas',
    '$comentarios_amenazas',
    -- '$d_inexistente',
    -- '$d_leve',
    -- '$d_moderado',
    -- '$d_severo',
    -- '$d_inminente',
    '$alea1',
    '$alea2',
    '$archivo3',
    '$nombre_inspector',
    '$dui_inspector',
    '$alea4',
    '$nombre_atendio',
    '$dui_atendio',
    '$alea5',
    '$idsolicitud',
    '$hora'
    
    
    
    )");
    
    
    



	if(!$result ){
				pg_query("rollback");
		
				echo "<script language='javascript'>";
						echo "alertaErrorIngresar();";
	//echo "setTimeout ('r()', 1500);";
	echo "</script>";
				}else{
					pg_query("commit");
					echo "<script language='javascript'>";
				echo "alertaExito();";
			//	echo "redi();";
				echo "</script>";
	

                echo "<script language='javascript'>";
                echo "setTimeout ('r()', 1500);";
                echo "</script>";

				}
	

    //	
}








function generar()
{
    $str = "ABCDEFGHIJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789";
    $cad = "";
    for ($i = 0; strlen($cad) < 10; $i++) {
        $cad .= substr($str, rand(0, strlen($str) - 1), 1);
    }
    return base64_encode($cad);
}

?>