<?php include('header.php');?>
<?php include('nav_menu.php') ?>
<div class="contentMain">
	<script type="text/javascript" language="javascript">
	$(document).ready(function() {
		$('#inventoryTable').DataTable();
	} );
	</script>
	<div>
		<form class="form-horizontal">
			<fieldset class="addProductFormWidth">
				<!-- Form Name -->
				<legend>Agregar Producto</legend>

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
				<div class="form-group">
					<label class="col-md-4 control-label" for="button1id"></label>
					<div class="col-md-8">
						<button type="button" id="button1id" name="button1id" class="btn btn-success" data-toggle="modal" data-target="#addProductConfirmDialog">Agregar Producto</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
	<div>
		<table id="inventoryTable" class="table table-striped table-bordered tableWidth" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Marco</th>
					<th>Tienda</th>
					<th>Precio</th>
					<th>Stock</th>
					<th class="widthOptions">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Tiger Nixon</td>
					<td>System Architect</td>
					<td>Edinburgh</td>
					<td>61</td>
					<td><a href="#" class="alignIconTable" data-toggle="modal" data-target="#editProductConfirmDialog"><span class="glyphicon glyphicon-pencil"></span></a><a href="#" class="alignIconTable" data-toggle="modal" data-target="#deleteProductConfirmDialog"><span class="glyphicon glyphicon-trash"></span></a></td>
				</tr>
				<tr>
					<td>Garrett Winters</td>
					<td>Accountant</td>
					<td>Tokyo</td>
					<td>63</td>
					<td><a href="#" class="alignIconTable"><span class="glyphicon glyphicon-pencil"></span></a><a href="#" class="alignIconTable"><span class="glyphicon glyphicon-trash"></span></a></td>
				</tr>
				<tr>
					<td>Ashton Cox</td>
					<td>Junior Technical Author</td>
					<td>San Francisco</td>
					<td>66</td>
					<td><a href="#" class="alignIconTable"><span class="glyphicon glyphicon-pencil"></span></a><a href="#" class="alignIconTable"><span class="glyphicon glyphicon-trash"></span></a></td>
				</tr>
				<tr>
					<td>Cedric Kelly</td>
					<td>Senior Javascript Developer</td>
					<td>Edinburgh</td>
					<td>22</td>
					<td><a href="#" class="alignIconTable"><span class="glyphicon glyphicon-pencil"></span></a><a href="#" class="alignIconTable"><span class="glyphicon glyphicon-trash"></span></a></td>
				</tr>
				<tr>
					<td>Airi Satou</td>
					<td>Accountant</td>
					<td>Tokyo</td>
					<td>33</td>
					<td><a href="#" class="alignIconTable"><span class="glyphicon glyphicon-pencil"></span></a><a href="#" class="alignIconTable"><span class="glyphicon glyphicon-trash"></span></a></td>
				</tr>
			</tbody>
		</table>
	</div>

	<!-- Modal Confimacion agregar producto-->
	<div class="modal fade" id="addProductConfirmDialog" role="dialog">
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
	<div class="modal fade" id="editProductConfirmDialog" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Editar Producto</h4>
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

		<!-- Modal eliminar producto-->
	<div class="modal fade" id="deleteProductConfirmDialog" role="dialog">
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