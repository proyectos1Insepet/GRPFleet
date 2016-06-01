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
    <title>GRP 700 X Fleet | Sale detail</title>
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
                <h1>System sales</h1>
            </div>
            <div class="span8">
                <ul class="pull-right breadcrumb">
                    <li><a href="index.php">Home</a> <span class="divider">/</span></li>
                    <li class="active">Sales <span class="divider"></span></li>
                
                </ul>
            </div>
        </div>
    </div>
    <!-- END BREADCRUMBS -->

    <!-- BEGIN CONTAINER -->   
    <div class="container min-hight">
       <div class="row-fluid">					
					<div class="span6">
						<!-- BEGIN BORDERED TABLE PORTLET-->
						<div class="portlet box green">
							<div class="portlet-title">
								<div class="caption"><i class="icon-filter"></i>Sale detail</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="#portlet-config" data-toggle="modal" class="config"></a>
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>
								</div>
							</div>
							
                                                    <?php
                                                        $dbconn = pg_connect("host=127.0.0.1 dbname=grpfleet user=db_admin password='12345'")
                                                        or die('Can not connect: ' . \pg_last_error());
                                                        $query = "SELECT  MAX (id) FROM venta";
                                                        $result = pg_query($query) or die('Query error: ' . \pg_last_error()); 
                                                        $row = pg_fetch_row($result);
                                                        $ultima = $row[0];
                                                    ?>
							<div class="portlet-body">
								<table class="table table-striped table-hover">
									<thead>
										<tr>
											<th>Customer </th>
                                                                                        <th>Date </th>
                                                                                        <th>Transaction</th>
                                                                                        </tr>
									</thead>
                                                                        <tbody>
                                                                           <?php 
                                                                                $num_venta = filter_input(INPUT_GET, 'num_venta');
                                                                                echo "<tr>";                                                                                
                                                                                $sql = "select v.id_cliente, v.fecha,v.volumen,v.tipo_transaccion, p.descripcion,
                                                                                c.nombre,t.descripcion from venta v inner join venta_detalle vd on v.id = vd.fk_id 
                                                                                inner join producto p on vd.fk_id_producto = p.id_producto
                                                                                inner join cuenta c on v.id_cliente = c.id_cliente inner join transaccion t on t.tipo = v.tipo_transaccion  WHERE v.id = $num_venta ";                                                                                                                                                               
                                                                                $result2 = pg_query($sql)or die('Query error: ' . \pg_last_error());                                                                                 
                                                                                if($result2){
                                                                                    if(pg_field_is_null($result2, 0, "id_cliente")==0){
                                                                                        $row2 = pg_fetch_assoc($result2);                                                                                                                                                                                                                                                                          
                                                                                        echo "<td background-color:#F5D0A9;>"." ".$row2['nombre']."</td> ";
                                                                                        echo "<td background-color:#F5D0A9;>".$row2['fecha']." </td>";
                                                                                        echo "<td background-color:#F5D0A9;>".$row2['descripcion']." </td>";
                                                                                        
                                                                                                   
                                                                                        echo "</tr>";  
                                                        
                                                                                        }else {echo '<br>Sin resultados.';}
                                                                                    }                                                                                                                                                                                          
                                                                                ?> 
                                                                            <thead>
										<tr>
                                                                                        
                                                                                        <th>Side</th>
                                                                                        <th>Hose</th>                                                                                        
                                                                                        <th>Fuel</th>
                                                                                        </tr>
									</thead>
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        <?php
                                                                         echo "<tr>";
                                                                               
                                                                                $sql3 = "select v.dinero, vd.placa, vd.cara, vd.manguera, p.descripcion 
                                                                                from venta v inner join venta_detalle vd on v.id = vd.fk_id 
                                                                                inner join producto p on vd.fk_id_producto = p.id_producto WHERE v.id = $num_venta ";                                                                                
                                                                                
                                                                                $result4 = pg_query($sql3)or die('Query error: ' . \pg_last_error());                                                                                 
                                                                                if($result4){
                                                                                    if(pg_field_is_null($result2, 0, "id_cliente")==0){
                                                                                        $row4 = pg_fetch_assoc($result4);                                                                                         
                                                                                        echo "<td background-color:#F5D0A9;>".$row4['cara']." </td>";
                                                                                        echo "<td background-color:#F5D0A9;>".$row4['manguera']." </td>";                                                                                        
                                                                                        echo "<td background-color:#F5D0A9;>".$row4['descripcion']." </td>";
                                                                                        
                                                                                                   
                                                                                        echo "</tr>";  
                                                        
                                                                                        }else {echo '<br>Sin resultados.';}
                                                                                    }
                                                          
                                                                                
                                                                            
                                                                        ?>
                                                                        <thead>
										<tr>
											<th>Quantity</th>
                                                                                        <th>Amount</th>
                                                                                        <th>Plate</th>
                                                                                        </tr>
									</thead>
                                                                        <tbody>
                                                                           <?php   
                                                                                echo "<tr>";                                                                                
                                                                                $sql5 = "select v.volumen, v.dinero, vd.placa  from venta v inner join venta_detalle vd on v.id = vd.fk_id 
                                                                                 WHERE v.id = $num_venta ";
                                                                                $sql2 = "select vol, moneda from recibo";
                                                                                
                                                                                $result6 = pg_query($sql5)or die('Query error: ' . \pg_last_error()); 
                                                                                $result7 = pg_query($sql2)or die('Query error: ' . \pg_last_error());
                                                                                if($result2){
                                                                                    if(pg_field_is_null($result2, 0, "id_cliente")==0){
                                                                                        $row6 = pg_fetch_assoc($result6);   
                                                                                        $row7 = pg_fetch_assoc($result7);                                                                                                                                                                                
                                                                                        echo "<td background-color:#F5D0A9;>".$row6['volumen']." ".$row7['vol']."</td>";
                                                                                        echo "<td background-color:#F5D0A9;>".$row7['moneda']." ".$row6['dinero']." </td>";
                                                                                        echo "<td background-color:#F5D0A9;>".$row6['placa']." </td>"; 
                                                                                        
                                                                                                   
                                                                                        echo "</tr>";  
                                                        
                                                                                        }else {echo '<br>Sin resultados.';}
                                                                                    }
                                                                                                                                                                    
                                                                                // Cerrando la conexi�n
                                                                                pg_close($dbconn);
                                                          
                                                                                ?>
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        </tbody>
									
										
								</table>
                                                    </div>	
                                                </div>
						<!-- END BORDERED TABLE PORTLET-->
					</div>
				</div>
        <?php
            echo '<a  target =_self href="../pdf.php?fecha='.$row2['fecha'].'&n_venta='.$num_venta.'&nombre='.$row2['nombre'].'&transaccion='.$row2['descripcion'].'&producto='.$row4['descripcion'].'&cantidad='.$row6['volumen'].'&valor='.$row6['dinero'].'">'.'PRINT</a>'."</td> ";
            ?>
            <input type="image" name="enviar"  src="/assets/img/pdf.png" alt="impresion" width="60px" height="60px" />
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