<table id="captadorTabla" class="table table-striped table-bordered tableWidth" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Fono</th>
			<th>Comisión</th>
			<th class="widthOptions">Acciones</th>
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
						<td><?php echo $value['cap_name'];	?></td>
						<td><?php echo $value['cap_phone'];	?></td>
						<td><?php echo $value['cap_total'];	?></td>
						<td class="text-center"><button 
						onclick="updateModalCaptador(
							 <?php echo $value['cap_id'];	?>,
							'<?php echo $value['cap_name'];	?>',
							'<?php echo $value['cap_phone'];	?>')" 
						
						class="btn btn-info btn-xs" data-toggle="modal" data-target="#editCaptadorConfirmDialog"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Editar</button>&nbsp;&nbsp;<button onclick="deleteModalCaptador(<?php echo $value['cap_id'];?>,<?php echo $value['cap_total']; ?>)" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteCaptadorConfirmDialog"><span class="glyphicon glyphicon-trash"></span>&nbsp;Eliminar</button></td>
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