<?php include('header.php');?>
<?php include('nav_menu.php'); ?>
<?php include('userNav.php'); ?>

<div class="contentMain">
	<script type="text/javascript" language="javascript">
	$(document).ready(function() {
		$('#ventasPendientes').DataTable();
	} );
	</script>

	<legend>Ventas Pendientes <span style="float:right;">Tienda: <?php echo ($_SESSION['user']['store']==1)?'GORBEA':'CONCEPCION'; ?></span></legend>
	<div class="well">
	<?php
		require '../model/classSale.php';
		$objSale = new Sale();
		$objSale->totalesPendientes($_SESSION['user']['store']);
		foreach ( (array) $objSale as $key ) {
			foreach ($key as $key2 => $value) {
				echo '<h3>Total de ventas pendientes: <span class="label label-info">'.$value['CANTIDAD'].'</span></h3>';
				echo '<h3>Monto total adeudado: <span class="label label-info">$'.number_format($value['PENDIENTE'],0,'.','.').'</span></h3>';
			}
		}
	?></div>
	
	<div>
		<table id="ventasPendientes" class="table table-striped table-bordered tableWidth" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>N° de Venta</th>
					<th>Nombre Cliente</th>
					<th >Monto Cancelado</th>
					<th >Monto Pendiente</th>
					<th>Fecha Venta</th>
					<th class="widthVerMas">Detalle</th>
					<th class="widthOptions text-center">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php

			$objSale = new Sale();
			$objSale->listSalePending($_SESSION['user']['store']);

			foreach ( (array) $objSale as $key ) {
				foreach ($key as $key2 => $value) {
					?>
					<tr>
						<td><?php echo $value['VEN_CORRELATIVE'];	?></td>
						<td><?php echo $value['VEN_CLI_NAME'];	?></td>
						<td><?php echo $value['ABO_TOTAL'];	?></td>
						<td><?php echo $value['PENDIENTE'];	?></td>
						<td><?php echo $value['VEN_DATE_CREATE'];	?></td>
						<td><a href="verDetallePendiente.php?id=<?php echo $value['VEN_ID'];	?>" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-zoom-in"></span>&nbsp;Ver Detalle</a></td>
						<td>
						<?php 
							if($_SESSION['user']['type']==1){
							?>
								<button onclick="cargarAnula(<?php echo $value['VEN_ID'];?>, <?php echo $value['TIENDA_TIE_ID'];?>)" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#cancelSailConfirmDialog"><span class="glyphicon glyphicon-trash"></span>&nbsp;Anular Venta</button>
							<?php
							
							}?>
						</td>
					</tr>
					<?php
				}
			}
		?>
				
			</tbody>
		</table>
	</div>
	<!-- Modal eliminar producto-->
	<div class="modal fade" id="cancelSailConfirmDialog" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Anular Venta</h4>
				</div>
				<div class="modal-body">
					<p>Confirme para anular la venta</p>
					<input type="hidden" id="anulaId" name="anulaId" >
					<input type="hidden" id="anulaTienda" name="anulaTienda" >
				</div>
				<div class="modal-footer">
					
					<button onclick="anularVenta()" type="button" class="btn btn-success">Aceptar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php'); ?>
<script src="../../public/js/zDetalle.js"></script>