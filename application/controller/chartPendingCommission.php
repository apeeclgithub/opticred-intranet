		<?php

		require '../model/classChart.php';
		$objPendingCommission = new Chart();
		$objPendingCommission->pendingCommission();

		$json[0] = array('Nombre', 'Monto');
		$i = 1;

		foreach ( (array) $objPendingCommission as $key ) {
			foreach ($key as $key2 => $value) {
						$comTotal = $value['COMTOTAL'];
						$pagTotal = $value['PAGTOTAL'];
						$totalPedding = $comTotal-$pagTotal;
				$json[$i] = array($value['CAP_NAME'], (int)$totalPedding);


				$i++;

			}

		}
		
		echo json_encode($json);
			//echo json_encode($data);
		?>