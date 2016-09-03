		<?php

		require '../model/classChart.php';
		$objSailsCountByMonth = new Chart();
		$objSailsCountByMonth->sailsCountByMonth();

		$json[0] = array('Mes','Tercero', 'Quinto');
		$i = 1;

		foreach ( (array) $objSailsCountByMonth as $key ) {
			foreach ($key as $key2 => $value) {

				if($value['mes'] == '1'){
					$value['mes'] = 'ENERO';
				}
   				 if ($value['mes'] == '2'){
  					$value['mes'] = 'FEBRERO';
   				 }
   				 if ($value['mes'] == '3'){
					$value['mes'] = 'MARZO';
   				 }
  					
  				 if ($value['mes'] == '4'){
  				 	$value['mes'] = 'ABRIL';
  				 }

   				 if ($value['mes'] == '5'){
  					$value['mes'] = 'MAYO';
   				 }
  				 if ($value['mes'] == '6'){
  					$value['mes'] = 'JUNIO';
  				 }
  				 if ($value['mes'] == '7'){
  				 	$value['mes'] = 'JULIO';
  				 }
  				 if ($value['mes'] == '8'){
  					$value['mes'] = 'AGOSTO';
  				 }
  				 if ($value['mes'] == '9'){
  					$value['mes'] = 'SEPTIEMBRE';
  				 }
  				 if ($value['mes'] == '10'){
  					$value['mes'] = 'OCTUBRE';
  				 }
   				 if ($value['mes'] == '11'){
  					$value['mes'] = 'NOVIEMBRE';
   				 }
   				 if ($value['mes'] == '12'){
  					$value['mes'] = 'DICIEMBRE';
   				 }

				$json[$i] = array($value['mes'], (int)$value['tercero'], (int)$value['quinto']);
				$i++;
			}
		}
		echo json_encode($json);
			//echo json_encode($data);
		?>