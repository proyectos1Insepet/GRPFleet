<?php
	session_start();
	 
	if (isset($_SESSION['loggedin']) & $_SESSION['loggedin'] == true){	
    }else{
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
    <title>GRP700 Fleet:: Dispensador</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/reset.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <link href="assets/css/themes/red.css" rel="stylesheet" type="text/css" id="style_color"/>    
    <link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
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
                    <!-- END TOP NAVIGATION MENU -->
                </div>
            </div>
        </div>                   
    </div>
    <!-- END HEADER -->

    <!-- BEGIN BREADCRUMBS -->   
    <div class="row-fluid breadcrumbs margin-bottom-40">
        <div class="container">
            <div class="span4">
                <h1>Configuración de equipo</h1>
            </div>
            <div class="span8">
                <ul class="pull-right breadcrumb">
                    <li><a href="index.php">Inicio</a> <span class="divider">/</span></li>                    
                    <li><a href="setup.php">Configuración</a> <span class="divider">/</span></li>
                    <li class="active">Equipo</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END BREADCRUMBS -->

    <!-- BEGIN CONTAINER -->   
    <div class="container min-hight">
		<h3>Ingrese los datos de configuración del dispensador o surtidor</h3>
		<!-- ROW 1 -->
		<div class="row-fluid margin-bottom-40">
			<!-- COLUMN 1 -->
                    <div class="span6">
			
			<!-- BEGIN FORM-->
                        <div class="margin-bottom-30">
                            <h4>Digite la información solicitada </h4> <br>
                            <form class="form-horizontal" action="" method="post">
								<div class="control-group">
                                    <label class="control-label">Número de mangueras:</label>
                                    <div class="controls">
									<p><input name="mang1" type="text"  placeholder="Mangueras L1" id="field"  /></p>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Número de mangueras L2:</label>
                                    <div class="controls">
									<p><input name="mang2" type="text"  placeholder="Mangueras L2" id="field"  /></p>
									</div>
								</div>								
									<label class="control-label" for="inputEmail">Producto G1:</label>
                                    <div class="controls">
									<p>
										<?php
											$dbconn = pg_connect("host=127.0.0.1 dbname=grpfleet user=db_admin password='12345'")
											or die('Can not connect: ' . \pg_last_error());
											$sql       = "SELECT  id_producto, descripcion FROM producto";
											$resultado = pg_query($sql) or die('Query error: ' . \pg_last_error());
											echo "<select name='select1' id='field' class='small m-wrap'>";
											while($fila=  pg_fetch_array($resultado)){
												echo "<option value=".$fila['id_producto'].">".$fila['id_producto'].". ".$fila['descripcion']."</option>";
											}
											echo "</select>";
											pg_close($dbconn);
										?>
									</p>
									
									<!--<p><input name="producto1" type="text"  placeholder="Producto 1" id="field"  /></p>-->
									</div>
								
									<label class="control-label" for="inputEmail">Producto G2:</label>
                                    <div class="controls">
									<p>
										<?php
											$dbconn = pg_connect("host=127.0.0.1 dbname=grpfleet user=db_admin password='12345'")
											or die('Can not connect: ' . \pg_last_error());
											$sql       = "SELECT  id_producto, descripcion FROM producto";
											$resultado = pg_query($sql) or die('Query error: ' . \pg_last_error());
											echo "<select name='select2' id='field' class='small m-wrap'>";
											while($fila=  pg_fetch_array($resultado)){
												echo "<option value=".$fila['id_producto'].">".$fila['id_producto'].". ".$fila['descripcion']."</option>";
											}
											echo "</select>";
											pg_close($dbconn);
										?>
									</p>
									</div>
									
									<label class="control-label" for="inputEmail">Producto G3:</label>
                                    <div class="controls">
									<p>
										<?php
											$dbconn = pg_connect("host=127.0.0.1 dbname=grpfleet user=db_admin password='12345'")
											or die('Can not connect: ' . \pg_last_error());
											$sql       = "SELECT  id_producto, descripcion FROM producto";
											$resultado = pg_query($sql) or die('Query error: ' . \pg_last_error());
											echo "<select name='select3' id='field' class='small m-wrap'>";
											while($fila=  pg_fetch_array($resultado)){
												echo "<option value=".$fila['id_producto'].">".$fila['id_producto'].". ".$fila['descripcion']."</option>";
											}
											echo "</select>";
											pg_close($dbconn);
										?>
									</p>
									</div>
									
									<label class="control-label" for="inputEmail">Producto G1 L2:</label>
                                    <div class="controls">
									<p>
										<?php
											$dbconn = pg_connect("host=127.0.0.1 dbname=grpfleet user=db_admin password='12345'")
											or die('Can not connect: ' . \pg_last_error());
											$sql       = "SELECT  id_producto, descripcion FROM producto";
											$resultado = pg_query($sql) or die('Query error: ' . \pg_last_error());
											echo "<select name='select4' id='field' class='small m-wrap'>";
											while($fila=  pg_fetch_array($resultado)){
												echo "<option value=".$fila['id_producto'].">".$fila['id_producto'].". ".$fila['descripcion']."</option>";
											}
											echo "</select>";
											pg_close($dbconn);
										?>
									</p>
									</div>
									
									<label class="control-label" for="inputEmail">Producto G2 L2:</label>
                                    <div class="controls">
									<p>
										<?php
											$dbconn = pg_connect("host=127.0.0.1 dbname=grpfleet user=db_admin password='12345'")
											or die('Can not connect: ' . \pg_last_error());
											$sql       = "SELECT  id_producto, descripcion FROM producto";
											$resultado = pg_query($sql) or die('Query error: ' . \pg_last_error());
											echo "<select name='select5' id='field' class='small m-wrap'>";
											while($fila=  pg_fetch_array($resultado)){
												echo "<option value=".$fila['id_producto'].">".$fila['id_producto'].". ".$fila['descripcion']."</option>";
											}
											echo "</select>";
											pg_close($dbconn);
										?>
									</p>
									</div>
									
									<label class="control-label" for="inputEmail">Producto G3 L2:</label>
                                    <div class="controls">
									<p>
										<?php
											$dbconn = pg_connect("host=127.0.0.1 dbname=grpfleet user=db_admin password='12345'")
											or die('Can not connect: ' . \pg_last_error());
											$sql       = "SELECT  id_producto, descripcion FROM producto";
											$resultado = pg_query($sql) or die('Query error: ' . \pg_last_error());
											echo "<select name='select6' id='field' class='small m-wrap'>";
											while($fila=  pg_fetch_array($resultado)){
												echo "<option value=".$fila['id_producto'].">".$fila['id_producto'].". ".$fila['descripcion']."</option>";
											}
											echo "</select>";
											pg_close($dbconn);
										?>
									</p>
									</div>
									
									<label class="control-label" for="inputEmail">Versión Equipo:</label>
                                    <div class="controls">
									<p><input name="version" type="text" placeholder="Versión, 6 ó 7" id="field" /></p>
									</div>
									
									<label class="control-label" for="inputEmail">Decimales Dinero:</label>
                                    <div class="controls">
									<p><input name="ddinero" type="text" placeholder="Decimales en dinero" id="field" /></p>
									</div>
											
									<label class="control-label" for="inputEmail">Decimales volumen:</label>
                                    <div class="controls">
									<p><input name="dvolumen" type="text" placeholder="Decimales en volumen" id="field" /></p>
									</div>
																											
									<label class="control-label" for="inputEmail">Pantallas:</label>
                                    <div class="controls">
									<p><input name="pantallas" type="text" placeholder="Pantallas por MUX" id="field" /></p>
									</div>
									
									<label class="control-label">PPUx10</label>
									<div class="controls">
										<p><input class="m-wrap" type="checkbox" name="ppux10" value="1"></input></p>
									</div>
									
									<label class="control-label">Venta en efectivo</label>
									<div class="controls">
										<p><input class="m-wrap" type="checkbox" name="efectivo" value="1"></input></p>
									</div>
									
									<label class="control-label">Kilometraje</label>
									<div class="controls">
										<p><input class="m-wrap" type="checkbox" name="kilometraje" value="1"></input></p>
									</div>
									
									
                                    <div class="control-group">
									<div class="controls">                                            
										<input input type="submit" name="enviar" value="Enviar"  class="btn black"  />
									</div>
									</div>
                            </form>
                            
			</div>
                        
                        
			<!-- END FORM-->  								
				
			</div>
				<p>
					<?php 
						if (filter_input(INPUT_POST,'enviar')) {   
							$dbconn = pg_connect("host=127.0.0.1 dbname=grpfleet user=db_admin password='12345'")
							or die('Can not connect: ' . \pg_last_error());
							$mang1 		 = filter_input(INPUT_POST,'mang1');
							$mang2 		 = filter_input(INPUT_POST,'mang2');
							$producto1   = filter_input(INPUT_POST,'select1');
							$producto2   = filter_input(INPUT_POST,'select2');
							$producto3   = filter_input(INPUT_POST,'select3');
							$producto1b  = filter_input(INPUT_POST,'select4');
							$producto2b  = filter_input(INPUT_POST,'select5');
							$producto3b  = filter_input(INPUT_POST,'select6');
							$version     = filter_input(INPUT_POST,'version');
							$ddinero     = filter_input(INPUT_POST,'ddinero');
							$dvolumen    = filter_input(INPUT_POST,'dvolumen');
							$ppux10      = filter_input(INPUT_POST,'ppux10'); 	
							$pantallas    = filter_input(INPUT_POST,'pantallas');	
							$kil         = filter_input(INPUT_POST,'kilometraje');
							$efectivo    = filter_input(INPUT_POST,'efectivo');	
							if ($ppux10 == "1" ){
								$x10 = 1;
							}else{
								$x10 = 0;
							}																		
							if ($kil == "1" ){
								$kilometraje = 1;
							}else{
								$kilometraje = 0;
							}
							if ($efectivo == "1" ){
								$efec = 1;
							}else{
								$efec = 0;
							}
							
							$query = "UPDATE configuracion SET mangueras = $mang1, mangueras2= $mang2, p1=$producto1, p2=$producto2, p3=$producto3, p1b=$producto1b, p2b=$producto2b, p3b=$producto3b, versions=$version, ddinero=$ddinero, dvolumen=$dvolumen, ppux10 =$x10, pantallas =$pantallas, solkm =$kilometraje, efectivo =$efec;";
							$result = pg_query($query) or die('La consulta fallo: ' . \pg_last_error());
							// Liberando el conjunto de resultados
							pg_free_result($result);
							// Cerrando la conexion
							pg_close($dbconn);
							echo "Gracias, hemos recibido su información.\n";  
						 }
					?> 
				</p>
							                            									
			</div>
				
				
			</div>			

    <!-- BEGIN FOOTER -->
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