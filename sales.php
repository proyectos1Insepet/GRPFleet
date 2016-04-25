<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>GRP700 Fleet:: Sistemas Insepet</title>
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
					<h1>GRP700-Fleet</h1>
					<p><?php
                                                $dbconn = pg_connect("host=localhost dbname=grpfleet user=db_admin password='12345'")
                                                or die('Can not connect: ' . \pg_last_error());
                                                $query = "SELECT  MAX (id) FROM venta";
                                                $result = pg_query($query) or die('Query error: ' . \pg_last_error()); 
                                                $row = pg_fetch_row($result);
                                                $ultima = $row[0];
                                                ?></p>
                                        <p><table class="tabla" border="1">
                                            <thead>
                                                <tr>                                                
                                                <th>Sale number </th>
                                                <th>Date </th>
                                                <th>Customer ID </th>
                                                <th>Transaction type </th>
                                                <th>Side</th>
                                                <th>Hose </th>
                                                <th>Product </th>
                                                <th>Sale Quantity </th>
                                                <th>Sale Amount </th>
                                                <th>Plate </th>                
                                                </tr>
                                            </thead>
                                            <tbody> 
                                            <?php   
                                            echo "<tr>";
                                                for($i= $ultima; $i>($ultima - 100); $i--){
                                                    $sql = "select v.id_cliente, v.fecha, v.tipo_transaccion, 
                                                    v.dinero, v.volumen, vd.placa, vd.cara, vd.manguera, p.nombreproducto from venta v inner join venta_detalle vd on v.id = vd.id 
                                                    inner join producto p on vd.id_producto = p.id_producto WHERE v.id = $i ";
                                                    $sql2 = "select vol, moneda from recibo";
                                                if($i<=0){
                                                    break;
                                                }
                                                $result2 = pg_query($sql)or die('Query error: ' . \pg_last_error()); 
                                                $result3 = pg_query($sql2)or die('Query error: ' . \pg_last_error());
                                                if($result2){
                                                    if(pg_field_is_null($result2, 0, "id_cliente")==0){
                                                        $row2 = pg_fetch_assoc($result2);   
                                                        $row3 = pg_fetch_assoc($result3);
                                                        echo $row2['producto'];
                                                        echo "<td background-color:#F5D0A9;>".'<a href="index.php?num_venta='.$i.'">'.$i.'</a>'."</td> ";
                                                        echo "<td background-color:#F5D0A9;>"." ".$row2['fecha']."</td> ";
                                                        echo "<td background-color:#F5D0A9;>".$row2['id_cliente']." </td>";
                                                        echo "<td background-color:#F5D0A9;>".$row2['tipo_transaccion']." </td>";
                                                        echo "<td background-color:#F5D0A9;>".$row2['cara']." </td>";
                                                        echo "<td background-color:#F5D0A9;>".$row2['manguera']." </td>";
                                                        echo "<td background-color:#F5D0A9;>".$row2['nombreproducto']." </td>";
                                                        echo "<td background-color:#F5D0A9;>".$row2['volumen']." ".$row3['vol']."</td>";
                                                        echo "<td background-color:#F5D0A9;>".$row3['moneda']." ".$row2['dinero']." </td>";
                                                        echo "<td background-color:#F5D0A9;>".$row2['placa']." </td>";            
                                                        echo "</tr>";  
                                                        
                                                    }else {echo '<br>Without Results.';}
                                                }
                                                          
                                                }
                                                pg_free_result($result);
                                                pg_free_result($result2);
                                                // Cerrando la conexión
                                                pg_close($dbconn);
                                            ?> 
                                                </tbody>
                                            </table>
                                            </p>
				</header>								
			</article>
			
			
			
		</div> <!-- #main -->
	</div> <!-- #main-container -->
        <?php
        // put your code here
        ?>
    </body>
</html>
