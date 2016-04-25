<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>GRP700 Fleet:: Sistemas Insepet :: Customer</title>
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
					<h1>Customer Setup :: New Client</h1>
                                        <form action="restrict.php" method="post">
                                            <p><input name="linea1" type="text"  placeholder="Client Name" id="field"  /></p>                                            
                                            <p><input name="id_tax" type="text" placeholder="VAT" id="field" /></p>
                                            <p><input name="dir" type="text" placeholder="Address" id="field" /></p>
                                            <p><input name="tel" type="text" placeholder="Phone" id="field"/></p>                                            
                                            <p><input name="ciudad" type="text" placeholder="City" id="field"/></p>                                    
                                            <p><input name="state" type="text" placeholder="State" id="field"/></p>
                                            <p><input name="saldo" type="text" placeholder="Balance" id="field"/></p>
                                            <p class="special"><?php
                                                $dbconn = pg_connect("host=localhost dbname=grpfleet user=db_admin password='12345'")
                                                or die('Can not connect: ' . \pg_last_error());
                                                $query = "SELECT  * FROM transaccion";
                                                $result = pg_query($query) or die('Query error: ' . \pg_last_error());
                                                echo "<select name='select1' id='field'>";
                                                while($fila=  pg_fetch_array($result)){
                                                    echo "<option value=".$fila['tipo_transaccion'].">".$fila['des_transaccion']."</option>";
                                                }
                                                echo "</select>";
                                                ?></p>
                                            <p><input input type="submit" name="enviar" value="Submit"  id="button-blue"  /></p>
                                        </form>
				</header>								
			</article>
			
			<aside>
				<h3>Account configuration</h3>
				<p>In this section you can configure a new account and the associated vehicle information</p>
                                <p></p>
			</aside>
			
		</div> <!-- #main -->
	</div> <!-- #main-container -->
        <?php
        // put your code here
        ?>
    </body>
</html>
