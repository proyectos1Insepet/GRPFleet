<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>GRP700 Fleet:: Sistemas Insepet :: Clientes</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/libs/modernizr-2.0.6.min.js"></script>
</head>
    <body>
        <div id="header-container">
		<header class="wrapper clearfix">
                    <h3><a href="index.php"><img src="images/es.png"width="30px" height="30px" style="float: left" ></a></h3>
                    <h3><a href="../index.php"><img src="images/ing.png"width="30px" height="30px" ></a></h3>
                    <h1 id="title"><a href="index.php"><img src="images/logo-insepet.png" ></a></h1>
			<nav>
				<ul>
                                    <li><a href="customer.php">Clientes</a></li>
			            <li><a href="sales.php">Ventas</a></li>
                                    <li><a href="setup.php">Conf.</a></li>
				</ul>
			</nav>
		</header>            
	</div>
        <div id="main-container">
		<div id="main" class="wrapper clearfix">
			
			<article>
				<header>
					<h1>Configuración de cliente :: Nuevo Cliente</h1>
                                        <form action="#" method="post">
                                            <p><input name="linea1" type="text"  placeholder="Nombre/ Razon social" id="field"  /></p>                                            
                                            <p><input name="id_tax" type="text" placeholder="NIT / Cédula" id="field" /></p>
                                            <p><input name="dir" type="text" placeholder="Dirección" id="field" /></p>
                                            <p><input name="tel" type="text" placeholder="Teléfono" id="field"/></p>                                            
                                            <p><input name="ciudad" type="text" placeholder="Ciudad" id="field"/></p>                                    
                                            <p><input name="state" type="text" placeholder="Departamento/ Provincia" id="field"/></p>
                                            <p class="special"><?php
                                                $dbconn = pg_connect("host=localhost dbname=grpfleet user=db_admin password='12345'")
                                                or die('Can not connect: ' . \pg_last_error());
                                                $query = "SELECT  * FROM transaccion";
                                                $result = pg_query($query) or die('Query error: ' . \pg_last_error());
                                                echo "<select name='select1' id='field'>";
                                                while($fila=  pg_fetch_array($result)){
                                                    echo "<option value=".$fila['tipo'].">".$fila['descripcion']."</option>";
                                                }
                                                echo "</select>";
                                                ?></p>
                                            <p><input name="saldo" type="text" placeholder="Cupo" id="field"/></p>
                                            
                                            <p><input input type="submit" name="enviar" value="Enviar"  class="button-blue"  /></p>
                                        </form>
				</header>								
			</article>
                    <aside>
				<h3>Account configuration</h3>
				<p>In this section you can configure a new account and the associated vehicle information</p>
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
                                            // Cerrando la conexi�n
                                            pg_close($dbconn);
                                            echo "Gracias, hemos recibido su información.\n"; 
                                        }
                                    ?> 
                                </p>
                                
                                <p><a class="button-grey" href="vehicle.php"/>Next</a><br></p>
			</aside>
                                        			
			
			
		</div> <!-- #main -->
	</div> <!-- #main-container -->
        <?php
        // put your code here
        ?>
    </body>
</html>
