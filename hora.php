<?php
	session_start();
	 
	if (isset($_SESSION['loggedin']) & $_SESSION['loggedin'] == true)
	{
	 
        }
        else
        {
	echo "Esta pagina es solo para usuarios registrados.<br>";
	echo "<a href='login.php'>Login Here!</a>";
	 
	exit;
	}
	$now = time(); // checking the time now when home page starts
	 
	if($now > $_SESSION['expire'])
	{
	session_destroy();
	echo "Su sesion a terminado, <a href='login.php'>
	      Necesita Hacer Login</a>";
	exit;
	}
?>
<!DOCTYPE HTML>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="es"> <!--<![endif]-->
<html>
  <head>
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen"
     href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
	 <meta charset="utf-8">  
    <title>GRP 700 X Fleet | Ventas por fecha</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/reset.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/style2.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="assets/plugins/fancybox/source/jquery.fancybox.css">               
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="assets/css/pages/prices.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL STYLES -->    
    <link href="assets/css/themes/red.css" rel="stylesheet" type="text/css" id="style_color"/>    
    <link rel="shortcut icon" href="favicon.ico" />   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  </head>
  <body>
  <!-- BEGIN HEADER -->
     <div class="front-header">
        <div class="container">
            <div class="navbar">
                <div class="navbar-inner">
				
                    <!-- BEGIN LOGO (you can use logo image instead of text)-->
                    <a class="brand logo-v1" href="index.php">
                        <img src="assets/img/logo_blue.png" id="logoimg" alt="">
                    </a>
                    <!-- END LOGO -->

                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->

                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li class="dropdown active">
                                <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="index.php">
                                    Inicio
                                    <i class="icon-angle-down"></i>
                                </a> 
                                 <ul class="dropdown-menu">
                                    <li><a href="index.php">Página de inicio</a></li>	                             
	                        </ul>
                            </li>
                            <li><a href="customer.php">Clientes</a></li>
                            <li><a href="sales.php">Ventas</a></li>
                            <li><a href="setup.php">Configuracion</a></li>  
                            <li><a href="report.php">Reporte</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">
                                    Idioma
                                    <i class="icon-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php">Español</a></li>
                                    <li><a href="en/index.php">English</a></li>                                    
                                </ul>
                            </li>
                        </ul>
                                                  
                    </div>
                    <!-- BEGIN TOP NAVIGATION MENU -->
                </div>
            </div>
        </div>                   
    </div>
    <!-- END HEADER -->
 <!-- BEGIN BREADCRUMBS -->   
    <div class="row-fluid breadcrumbs margin-bottom-40">
        <div class="container">
            <div class="span4">
                <h1>Actualización hora y fecha</h1>
            </div>
            <div class="span8">
                <ul class="pull-right breadcrumb">
                    <li><a href="index.php">Inicio</a> <span class="divider">/</span></li>                    
                    <li class="active">Configuración</li>
                    
                </ul>
            </div>
        </div>
    </div>
    <!-- END BREADCRUMBS -->
<div class="container min-hight">
	<div class="row-fluid">		        
        <div class="span6">
			<div id="datetimepicker" class="input-append date">
			<form action="" method="post" id="form1">									   				
				<div class="control-group">
					<div class="controls"> 
						<input type="text" name="fecha"></input>	
						<span class="add-on">
							<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
						</span>	
							
					</div>
					<input input type="submit" name="enviar" value="Actualizar"  class="btn black"  />
				</div>
			</form>
			
			  
			</div>
			<script type="text/javascript"
			 src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">
			</script> 
			<script type="text/javascript"
			 src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js">
			</script>
			<script type="text/javascript"
			 src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
			</script>
			<script type="text/javascript"
			 src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
			</script>
			<script type="text/javascript">
			  $('#datetimepicker').datetimepicker({
				format: 'yyyy-MM-dd hh:mm:ss',
				language: 'es-mx'
				});
			</script>
		</div>
	</div>
	<p>
		<?php 
			if (filter_input(INPUT_POST,'enviar')) { 
				$fecha = filter_input(INPUT_POST,'fecha');
				$hcomando = "sudo date --set";
				$comilla = '"';
				$fechacambio =$hcomando." ".$comilla.$fecha.$comilla;
				$salida = shell_exec("$fechacambio");				
				$actual = shell_exec('date');				
				echo '<pre>';
				$ultima_linea1 = system("$fechacambio", $retval);
				$ultima_linea = $actual;
				echo '
				</pre>
				<hr />Fecha ingresada: ' . $ultima_linea1 . '
				<hr />Fecha actual: ' . $ultima_linea;				
			}			
				?> 
	</p>
</div>
	  
  
  
  </body>
<html>