<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>GRP700 Fleet:: Update Account</title>
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
                    <h3><a href="index.php"><img src="images/ing.png"width="30px" height="30px" ></a></h3>
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
                            <h1>Customer Update</h1>
                            <h3>Please type all data</h3>
                            <form action="#" method="post">
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
                                    <p><input name="linea1" type="text"  placeholder="Client Name" id="field"  /></p>                                            
                                    <p><input name="id_tax" type="text" placeholder="VAT" id="field" /></p>
                                    <p><input name="dir" type="text" placeholder="Address" id="field" /></p>
                                    <p><input name="tel" type="text" placeholder="Phone" id="field"/></p>                                            
                                    <p><input name="ciudad" type="text" placeholder="City" id="field"/></p>                                    
                                    <p><input name="state" type="text" placeholder="State" id="field"/></p>
                                    <p class="special"><?php
                                                $dbconn2 = pg_connect("host=localhost dbname=grpfleet user=db_admin password='12345'")
                                                or die('Can not connect: ' . \pg_last_error());
                                                $query2 = "SELECT  * FROM transaccion";
                                                $result2 = pg_query($query2) or die('Query error: ' . \pg_last_error());
                                                echo "<select name='select2' id='field'>";
                                                while($fila2=  pg_fetch_array($result2)){
                                                    echo "<option value=".$fila2['tipo'].">".$fila2['descripcion']."</option>";
                                                }
                                                echo "</select>";
                                                ?></p>
                                    <p><input name="saldo" type="text" placeholder="Balance" id="field"/></p>
                                    <p><input type="checkbox" name="estado" value="1"> - Active</input></p>                                    
                                    <p><input input type="submit" name="enviar" value="Submit"  class="button-blue"  /></p>
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
                                            $dbconn3 = pg_connect("host=localhost dbname=grpfleet user=db_admin password='12345'")
                                            or die('Can not connect: ' . \pg_last_error());
                                            $cliente  = filter_input(INPUT_POST,'select1');
                                            $linea1 = filter_input(INPUT_POST,'linea1');                                    
                                            $id_tax = filter_input(INPUT_POST,'id_tax');
                                            $tel = filter_input(INPUT_POST,'tel');
                                            $dir = filter_input(INPUT_POST,'dir');
                                            $ciudad = filter_input(INPUT_POST,'ciudad');   
                                            $state = filter_input(INPUT_POST,'state');
                                            $saldo = filter_input(INPUT_POST,'saldo');
                                            $tipo  = filter_input(INPUT_POST,'select2');
                                            $estado = filter_input(INPUT_POST,'estado');                                            
                                            if ($estado === "1" ){
                                                $activo = 1;
                                            }else{                                            
                                                $activo = 0;
                                            }
                                            $query3 = "UPDATE cuenta SET estado_cuenta = '$activo',nombre ='$linea1', tax_number = '$id_tax', direccion ='$dir', telefono ='$tel', ciudad ='$ciudad', provincia ='$state',tipo_transaccion ='$tipo', saldo ='$saldo' where id_cliente = '$cliente'";
                                            $result3 = pg_query($query3) or die('Query error: ' . \pg_last_error());
                                            // Liberando el conjunto de resultados
                                            pg_free_result($result3);
                                            // Cerrando la conexión
                                            pg_close($dbconn3);
                                            echo "Thanks! We'd received your information.\n"; 
                                        }
                                    ?> 
                                </p>
                                
                                
                                    
                                    
                               
			</aside>
			
			
		</div> <!-- #main -->
	</div> <!-- #main-container -->
       
    </body>
</html>
