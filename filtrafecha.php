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
				<form action="" method="post">
					
						<p>Fecha Inicial: <input type="text" id="datepicker" name="fecha1"></p>
						<p>Fecha Final  : <input type="text" id="datepicker2" name="fecha2"></p>          
					
					<div class="control-group">
						<div class="controls">                                            
							<input input type="submit" name="enviar" value="Consultar"  class="btn black"  />
						</div>
					</div>
				</form>
					<p>
						<?php 
						if (filter_input(INPUT_POST,'enviar')) {
							$fechaini   = filter_input(INPUT_POST,'fecha1');
							$fechafin   = filter_input(INPUT_POST,'fecha2');
							echo "<blockquote>"."Fecha inicial: "."$fechaini"."</blockquote>"; 
							echo "<blockquote>"."Fecha final: "."$fechafin"."</blockquote>";
							echo '<form action="csvfecha.php" method="post">';
								echo '<div class="control-group">';									
									echo '<div class="controls">';										
										echo '<input input type="hidden" name="inicial" value="'.$fechaini.'" />';
									echo '</div>';
									echo '<div class="controls">';										
										echo '<input input type="hidden" name="final" value="'.$fechafin.'" />';
									echo '</div>';
									echo '<div class="controls">';
										echo '<input input type="submit" name="enviar" value="Exportar"  class="btn black"  />';
									echo '</div>';
								echo '</div>';
							echo '</form>';	

							$query = "SELECT  v.id_cliente,c.nombre from venta v inner join cuenta c  on v.id_cliente=c.id_cliente where fecha between '$fechaini' AND '$fechafin' group by v.id_cliente,c.nombre;";
							$result = pg_query($query) or die('Query error: ' . \pg_last_error());
							echo '<div class="control-group">';
								echo '<label class="control-label" for="inputEmail">Filtro por cliente / sub cuenta</label>';
								echo '<div class="controls">';
								echo "<select name='select1' class='small m-wrap'>";
								while($fila=  pg_fetch_array($result)){								
									echo "<option value=".$fila['id_cliente'].">".$fila['id_cliente'].". ".$fila['nombre']."</option>";
								}
								echo "</select>";
								echo "</div>";
							echo "</div>";		

							

							
						echo '<form action="csvfiltro.php" method="post">';
								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo '<label class="control-label">ID cliente/ sub cuenta</label>';
										echo '<input input type="text" name="cliente" />';
									echo '</div>';
									echo '<div class="controls">';
										echo '<label class="control-label">Fecha Inicial</label>';
										echo '<input input type="text" name="inicial" value="'.$fechaini.'" />';
									echo '</div>';
									echo '<div class="controls">';
										echo '<label class="control-label">Fecha final</label>';
										echo '<input input type="text" name="final" value="'.$fechafin.'" />';
									echo '</div>';
									echo '<div class="controls">';
										echo '<input input type="submit" name="filtrar" value="Filtrar"  class="btn black"  />';
									echo '</div>';
								echo '</div>';
							echo '</form>';	
						}							
						?>
					</p>
				
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
							if (filter_input(INPUT_POST,'enviar')) {
								$fechaini   = filter_input(INPUT_POST,'fecha1');
								$fechafin   = filter_input(INPUT_POST,'fecha2');
								$sql        = "select v.id,v.id_cliente,v.volumen,v.dinero,c.nombre from venta v inner join cuenta c on c.id_cliente = v.id_cliente where fecha between '$fechaini' AND '$fechafin'";								                                         
								$result     = pg_query($sql)or die('Query error: ' . \pg_last_error()); 
								$sql2       = "select vol, moneda from recibo";
								$result2    = pg_query($sql2)or die('Query error: ' . \pg_last_error());
								$row2       = pg_fetch_assoc($result2);
								while ($row = pg_fetch_row($result)) { 
									echo "<td background-color:#F5D0A9;>".'<a href="salesdetail.php?num_venta='.$row[0].'">'.$row[0].'</a>'."</td> ";
									echo "<td background-color:#F5D0A9;>".'<a href="reportdetail.php?id_cliente='.$row[1].'">'.$row[4].'</a>'."</td> ";                                                									
									echo "<td background-color:#F5D0A9;>".$row[2]." ".$row2['vol']." </td>";
									echo "<td background-color:#F5D0A9;>".$row2['moneda']." ".$row[3]." </td>";									
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