		<?php

			require '../model/classChart.php';
			$objSellerSails = new Chart();
			$objSellerSails->sellerSails();

			$json[0] = array('Nombre', 'Monto');
			$i = 1;

			foreach ( (array) $objSellerSails as $key ) {
				foreach ($key as $key2 => $value) {
					$json[$i] = array($value['CAP_NAME'], (int)$value['VENTAPORCAPTADOR']);
					$i++;
				}
			}
			echo json_encode($json);
			//echo json_encode($data);
		?>