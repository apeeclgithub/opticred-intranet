<table id="vendedorTabla" class="table table-striped table-bordered tableWidth" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>E-Mail</th>
			<th>Rut</th>
			<th>Password</th>
			<th>Tienda</th>
			<th class="widthOptions text-center">Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php

			require '../model/classUser.php';
			$objUser = new User();
			$objUser->listUsers();

			foreach ( (array) $objUser as $key ) {
				foreach ($key as $key2 => $value) {
					?>
					<tr>
						<td><?php echo $value['USU_NAME'];	?></td>
						<td><?php echo $value['USU_MAIL'];	?></td>
						<td><?php echo $value['USU_RUT'];	?></td>
						<td><?php echo $value['USU_PASS'];	?></td>
						<td><?php echo $value['TIE_NAME'];	?></td>
						<td class="text-center"><button 
						onclick="updateModalUser(
							 <?php echo $value['USU_ID'];	?>,
							'<?php echo $value['USU_NAME'];	?>',
							'<?php echo $value['USU_MAIL'];	?>',
							'<?php echo $value['USU_RUT'];	?>',
							'<?php echo $value['USU_PASS'];	?>',
							'<?php echo $value['TIE_NAME'];?>')" 
						
						class="btn btn-info btn-xs" data-toggle="modal" data-target="#editVendedorConfirmDialog"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Editar</button>&nbsp;&nbsp;<button onclick="deleteModalUser(<?php echo $value['USU_ID'];?>)" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteVendedorConfirmDialog"><span class="glyphicon glyphicon-trash"></span>&nbsp;Eliminar</button></td>
					</tr>
					<?php
				}
			}
		?>
	</tbody>
</table>
<script type="text/javascript" language="javascript">
	$(document).ready(function() {
		$('#vendedorTabla').DataTable();
	} );
</script>