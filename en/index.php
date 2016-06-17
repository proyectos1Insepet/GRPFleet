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
    <title>GRP 700 Fleet | Sistemas Insepet | Inicio</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/reset.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" />               
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/bxslider/jquery.bxslider.css" rel="stylesheet" />          
    <link rel="stylesheet" href="assets/plugins/revolution_slider/css/rs-style.css" media="screen">
    <link rel="stylesheet" href="assets/plugins/revolution_slider/rs-plugin/css/settings.css" media="screen">                
    <link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
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
                                    <li><a href="index.php">Home Page</a></li>	                             
	                        </ul>
                            </li>
                            <li><a href="customer.php">Customers</a></li>
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
                    <!-- BEGIN TOP NAVIGATION MENU -->
                </div>
            </div>
        </div>                   
    </div>
    <!-- END HEADER -->

    <!-- BEGIN REVOLUTION SLIDER -->    
    <div class="fullwidthbanner-container slider-main margin-bottom-10">
        <div class="fullwidthabnner">
            <ul id="revolutionul" style="display:none;">            
                    <!-- THE FIRST SLIDE -->
                    <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400" data-thumb="assets/img/sliders/revolution/thumbs/thumb2.jpg">
                        <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
                        <img src="assets/img/sliders/revolution/bg1.jpg" alt="">
                        
                        <div class="caption lft slide_title slide_item_left"
                             data-x="0"
                             data-y="125"
                             data-speed="400"
                             data-start="1500"
                             data-easing="easeOutExpo">
                             GRP700x - Fleet 
                        </div>
                        <div class="caption lft slide_subtitle slide_item_left"
                             data-x="0"
                             data-y="180"
                             data-speed="400"
                             data-start="2000"
                             data-easing="easeOutExpo">
                             Smart fleet control
                        </div>
                        <div class="caption lft slide_desc slide_item_left"
                             data-x="0"
                             data-y="220"
                             data-speed="400"
                             data-start="2500"
                             data-easing="easeOutExpo">
                             Customers control<br>
                             behind a button
                        </div>
                                                
                        <div class="caption lfb"
                             data-x="640" 
                             data-y="55" 
                             data-speed="700" 
                             data-start="1000" 
                             data-easing="easeOutExpo"  >
                             <img src="assets/img/sliders/revolution/man-winner.png" alt="Image 1">
                        </div>
                    </li>

                    <!-- THE SECOND SLIDE -->
                    <li data-transition="fade" data-slotamount="7" data-masterspeed="300" data-delay="9400" data-thumb="assets/img/sliders/revolution/thumbs/thumb2.jpg">                        
                        <img src="assets/img/sliders/revolution/bg2.jpg" alt="">
                        <div class="caption lfl slide_title slide_item_left"
                             data-x="0"
                             data-y="145"
                             data-speed="400"
                             data-start="3500"
                             data-easing="easeOutExpo">
                             All the control
                        </div>
                        <div class="caption lfl slide_subtitle slide_item_left"
                             data-x="0"
                             data-y="200"
                             data-speed="400"
                             data-start="4000"
                             data-easing="easeOutExpo">
                            Customers, vehicles
                            
                        </div>
                        <div class="caption lfl slide_desc slide_item_left"
                             data-x="0"
                             data-y="245"
                             data-speed="400"
                             data-start="4500"
                             data-easing="easeOutExpo">
                             In an easy way
                        </div>                        
                        <div class="caption lfr slide_item_right" 
                             data-x="635" 
                             data-y="105" 
                             data-speed="1200" 
                             data-start="1500" 
                             data-easing="easeOutBack">
                             <img src="assets/img/sliders/revolution/mac.png" alt="Image 1">
                        </div>
                        <div class="caption lfr slide_item_right" 
                             data-x="580" 
                             data-y="245" 
                             data-speed="1200" 
                             data-start="2000" 
                             data-easing="easeOutBack">
                             <img src="assets/img/sliders/revolution/ipad.png" alt="Image 1">
                        </div>
                        <div class="caption lfr slide_item_right" 
                             data-x="735" 
                             data-y="290" 
                             data-speed="1200" 
                             data-start="2500" 
                             data-easing="easeOutBack">
                             <img src="assets/img/sliders/revolution/iphone.png" alt="Image 1">
                        </div>
                        <div class="caption lfr slide_item_right" 
                             data-x="835" 
                             data-y="230" 
                             data-speed="1200" 
                             data-start="3000" 
                             data-easing="easeOutBack">
                             <img src="assets/img/sliders/revolution/macbook.png" alt="Image 1">
                        </div>
