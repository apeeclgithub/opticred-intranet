<table id="inventoryTable" class="table table-striped table-bordered tableWidth" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Marco</th>
			<th>Tienda</th>
			<th>Precio</th>
			<th>Stock</th>
			<th class="widthOptions text-center">Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php

			require '../model/classProduct.php';
			$objProduct = new Product();
			$objProduct->listProducts();

			foreach ( (array) $objProduct as $key ) {
				foreach ($key as $key2 => $value) {
					?>
					<tr>
						<td><?php echo $value['pro_name'];?></td>
						<td><?php echo $value['pro_store'];?></td>
						<td><?php echo $value['pro_price'];?></td>
						<td><?php echo $value['pro_stock'];?></td>
						<td class="text-center"><button 
						onclick="updateModalProduct(
							<?php  echo $value['pro_id'];?>,
							'<?php echo $value['pro_name'];?>',
							'<?php echo $value['pro_store'];?>',
							<?php  echo $value['pro_price'];?>,
							<?php  echo $value['pro_stock'];?>)" 
						
						class="btn btn-info btn-xs" data-toggle="modal" data-target="#editProductConfirmDialog"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Editar</button>&nbsp;&nbsp;<button onclick="deleteModalProduct(<?php  echo $value['pro_id'];?>)" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteProductConfirmDialog"><span class="glyphicon glyphicon-trash"></span>&nbsp;Eliminar</button></td>
					</tr>
					<?php
				}
			}
		?>
	</tbody>
</table>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
	$('#inventoryTable').DataTable();
} );
</script>