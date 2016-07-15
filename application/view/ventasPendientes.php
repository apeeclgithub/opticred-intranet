<?php include('header.php');?>
<?php include('nav_menu.php') ?>
<?php include('userNav.php') ?>
<div class="contentMain">
	<script type="text/javascript" language="javascript">
	$(document).ready(function() {
		$('#ventasPendientes').DataTable();
	} );
	</script>

	<legend>Ventas Pendientes</legend>
	<div>
		<table id="ventasPendientes" class="table table-striped table-bordered tableWidth" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>N° de Venta</th>
					<th>Tienda</th>
					<th >Monto Cancelado</th>
					<th >Monto Pendiente</th>
					<th>Fecha Venta</th>
					<th class="widthVerMas">Detalle</th>
					<th class="widthOptions text-center">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Tiger Nixon</td>
					<td>System Architect</td>
					<td>System Architect</td>
					<td>Edinburgh</td>
					<th>Fecha Venta</th>
					<td><a href="verDetallePendiente.php" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-zoom-in"></span>&nbsp;Ver Detalle</a></td>
					<td class="text-center"><button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#cancelSailConfirmDialog"><span class="glyphicon glyphicon-trash"></span>&nbsp;Anular Venta</button></td>
				</tr>
				<tr>
					<td>Garrett Winters</td>
					<td>Accountant</td>
					<td>System Architect</td>
					<td>Tokyo</td>
					<th>Fecha Venta</th>
					<td><a href="verDetallePendiente.php" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-zoom-in"></span>&nbsp;Ver Detalle</a></td>
					<td class="text-center"><button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#cancelSailConfirmDialog"><span class="glyphicon glyphicon-trash"></span>&nbsp;Anular Venta</button></td>
				</tr>
				<tr>
					<td>Ashton Cox</td>
					<td>System Architect</td>
					<td>Junior Technical Author</td>
					<td>San Francisco</td>
					<th>Fecha Venta</th>
					<td><a href="verDetallePendiente.php" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-zoom-in"></span>&nbsp;Ver Detalle</a></td>
					<td class="text-center"><button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#cancelSailConfirmDialog"><span class="glyphicon glyphicon-trash"></span>&nbsp;Anular Venta</button></td>
				</tr>
				<tr>
					<td>Cedric Kelly</td>
					<td>System Architect</td>
					<td>Senior Javascript Developer</td>
					<td>Edinburgh</td>
					<th>Fecha Venta</th>
					<td><a href="verDetallePendiente.php" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-zoom-in"></span>&nbsp;Ver Detalle</a></td>
					<td class="text-center"><button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#cancelSailConfirmDialog"><span class="glyphicon glyphicon-trash"></span>&nbsp;Anular Venta</button></td>
				</tr>
				<tr>
					<td>Airi Satou</td>
					<td>Accountant</td>
					<td>System Architect</td>
					<td>Tokyo</td>
					<th>Fecha Venta</th>
					<td><a href="verDetallePendiente.php" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-zoom-in"></span>&nbsp;Ver Detalle</a></td>
					<td class="text-center"><button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#cancelSailConfirmDialog"><span class="glyphicon glyphicon-trash"></span>&nbsp;Anular Venta</button></td>
				</tr>
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
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success">Aceptar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php') ?>