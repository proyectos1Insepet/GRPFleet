<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="es"> <!--<![endif]-->
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
        <?php   
 /* CAT:Pie charts */

 /* pChart library inclusions */
 include("class/pData.class.php");
 include("class/pDraw.class.php");
 include("class/pPie.class.php");
 include("class/pImage.class.php");

 /* Create and populate the pData object */
 $MyData = new pData();   
 $MyData->addPoints(array(40,60,15,10,6,4),"ScoreA");  
 $MyData->setSerieDescription("ScoreA","Application A");

 /* Define the absissa serie */
 $MyData->addPoints(array("<10","10<>20","20<>40","40<>60","60<>80",">80"),"Labels");
 $MyData->setAbscissa("Labels");

 /* Create the pChart object */
 $myPicture = new pImage(700,230,$MyData);

 /* Draw a solid background */
 $Settings = array("R"=>173, "G"=>152, "B"=>217, "Dash"=>1, "DashR"=>193, "DashG"=>172, "DashB"=>237);
 $myPicture->drawFilledRectangle(0,0,700,230,$Settings);

 /* Draw a gradient overlay */
 $Settings = array("StartR"=>209, "StartG"=>150, "StartB"=>231, "EndR"=>111, "EndG"=>3, "EndB"=>138, "Alpha"=>50);
 $myPicture->drawGradientArea(0,0,700,230,DIRECTION_VERTICAL,$Settings);
 $myPicture->drawGradientArea(0,0,700,20,DIRECTION_VERTICAL,array("StartR"=>0,"StartG"=>0,"StartB"=>0,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>100));

 /* Add a border to the picture */
 $myPicture->drawRectangle(0,0,699,229,array("R"=>0,"G"=>0,"B"=>0));

 /* Write the picture title */ 
 $myPicture->setFontProperties(array("FontName"=>"fonts/Silkscreen.ttf","FontSize"=>6));
 $myPicture->drawText(10,13,"pPie - Draw 2D pie charts",array("R"=>255,"G"=>255,"B"=>255));

 /* Set the default font properties */ 
 $myPicture->setFontProperties(array("FontName"=>"fonts/Forgotte.ttf","FontSize"=>10,"R"=>80,"G"=>80,"B"=>80));

 /* Enable shadow computing */ 
 $myPicture->setShadow(TRUE,array("X"=>2,"Y"=>2,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>50));

 /* Create the pPie object */ 
 $PieChart = new pPie($myPicture,$MyData);

 /* Draw a simple pie chart */ 
 $PieChart->draw2DPie(120,125,array("SecondPass"=>FALSE));

 /* Draw an AA pie chart */ 
 $PieChart->draw2DPie(340,125,array("DrawLabels"=>TRUE,"LabelStacked"=>TRUE,"Border"=>TRUE));

 /* Draw a splitted pie chart */ 
 $PieChart->draw2DPie(560,125,array("WriteValues"=>PIE_VALUE_PERCENTAGE,"DataGapAngle"=>10,"DataGapRadius"=>6,"Border"=>TRUE,"BorderR"=>255,"BorderG"=>255,"BorderB"=>255));

 /* Write the legend */
 $myPicture->setFontProperties(array("FontName"=>"fonts/pf_arma_five.ttf","FontSize"=>6));
 $myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>20));
 $myPicture->drawText(120,200,"Single AA pass",array("DrawBox"=>TRUE,"BoxRounded"=>TRUE,"R"=>0,"G"=>0,"B"=>0,"Align"=>TEXT_ALIGN_TOPMIDDLE));
 $myPicture->drawText(440,200,"Extended AA pass / Splitted",array("DrawBox"=>TRUE,"BoxRounded"=>TRUE,"R"=>0,"G"=>0,"B"=>0,"Align"=>TEXT_ALIGN_TOPMIDDLE));

 /* Write the legend box */ 
 $myPicture->setFontProperties(array("FontName"=>"fonts/Silkscreen.ttf","FontSize"=>6,"R"=>255,"G"=>255,"B"=>255));
 $PieChart->drawPieLegend(380,8,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));

 /* Render the picture (choose the best way) */
 $myPicture->autoOutput("pictures/example.draw2DPie.png");
?>
					<div class="span6">
						<!-- BEGIN BORDERED TABLE PORTLET-->
						<div class="portlet box red">
							<div class="portlet-title">
								<div class="caption"><i class="icon-dashboard"></i>Ventas registradas</div>
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
											<th>Cliente </th>
                                                                                        <th>Fecha </th>
                                                                                        <th>Número de venta</th>
                                                                                        </tr>
									</thead>
                                                                        <tbody>
                                                                            <?php   
                                                                                echo "<tr>";
                                                                                for($i= $ultima; $i>($ultima - 100); $i--){
                                                                                $sql = "select v.id_cliente, v.fecha, v.tipo_transaccion, 
                                                                                v.volumen, v.dinero, vd.placa, vd.cara, vd.manguera, p.descripcion, c.nombre from venta v inner join venta_detalle vd on v.id = vd.fk_id 
                                                                                inner join producto p on vd.fk_id_producto = p.id_producto inner join cuenta c on v.id_cliente = c.id_cliente WHERE v.id = $i ";
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
                                                                                        echo "<td background-color:#F5D0A9;>"." ".$row2['nombre']."</td> ";
                                                                                        echo "<td background-color:#F5D0A9;>".$row2['fecha']." </td>";
                                                                                        echo "<td background-color:#F5D0A9;>".'<a href="salesdetail.php?num_venta='.$i.'">'.$i.'</a>'."</td> ";
                                                                                        
                                                                                                   
                                                                                        echo "</tr>";  
                                                        
                                                                                        }else {echo '<br>Sin resultados.';}
                                                                                    }
                                                          
                                                                                }
                                                
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