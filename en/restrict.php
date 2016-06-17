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
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>GRP700 Fleet:: Acount restrictions</title>
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
                                    Home
                                    <i class="icon-angle-down"></i>
                                </a> 
                                 <ul class="dropdown-menu">
                                    <li><a href="index.php">Home page</a></li>	                             
	                        </ul>
                            </li>
                            <li><a href="customer.php">Customer</a></li>
                            <li><a href="sales.php">Sales</a></li>
                            <li><a href="setup.php">Setup</a></li> 
                            <li><a href="report.php">Report</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">
                                    Language
                                    <i class="icon-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="../index.php">Spanish</a></li>
                                    <li><a href="index.php">English</a></li>                                    
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
                <h1>Restriction setup</h1>
            </div>
            <div class="span8">
                <ul class="pull-right breadcrumb">
                    <li><a href="index.php">Home</a> <span class="divider">/</span></li>                    
                    <li class="active">Restrictions</li>                  
                </ul>
            </div>
        </div>
    </div>
    <!-- END BREADCRUMBS -->

    <!-- BEGIN CONTAINER -->   
    <div class="container min-hight">

		<!-- ROW 1 -->
		<div class="row-fluid margin-bottom-40">
			<!-- COLUMN 1 -->
                    <div class="span6">
			<h3>Vehicle restrictions</h3>
			<!-- BEGIN FORM-->
                        <div class="margin-bottom-30">
                            
                            <form class="form-horizontal" action="#" method="post">
				<div class="control-group">
                                    <label class="control-label" for="inputEmail">Vahiche and fuel</label>
                                    <div class="controls">
					<p>
                                        <?php
                                                $dbconn = pg_connect("host=127.0.0.1 dbname=grpfleet user=db_admin password='12345'")
                                                or die('Can not connect: ' . \pg_last_error());
                                                $query = "SELECT id_vehiculo,placa FROM vehiculo";
                                                $result = pg_query($query) or die('Query error: ' . \pg_last_error());
                                                echo "<select name='select1' id='field' class='small m-wrap'>";
                                                while($fila=  pg_fetch_array($result)){
                                                    echo "<option value=".$fila['id_vehiculo'].">".$fila['placa']."</option>";
                                                }
                                                echo "</select>";                                                                                                                                                                                            
                                                $query2 = "SELECT id_producto,descripcion FROM producto";
                                                $result2 = pg_query($query2) or die('Query error: ' . \pg_last_error());
                                                echo "<select name='select2' id='field' class='small m-wrap'>";
                                                while($fila2=  pg_fetch_array($result2)){
                                                    echo "<option value=".$fila2['id_producto'].">".$fila2['descripcion']."</option>";
                                                }
                                                echo "</select>";
                                                
                                        ?>
                                    </p>
				    </div>
				</div>
				<div class="control-group">
				    <label class="control-label" for="inputPassword"></label>
                                    <div class="controls">					                                        
                                    <p><input name="ppu" type="text" placeholder="PPU" id="ppu" class="help-inline"/></p> 
                                    <p><input name="vol" type="text" placeholder="Assigned vol" id="vol" class="help-inline"/></p>  
                                    <p><input name="din" type="text" placeholder="Assigned money" id="din" class="help-inline"/></p>
                                    <p><input name="mes" type="text" placeholder="Visit per month" id="mes" class="help-inline" /></p>                                      
                                    <p><input name="semana" type="text" placeholder="Visit per week" id="semana" class="help-inline"/></p>
                                    <p><input name="dia" type="text"  placeholder="Visit per day" id="dia" class="campo"  /></p>
                                    
                                    <p><input name="cal_vol_mon" type="text" placeholder="Vol per month" id="cal_vol_mon" class="help-inline" disabled="disabled"/></p>      
                                    <p><input name="cal_vol_week" type="text" placeholder="Vol per week" id="cal_vol_week" class="help-inline" disabled="disabled"/></p> 
                                    <p><input name="cal_vol_day" type="text" placeholder="Vol per day" id="cal_vol_day" class="help-inline" disabled="disabled"/></p> 
                                    
                                    <p><input name="cal_din_mon" type="text" placeholder="Money per month" id="cal_din_mon" class="help-inline" disabled="disabled"/></p>      
                                    <p><input name="cal_din_week" type="text" placeholder="Money per week" id="cal_din_week" class="help-inline" disabled="disabled"/></p> 
                                    <p><input name="cal_din_day" type="text" placeholder="Money per day" id="cal_din_day" class="help-inline" disabled="disabled"/></p> 
                                    
                                    
                                    
				    </div>
				</div>
                                    <div class="control-group">
					<div class="controls">                                            
                                            <p><input type="button" id="calcular" value="Calculate" class="btn red"/><br/></p>
                                            <input input type="submit" name="enviar" value="Finish"  class="btn black"  />
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
                                            $vehiculo = filter_input(INPUT_POST,'select1');                                    
                                            $producto = filter_input(INPUT_POST,'select2');
                                            $vol = filter_input(INPUT_POST,'vol');
                                            $din = filter_input(INPUT_POST,'din');
                                            $mes = filter_input(INPUT_POST,'mes');   
                                            $semana = filter_input(INPUT_POST,'semana');
                                            $dia = filter_input(INPUT_POST,'dia');
											$precio = filter_input(INPUT_POST,'ppu');
                                            $ppu = sprintf("%05s",$precio);
                                            $volmes = round(($vol / $mes),2);
                                            $volsemana = round(($volmes / $semana),2);
                                            $voldia = round(($volsemana / $dia),2);
                                            $dinmes = round(($din/$mes),2);                                                 
                                            $dinsemana = round(($dinmes/$semana),2);
                                            $dindia = round(($dinsemana/$dia),2);
                                            
                                            
                                            
                                            $query3 = "INSERT INTO restricciones  VALUES('$vehiculo','$producto','$dia','$semana','$mes','$voldia','$volsemana','$volmes','$dindia','$dinsemana','$dinmes','$ppu') ";
                                            $result3 = pg_query($query3) or die('Query error: ' . \pg_last_error());
                                            // Liberando el conjunto de resultados
                                            pg_free_result($result3);
                                            // Cerrando la conexi�n
                                            pg_close($dbconn);
                                             echo "Thanks we've received your information\n";  
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
                    <h2>Contact us</h2>
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
    <script type="text/javascript" src="js/calculo.js"></script>    
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