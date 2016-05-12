<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>GRP700 Fleet:: Vehicle</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/libs/modernizr-2.0.6.min.js"></script>
        <script type="text/javascript" src="js/calculo.js"></script>
</head>
    <body>
        <div id="header-container">
		<header class="wrapper clearfix">
                    
                    <h1 id="title"><a href="index.php"><img src="images/logo-insepet.png" ></a></h1>
			<nav>
				<ul>
                                    <li><a href="customer.php">Customer</a></li>
					<li><a href="sales.php">Sales</a></li>
					<li><a href="setup.php">Setup</a></li>
				</ul>
			</nav>
		</header>            
	</div>
        <div id="main-container">
		<div id="main" class="wrapper clearfix">
			
			<article>
                            <h1>Vehicle restriction</h1>
                            <form action="#" method="post"> 
                                    <p class="special">
                                        <?php
                                                $dbconn = pg_connect("host=localhost dbname=grpfleet user=db_admin password='12345'")
                                                or die('Can not connect: ' . \pg_last_error());
                                                $query = "SELECT id_vehiculo,placa FROM vehiculo";
                                                $result = pg_query($query) or die('Query error: ' . \pg_last_error());
                                                echo "<select name='select1' id='field'>";
                                                while($fila=  pg_fetch_array($result)){
                                                    echo "<option value=".$fila['id_vehiculo'].">".$fila['placa']."</option>";
                                                }
                                                echo "</select>";                                                                                                                                                                                            
                                                $query2 = "SELECT id_producto,descripcion FROM producto";
                                                $result2 = pg_query($query2) or die('Query error: ' . \pg_last_error());
                                                echo "<select name='select2' id='field'>";
                                                while($fila2=  pg_fetch_array($result2)){
                                                    echo "<option value=".$fila2['id_producto'].">".$fila2['descripcion']."</option>";
                                                }
                                                echo "</select>";
                                                
                                        ?>
                                    </p>
                                    <p><input name="vol" type="text" placeholder="Assigned volume" id="vol" class="campo"/></p>  
                                    <p><input name="din" type="text" placeholder="Assigned money" id="din" class="campo"/></p>
                                    <p><input name="mes" type="text" placeholder="Visits per month" id="mes" class="campo" /></p>                                      
                                    <p><input name="semana" type="text" placeholder="Visits per week" id="semana" class="campo" /></p>
                                    <p><input name="dia" type="text"  placeholder="Visits per day " id="dia" class="campo"  /></p>
                                    
                                    <p><input name="cal_vol_mon" type="text" placeholder="Volume per month" id="cal_vol_mon" class="campo_dis" disabled="disabled"/></p>      
                                    <p><input name="cal_vol_week" type="text" placeholder="Volume per week" id="cal_vol_week" class="campo_dis" disabled="disabled"/></p> 
                                    <p><input name="cal_vol_day" type="text" placeholder="Volume per day" id="cal_vol_day" class="campo_dis" disabled="disabled"/></p> 
                                    
                                    <p><input name="cal_din_mon" type="text" placeholder="Money per month" id="cal_din_mon" class="campo_dis" disabled="disabled"/></p>      
                                    <p><input name="cal_din_week" type="text" placeholder="Money per week" id="cal_din_week" class="campo_dis" disabled="disabled"/></p> 
                                    <p><input name="cal_din_day" type="text" placeholder="Money per day" id="cal_din_day" class="campo_dis" disabled="disabled"/></p> 
                                    
                                    <p><input type="button" id="calcular" value="Calculate" class="button-blue"/><br/></p>
                                    <p><input input type="submit" name="enviar" value="Finish"  class="button-blue"  /></p>
                            </form>
                            
			</article>
			<aside>
				<h3>Simple and efficient</h3>
				<p>Insert the restrictions for a vehicle in your account</p>
                                <p class="special">
                                   <?php 
                                        if (filter_input(INPUT_POST,'enviar')) {   
                                            $dbconn = pg_connect("host=localhost dbname=grpfleet user=db_admin password='12345'")
                                            or die('Can not connect: ' . \pg_last_error());                                                                                
                                            $vehiculo = filter_input(INPUT_POST,'select1');                                    
                                            $producto = filter_input(INPUT_POST,'select2');
                                            $vol = filter_input(INPUT_POST,'vol');
                                            $din = filter_input(INPUT_POST,'din');
                                            $mes = filter_input(INPUT_POST,'mes');   
                                            $semana = filter_input(INPUT_POST,'semana');
                                            $dia = filter_input(INPUT_POST,'dia');
                                            $volmes = round(($vol / $mes),2);
                                            $volsemana = round(($volmes / $semana),2);
                                            $voldia = round(($volsemana / $dia),2);
                                            $dinmes = round(($din/$mes),2);                                                 
                                            $dinsemana = round(($dinmes/$semana),2);
                                            $dindia = round(($dinsemana/$dia),2);
                                            
                                            
                                            
                                            $query3 = "INSERT INTO restricciones  VALUES('$vehiculo','$producto','$dia','$semana','$mes','$voldia','$volsemana','$volmes','$dindia','$dinsemana','$dinmes') ";
                                            $result3 = pg_query($query3) or die('Query error: ' . \pg_last_error());
                                            // Liberando el conjunto de resultados
                                            pg_free_result($result3);
                                            // Cerrando la conexión
                                            pg_close($dbconn);
                                            echo "Thanks! We'd received your information.\n"; 
                                        }
                                    ?> 
                                </p>
                                   
                                    
                               
			</aside>
			
			
		</div> <!-- #main -->
	</div> <!-- #main-container -->
       
    </body>
</html>
