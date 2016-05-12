<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>GRP700 Fleet:: Update Vehicle information</title>
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
                            <h1>Vehicle Update</h1>
                            <h3>Fill all the spaces</h3>
                            <form action="#" method="post">
                                <p class="special">
                                        <?php
                                                $dbconn = pg_connect("host=localhost dbname=grpfleet user=db_admin password='12345'")
                                                or die('Can not connect: ' . \pg_last_error());
                                                $query = "SELECT  id_vehiculo, placa FROM vehiculo";
                                                $result = pg_query($query) or die('Query error: ' . \pg_last_error());
                                                echo "<select name='select1' id='field'>";
                                                while($fila=  pg_fetch_array($result)){
                                                    echo "<option value=".$fila['id_vehiculo'].">".$fila['placa']."</option>";
                                                }
                                                echo "</select>";
                                        ?>
                                    </p> 
                                    <p><input name="placa" type="text"  placeholder="Plate " id="field"  /></p>
                                    <p><input name="serial" type="text" placeholder="ID Serial" id="field" /></p>
                                    <p><input name="tanque" type="text" placeholder="Tank Size" id="field" /></p>
                                    <p><input name="marca" type="text" placeholder="Brand" id="field"/></p>  
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
                                            $dbconn2 = pg_connect("host=localhost dbname=grpfleet user=db_admin password='12345'")
                                            or die('Can not connect: ' . \pg_last_error());                                                                                
                                            $vehiculo = filter_input(INPUT_POST,'select1');                                    
                                            $placa = filter_input(INPUT_POST,'placa');
                                            $serial = filter_input(INPUT_POST,'serial');
                                            $tanque = filter_input(INPUT_POST,'tanque');
                                            $marca = filter_input(INPUT_POST,'marca');   
                                            $estado = filter_input(INPUT_POST,'estado');                                            
                                            if ($estado == "1" ){
                                                $activo = 1;
                                            }else{
                                                $activo = 0;
                                            }                                                                                        
                                            $query2 = "UPDATE vehiculo SET placa ='$placa', serial ='$serial', tanque ='$tanque', estado_bloqueo ='$activo',marca ='$marca' WHERE id_vehiculo ='$vehiculo'";
                                            $result2 = pg_query($query2) or die('Query error: ' . \pg_last_error());
                                            // Liberando el conjunto de resultados
                                            pg_free_result($result2);
                                            // Cerrando la conexión
                                            pg_close($dbconn2);
                                            echo "Thanks! We'd received your information.\n"; 
                                        }
                                    ?> 
                                </p>
                                
                                
                                    
                                    
                               
			</aside>
			
			
		</div> <!-- #main -->
	</div> <!-- #main-container -->
       
    </body>
</html>
