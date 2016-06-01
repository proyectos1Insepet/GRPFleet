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
    <title>GRP700 Fleet:: Actualizar cuenta</title>
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
                <h1>Client setup</h1>
            </div>
            <div class="span8">
                <ul class="pull-right breadcrumb">
                    <li><a href="index.php">Home</a> <span class="divider">/</span></li>                    
                    <li class="active">Customers</li>                  
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
			<h3>Customer Info</h3>
			<!-- BEGIN FORM-->
                        <div class="margin-bottom-30">
                            <h4>Fill all the spaces</h4>
                            <form class="form-horizontal" action="#" method="post">
				<div class="control-group">
                                    <label class="control-label" for="inputEmail">Account</label>
                                    <div class="controls">
					<p><input name="linea1" type="text"  placeholder="Customer name" id="field"  /></p>                                            
				    </div>
				</div>
				<div class="control-group">
				    <label class="control-label" for="inputPassword"></label>
                                    <div class="controls">					                                        
                                    
                                    <p><input name="id_tax" type="text" placeholder="VAT" id="field" class="help-inline"/></p>
                                    <p><input name="dir" type="text" placeholder="Address" id="field" class="help-inline" /></p>
                                    <p><input name="tel" type="text" placeholder="Phone" id="field" class="help-inline"/></p>                                            
                                    <p><input name="ciudad" type="text" placeholder="City" id="field" class="help-inline"/></p>                                    
                                    <p><input name="state" type="text" placeholder="State" id="field"/></p>
                                    <p><?php
                                                $dbconn = pg_connect("host=127.0.0.1 dbname=grpfleet user=db_admin password='12345'")
                                                or die('Can not connect: ' . \pg_last_error());
                                                $query = "SELECT  * FROM transaccion";
                                                $result = pg_query($query) or die('Query error: ' . \pg_last_error());
                                                echo "<select name='select1' id='field' class='small m-wrap'>";
                                                while($fila=  pg_fetch_array($result)){
                                                    echo "<option value=".$fila['tipo'].">".$fila['descripcion']."</option>";
                                                }
                                                echo "</select>";
                                    ?></p>
                                     <p><input name="saldo" type="text" placeholder="Balance" id="field"/></p>                                    
				    </div>
				</div>
                                    <div class="control-group">
					<div class="controls">                                            
                                            <input input type="submit" name="enviar" value="Send"  class="btn black"  />
					</div>
				    </div>
                            </form>					
			</div>
                        
                        
			<!-- END FORM-->  								
				
			</div>
                        <p><a class="btn green" href="vehicle.php"/>Next</a><br></p>
                       <p>
                        <?php 
                                        if (filter_input(INPUT_POST,'enviar')) {   
                                            $dbconn = pg_connect("host=127.0.0.1 dbname=grpfleet user=db_admin password='12345'")
                                            or die('Can not connect: ' . \pg_last_error());
                                            $query1 = "SELECT  MAX(id_cliente) FROM cuenta";
                                            $result1 = pg_query($query1) or die('Query error: ' . \pg_last_error());
                                            $row1 = pg_fetch_row($result1);
                                            $row = $row1[0] + 1;                                     
                                            $linea1 = filter_input(INPUT_POST,'linea1');                                    
                                            $id_tax = filter_input(INPUT_POST,'id_tax');
                                            $tel = filter_input(INPUT_POST,'tel');
                                            $dir = filter_input(INPUT_POST,'dir');
                                            $ciudad = filter_input(INPUT_POST,'ciudad');   
                                            $state = filter_input(INPUT_POST,'state');
                                            $saldo = filter_input(INPUT_POST,'saldo');
                                            $tipo  = filter_input(INPUT_POST,'select1');
                                            $estado = true;
                                            $query = "INSERT INTO cuenta (id_cliente,estado_cuenta, nombre, tax_number, direccion, telefono, ciudad, provincia, tipo_transaccion, saldo)  VALUES('$row','$estado','$linea1','$id_tax','$dir','$tel','$ciudad','$state','$tipo','$saldo') ";
                                            $result = pg_query($query) or die('Query error: ' . \pg_last_error());
                                            // Liberando el conjunto de resultados
                                            pg_free_result($result);
                                            // Cerrando la conexi�n
                                            pg_close($dbconn);
                                            echo "Thanks we received your information\n"; 
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