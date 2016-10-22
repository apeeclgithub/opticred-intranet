<table id="tablaInsumos" class="table table-striped table-bordered tableWidth" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Insumo</th>
			<th>Detalle</th>
			<th>Monto</th>
			<th>Fecha</th>
		</tr>
	</thead>
	<tbody>
		<?php

		require '../model/classInsumo.php';
		$objInsumo = new Insumo();
		$objInsumo->listInsumos();

		foreach ( (array) $objInsumo as $key ) {
			foreach ($key as $key2 => $value) {
				?>
				<?php $hoy = date('Y-m-d');?>
				<?php if ($_SESSION["user"]["store"] == 1){
					$tienda = 'Tercero';
				} 
				?>
				<?php if ($_SESSION["user"]["store"] == 2){
					$tienda = 'Quinto';
				}
				?>

				<?php if ($value['INS_DATE'] == $hoy): ?>
				<?php if ($value['TIE_NAME'] == $tienda): ?>
				<tr>
					<td><?php echo $value['INS_NAME'];?></td>
					<td><?php echo $value['INS_DESC'];?></td>
					<td><?php echo $value['INS_TOTAL'];?></td>
					<td><?php echo $value['INS_DATE'];?></td>

				</tr>
			<?php endif ?>
		<?php endif ?>
		<?php
	}
}


?>	
</tbody>
</table>
<?php
$objInsumo = new Insumo();
$objInsumo->totalInsumoClosingCash($_SESSION["user"]["store"]);

foreach ( (array) $objInsumo as $key ) {
	foreach ($key as $key2 => $value) {
		?>
		<div class="form-group col-xs-4">
			<label for="">Total Insumos del día:</label>
			<input type="number" class="form-control" id="showCashSysClosingCash" value="<?php echo $value['TOTAL'];?>" disabled="disabled">
		</div>
		<?php
	}
}
?>

<script type="text/javascript" language="javascript">
$(document).ready(function() {
	$('#tablaInsumos').DataTable();
} );
</script>