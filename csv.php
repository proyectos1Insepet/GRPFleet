<?php
		if (filter_input(INPUT_POST,'csv')) { 			
			header('Content-Type: text/csv; charset=utf-8');
			header('Content-Disposition: attachment; filename=data.csv');			
			$output = fopen('php://output', 'w');
			$dbconn = pg_connect("host=127.0.0.1 dbname=grpfleet user=db_admin password='12345'")
			or die('Can not connect: ' . \pg_last_error());
			$query = "SELECT  MAX (id) FROM venta";
			$result = pg_query($query) or die('Query error: ' . \pg_last_error()); 
			$row = pg_fetch_row($result);
			$ultima = $row[0];	
			fputcsv($output, array('Cliente', 'ID Vehiculo', 'Fecha','Vol', '# Venta'));
			for($i= $ultima; $i>($ultima - 100); $i--){
				$sql = "select v.id_cliente,
				v.fecha,
				v.tipo_transaccion,v.volumen, v.dinero, vd.placa, vd.cara, vd.manguera, p.descripcion, c.nombre from venta v                                                                                          inner join venta_detalle vd on v.id = vd.fk_id                                                                                                         
				inner join producto p on vd.fk_id_producto = p.id_producto                                                                                             
				inner join cuenta c on v.id_cliente = c.id_cliente WHERE v.id = $i;";
				$sql2  = "select vol, moneda from recibo";											
				if($i<=0){
					break;
				}
				$result2 = pg_query($sql)or die('Query error: ' . \pg_last_error()); 
				$result3 = pg_query($sql2)or die('Query error: ' . \pg_last_error());
				if($result2){
					if(pg_field_is_null($result2, 0, "id_cliente")==0){
						$row2 = pg_fetch_row($result2);   
						$row3 = pg_fetch_assoc($result3);  
						fputcsv($output, array($row2[9],$row2[5],substr($row2[1],0,-10),$row2[3],$i));
						// echo $row2[9];
						// echo $row2[5];
						// echo $row2[1];	
						// echo $i;
				}else {
					echo '<br>Sin resultados.';                                            
				}
				}
				//fputcsv($output, $row);
			}       
			

			fclose($file); 
		}
			?>