<?php
require '../model/classClosingCash.php';
$objClosingCashTotal = new ClosingCash();
$objClosingCashTotal->buscarCierreCristal($_GET['fecha'],$_GET['tienda']);

foreach ( (array) $objClosingCashTotal as $key ) {
	foreach ($key as $key2 => $value) {
		?><div class="panel panel-default">
		<div class="panel-body">
			<div class="form-group col-xs-4">
				<label for="">Total Cristales del día:</label>
				<input type="number" class="form-control" id="showCristalTotalBuscarCierre" value="<?php echo $value['CRI_TOTAL'];?>" disabled="disabled">
			</div>
			</div>
		</div>
		<?php
	}
}
?>