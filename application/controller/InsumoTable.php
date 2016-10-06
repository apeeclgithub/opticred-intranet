<table id="tablaInsumos" class="table table-striped table-bordered tableWidth" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Insumo</th>
			<th>Tienda</th>
			<th>Detalle</th>
			<th>Monto</th>
			<th>Fecha</th>
			<th class="widthOptions text-center">Acciones</th>
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
						<td class="text-center"><button 
						onclick="updateModalInsumo(
							<?php  echo $value['INS_ID'];?>,
							'<?php echo $value['INS_NAME'];?>',
							'<?php echo $value['INS_DESC'];?>',
							'<?php  echo $value['TIE_NAME'];?>',
							<?php  echo $value['INS_TOTAL'];?>)" 
						
						class="btn btn-info btn-xs" data-toggle="modal" data-target="#editInsumoConfirmDialog"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Editar</button>&nbsp;&nbsp;<button onclick="deleteModalInsumo(<?php  echo $value['INS_ID'];?>)" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteInsumoConfirmDialog"><span class="glyphicon glyphicon-trash"></span>&nbsp;Eliminar</button></td>
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