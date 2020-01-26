<!-- Modal ver abonos-->
  <div class="modal fade" id="verAbonos" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Lista de abonos</h4>
        </div>
        <div class="modal-body">
          			<div class="panel-body">
			  <div class="row">
				<div class="form-group col-xs-11">
				  <label for="">Abonos</label><br>
					<table id="abonosPendientesDetalle" class="table table-striped table-bordered tableWidth" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Fecha</th>
								<th>Total</th>
								<th>Tipo de pago</th>
							</tr>
						</thead>
						<tbody>
							<?php

							require '../model/classSale.php';
							$objSale = new Sale();
							$objSale->listaAbonos($_GET['id']);

							foreach ( (array) $objSale as $key ) {
								foreach ($key as $key2 => $value) {
									?>
									<tr>
										<?php $timestamp = strtotime($value['ABO_DATE']); ?>
										<?php $fechaAbono=date("d/m/Y", $timestamp); ?>
										<td><?php echo $fechaAbono; ?></td>
										<td><?php echo $value['ABO_TOTAL'];?></td>
										<td><?php echo $value['MET_NAME'];?></td>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
	$('#abonosPendientesDetalle').DataTable();
} );
</script>