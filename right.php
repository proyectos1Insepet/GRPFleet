<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>GRPFleet | Login correcto</title>
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
    <link href="assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" />               
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/themes/red.css" rel="stylesheet" type="text/css" id="style_color"/>    
    <!-- END GLOBAL MANDATORY STYLES -->
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
                <h1>Crear usuario para el sistema de control</h1>
            </div>
            <div class="span8">
                <ul class="pull-right breadcrumb">
                    <li><a href="index.php">Inicio</a> <span class="divider">/</span></li>
                    <li>Usuario <span class="divider"></span></li>
                
                </ul>
            </div>
        </div>
    </div>
    <!-- END BREADCRUMBS -->

    <!-- BEGIN CONTAINER -->   
    <div class="container min-hight">
        <!-- BEGIN BLOG -->
        <div class="row-fluid">
            <!-- BEGIN LEFT SIDEBAR -->            
            <div class="span9 blog-item margin-bottom-40">
                <div class="blog-item-img">
                    <!-- BEGIN CAROUSEL -->            
                    <div class="front-carousel">
                        <div id="myCarousel" class="carousel slide">
                            <!-- Carousel items -->
                            <div class="carousel-inner">
                                <div class="active item">
                                    <img src="assets/img/posts/img1.jpg" alt="">
                                </div>                                
                                <div class="item">
                                    <img src="assets/img/posts/img3.jpg" alt="">
                                </div>
                            </div>
                            <!-- Carousel nav -->
                            <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                                <i class="icon-angle-left"></i>
                            </a>
                            <a class="carousel-control right" href="#myCarousel" data-slide="next">
                                <i class="icon-angle-right"></i>
                            </a>
                        </div>                
                    </div>
                    <!-- END CAROUSEL -->             
                </div>
                <h2><a href="#">Creación de usuario correcta</a></h2>                
                <blockquote>
                    <p>Ahora puede acceder a la información de la aplicación</p>                    
                </blockquote>                                                
                 <p><?php 
            if (filter_input(INPUT_POST,'enviar')) {   
                $dbconn = pg_connect("host=127.0.0.1 dbname=grpfleet user=db_admin password='12345'")
                or die('Can not connect: ' . \pg_last_error());                                                                                
                $usuario = filter_input(INPUT_POST,'username');                                    
                $clave = md5(filter_input(INPUT_POST,'password'));
                
                $query1 = "SELECT  MAX(Pk_id_user) FROM usuario";
                $result1 = pg_query($query1) or die('Query error: ' . \pg_last_error());
                $row1 = pg_fetch_row($result1);
                $row = $row1[0] + 1;  
                
                $query = "INSERT INTO usuario VALUES ('$row','$usuario','$clave')";
                $result = pg_query($query) or die('Query error: ' . \pg_last_error());
                pg_free_result($result);
                pg_close($dbconn);                
                Echo"<h4><a href=login.php> Ingreso</a></h4>";
                }
            ?> </p>
                
                
            </div>
            <!-- END LEFT SIDEBAR -->

            <!-- BEGIN RIGHT SIDEBAR -->            
            <div class="span3 blog-sidebar">                                      
                <!-- BEGIN BLOG TALKS -->
                <div class="blog-talks margin-bottom-30">
                    <h2>Notas</h2>
                    <div class="tab-style-1">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab-1" data-toggle="tab">Sencillo</a></li>
                            <li><a href="#tab-2" data-toggle="tab">Completo</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane row-fluid fade in active" id="tab-1">
                                <p class="margin-bottom-10">Realice los cambios de forma fácil sin inconvenintes.</p>
                                <p><a href="index.php" class="read-more">Leer más</a></p>
                            </div>
                            <div class="tab-pane fade" id="tab-2">
                                <p>Toda la información que necesita en la palma de su mano</p>
                            </div>
                        </div>
                    </div>
                </div>                            
                <!-- END BLOG TALKS -->
                     

                <!-- BEGIN BLOG TAGS -->
                <div class="blog-tags margin-bottom-20">
                    <h2>Tags</h2>
                    <ul>
                        <li><a href="sales.php"><i class="icon-tags"></i>Ventas</a></li>
                        <li><a href="user.php"><i class="icon-tags"></i>Usuarios</a></li>
                        <li><a href="setup.php"><i class="icon-tags"></i>Configuración</a></li>                        
                    </ul>
                </div>
                <!-- END BLOG TAGS -->
            </div>
            <!-- END RIGHT SIDEBAR -->            
        </div>
        <!-- END BEGIN BLOG -->
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