<!--                        <div class="caption lft slide_item_right" 
                             data-x="865" 
                             data-y="45" 
                             data-speed="500" 
                             data-start="5000" 
                             data-easing="easeOutBack">
                             <img src="assets/img/sliders/revolution/hint1-blue.png" id="rev-hint1" alt="Image 1">
                        </div>                        
                        <div class="caption lfb slide_item_right" 
                             data-x="355" 
                             data-y="355" 
                             data-speed="500" 
                             data-start="5500" 
                             data-easing="easeOutBack">
                             <img src="assets/img/sliders/revolution/hint2-blue.png" id="rev-hint2" alt="Image 1">
                        </div>-->

                    </li>                    
                    <!-- THE THIRD SLIDE -->                                      
                    <!-- THE FORTH SLIDE -->                   
            </ul>
            <div class="tp-bannertimer tp-bottom"></div>
        </div>
    </div>
    <!-- END REVOLUTION SLIDER -->
	
    <!-- BEGIN CONTAINER -->   
    <div class="container">
        <!-- BEGIN SERVICE BOX -->   
        <div class="row-fluid service-box">
            <div class="span4">
                <div class="service-box-heading">
                    <em><a href="sales.php"><i class="icon-location-arrow blue"></i></a></em>
                    <span>Sales</span>
                </div>
                <p>Tables with all your dispenser sales.</p>
            </div>
            <div class="span4">
                <div class="service-box-heading">
                    <em><a href="customer.php"><i class="icon-ok red"></i></a></em>
                    <span>Customers</span>
                </div>
                <p>Type your customerr informatión, vehicle setup and related information.</p>
            </div>
            <div class="span4">
                <div class="service-box-heading">
                    <em><a href="setup.php"><i class="icon-resize-small green"></i></a></em>
                    <span>Setup</span>
                </div>
                <p>Your dispencer info, receipt setup, volume unit, currency simbol and all the data you need.</p>
            </div>
        </div>
        <!-- END SERVICE BOX -->  

        <!-- BEGIN BLOCKQUOTE BLOCK -->   
        <div class="row-fluid quote-v1">
            <div class="span9 quote-v1-inner">
                <span>WE'RE GENERATING THE FUEL CONSUMPION REVOLUTION</span>
            </div>
            <div class="span3 quote-v1-inner text-right">
                <a class="btn-transparent" href="http://www.insepet.com/" target="_blank"><i class="icon-rocket margin-right-10"></i>Visit us</a>
                <!--<a class="btn-transparent" href="http://www.insepet.com/"><i class="icon-gift margin-right-10"></i>Purchase 2 in 1</a>-->
            </div>
        </div>
        <!-- END BLOCKQUOTE BLOCK -->

        <div class="clearfix"></div>

        <!-- BEGIN RECENT WORKS -->
        <div class="row-fluid recent-work margin-bottom-40">
            <div class="span3">
                <h2><a href="portfolio.html">Recent work</a></h2>
                <p>We work all the time searching ways to improve the fuel manage.</p>
            </div>
            <div class="span9">
                <ul class="bxslider">
                    <li>
                        <em>
                            <img src="assets/img/works/img1.jpg" alt="" />
                            <a href="portfolio_item.html"><i class="icon-link icon-hover icon-hover-1"></i></a>
                            <a href="assets/img/works/img1.jpg" class="fancybox-button" title="Project Name #1" data-rel="fancybox-button"><i class="icon-search icon-hover icon-hover-2"></i></a>
                        </em>
                        <a class="bxslider-block" href="#">
                            <strong>NSX</strong>
                            <b>NSX Ver. 48.</b>
                        </a>
                    </li>
                    <li>
                        <em>
                            <img src="assets/img/works/img2.jpg" alt="" />
                            <a href="portfolio_item.html"><i class="icon-link icon-hover icon-hover-1"></i></a>
                            <a href="assets/img/works/img2.jpg" class="fancybox-button" title="Project Name #2" data-rel="fancybox-button"><i class="icon-search icon-hover icon-hover-2"></i></a>
                        </em>
                        <a class="bxslider-block" href="#">
                            <strong>Isleros</strong>
                            <b>Ibutton proyect.</b>
                        </a>
                    </li>
                    <li>
                        <em>
                            <img src="assets/img/works/img3.jpg" alt="" />
                            <a href="portfolio_item.html"><i class="icon-link icon-hover icon-hover-1"></i></a>
                            <a href="assets/img/works/img3.jpg" class="fancybox-button" title="Project Name #3" data-rel="fancybox-button"><i class="icon-search icon-hover icon-hover-2"></i></a>
                        </em>
                        <a class="bxslider-block" href="#">
                            <strong>GRP700-Prime</strong>
                            <b>Gilbarco Prime + GRP 700.</b>
                        </a>
                    </li>
                    <li>
                        <em>
                            <img src="assets/img/works/img4.jpg" alt="" />
                            <a href="portfolio_item.html"><i class="icon-link icon-hover icon-hover-1"></i></a>
                            <a href="assets/img/works/img4.jpg" class="fancybox-button" title="Project Name #4" data-rel="fancybox-button"><i class="icon-search icon-hover icon-hover-2"></i></a>
                        </em>
                        <a class="bxslider-block" href="#">
                            <strong>Autogas</strong>
                            <b>Sales control.</b>
                        </a>
                    </li>
                    <li>
                        <em>
                            <img src="assets/img/works/img5.jpg" alt="" />
                            <a href="portfolio_item.html"><i class="icon-link icon-hover icon-hover-1"></i></a>
                            <a href="assets/img/works/img5.jpg" class="fancybox-button" title="Project Name #5" data-rel="fancybox-button"><i class="icon-search icon-hover icon-hover-2"></i></a>
                        </em>
                        <a class="bxslider-block" href="#">
                            <strong>Mux Advance</strong>
                            <b>Milti- Port PCB.</b>
                        </a>
                    </li>
                    <li>
                        <em>
                            <img src="assets/img/works/img6.jpg" alt="" />
                            <a href="portfolio_item.html"><i class="icon-link icon-hover icon-hover-1"></i></a>
                            <a href="assets/img/works/img6.jpg" class="fancybox-button" title="Project Name #6" data-rel="fancybox-button"><i class="icon-search icon-hover icon-hover-2"></i></a>
                        </em>
                        <a class="bxslider-block" href="#">
                            <strong>Amazing Project</strong>
                            <b>Agenda corp.</b>
                        </a>
                    </li>
                    <li>
                        <em>
                            <img src="assets/img/works/img3.jpg" alt="" />
                            <a href="portfolio_item.html"><i class="icon-link icon-hover icon-hover-1"></i></a>
                            <a href="assets/img/works/img3.jpg" class="fancybox-button" title="Project Name #3" data-rel="fancybox-button"><i class="icon-search icon-hover icon-hover-2"></i></a>
                        </em>
                        <a class="bxslider-block" href="#">
                            <strong>Amazing Project</strong>
                            <b>Agenda corp.</b>
                        </a>
                    </li>
                    <li>
                        <em>
                            <img src="assets/img/works/img4.jpg" alt="" />
                            <a href="portfolio_item.html"><i class="icon-link icon-hover icon-hover-1"></i></a>
                            <a href="assets/img/works/img4.jpg" class="fancybox-button" title="Project Name #4" data-rel="fancybox-button"><i class="icon-search icon-hover icon-hover-2"></i></a>
                        </em>
                        <a class="bxslider-block" href="#">
                            <strong>Amazing Project</strong>
                            <b>Agenda corp.</b>
                        </a>
                    </li>
                </ul>        
            </div>
        </div>   
        <!-- END RECENT WORKS -->

        <div class="clearfix"></div>

        

        <!-- BEGIN STEPS -->
        <div class="row-fluid no-space-steps margin-bottom-40">
            <div class="span4 front-steps front-step-one">
                <h2>Goal definition</h2>
                <p></p>
            </div>
            <div class="span4 front-steps front-step-two">
                <h2>Analyse</h2>
                <p></p>
            </div>
            <div class="span4 front-steps front-step-three">
                <h2>Implementation</h2>
                <p></p>
            </div>
        </div>
        <!-- END STEPS -->

        <!-- BEGIN CLIENTS -->
        <div class="row-fluid margin-bottom-40">
            <div class="span3">
                <h2><a href="#">Our clients</a></h2>
                <p>Información de clientes y estaciones.</p>
            </div>
            <div class="span9">
                <ul class="bxslider1 clients-list">
                    <li>
                        <a href="#">
                            <img src="assets/img/clients/client_1_gray.jpg" alt="" /> 
                            <img src="assets/img/clients/client_1.jpg" class="color-img" alt="" />
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="assets/img/clients/client_2_gray.jpg" alt="" /> 
                            <img src="assets/img/clients/client_2.jpg" class="color-img" alt="" />
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="assets/img/clients/client_3_gray.jpg" alt="" /> 
                            <img src="assets/img/clients/client_3.jpg" class="color-img" alt="" />
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="assets/img/clients/client_4_gray.jpg" alt="" /> 
                            <img src="assets/img/clients/client_4.jpg" class="color-img" alt="" />
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="assets/img/clients/client_5_gray.jpg" alt="" /> 
                            <img src="assets/img/clients/client_5.jpg" class="color-img" alt="" />
                        </a>
                    </li>                    
                </ul>                        
            </div>
        </div>
        <!-- END CLIENTS -->
    </div>
    <!-- END CONTAINER -->

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
    <script type="text/javascript" src="assets/plugins/bxslider/jquery.bxslider.js"></script>
    <script type="text/javascript" src="assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script>    
    <script type="text/javascript" src="assets/plugins/hover-dropdown.js"></script>
    <script type="text/javascript" src="assets/plugins/revolution_slider/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="assets/plugins/revolution_slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
    <!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>  
    <![endif]-->   
    <!-- END CORE PLUGINS -->   
    <script src="assets/scripts/app.js"></script>         
    <script src="assets/scripts/index.js"></script>    
    <script type="text/javascript">
        jQuery(document).ready(function() {
            App.init();    
            App.initBxSlider();
            Index.initRevolutionSlider();                    
        });
    </script>
    <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>