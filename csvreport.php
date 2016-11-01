<?php
		if (filter_input(INPUT_POST,'csv')) { 			
			header('Content-Type: text/csv; charset=utf-8');
			header('Content-Disposition: attachment; filename=data.csv');			
			$output = fopen('php://output', 'w');
			$dbconn = pg_connect("host=127.0.0.1 dbname=grpfleet user=db_admin password='12345'")
			or die('Can not connect: ' . \pg_last_error());
			$sql = "SELECT  SUM(v.dinero), SUM(v.volumen), c.nombre,c.id_cliente FROM venta v  INNER JOIN cuenta c ON v.id_cliente = c.id_cliente GROUP BY c.nombre,c.id_cliente;";
			$sql2 = "select vol, moneda from recibo";                                            
			$result = pg_query($sql)or die('Query error: ' . \pg_last_error()); 
			$result2 = pg_query($sql2)or die('Query error: ' . \pg_last_error());
			$row2 = pg_fetch_assoc($result2); 
			$arr = pg_fetch_all($result);                                            
			while ($row = pg_fetch_row($result)) { 
				fputcsv($output, array($row[2],$row2['moneda'],$row[0],$row[1],$row2['vol']));
			}

			fclose($file); 
		}
			?>