<table id="captadorTablaPaidOut" class="table table-striped table-bordered tableWidth" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Comisión Pagada HOY</th>
			<th class="widthOptions">Acción</th>
		</tr>
	</thead>
	<tbody>
		<?php

			require '../model/classClosingCash.php';
			$objPaidCaptador = new ClosingCash();
			$objPaidCaptador->listCaptadorPaidOut();

			foreach ( (array) $objPaidCaptador as $key ) {
				foreach ($key as $key2 => $value) {
					?>
					<tr>
						<td><?php echo $value['CAP_NAME'];	?></td>
						<td><?php echo $value['PAG_CAP'];	?></td>
						<td class="text-center"><button 
						onclick="dataToDeletePaidCaptador(
							 <?php echo $value['CAP_ID'];	?>,
							'<?php echo $value['CAP_NAME'];	?>',
							'<?php echo $value['PAG_CAP'];	?>')" 
						
						class="btn btn-danger btn-xs " data-toggle="modal" data-target="#PaidOutCaptadorConfirmDialog" ><span class="glyphicon glyphicon-usd"></span>&nbsp;Eliminar pago de Comisión</button>
					</tr>
					<?php
				}
			}
		?>
	</tbody>
</table>
<script type="text/javascript" language="javascript">
	$(document).ready(function() {
		$('#captadorTablaPaidOut').DataTable();
	} );
</script>