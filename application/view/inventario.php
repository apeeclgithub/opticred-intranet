<?php include('header.php');?>
<?php include('nav_menu.php'); ?>
<?php include('userNav.php'); ?>
<div class="contentMain">	
	<div>
		<form class="form-horizontal">
			<fieldset class="addProductFormWidth">
				<!-- Form Name -->
				<legend>Agregar Producto</legend>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="addNameProduct">Ingrese Marco</label>  
					<div class="col-md-4">
						<input id="addNameProduct" name="addNameProduct" type="text" placeholder="Nombre del marco" class="form-control input-md" >
					</div>
				</div>
				<!-- Select Basic -->
				<div class="form-group">
					<label class="col-md-4 control-label" for="addStoreProduct">Seleccione Tienda</label>
					<div class="col-md-4">
						<select id="addStoreProduct" name="addStoreProduct" class="form-control">
							<option value="" disabled selected>Seleccione una tienda</option>
							<option value="Tercero">Tercero</option>
							<option value="Quinto">Quinto</option>
						</select>
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="addPriceProduct">Ingrese Precio</label>  
					<div class="col-md-4">
						<input id="addPriceProduct" name="addPriceProduct" type="number" placeholder="Ingrese el precio" class="form-control input-md" min="1" >
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="addStockProduct">Ingrese Stock</label>  
					<div class="col-md-4">
						<input id="addStockProduct" name="addStockProduct" type="number" placeholder="Ingrese la cantidad" class="form-control input-md" min="1" >
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
	<div id="inventoryTableReload">
		<?php require '../controller/ProductTable.php'; ?>
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
					<button onclick="addProduct()" type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal editar producto-->
	<div class="modal fade" id="editProductConfirmDialog" role="dialog" data-backdrop="static" data-keyboard="false">
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
							<input type="hidden" name="editIdProduct" id="editIdProduct">
							<div class="form-group">
								<label class="col-md-4 control-label" for="editNameProduct">Ingrese Marco</label>  
								<div class="col-md-6">
									<input id="editNameProduct" name="editNameProduct" type="text" placeholder="Nombre del marco" class="form-control input-md" >
								</div>
							</div>
							<!-- Select Basic -->
							<div class="form-group">
								<label class="col-md-4 control-label" for="editStoreProduct">Seleccione Tienda</label>
								<div class="col-md-6">
									<select id="editStoreProduct" name="editStoreProduct" class="form-control">
										<option value="" disabled selected>Seleccione una tienda</option>
										<option value="Tercero">Tercero</option>
										<option value="Quinto">Quinto</option>
									</select>
								</div>
							</div>
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="editPriceProduct">Ingrese Precio</label>  
								<div class="col-md-6">
									<input id="editPriceProduct" name="editPriceProduct" type="number" placeholder="Ingrese el precio" class="form-control input-md" min="1">
								</div>
							</div>
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="editStockProduct">Ingrese Stock</label>  
								<div class="col-md-6">
									<input id="editStockProduct" name="editStockProduct" type="number" placeholder="Ingrese la cantidad" class="form-control input-md" min="1">
								</div>
							</div>
							<!-- Button (Double) -->

						</fieldset>
					</form>
				</div>
				<div class="modal-footer">
					<button onclick="updateProduct()" type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal eliminar producto-->
	<div class="modal fade" id="deleteProductConfirmDialog" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Eliminar Producto</h4>
				</div>
				<div class="modal-body">
					<p>Confirme para eliminar el producto</p>
					<input type="hidden" name="delIdProduct" id="delIdProduct">
				</div>
				<div class="modal-footer">
					<button onclick="delProduct()" type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php');?>