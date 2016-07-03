<table id="inventoryTable" class="table table-striped table-bordered tableWidth" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Marco</th>
			<th>Tienda</th>
			<th>Precio</th>
			<th>Stock</th>
			<th class="widthOptions">Acciones</th>
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
						<td><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#editProductConfirmDialog"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Editar</button>&nbsp;&nbsp;<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteProductConfirmDialog"><span class="glyphicon glyphicon-trash"></span>&nbsp;Eliminar</button></td>
					</tr>
					<?php
				}
			}
		?>
	</tbody>
</table>