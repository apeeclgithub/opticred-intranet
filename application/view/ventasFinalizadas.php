<?php include('header.php');?>
<?php include('nav_menu.php') ?>
<?php include('userNav.php') ?>
<div class="contentMain">
	<script type="text/javascript" language="javascript">
	$(document).ready(function() {
		$('#ventasFinalizadas').DataTable();
	} );
	</script>

	<legend>Ventas Finalizadas</legend>
	<div>
		<table id="ventasFinalizadas" class="table table-striped table-bordered tableWidth" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Marco</th>
					<th>Tienda</th>
					<th>Monto</th>
					<th>Detalle</th>
					<th class="widthOptions text-center">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Tiger Nixon</td>
					<td>System Architect</td>
					<td>Edinburgh</td>
					<td class="widthVerMas"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-zoom-in"></span>&nbsp;Ver Detalle</button></td>
					<td class="text-center"><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#editSailConfirmDialog"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Editar</button>&nbsp;&nbsp;<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteSailConfirmDialog"><span class="glyphicon glyphicon-trash"></span>&nbsp;Eliminar</button></td>
				</tr>
				<tr>
					<td>Garrett Winters</td>
					<td>Accountant</td>
					<td>Tokyo</td>
					<td><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-zoom-in"></span>&nbsp;Ver Detalle</button></td>
					<td class="text-center"><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#editSailConfirmDialog"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Editar</button>&nbsp;&nbsp;<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteSailConfirmDialog"><span class="glyphicon glyphicon-trash"></span>&nbsp;Eliminar</button></td>
				</tr>
				<tr>
					<td>Ashton Cox</td>
					<td>Junior Technical Author</td>
					<td>San Francisco</td>
					<td><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-zoom-in"></span>&nbsp;Ver Detalle</button></td>
					<td class="text-center"><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#editSailConfirmDialog"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Editar</button>&nbsp;&nbsp;<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteSailConfirmDialog"><span class="glyphicon glyphicon-trash"></span>&nbsp;Eliminar</button></td>
				</tr>
				<tr>
					<td>Cedric Kelly</td>
					<td>Senior Javascript Developer</td>
					<td>Edinburgh</td>
					<td><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-zoom-in"></span>&nbsp;Ver Detalle</button></td>
					<td class="text-center"><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#editSailConfirmDialog"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Editar</button>&nbsp;&nbsp;<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteSailConfirmDialog"><span class="glyphicon glyphicon-trash"></span>&nbsp;Eliminar</button></td>
				</tr>
				<tr>
					<td>Airi Satou</td>
					<td>Accountant</td>
					<td>Tokyo</td>
					<td><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-zoom-in"></span>&nbsp;Ver Detalle</button></td>
					<td class="text-center"><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#editSailConfirmDialog"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Editar</button>&nbsp;&nbsp;<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteSailConfirmDialog"><span class="glyphicon glyphicon-trash"></span>&nbsp;Eliminar</button></td>
				</tr>
			</tbody>
		</table>
	</div>

	<!-- Modal Confimacion agregar producto-->
	<div class="modal fade" id="addProductConfirmDialog" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Agregar Producto</h4>
				</div>
				<div class="modal-body">
					<p>Confirme para agregar el producto</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success">Aceptar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal editar producto-->
	<div class="modal fade" id="editSailConfirmDialog" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Editar Producto</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal">
						<fieldset class="">
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="marco">Ingrese Marco</label>  
								<div class="col-md-4">
									<input id="marco" name="marco" type="text" placeholder="marco" class="form-control input-md" >
								</div>
							</div>
							<!-- Select Basic -->
							<div class="form-group">
								<label class="col-md-4 control-label" for="tienda">Seleccione Tienda</label>
								<div class="col-md-4">
									<select id="tienda" name="tienda" class="form-control">
										<option value="1">Option one</option>
										<option value="2">Option two</option>
									</select>
								</div>
							</div>
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="precio">Ingrese Precio</label>  
								<div class="col-md-4">
									<input id="precio" name="precio" type="number" placeholder="123" class="form-control input-md" >
								</div>
							</div>
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="stock">Ingrese Stock</label>  
								<div class="col-md-4">
									<input id="stock" name="stock" type="number" placeholder="123" class="form-control input-md" >
								</div>
							</div>
							<!-- Button (Double) -->

						</fieldset>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success">Aceptar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal eliminar producto-->
	<div class="modal fade" id="deleteSailConfirmDialog" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Eliminar Producto</h4>
				</div>
				<div class="modal-body">
					<p>Confirme para eliminar el producto</p>
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