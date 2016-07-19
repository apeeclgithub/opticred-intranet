<table id="inventoryTableSailAdd" class="table table-striped table-bordered tableWidth" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Marco</th>
			<th>Tienda</th>
			<th>Precio</th>
			<th>Cantidad</th>
			<th class="widthOptions text-center">Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php

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
						<td class="text-center"><button  class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span>&nbsp;Eliminar de la venta</button></td>
					</tr>
					<?php
				}
			}
		?>
	</tbody>
</table>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
	$('#inventoryTableSailAdd').DataTable();
} );
</script>