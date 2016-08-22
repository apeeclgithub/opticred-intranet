		<?php

		require '../model/classChart.php';
		$objSellerTotalSails = new Chart();
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
			//echo json_encode($data);
		?>