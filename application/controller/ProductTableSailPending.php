<table id="inventoryTableSailPending" class="table table-striped table-bordered tableWidth" cellspacing="0" width="100%">
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
						<td><input type="text" class="form-control inputWidthSail"></td>
						<td><?php echo $value['pro_stock'];?></td>
						<td class="text-center"><button class="btn btn-info btn-xs"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Agregar a venta</button></td>
					</tr>
					<?php
				}
			}
		?>
	</tbody>
</table>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
	$('#inventoryTableSailPending').DataTable();
} );
</script>