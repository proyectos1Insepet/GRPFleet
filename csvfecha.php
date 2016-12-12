<?php
if (filter_input(INPUT_POST,'enviar')) {
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=data.csv');			
	$output = fopen('php://output', 'w');
	$dbconn = pg_connect("host=127.0.0.1 dbname=grpfleet user=db_admin password='12345'")
	or die('Can not connect: ' . \pg_last_error());
	$fechaini   = filter_input(INPUT_POST,'inicial');
	$fechafin   = filter_input(INPUT_POST,'final');
	$sql        = "select v.id_cliente,v.fecha,
				v.tipo_transaccion,v.volumen, v.dinero, vd.placa, vd.cara, vd.manguera, p.descripcion, c.nombre,v.id,vd.km,vd.idvehiculo from venta v                                                                                          inner join venta_detalle vd on v.id = vd.fk_id                                                                                                         
				inner join producto p on vd.fk_id_producto = p.id_producto                                                                                             
				inner join cuenta c on v.id_cliente = c.id_cliente
				where (fecha between '$fechaini' AND '$fechafin')";								                                         
	$result     = pg_query($sql)or die('Query error: ' . \pg_last_error()); 
	$sql2       = "select vol, moneda from recibo";
	$result2    = pg_query($sql2)or die('Query error: ' . \pg_last_error());
	$row2       = pg_fetch_assoc($result2);	
	fputcsv($output, array('Fecha','Cuenta', 'Placa','ID', 'Fecha y hora','Combustible','Volumen','','Odómetro'));
	while ($rows = pg_fetch_row($result)) { 
		fputcsv($output, array(substr($rows[1],0,-15),$rows[9],$rows[5],$rows[12],substr($rows[1],0,-10),$rows[8],$rows[3],$row2['vol'],$rows[11]));		    
	}
	fclose($file);
}

?>