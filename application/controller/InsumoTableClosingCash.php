<table id="tablaInsumos" class="table table-striped table-bordered tableWidth" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Insumo</th>
			<th>Tienda</th>
			<th>Detalle</th>
			<th>Monto</th>
			<th>Fecha</th>
		</tr>
	</thead>
	<tbody>
		<?php

			require '../model/classInsumo.php';
			$objInsumo = new Insumo();
			$objInsumo->listInsumos();

			foreach ( (array) $objInsumo as $key ) {
				foreach ($key as $key2 => $value) {
					?>
					<tr>
						<td><?php echo $value['INS_NAME'];?></td>
						<td><?php echo $value['INS_DESC'];?></td>
						<td><?php echo $value['TIE_NAME'];?></td>
						<td><?php echo $value['INS_TOTAL'];?></td>
						<td><?php echo $value['INS_DATE'];?></td>
					</tr>
					<?php
				}
			}
		?>
	</tbody>
</table>

<script type="text/javascript" language="javascript">
	$(document).ready(function() {
		$('#tablaInsumos').DataTable();
	} );
</script>