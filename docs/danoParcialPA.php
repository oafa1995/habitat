<?php session_start();
 if($_SESSION['autenticado']!="yeah"){
header("Location: ../index.php");
	exit();
	}
include("../config/conexion.php");
$c1=0;
$c2=0;
$c3=0;
$c4=0;
$c5=0;
$c6=0;
$c7=0;
$c8=0;
$c9=0;
$c10=0;
$c11=0;
$acumulador=0;
$contando=0;
$idagencia=$_REQUEST["iddatos"];

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
                    <h4><span class="all-tittles">Daño parcial a la vivienda</span></h4>
                </li>
				</center>    
               
			

    <li class="mobile-menu-button visible-xs" style="float: left !important;">
                    <i class="zmdi zmdi-menu"></i>
                </li>
			
            </ul>
        </nav>
		
         
        <div class="container-fluid"  style="margin: 50px 0;">
      
			    <?php
                        include("../config/conexion.php");
					//	$query_s= pg_query($conexion, "select idcliente,nombres,apellidos,dui,telefono,direccion,municipio,departamento from cliente");
						$query_sw= pg_query($conexion, "SELECT c.idcliente,c.nombres,c.apellidos,c.dui,c.telefono,c.direccion,c.municipio,c.departamento,c.sexo,s.idsolicitud,s.fecha,sv.dano_parcial from cliente as c,solicitud as s,situacion_economica_familiar as sef,solicitud_situacion_ec as secf,situacion_salud as ss,solicitud_situacion_salud as sss,situacion_vivienda as sv,solicitud_situacion_vivienda ssv,situacion_organizacion as so,solicitud_situacion_organizacion sso,situacion_enfoque_genero as sg,solicitud_situacion_enfoque_genero ssg,datos_finales_es as df,cliente_agencia as cla WHERE c.idcliente=s.idcliente and s.idsolicitud=secf.idsolicitud and sef.idsituacion=secf.idsituacion and ss.id_situacion_salud=sss.id_situacion_salud and sss.idsolicitud=s.idsolicitud and sv.id_situacion_vivienda=ssv.id_situacion_vivienda and ssv.idsolicitud=s.idsolicitud and so.id_situacion_organizacion=sso.id_situacion_organizacion and sso.idsolicitud=s.idsolicitud and sg.id_situacion_enfoque_genero=ssg.id_situacion_enfoque_genero and ssg.idsolicitud=s.idsolicitud and df.idsolicitud=s.idsolicitud and cla.idcliente=c.idcliente and cla.idagencia='$idagencia'");
						while($filaw=pg_fetch_array($query_sw)){

$sexo=$filaw[8];
$idcliente=$filaw[0];
$idsolicitud=$filaw[9];
$rr=$filaw[11];


include("../docs/paraGraficar.php");
                     ?>
   
   
			   

                        
<?php 




  
if($rr=="Techo" && $acumulador>=45){

$c1++;
}

if($rr=="Pared" && $acumulador>=45){

    $c2++;
    }

    if($rr=="Hundimientos" && $acumulador>=45){

        $c3++;
        }

        if($rr=="Materiales" && $acumulador>=45){

            $c4++;
            }


           
                 if($rr=="Ninguno" && $acumulador>=45){

                $c5++;
                }

             
                  

//if($acumulador>=45 && $rr=="Si"){ $c1++;
  //   	}
         
    //      if($acumulador>=45 && $rr=="No"){ $c2++;                    
      //    }   


    
    
    
          
                   
                   }
                
                   ?>
	   

	
	</div>

        <div class="container">
   
           
        <canvas id="myChart"></canvas>
<script src="../css/chart.min.js"></script>
<script src="../css/chartp.min.js"></script>
<script>

/*
<option value="Entre 100 a 200">Entre $100 a $200</option>
  <option value="Entre 201 a 300">Entre $201 a $300</option>
  <option value="Entre 301 a 600">Entre $301 y $600</option>
  <option value="Entre 601 y 750">Entre $601 y $700</option>
  <option value="Mayor a 750">Mayor a $750</option>
  <option value="Ninguno">Ninguno</option>
*/

c1="<?php echo $c1; ?>";
c2="<?php echo $c2; ?>";
c3="<?php echo $c3; ?>";

c4="<?php echo $c4; ?>";

c5="<?php echo $c5; ?>";



//alert(c1);



var options = {
           tooltips: {
         enabled: false
    },
             plugins: {
            datalabels: {
                formatter: (value, ctx) => {

                    let datasets = ctx.chart.data.datasets;

                    if (datasets.indexOf(ctx.dataset) === datasets.length - 1) {
                        let sum = 0;
                        datasets.map(dataset => {
                            sum += dataset.data[ctx.dataIndex];
                        });
                        let percentage = ((value / total) * 100).toFixed(2) + '%';
            
            console.log("mensaje"+percentage);

if(percentage=="0.00%"){
percentage="";
}
            

                        return percentage;
                    } else {
         

                        return percentage;
                    }
                },
                color: '#fff',
                     }
        },
     
    };
    
/*
 
if($acumulador>=45 && $rr=="Inundación"){ $c1++;
     	}
         
          if($acumulador>=45 && $rr=="Deslave"){ $c2++;                    
          }   
   if($acumulador>=45 && $rr=="Erupción de volcán"){ $c3++;                    
          }   
   if($acumulador>=45 && $rr=="Incendio"){ $c4++;                    
          }   
   if($acumulador>=45 && $rr=="Tormentas"){ $c5++;                    
          }   
 if($acumulador>=45 && $rr=="Derrumbes"){ $c6++;                    
          }   
if($acumulador>=45 && $rr=="Ninguno"){ $c7++;                    
          }   
if($acumulador>=45 && $rr=="Otros"){ $c8++;                    
          }   
or>=45 && $rr=="Otro"){ $c5++;                    
          }   
    
*/

total="<?php echo $total=$c1+$c2+$c3+$c4+$c5; ?>";
    
//alert(total);

var ctx = document.getElementById('myChart').getContext('2d');


var chart = new Chart(ctx, {
    type: 'pie',
    data:{
	datasets: [{
       
		data: [c1,c2,c3,c4,c5],
		backgroundColor: ['blue','red','green','orange','cyan','purple','pink','violet','Golden','Brown','Gray'],
		}],
		labels: ['Techo','Pared','Hundimientos','Materiales','Ninguno']},
  
    options: options
});
        
                
        
</script>
	   
Techo: <?php echo $c1; ?><br>
Pared: <?php echo $c2; ?><br>
Hundimientos: <?php echo $c3; ?><br>
Materiales: <?php echo $c4; ?><br>
Ninguno: <?php echo $c5; ?><br>



Total: <?php echo $total; ?>



    

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
  
  function obtener_edad($fecha_nac){
    $mes="";
  $fecha_nac = strtotime($fecha_nac);
  $edad = date('Y', $fecha_nac);
  if (($mes = (date('m') - date('m', $fecha_nac))) < 0) {
  $edad++;
  } elseif ($mes == 0 && date('d') - date('d', $fecha_nac) < 0) {
  $edad++;
  }
  return date('Y') - $edad;
  }

?>