<?php //session_start();
if($_SESSION['autenticado']!="yeah"){
	header("Location: ../index.php");
	exit();
	}
?> 




<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="assets/icons/book.ico" />
<script src="../js/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="../css/sweet-alert.css">
    <link rel="stylesheet" href="../css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/jquery-1.11.2.min.js"><\/script>')</script>
    
	
	
	<!--para tabla-->	
		  <link rel="stylesheet" type="text/css" href="../paginacion/jquery.dataTables.min.css">
	<style type="text/css" class="init"></style>
	
	
	<script type="text/javascript" language="javascript" src="../paginacion/jquery.dataTables.min.js">
	</script>
	
	
	
	
    <script src="../js/bootstrap.min.js"></script>
  
 


         
                <ul class="list-unstyled">
				
				
				
				
                    <li><a href="index.php"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp; Inicio</a></li>
                   
 <?php 
				  $niv=$_SESSION["nivelUsuario"];

                  if($niv==3){?> 

			
					
					
					
					                    
					
					
					
					
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i>&nbsp;&nbsp;Beneficiarios <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="crearCliente.php"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>&nbsp;&nbsp; Crear Beneficiario</a></li>
                          
                            <li><a href="buscarCliente.php"><i class="zmdi zmdi-search zmdi-hc-fw"></i>&nbsp;&nbsp;Buscar Beneficiario</a></li>      

                         

                        </ul>
                    </li>
                    
                 
		
                    <li><a href="gestionarReportes.php"><i class="zmdi zmdi-trending-up zmdi-hc-fw"></i>&nbsp;&nbsp; Reportes</a></li>
					
					


				  <?php   }




				  if($niv==2){?> 

			
					
					
					
					                    
					
					
					
					
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i>&nbsp;&nbsp;Beneficiarios <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="crearCliente.php"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>&nbsp;&nbsp; Crear Beneficiario</a></li>
                          
                            <li><a href="buscarCliente.php"><i class="zmdi zmdi-search zmdi-hc-fw"></i>&nbsp;&nbsp;Buscar Beneficiario</a></li>      

                         

                        </ul>
                    </li>
                    
                    
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-accounts zmdi-hc-fw"></i>&nbsp;&nbsp;Empleado <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="crearEmpleado.php"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>&nbsp;&nbsp; Crear Empleado</a></li>
                          
                            <li><a href="buscarEmpleado.php"><i class="zmdi zmdi-search zmdi-hc-fw"></i>&nbsp;&nbsp;Buscar Empleado</a></li>      


                            <li><a href="crearEspecialidad.php"><i class="zmdi zmdi-accounts-list-alt zmdi-hc-fw"></i>&nbsp;&nbsp;Crear Cargo</a></li>      
                        </ul>
                    </li>

		
                    <li><a href="gestionarReportesLocal.php"><i class="zmdi zmdi-trending-up zmdi-hc-fw"></i>&nbsp;&nbsp; Reportes</a></li>
					
					


				  <?php   }


if($niv==1){

				  ?>
			
				   <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i>&nbsp;&nbsp;Beneficiarios <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="crearCliente.php"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>&nbsp;&nbsp; Crear Beneficiario</a></li>
                          
                            <li><a href="buscarCliente.php"><i class="zmdi zmdi-search zmdi-hc-fw"></i>&nbsp;&nbsp;Buscar Beneficiario</a></li>      

                         

                        </ul>
                    </li>


                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i>&nbsp;&nbsp;Agencias <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href=""><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>&nbsp;&nbsp; Crear Agencia</a></li>
                          
                            <li><a href=""><i class="zmdi zmdi-search zmdi-hc-fw"></i>&nbsp;&nbsp;Buscar Agencia</a></li>      

                         

                        </ul>
                    </li>

                    <li><a href="gestionarporAgencia.php"><i class="zmdi zmdi-trending-up zmdi-hc-fw"></i>&nbsp;&nbsp; Reportes Generales</a></li>
                  
                    <li><a href="gestionarporAgencia.php"><i class="zmdi zmdi-trending-up zmdi-hc-fw"></i>&nbsp;&nbsp; Reportes por agencia</a></li>

                    </ul>

                    <?php  }

//   if($niv==3){

    ?>
	
		
		
		
		