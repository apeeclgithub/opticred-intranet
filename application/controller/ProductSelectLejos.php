<select class="form-control col-xs-4" name="addSaleProductLejos" id="addSaleProductLejos">
	<option value="" disabled selected>Marco</option>
	<?php 
		require_once '../model/classProduct.php';
		$objProduct = new Product();
		$objProduct->listProducts();

		foreach ((array)$objProduct as $key) {
			foreach ($key as $key2 => $value) {
				echo '<option value="'.$value['pro_id'].'">'.$value['pro_name'].'</option>';
			}
		}
	?>
</select>