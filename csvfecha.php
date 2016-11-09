<?php
if (filter_input(INPUT_POST,'enviar')) {
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=data.csv');			
	$output = fopen('php://output', 'w');
	$dbconn = pg_connect("host=127.0.0.1 dbname=grpfleet user=db_admin password='12345'")
	or die('Can not connect: ' . \pg_last_error());
	$fechaini   = filter_input(INPUT_POST,'inicial');
	$fechafin   = filter_input(INPUT_POST,'final');
	$sql        = "select id,id_cliente,volumen,dinero from venta where fecha between '$fechaini' AND '$fechafin'";								                                         
	$result     = pg_query($sql)or die('Query error: ' . \pg_last_error()); 
	$sql2       = "select vol, moneda from recibo";
	$result2    = pg_query($sql2)or die('Query error: ' . \pg_last_error());
	$row2       = pg_fetch_assoc($result2);
	while ($rows = pg_fetch_row($result)) { 
		fputcsv($output, array($rows[0],$rows[1],$rows[2],$row2['vol'],$row2['moneda'],$rows[3]));		    
	}
	fclose($file);
}

?>