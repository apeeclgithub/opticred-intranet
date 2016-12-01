<!-- Modal confirmacion Venta-->
  <div class="modal fade" id="buscarCierreCaptadorModal" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detalle</h4>
        </div>
        <div class="modal-body">
		<div class="panel panel-default">
			<div class="panel-heading">
			  <h3 class="panel-title">Comisión Pagada a captador</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="form-group col-xs-11">
						<table id="buscarCierrelistCaptadorPaid" class="table table-striped table-bordered tableWidth" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Comisión Pagada</th>
								</tr>
							</thead>
							<tbody>
								<?php

									require '../model/classClosingCash.php';
									$objPaidCaptador = new ClosingCash();
									$objPaidCaptador->buscarCierrelistCaptadorPaid($_GET['fecha']);

									foreach ( (array) $objPaidCaptador as $key ) {
										foreach ($key as $key2 => $value) {
											?>
											<tr>
												<td><?php echo $value['CAP_NAME'];	?></td>
												<td><?php echo $value['PAG_CAP'];	?></td>
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
require '../model/classCaptador.php';
$objCaptador = new Captador();
$objCaptador->captadoresTotalClosingCash($_GET['fecha']);

foreach ( (array) $objCaptador as $key ) {
	foreach ($key as $key2 => $value) {
		?><div class="panel panel-default">
		<div class="panel-body">
			<div class="form-group col-xs-4">
				<label for="">Total Pagos del día:</label>
				<input type="number" class="form-control" id="showCaptadorTotalClosingCash" value="<?php echo $value['TOTAL'];?>" disabled="disabled">
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#buscarCierreCaptadorModal">Ver Detalles</button>
			</div>
			</div>
		</div>
		<?php
	}
}
?>
<script type="text/javascript" language="javascript">
	$(document).ready(function() {
		$('#buscarCierrelistCaptadorPaid').DataTable();
	} );
</script>