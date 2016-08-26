		<?php

		require '../model/classChart.php';
		$objMonthAmountPerStore = new Chart();
		$objMonthAmountPerStore->monthAmountPerStore();

		$json[0] = array('Mes', 'Tienda','Monto');
		$i = 1;

		foreach ( (array) $objMonthAmountPerStore as $key ) {
			foreach ($key as $key2 => $value) {

				$json[$i] = array((int)$value['mes'],$value['tienda'], (int)$value['VEN_TOTAL']);
				$i++;
			}
		}
		echo json_encode($json);
		?>