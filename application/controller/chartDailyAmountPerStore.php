		<?php

		require '../model/classChart.php';
		$objDailyAmountPerStore = new Chart();
		$objDailyAmountPerStore->dailyAmountPerStore();

		$json[0] = array('Tienda', 'Monto');
		$i = 1;

		foreach ( (array) $objDailyAmountPerStore as $key ) {
			foreach ($key as $key2 => $value) {

				$json[$i] = array($value['TIE_NAME'], (int)$value['monto']);
				$i++;
			}
		}
		echo json_encode($json);
			//echo json_encode($data);
		?>