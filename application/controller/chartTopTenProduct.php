		<?php

		require '../model/classChart.php';
		$objTopTepProduct = new Chart();
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
			//echo json_encode($data);
		?>