		<?php

			require '../model/classGraph.php';
			$objTopTepProduct = new TopTenGraph();
			$objTopTepProduct->listTopTen();
			foreach ( (array) $objTopTepProduct as $key ) {
				foreach ($key as $key2 => $value) {
						$pro_name[] = $value['pro_name'];	
						$cantidad[] = (int)$value['cantidad'];


				}

			}
			echo json_encode(array($pro_name,$cantidad));
			//echo json_encode($data);
		?>