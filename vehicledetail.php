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
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="es"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>GRP 700 X Fleet | Reporte de ventas</title>
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
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body>
	<!-- BEGIN STYLE CUSTOMIZER -->
	
	<!-- END BEGIN STYLE CUSTOMIZER -->    

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
                <h1>Ventas en el sistema</h1>
            </div>
            <div class="span8">
                <ul class="pull-right breadcrumb">
                    <li><a href="index.php">Inicio</a> <span class="divider">/</span></li>
                    <li><a href="report.php">Reporte</a> <span class="divider">/</span></li>
                    <li class="active">Detalle</li>
                
                </ul>
            </div>
        </div>
    </div>
    <!-- END BREADCRUMBS -->

    <!-- BEGIN CONTAINER -->   
    <div class="container min-hight">
        <div class="row-fluid">		        
            <div class="span6">
			<form class="form-horizontal" action="csvvehicle.php" method="post">					
				<p><input input type="submit" name="csv" value="Generar CSV"  class="btn black"  /></p>
		<!-- BEGIN BORDERED TABLE PORTLET-->
		<div class="portlet box red">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-dashboard"></i><?php 
                        $cliente = filter_input(INPUT_GET, 'cliente');
                        echo "$cliente"?></div>
                            <div class="tools">
				<a href="javascript:;" class="collapse"></a>
				<a href="#portlet-config" data-toggle="modal" class="config"></a>
				<a href="javascript:;" class="reload"></a>
				<a href="javascript:;" class="remove"></a>
			    </div>
                    </div>
                        
			<div class="portlet-body">
                            <table class="table table-hover">
				<thead>
                                    <tr>
										<th>Fecha</th>
                                        <th>Vehiculo</th>
										<th>Cantidad</th>
                                        <th># Venta</th>
                                    </tr>
				</thead>
                                <tbody>
                                    <?php   
										$dbconn = pg_connect("host=127.0.0.1 dbname=grpfleet user=db_admin password='12345'")
										or die('Can not connect: ' . \pg_last_error());  
										echo "<tr>";
										$idcliente   = filter_input(INPUT_GET, 'id');
										$placa  = filter_input(INPUT_GET, 'placa');										
										$sql2 = "SELECT  v.fecha, v.dinero, v.volumen,v.id,c.nombre, vd.placa FROM venta v 
										INNER JOIN cuenta c ON c.id_cliente = v.id_cliente 
										INNER JOIN venta_detalle vd ON vd.fk_id = v.id
										WHERE v.id_cliente = $idcliente AND vd.placa ='$placa';";                                            
										$result2 = pg_query($sql2)or die('Query error: ' . \pg_last_error());                                                                                        										
										$sql3 = "SELECT vol, moneda FROM recibo"; 
										$result3 = pg_query($sql3)or die('Query error: ' . \pg_last_error());
										$row3 = pg_fetch_assoc($result3);											
										while ($row2 = pg_fetch_row($result2)) { 
											echo "<td background-color:#F5D0A9;>".$row2[0]." </td>";
											echo "<td background-color:#F5D0A9;>".$row2[5]." </td>";    
											echo "<td background-color:#F5D0A9;>".$row2[2]." ".$row3['vol']." </td>";
											echo "<td background-color:#F5D0A9;>".$row2[3]." </td>";    												                                                
											echo "</tr>";     
										}
										?> 									                                                                                                                                                                                                                                                                                                            
                                                                        
                                </tbody>
                            </table>
				<p><input input type="hidden" name="placa" value="<?php echo $placa?>" /></p>
				<p><input input type="hidden" name="idcliente" value="<?php echo $idcliente?>" /></p>
				</form>
			</div>
		</div>
		<!-- END BORDERED TABLE PORTLET-->
            </div>
	</div>        
    </div>
    <!-- END CONTAINER -->

    <!-- BEGIN FOOTER -->
   <div class="front-footer">
        <div class="container">
            <div class="row-fluid">
                
                <div class="span4 space-mobile">
                    <!-- BEGIN CONTACTS -->                                    
                    <h2>Contactenos</h2>
                    <address class="margin-bottom-40">
                        Bogotá – Colombia <br />
                        Carrera 90 No. 17B – 75 Bodega 21 <br />
                        (57)1 422 25 25 <br />
                        01 8000 114 445 <br />
                        Email: <a href="mailto:info@insepet.com">info@insepet.com</a>                        
                    </address>
                    <!-- END CONTACTS -->                                    

                                                      
                </div>
                
            </div>
        </div>
    </div>
    <!-- END FOOTER -->

    <!-- BEGIN COPYRIGHT -->
    <div class="front-copyright">
        <div class="container">
            <div class="row-fluid">
                <div class="span8">
                    <p>
                        <span class="margin-right-10">2016 © Sistemas Insepet.</span> 
                        <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
                    </p>
                </div>
                <div class="span4">
                    <ul class="social-footer">
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-google-plus"></i></a></li>
                        <li><a href="#"><i class="icon-dribbble"></i></a></li>
                        <li><a href="#"><i class="icon-linkedin"></i></a></li>
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-skype"></i></a></li>
                        <li><a href="#"><i class="icon-github"></i></a></li>
                        <li><a href="#"><i class="icon-youtube"></i></a></li>
                        <li><a href="#"><i class="icon-dropbox"></i></a></li>
                    </ul>                
                </div>
            </div>
        </div>
    </div>
    <!-- END COPYRIGHT -->

    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <script src="assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="assets/plugins/back-to-top.js"></script>    
    <script type="text/javascript" src="assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="assets/plugins/hover-dropdown.js"></script>         
    <!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>  
    <![endif]-->   
    <!-- END CORE PLUGINS -->
    <script src="assets/scripts/app.js"></script>      
    <script type="text/javascript">
        jQuery(document).ready(function() {
            App.init();
                        
        });
    </script>
    <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>