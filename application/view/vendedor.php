<?php include('header.php');?>
<?php include('nav_menu.php') ?>
<?php include('userNav.php') ?>
<div class="contentMain">
	<script type="text/javascript" language="javascript">
	$(document).ready(function() {
		$('#vendedorTabla').DataTable();
	} );
	</script>
	<div>
		<form class="form-horizontal">
			<fieldset class="addProductFormWidth">
				<!-- Form Name -->
				<legend>Agregar Vendedor</legend>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="marco">Ingrese Nombre</label>  
					<div class="col-md-4">
						<input name="marco" type="text" placeholder="marco" class="form-control input-md" >
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label" for="precio">Ingrese E-Mail</label>  
					<div class="col-md-4">
						<input iname="precio" type="text" placeholder="aa@aa.cl" class="form-control input-md" >
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="stock">Ingrese Teléfono</label>  
					<div class="col-md-4">
						<input name="nombre Vendedor" type="number" placeholder="123" class="form-control input-md" >
					</div>
				</div>
				<!-- Button (Double) -->
				<div class="form-group">
					<label class="col-md-4 control-label" for="button1id"></label>
					<div class="col-md-8">
						<button type="button" id="button1id" name="button1id" class="btn btn-success" data-toggle="modal" data-target="#addProductConfirmDialog">Agregar Vendedor</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
	<div>
		<table id="vendedorTabla" class="table table-striped table-bordered tableWidth" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>E-Mail</th>
					<th>Fono</th>
					<th class="widthOptions">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Tiger Nixon</td>
					<td>System Architect</td>
					<td>61</td>
					<td><a href="#" class="alignIconTable" data-toggle="modal" data-target="#editVendedorConfirmDialog"><span class="glyphicon glyphicon-pencil"></span></a><a href="#" class="alignIconTable" data-toggle="modal" data-target="#deleteVendedorConfirmDialog"><span class="glyphicon glyphicon-trash"></span></a></td>
				</tr>
				<tr>
					<td>Garrett Winters</td>
					<td>Accountant</td>
					<td>63</td>
					<td><a href="#" class="alignIconTable" data-toggle="modal" data-target="#editVendedorConfirmDialog"><span class="glyphicon glyphicon-pencil"></span></a><a href="#" class="alignIconTable" data-toggle="modal" data-target="#deleteVendedorConfirmDialog"><span class="glyphicon glyphicon-trash"></span></a></td>
				</tr>
				<tr>
					<td>Ashton Cox</td>
					<td>Junior Technical Author</td>
					<td>66</td>
					<td><a href="#" class="alignIconTable" data-toggle="modal" data-target="#editVendedorConfirmDialog"><span class="glyphicon glyphicon-pencil"></span></a><a href="#" class="alignIconTable" data-toggle="modal" data-target="#deleteVendedorConfirmDialog"><span class="glyphicon glyphicon-trash"></span></a></td>
				</tr>
				<tr>
					<td>Cedric Kelly</td>
					<td>Senior Javascript Developer</td>
					<td>22</td>
					<td><a href="#" class="alignIconTable" data-toggle="modal" data-target="#editVendedorConfirmDialog"><span class="glyphicon glyphicon-pencil"></span></a><a href="#" class="alignIconTable" data-toggle="modal" data-target="#deleteVendedorConfirmDialog"><span class="glyphicon glyphicon-trash"></span></a></td>
				</tr>
				<tr>
					<td>Airi Satou</td>
					<td>Accountant</td>
					<td>33</td>
					<td><a href="#" class="alignIconTable" data-toggle="modal" data-target="#editVendedorConfirmDialog"><span class="glyphicon glyphicon-pencil"></span></a><a href="#" class="alignIconTable" data-toggle="modal" data-target="#deleteVendedorConfirmDialog"><span class="glyphicon glyphicon-trash"></span></a></td>
				</tr>
			</tbody>
		</table>
	</div>

	<!-- Modal Confimacion agregar producto-->
	<div class="modal fade" id="addVendedorConfirmDialog" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Agregar Vendedor</h4>
				</div>
				<div class="modal-body">
					<p>Confirme para agregar el vendedor</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success">Aceptar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal editar producto-->
	<div class="modal fade" id="editVendedorConfirmDialog" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Editar Vendedor</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal">
						<fieldset class="">
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="marco">Ingrese Nombre</label>  
								<div class="col-md-4">
									<input type="text" placeholder="marco" class="form-control input-md" >
								</div>
							</div>
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="precio">Ingrese E-mail</label>  
								<div class="col-md-4">
									<input type="number" placeholder="123" class="form-control input-md" >
								</div>
							</div>
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="stock">Ingrese Teléfono</label>  
								<div class="col-md-4">
									<input type="number" placeholder="123" class="form-control input-md" >
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
	<div class="modal fade" id="deleteVendedorConfirmDialog" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Eliminar Vendedor</h4>
				</div>
				<div class="modal-body">
					<p>Confirme para eliminar el vendedor</p>
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