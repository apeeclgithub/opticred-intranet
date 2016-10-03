<table id="captadorTabla" class="table table-striped table-bordered tableWidth" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Fono</th>
			<th>Comisión</th>
			<th>Monto a Pagar</th>
			<th class="widthOptions">Acción</th>
		</tr>
	</thead>
	<tbody>
		<?php

			require '../model/classCaptador.php';
			$objCaptador = new Captador();
			$objCaptador->listCaptadores();

			foreach ( (array) $objCaptador as $key ) {
				foreach ($key as $key2 => $value) {
					?>
					<tr>
						<td><?php echo $value['CAP_NAME'];	?></td>
						<td><?php echo $value['CAP_PHONE'];	?></td>
						<td><?php echo $value['cap_total'];	?></td>
						<td><input type="number" class="form-control" id=""></td>
						<td class="text-center"><button class="btn btn-info btn-xs "><span class="glyphicon glyphicon-usd"></span>&nbsp;Pagar Comisión</button></td>
					</tr>
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