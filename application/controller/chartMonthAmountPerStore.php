		<?php

		require '../model/classChart.php';
		$objMonthAmountPerStore = new Chart();
		$objMonthAmountPerStore->monthAmountPerStore();

		$json[0] = array('Tienda','Monto');
		$i = 1;

		foreach ( (array) $objMonthAmountPerStore as $key ) {
			foreach ($key as $key2 => $value) {

				$json[$i] = array($value['TIE_NAME'], (int)$value['monto']);
				$i++;
			}
		}
		echo json_encode($json);
		?>