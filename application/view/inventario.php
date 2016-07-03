<?php include('header.php');?>
<?php include('nav_menu.php') ?>
<?php include('userNav.php') ?>
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
					<label class="col-md-4 control-label" for="proNameProduct">Ingrese Marco</label>  
					<div class="col-md-4">
						<input id="proNameProduct" name="proNameProduct" type="text" placeholder="Marco" class="form-control input-md" >
					</div>
				</div>
				<!-- Select Basic -->
				<div class="form-group">
					<label class="col-md-4 control-label" for="proStoreProduct">Seleccione Tienda</label>
					<div class="col-md-4">
						<select id="proStoreProduct" name="proStoreProduct" class="form-control">
							<option value="" disabled selected>Seleccione una tienda</option>
							<option value="Tercero">Tercero</option>
							<option value="Quinto">Quinto</option>
						</select>
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="proPriceProduct">Ingrese Precio</label>  
					<div class="col-md-4">
						<input id="proPriceProduct" name="proPriceProduct" type="number" placeholder="123" class="form-control input-md" >
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="proStockProduct">Ingrese Stock</label>  
					<div class="col-md-4">
						<input id="proStockProduct" name="proStockProduct" type="number" placeholder="123" class="form-control input-md" >
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
		<?php require '../controller/ProductInventory.php'; ?>
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
	<div class="modal fade" id="deleteProductConfirmDialog" role="dialog" data-backdrop="static" data-keyboard="false">
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