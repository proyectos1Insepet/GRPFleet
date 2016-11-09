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
<head>
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
  <script>
  $( function() {	  
    $( "#datepicker" ).datepicker({
		
	});	
  } );

  </script>
  <script>
  $( function() {
    $( "#datepicker2" ).datepicker();	
  } );
  </script>
  <script>
	 $.datepicker.regional['es'] = {
	 closeText: 'Cerrar',
	 prevText: '<Ant',
	 nextText: 'Sig>',
	 currentText: 'Hoy',
	 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
	 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
	 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
	 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
	 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
	 weekHeader: 'Sm',
	 dateFormat: 'yy-mm-dd',
	 firstDay: 1,
	 isRTL: false,
	 showMonthAfterYear: false,
	 yearSuffix: ''
	 };
	 $.datepicker.setDefaults($.datepicker.regional['es']);
	$(function () {
	$("#fecha").datepicker();
	});
</script>
  
  
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
                <h1>Ventas</h1>
            </div>
            <div class="span8">
                <ul class="pull-right breadcrumb">
                    <li><a href="index.php">Inicio</a> <span class="divider">/</span></li>                    
                    <li class="active">Ventas por fecha</li>
                    
                </ul>
            </div>
        </div>
    </div>
    <!-- END BREADCRUMBS -->
<div class="container min-hight">
	<div class="row-fluid">		        
        <div class="span6">
			<!-- BEGIN BORDERED TABLE PORTLET-->
		<div class="portlet box red">
            <div class="portlet-title">
				<div class="caption"><i class="icon-dashboard"></i>Ventas por fecha</div>
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
                        ?>
			<div class="portlet-body">				
				<table class="table table-hover">
					<thead>
						<tr>
						    <th>ID Venta</th>
							<th>ID Cliente</th>
							<th>Cantidad</th>
							<th>Importe</th>
						</tr>
					</thead>
					<tbody>
						<?php   
							echo "<tr>";
							if (filter_input(INPUT_POST,'filtrar')) {
								$cuenta    = filter_input(INPUT_POST,'cliente'); 
								$fechaini = filter_input(INPUT_POST,'inicial'); 
								$fechafin  = filter_input(INPUT_POST,'final'); 								
								$consultar  = "select id,id_cliente,volumen,dinero from venta where (fecha between '$fechaini' AND '$fechafin') AND id_cliente =$cuenta; ";								                                         
								$resultar   = pg_query($consultar)or die('Query error: ' . \pg_last_error()); 
								$sql2       = "select vol, moneda from recibo";
								$result2    = pg_query($sql2)or die('Query error: ' . \pg_last_error());
								$row2       = pg_fetch_assoc($result2);
								while ($rows = pg_fetch_row($resultar)) { 
									echo "<td background-color:#F5D0A9;>".'<a href="salesdetail.php?num_venta='.$rows[0].'">'.$rows[0].'</a>'."</td> ";
									echo "<td background-color:#F5D0A9;>".'<a href="reportdetail.php?id_cliente='.$rows[1].'">'.$rows[1].'</a>'."</td> ";                                                									
									echo "<td background-color:#F5D0A9;>".$rows[2]." ".$row2['vol']." </td>";
									echo "<td background-color:#F5D0A9;>".$row2['moneda']." ".$rows[3]." </td>";									
									echo "</tr>";     
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
 
 
</body>
</html>