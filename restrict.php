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
                            <h1>Receipt fields</h1>
<!--                            <form action="receipt.php" method="post">
                                    <p><input name="linea1" type="text"  placeholder="Line 1" id="field"  /></p>
                                    <p><input name="linea2" type="text" placeholder="Line 2" id="field" /></p>
                                    <p><input name="id_tax" type="text" placeholder="VAT" id="field" /></p>
                                    <p><input name="tel" type="text" placeholder="Phone" id="field"/></p>
                                    <p><input name="dir" type="text" placeholder="Address" id="field" /></p>
                                    <p><input name="footer" type="text" placeholder="Footer" id="field"/></p>                                    
                                    <p><input input type="submit" name="enviar" value="Submit"  id="button-blue"  /></p>
                            </form>	-->
                            
			</article>
			<aside>
				<h3>Simple and efficient</h3>
				<p>You can create different accounts and use an ibutton identification system
                                   or your preferred ID system. Reduce your administrative efford and increase your
                                   profit.
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
                                            $query = "INSERT INTO cuenta  VALUES('$row','1','$linea1','$id_tax','$dir','$tel','$ciudad','$state','$tipo','$saldo') ";
                                            $result = pg_query($query) or die('Query error: ' . \pg_last_error());
                                            // Liberando el conjunto de resultados
                                            pg_free_result($result);
                                            // Cerrando la conexión
                                            pg_close($dbconn);
                                            echo "Thanks! We'd received your information.\n"; 
                                        }
                                    ?> 
                                </p>
                                    
                                <p class="special"></p>
			</aside>
			
			
		</div> <!-- #main -->
	</div> <!-- #main-container -->
       
    </body>
</html>
