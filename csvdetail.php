<?php
if (filter_input(INPUT_POST,'csv')) { 			
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=data.csv');			
	$output = fopen('php://output', 'w');
	$dbconn = pg_connect("host=127.0.0.1 dbname=grpfleet user=db_admin password='12345'")
	or die('Can not connect: ' . \pg_last_error());
	$idcliente = filter_input(INPUT_POST, 'idcliente');
	$cliente = filter_input(INPUT_POST, 'cliente');
	$sql = "SELECT id_cliente FROM cuenta WHERE nombre ='Your company';";                                            
	$result = pg_query($sql)or die('Query error: ' . \pg_last_error()); 
	$row    = pg_fetch_row($result);			
	$sql2 = "SELECT  v.fecha, v.dinero, v.volumen,v.id,c.nombre, vd.placa FROM venta v 
	INNER JOIN cuenta c ON c.id_cliente = v.id_cliente 
	INNER JOIN venta_detalle vd ON vd.fk_id = v.id
	WHERE v.id_cliente = $idcliente;";                                            
	$result2 = pg_query($sql2)or die('Query error: ' . \pg_last_error());                                                                                                                                    
	$sql3 = "SELECT vol, moneda FROM recibo"; 
	$result3 = pg_query($sql3)or die('Query error: ' . \pg_last_error());
	$row3 = pg_fetch_assoc($result3);											
	$consulta = "SELECT id_cliente FROM vehiculo WHERE placa ='$row2[5]';";
	$resconsulta = pg_query($consulta)or die('Query error: ' . \pg_last_error());
	$fila = pg_fetch_row($resconsulta);
	while ($row2 = pg_fetch_row($result2)) { 
		fputcsv($output, array($row2[0],$row2[5],$row2[2]));
	}

	fclose($file); 
}
?>