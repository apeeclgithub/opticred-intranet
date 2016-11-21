<table id="buscarCierrelistCaptadorPaid" class="table table-striped table-bordered tableWidth" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Comisión Pagada</th>
		</tr>
	</thead>
	<tbody>
		<?php

			require '../model/classClosingCash.php';
			$objPaidCaptador = new ClosingCash();
			$objPaidCaptador->buscarCierrelistCaptadorPaid();

			foreach ( (array) $objPaidCaptador as $key ) {
				foreach ($key as $key2 => $value) {
					?>
					<tr>
						<td><?php echo $value['CAP_NAME'];	?></td>
						<td><?php echo $value['PAG_CAP'];	?></td>
					</tr>
					<?php
				}
			}
		?>
	</tbody>
</table>
<script type="text/javascript" language="javascript">
	$(document).ready(function() {
		$('#buscarCierrelistCaptadorPaid').DataTable();
	} );
</script>