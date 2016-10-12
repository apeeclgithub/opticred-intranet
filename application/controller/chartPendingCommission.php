		<?php

		require '../model/classChart.php';
		$objPendingCommission = new Chart();
		$objPendingCommission->pendingCommission();

		$json[0] = array('Nombre', 'Monto');
		$i = 1;

		foreach ( (array) $objPendingCommission as $key ) {
			foreach ($key as $key2 => $value) {

				$json[$i] = array($value['CAP_NAME'], (int)$value['CAP_TOTAL']);


				$i++;

			}

		}
		
		echo json_encode($json);
			//echo json_encode($data);
		?>