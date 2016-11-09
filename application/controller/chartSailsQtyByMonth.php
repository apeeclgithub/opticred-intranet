		<?php

		require '../model/classChart.php';
		$objSailsQtyByMonth = new Chart();
		$objSailsQtyByMonth->sailsQtyByMonth();

		$json[0] = array('MES','TERCERO', 'QUINTO');
		$i = 1;

		foreach ( (array) $objSailsQtyByMonth as $key ) {
			foreach ($key as $key2 => $value) {

				if($value['MES'] == '1'){
					$value['MES'] = 'ENERO';
				}
   				 if ($value['MES'] == '2'){
  					$value['MES'] = 'FEBRERO';
   				 }
   				 if ($value['MES'] == '3'){
					$value['MES'] = 'MARZO';
   				 }
  					
  				 if ($value['MES'] == '4'){
  				 	$value['MES'] = 'ABRIL';
  				 }

   				 if ($value['MES'] == '5'){
  					$value['MES'] = 'MAYO';
   				 }
  				 if ($value['MES'] == '6'){
  					$value['MES'] = 'JUNIO';
  				 }
  				 if ($value['MES'] == '7'){
  				 	$value['MES'] = 'JULIO';
  				 }
  				 if ($value['MES'] == '8'){
  					$value['MES'] = 'AGOSTO';
  				 }
  				 if ($value['MES'] == '9'){
  					$value['MES'] = 'SEPTIEMBRE';
  				 }
  				 if ($value['MES'] == '10'){
  					$value['MES'] = 'OCTUBRE';
  				 }
   				 if ($value['MES'] == '11'){
  					$value['MES'] = 'NOVIEMBRE';
   				 }
   				 if ($value['MES'] == '12'){
  					$value['MES'] = 'DICIEMBRE';
   				 }

				$json[$i] = array($value['MES'], (int)$value['TERCERO'], (int)$value['QUINTO']);
				$i++;
			}
		}
		echo json_encode($json);
			//echo json_encode($data);
		?>