<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>GRP 700 X Fleet | Ventas</title>
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
                    <li class="active">Ventas <span class="divider"></span></li>
                
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
						<div class="portlet box red">
							<div class="portlet-title">
								<div class="caption"><i class="icon-coffee"></i>Ventas registradas</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="#portlet-config" data-toggle="modal" class="config"></a>
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>
								</div>
							</div>
                                                    <?php
                                                        $dbconn = pg_connect("host=localhost dbname=grpfleet user=db_admin password='12345'")
                                                        or die('Can not connect: ' . \pg_last_error());
                                                        $query = "SELECT  MAX (id) FROM venta";
                                                        $result = pg_query($query) or die('Query error: ' . \pg_last_error()); 
                                                        $row = pg_fetch_row($result);
                                                        $ultima = $row[0];
                                                    ?>
							<div class="portlet-body">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Número de venta </th>
                                                                                        <th>Fecha </th>
                                                                                        <th>ID Cliente </th>
                                                                                        </tr>
									</thead>
                                                                        <tbody>
                                                                            <?php   
                                                                                echo "<tr>";
                                                                                for($i= $ultima; $i>($ultima - 100); $i--){
                                                                                $sql = "select v.id_cliente, v.fecha, v.tipo_transaccion, 
                                                                                v.volumen, v.dinero, vd.placa, vd.cara, vd.manguera, p.descripcion from venta v inner join venta_detalle vd on v.id = vd.fk_id 
                                                                                inner join producto p on vd.fk_id_producto = p.id_producto WHERE v.id = $i ";
                                                                                $sql2 = "select vol, moneda from recibo";
                                                                                if($i<=0){
                                                                                break;
                                                                                }
                                                                                $result2 = pg_query($sql)or die('Query error: ' . \pg_last_error()); 
                                                                                $result3 = pg_query($sql2)or die('Query error: ' . \pg_last_error());
                                                                                if($result2){
                                                                                    if(pg_field_is_null($result2, 0, "id_cliente")==0){
                                                                                        $row2 = pg_fetch_assoc($result2);   
                                                                                        $row3 = pg_fetch_assoc($result3);                                                                                        
                                                                                        echo "<td background-color:#F5D0A9;>".'<a href="index.php?num_venta='.$i.'">'.$i.'</a>'."</td> ";
                                                                                        echo "<td background-color:#F5D0A9;>"." ".$row2['fecha']."</td> ";
                                                                                        echo "<td background-color:#F5D0A9;>".$row2['id_cliente']." </td>";
                                                                                        
                                                                                                   
                                                                                        echo "</tr>";  
                                                        
                                                                                        }else {echo '<br>Sin resultados.';}
                                                                                    }
                                                          
                                                                                }
                                                
                                            ?> 
									
                                                                            
                                                                            
                                                                            
                                                                        <thead>
										<tr>
                                                                                        
                                                                                        <th>Tipo de transacción </th>
                                                                                        <th>Cara</th>                                                                                        
                                                                                        <th>Producto </th>
                                                                                        </tr>
									</thead>
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        <?php
                                                                         echo "<tr>";
                                                                                for($i= $ultima; $i>($ultima - 100); $i--){
                                                                                $sql = "select v.id_cliente, v.fecha, v.tipo_transaccion, 
                                                                                v.volumen, v.dinero, vd.placa, vd.cara, vd.manguera, p.descripcion from venta v inner join venta_detalle vd on v.id = vd.fk_id 
                                                                                inner join producto p on vd.fk_id_producto = p.id_producto WHERE v.id = $i ";
                                                                                $sql2 = "select vol, moneda from recibo";
                                                                                if($i<=0){
                                                                                break;
                                                                                }
                                                                                $result2 = pg_query($sql)or die('Query error: ' . \pg_last_error()); 
                                                                                $result3 = pg_query($sql2)or die('Query error: ' . \pg_last_error());
                                                                                if($result2){
                                                                                    if(pg_field_is_null($result2, 0, "id_cliente")==0){
                                                                                        $row2 = pg_fetch_assoc($result2);   
                                                                                        $row3 = pg_fetch_assoc($result3);                                                                                       
                                                                                        echo "<td background-color:#F5D0A9;>".$row2['tipo_transaccion']." </td>";
                                                                                        echo "<td background-color:#F5D0A9;>".$row2['cara']." </td>";                                                                                        
                                                                                        echo "<td background-color:#F5D0A9;>".$row2['descripcion']." </td>";
                                                                                        
                                                                                                   
                                                                                        echo "</tr>";  
                                                        
                                                                                        }else {echo '<br>Sin resultados.';}
                                                                                    }
                                                          
                                                                                }
                                                                            
                                                                        ?>
                                                                        <thead>
										<tr>
                                                                                        
                                                                                        <th>Cantidad vendida </th>
                                                                                        <th>Valor vendido </th>
                                                                                        <th>Placa </th>
										</tr>
									</thead>
                                                                        
                                                                        
                                                                        <?php
                                                                       echo "<tr>";
                                                                                for($i= $ultima; $i>($ultima - 100); $i--){
                                                                                $sql = "select v.id_cliente, v.fecha, v.tipo_transaccion, 
                                                                                v.volumen, v.dinero, vd.placa, vd.cara, vd.manguera, p.descripcion from venta v inner join venta_detalle vd on v.id = vd.fk_id 
                                                                                inner join producto p on vd.fk_id_producto = p.id_producto WHERE v.id = $i ";
                                                                                $sql2 = "select vol, moneda from recibo";
                                                                                if($i<=0){
                                                                                break;
                                                                                }
                                                                                $result2 = pg_query($sql)or die('Query error: ' . \pg_last_error()); 
                                                                                $result3 = pg_query($sql2)or die('Query error: ' . \pg_last_error());
                                                                                if($result2){
                                                                                    if(pg_field_is_null($result2, 0, "id_cliente")==0){
                                                                                        $row2 = pg_fetch_assoc($result2);   
                                                                                        $row3 = pg_fetch_assoc($result3);                                                                                       
                                                                                        echo "<td background-color:#F5D0A9;>".$row2['volumen']." ".$row3['vol']."</td>";
                                                                                        echo "<td background-color:#F5D0A9;>".$row3['moneda']." ".$row2['dinero']." </td>";
                                                                                        echo "<td background-color:#F5D0A9;>".$row2['placa']." </td>"; 
                                                                                        
                                                                                                   
                                                                                        echo "</tr>";  
                                                        
                                                                                        }else {echo '<br>Sin resultados.';}
                                                                                    }
                                                          
                                                                                }
                                                                                pg_free_result($result);
                                                                                pg_free_result($result2);
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