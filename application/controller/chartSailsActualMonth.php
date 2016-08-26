		<?php

		require '../model/classChart.php';
		$objSailsActualMonth = new Chart();
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
		?>