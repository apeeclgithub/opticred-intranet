<!-- Modal confirmacion Venta-->
  <div class="modal fade" id="buscarCierreInsumosModal" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detalle</h4>
        </div>
        <div class="modal-body">
          <div class="panel panel-default">
			<div class="panel-heading">
			  <h3 class="panel-title">Insumos de día</h3>
			</div>
			<div class="panel-body">
			  <div class="row">
				<div class="form-group col-xs-11">
				  <label for="">Insumo</label><br>
					<table id="buscarCierrelistInsumosClosingCash" class="table table-striped table-bordered tableWidth" cellspacing="0" width="100%">
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
							$objInsumo->buscarCierrelistInsumosClosingCash($_GET['fecha'],$_GET['tienda']);

							foreach ( (array) $objInsumo as $key ) {
								foreach ($key as $key2 => $value) {
									?>
									<tr>
										<td><?php echo $value['INS_NAME'];?></td>
										<td><?php echo $value['INS_DESC'];?></td>
										<td><?php echo $value['INS_TOTAL'];?></td>
										<td><?php echo $value['INS_DATE'];?></td>

									</tr>
							<?php
						}
					}
					?>	
					</tbody>
					</table>
				</div>
			  </div>
			</div>
		  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
<?php
$objInsumo = new Insumo();
$objInsumo->buscarCierreTotalInsumosClosingCash($_GET['fecha'],$_GET['tienda']);

foreach ( (array) $objInsumo as $key ) {
	foreach ($key as $key2 => $value) {
		?><div class="panel panel-default">
		<div class="panel-body">
			<div class="form-group col-xs-4">
				<label for="">Total Insumos del día:</label>
				<input type="number" class="form-control" id="showInsumosTotalClosingCash" value="<?php echo $value['TOTAL'];?>" disabled="disabled">
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#buscarCierreInsumosModal">Ver Detalles</button>
			</div>
			</div>
		</div>
		<?php
	}
}
?>

<script type="text/javascript" language="javascript">
$(document).ready(function() {
	$('#buscarCierrelistInsumosClosingCash').DataTable();
} );
</script>

<script type="text/javascript" language="javascript">
$(document).ready(function() {
	$('#buscarCierreTotalInsumosClosingCash').DataTable();
} );
</script>