<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>GRP700 Fleet:: Setup</title>
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
				<header>
					<h1>Fuel Name :: Product Setup</h1>
					<form action="product.php" method="post">                                                                                                                                        
                                            <p><input name="producto1" type="text"  placeholder="Product Name" id="field"  /></p>                                            
                                            <p><input input type="submit" name="enviar" value="Submit"  id="button-blue"  /></p>
                                        </form>
				</header>								
			</article>
			
			<aside>
				<h3>Simple and efficient</h3>
				<p>You can create different accounts and use an ibutton identification system
                                   or your preferred ID system. Reduce your administrative efford and increase your
                                   profit.</p>
                                <p class="special"><?php 
                                if (filter_input(INPUT_POST,'enviar')) {   
                                    $dbconn = pg_connect("host=localhost dbname=grpfleet user=db_admin password='12345'")
                                    or die('Can not connect: ' . \pg_last_error());
                                    $producto1 = filter_input(INPUT_POST,'producto1');
                                    $query1 = "SELECT  MAX(id_producto) FROM producto";
                                    $result1 = pg_query($query1) or die('La consulta fallo: ' . \pg_last_error());
                                    $row1 = pg_fetch_row($result1);
                                    $row = $row1[0] + 1;                                   
                                    $query = "INSERT INTO producto VALUES ('$row','$producto1') ";
                                    $result = pg_query($query) or die('La consulta fallo: ' . \pg_last_error());
                                    // Liberando el conjunto de resultados
                                    pg_free_result($result);
                                    // Cerrando la conexión
                                    pg_close($dbconn);
                                    echo "Thanks! We'd received your information.\n"; 
                                 }
                            ?> </p>
			</aside>
			
		</div> <!-- #main -->
	</div> <!-- #main-container -->
        <?php
        // put your code here
        ?>
    </body>
</html>
