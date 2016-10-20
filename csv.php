<?php
		if (filter_input(INPUT_POST,'csv')) { 
			$venta    = filter_input(INPUT_POST,$row[0]);
			header('Content-Type: text/csv; charset=utf-8');
			header('Content-Disposition: attachment; filename=data.csv');			
			$output = fopen('php://output', 'w');

			fputcsv($output, array('$row[0]', 'Column 2', 'Column 3'));

			fclose($file); 
		}
			?>