<table id="vendedorTabla" class="table table-striped table-bordered tableWidth" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>E-Mail</th>
			<th>Rut</th>
			<th>Password</th>
			<th>Tienda</th>
			<th class="widthOptions">Acciones</th>
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
						<td><?php echo $value['usu_name'];	?></td>
						<td><?php echo $value['usu_mail'];	?></td>
						<td><?php echo $value['usu_rut'];	?></td>
						<td><?php echo $value['usu_pass'];	?></td>
						<td><?php echo $value['usu_store'];	?></td>
						<td><button 
						onclick="updateModalUser(
							 <?php echo $value['usu_id'];	?>,
							'<?php echo $value['usu_name'];	?>',
							'<?php echo $value['usu_mail'];	?>',
							'<?php echo $value['usu_rut'];	?>',
							'<?php echo $value['usu_pass'];	?>',
							'<?php echo $value['usu_store'];?>')" 
						
						class="btn btn-info btn-xs" data-toggle="modal" data-target="#editVendedorConfirmDialog"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Editar</button>&nbsp;&nbsp;<button onclick="deleteModalUser(<?php echo $value['usu_id'];?>)" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteVendedorConfirmDialog"><span class="glyphicon glyphicon-trash"></span>&nbsp;Eliminar</button></td>
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