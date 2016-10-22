<table id="captadorTabla" class="table table-striped table-bordered tableWidth" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Comisión</th>
			<th>Monto a Pagar</th>
			<th class="widthOptions">Acción</th>
		</tr>
	</thead>
	<tbody>
		<?php

			require '../model/classCaptador.php';
			$objCaptador = new Captador();
			$objCaptador->pendingCommission();

			foreach ( (array) $objCaptador as $key ) {
				foreach ($key as $key2 => $value) {
					?>
					<?php if ($value['CAP_TOTAL'] >0 ): ?>
						
					
					<tr>
						<td><?php echo $value['CAP_NAME'];	?></td>
						<td><?php echo $value['CAP_TOTAL'];	?></td>
						<td><input type="number" class="form-control" id="captador<?php echo $value['CAP_ID'];?>"></td>
						<td class="text-center"><button class="btn btn-info btn-xs " data-toggle="modal" data-target="#PayCaptadorConfirmDialog" ><span class="glyphicon glyphicon-usd"></span>&nbsp;Pagar Comisión</button></td>
					</tr>
					<?php endif ?>
					<?php
				}
			}
		?>
	</tbody>
</table>
<script type="text/javascript" language="javascript">
	$(document).ready(function() {
		$('#captadorTabla').DataTable();
	} );
</script>