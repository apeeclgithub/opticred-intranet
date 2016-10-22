<table id="inventoryTableSail" class="table table-striped table-bordered tableWidth" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Marco</th>
			<th>Tipo</th>
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
						<td><?php echo $value['PRO_NAME'];?></td>
						<td><select id="addSaleType" name="addSaleType" class="form-control">
							<option value="" disabled selected>Seleccione tipo de armazón</option>
							<option value="Lejos">Lejos</option>
							<option value="Cerca">Cerca</option>
							<option value="Sol">Sol</option>
						</select></td>
						<td><?php echo $value['PRO_STOCK'];?></td>
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
	$('#inventoryTableSail').DataTable();
} );
</script>