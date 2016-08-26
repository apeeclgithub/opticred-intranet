		<?php

		require '../model/classChart.php';
		$objDailyAmountPerStore = new Chart();
		$objDailyAmountPerStore->dailyAmountPerStore();

		$json[0] = array('Tienda', 'Monto');
		$i = 1;

		foreach ( (array) $objDailyAmountPerStore as $key ) {
			foreach ($key as $key2 => $value) {

				$json[$i] = array($value['VEN_STORE'], (int)$value['VEN_TOTAL']);
				$i++;
			}
		}
		echo json_encode($json);
			//echo json_encode($data);
		?>