<?php
	
	session_start();
	require '../model/classChart.php';
	$json['success'] = false; 

	$objChart= new Chart();

	switch (@$_GET['action']) {

		case 1:
			$objDailyAmountPerStore->dailyAmountPerStore();
			$json[0] = array('Tienda', 'Monto');
			$i = 1;

			foreach ( (array) $objDailyAmountPerStore as $key ) {
				foreach ($key as $key2 => $value) {

					$json[$i] = array($value['tienda'], (int)$value['monto']);
					$i++;
				}
			}
			echo json_encode($json);

			break;

		case 2:
			$objMonthAmountPerStore->monthAmountPerStore();

			$json[0] = array('Tienda','Monto');
			$i = 1;

			foreach ( (array) $objMonthAmountPerStore as $key ) {
				foreach ($key as $key2 => $value) {

					$json[$i] = array($value['tienda'], (int)$value['monto']);
					$i++;
				}
			}
			echo json_encode($json);

			break;

		case 3:
			$objSailsActualDay->sailsActualDay();

			$json[0] = array('Tienda','Ventas');
			$i = 1;

			foreach ( (array) $objSailsActualDay as $key ) {
				foreach ($key as $key2 => $value) {

					$json[$i] = array($value['tienda'], (int)$value['cantidad']);
					$i++;
				}
			}
			echo json_encode($json);

			break;

		case 4:

			$objSailsActualMonth->sailsActualMonth();

			$json[0] = array('Tienda','Ventas');
			$i = 1;

			foreach ( (array) $objSailsActualMonth as $key ) {
				foreach ($key as $key2 => $value) {

					$json[$i] = array($value['tienda'], (int)$value['cantidad']);
					$i++;
				}
			}
			echo json_encode($json);
			break;
		
		case 5:

			$objSailsQtyByMonth->sailsQtyByMonth();

			$json[0] = array('Mes','Tercero', 'Quinto');
			$i = 1;

			foreach ( (array) $objSailsQtyByMonth as $key ) {
				foreach ($key as $key2 => $value) {

					if($value['mes'] == '1'){
						$value['mes'] = 'ENERO';
					}
	   				 if ($value['mes'] == '2'){
	  					$value['mes'] = 'FEBRERO';
	   				 }
	   				 if ($value['mes'] == '3'){
						$value['mes'] = 'MARZO';
	   				 }
	  					
	  				 if ($value['mes'] == '4'){
	  				 	$value['mes'] = 'ABRIL';
	  				 }

	   				 if ($value['mes'] == '5'){
	  					$value['mes'] = 'MAYO';
	   				 }
	  				 if ($value['mes'] == '6'){
	  					$value['mes'] = 'JUNIO';
	  				 }
	  				 if ($value['mes'] == '7'){
	  				 	$value['mes'] = 'JULIO';
	  				 }
	  				 if ($value['mes'] == '8'){
	  					$value['mes'] = 'AGOSTO';
	  				 }
	  				 if ($value['mes'] == '9'){
	  					$value['mes'] = 'SEPTIEMBRE';
	  				 }
	  				 if ($value['mes'] == '10'){
	  					$value['mes'] = 'OCTUBRE';
	  				 }
	   				 if ($value['mes'] == '11'){
	  					$value['mes'] = 'NOVIEMBRE';
	   				 }
	   				 if ($value['mes'] == '12'){
	  					$value['mes'] = 'DICIEMBRE';
	   				 }

					$json[$i] = array($value['mes'], (int)$value['tercero'], (int)$value['quinto']);
					$i++;
				}
			}
			echo json_encode($json);
		break;	

		case 6:

			$objSailsCountByMonth->sailsCountByMonth();

			$json[0] = array('Mes','Tercero', 'Quinto');
			$i = 1;

			foreach ( (array) $objSailsCountByMonth as $key ) {
				foreach ($key as $key2 => $value) {

					if($value['mes'] == '1'){
						$value['mes'] = 'ENERO';
					}
	   				 if ($value['mes'] == '2'){
	  					$value['mes'] = 'FEBRERO';
	   				 }
	   				 if ($value['mes'] == '3'){
						$value['mes'] = 'MARZO';
	   				 }
	  					
	  				 if ($value['mes'] == '4'){
	  				 	$value['mes'] = 'ABRIL';
	  				 }

	   				 if ($value['mes'] == '5'){
	  					$value['mes'] = 'MAYO';
	   				 }
	  				 if ($value['mes'] == '6'){
	  					$value['mes'] = 'JUNIO';
	  				 }
	  				 if ($value['mes'] == '7'){
	  				 	$value['mes'] = 'JULIO';
	  				 }
	  				 if ($value['mes'] == '8'){
	  					$value['mes'] = 'AGOSTO';
	  				 }
	  				 if ($value['mes'] == '9'){
	  					$value['mes'] = 'SEPTIEMBRE';
	  				 }
	  				 if ($value['mes'] == '10'){
	  					$value['mes'] = 'OCTUBRE';
	  				 }
	   				 if ($value['mes'] == '11'){
	  					$value['mes'] = 'NOVIEMBRE';
	   				 }
	   				 if ($value['mes'] == '12'){
	  					$value['mes'] = 'DICIEMBRE';
	   				 }

					$json[$i] = array($value['mes'], (int)$value['tercero'], (int)$value['quinto']);
					$i++;
				}
			}
			echo json_encode($json);

		break;	

		case 7:

			$objTopTepProduct->listTopTen();

			$json[0] = array('Nombre', 'Cantidad');
			$i = 1;

			foreach ( (array) $objTopTepProduct as $key ) {
				foreach ($key as $key2 => $value) {

					$json[$i] = array($value['pro_name'], (int)$value['cantidad']);


					$i++;

				}

			}
			
			echo json_encode($json);

		break;

		case 8:

			$objSellerComission->sellerComission();

			$json[0] = array('Nombre', 'Monto');
			$i = 1;

			foreach ( (array) $objSellerComission as $key ) {
				foreach ($key as $key2 => $value) {
					$json[$i] = array($value['CAP_NAME'], (int)$value['CAP_TOTAL']);
					$i++;
				}
			}
			echo json_encode($json);
		break;

		case 9:
			$objSellerTotalSails->sellerTotalSails();

			$json[0] = array('Nombre', 'Cantidad de ventas');
			$i = 1;

			foreach ( (array) $objSellerTotalSails as $key ) {
				foreach ($key as $key2 => $value) {

					$json[$i] = array($value['CAP_NAME'], (int)$value['VENTAPORCAPTADOR']);


					$i++;

				}

			}
			
			echo json_encode($json);
		break;

		default:

		break;
	}

?>