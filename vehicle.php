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
                            <h1>Vehicle Setup</h1>
                            <form action="restrict.php" method="post">
                                <p class="special">
                                        <?php
                                                $dbconn = pg_connect("host=localhost dbname=grpfleet user=db_admin password='12345'")
                                                or die('Can not connect: ' . \pg_last_error());
                                                $query = "SELECT  id_cliente, nombre FROM cuenta";
                                                $result = pg_query($query) or die('Query error: ' . \pg_last_error());
                                                echo "<select name='select1' id='field'>";
                                                while($fila=  pg_fetch_array($result)){
                                                    echo "<option value=".$fila['id_cliente'].">".$fila['nombre']."</option>";
                                                }
                                                echo "</select>";
                                        ?>
                                    </p> 
                                    <p><input name="placa" type="text"  placeholder="Plate " id="field"  /></p>
                                    <p><input name="serial" type="text" placeholder="ID Serial" id="field" /></p>
                                    <p><input name="tanque" type="text" placeholder="Tank Size" id="field" /></p>
                                    <p><input name="marca" type="text" placeholder="Brand" id="field"/></p>  
                                    <p><input type="checkbox" name="estado" value="1"> - Active</input></p>
                                    <p><input type="checkbox" name="estado2" value="0"> - Inactive</input></p>
                                    <p><input input type="submit" name="enviar" value="Submit"  id="button-blue"  /></p>
                            </form>	
                            
			</article>
			<aside>
				<h3>Simple and efficient</h3>
				<p>You can create different accounts and use an ibutton identification system
                                   or your preferred ID system. Reduce your administrative efford and increase your
                                   profit.</p>
                                
                                    <p class="special">
                                   <?php 
                                        if (filter_input(INPUT_POST,'enviar')) {   
                                            $dbconn = pg_connect("host=localhost dbname=grpfleet user=db_admin password='12345'")
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
