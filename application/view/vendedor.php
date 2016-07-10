<?php include('header.php');?>
<?php include('nav_menu.php') ?>
<?php include('userNav.php') ?>
<div class="contentMain">
	<div>
		<form class="form-horizontal">
			<fieldset class="addProductFormWidth">
				<!-- Form Name -->
				<legend>Agregar Vendedor</legend>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="addNameUser">Ingrese Nombre</label>  
					<div class="col-md-4">
						<input name="addNameUser" id="addNameUser" type="text" placeholder="Nombre del vendedor" class="form-control input-md" >
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label" for="addMailUser">Ingrese E-Mail</label>  
					<div class="col-md-4">
						<input name="addMailUser" id="addMailUser" type="text" placeholder="vendedor@opticred.cl" class="form-control input-md" >
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="addRutUser">Ingrese Rut</label>  
					<div class="col-md-4">
						<input name="addRutUser" id="addRutUser" type="text" placeholder="Rut del vendedor" class="form-control input-md" >
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="addPassUser">Ingrese Password</label>  
					<div class="col-md-4">
						<input name="addPassUser" id="addPassUser" type="text" placeholder="Password del vendedor" class="form-control input-md" >
					</div>
				</div>
				<!-- Select Basic -->
				<div class="form-group">
					<label class="col-md-4 control-label" for="addStoreUser">Seleccione Tienda</label>
					<div class="col-md-4">
						<select id="addStoreUser" name="addStoreUser" class="form-control">
							<option value="" disabled selected>Seleccione una tienda</option>
							<option value="Tercero">Tercero</option>
							<option value="Quinto">Quinto</option>
						</select>
					</div>
				</div>
				<!-- Button (Double) -->
				<div class="form-group">
					<label class="col-md-4 control-label" for="button1id"></label>
					<div class="col-md-8">
						<button type="button" id="button1id" name="button1id" class="btn btn-success" data-toggle="modal" data-target="#addVendedorConfirmDialog">Agregar Vendedor</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
	<div id="userTableReload">
		<?php require '../controller/UserTable.php'; ?>
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
					<button onclick="addUser()" type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
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
							<input type="hidden" name="editIdUser" id="editIdUser">
							<div class="form-group">
								<label class="col-md-4 control-label" for="editNameUser">Ingrese Nombre</label>  
								<div class="col-md-7">
									<input name="editNameUser" id="editNameUser" type="text" placeholder="Nombre del vendedor" class="form-control input-md" >
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label" for="editMailUser">Ingrese E-Mail</label>  
								<div class="col-md-7">
									<input name="editMailUser" id="editMailUser" type="text" placeholder="vendedor@opticred.cl" class="form-control input-md" >
								</div>
							</div>
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="editRutUser">Ingrese Rut</label>  
								<div class="col-md-7">
									<input name="editRutUser" id="editRutUser" type="text" placeholder="Rut del vendedor" class="form-control input-md" >
								</div>
							</div>
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="editPassUser">Ingrese Password</label>  
								<div class="col-md-7">
									<input name="editPassUser" id="editPassUser" type="text" placeholder="Password del vendedor" class="form-control input-md" >
								</div>
							</div>
							<!-- Select Basic -->
							<div class="form-group">
								<label class="col-md-4 control-label" for="editStoreUser">Seleccione Tienda</label>
								<div class="col-md-7">
									<select id="editStoreUser" name="editStoreUser" class="form-control">
										<option value="" disabled selected>Seleccione una tienda</option>
										<option value="Tercero">Tercero</option>
										<option value="Quinto">Quinto</option>
									</select>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
				<div class="modal-footer">
					<button onclick="updateUser()" type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
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
					<input type="hidden" name="delIdUser" id="delIdUser">
				</div>
				<div class="modal-footer">
					<button onclick="delUser()" type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php') ?>