		<?php

		require '../model/classChart.php';
		$objSellerComission = new Chart();
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
			//echo json_encode($data);
		?>