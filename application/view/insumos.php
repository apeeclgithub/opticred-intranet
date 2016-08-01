<?php include('header.php');?>
<?php include('nav_menu.php') ?>
<?php include('userNav.php') ?>
<div class="contentMain">
	<div>
		<form class="form-horizontal">
			<fieldset class="addProductFormWidth">
				<!-- Form Name -->
				<legend>Agregar Insumo</legend>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="marco">Ingrese Insumo</label>  
					<div class="col-md-4">
						<input type="text" placeholder="Insumo" class="form-control input-md" >
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="precio">Ingrese Detalle</label>  
					<div class="col-md-4">
						<textarea class="form-control" rows="4" placeholder="Detalle" id="comment"></textarea>
					</div>
				</div>
				<!-- Select Basic -->
				<div class="form-group">
					<label class="col-md-4 control-label" for="tienda">Seleccione Tienda</label>
					<div class="col-md-4">
						<select id="tienda" name="tienda" placeholder="Tienda" class="form-control">
							<option value="1">Option one</option>
							<option value="2">Option two</option>
						</select>
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="precio">Ingrese Monto</label>  
					<div class="col-md-4">
						<input type="number" placeholder="Monto" class="form-control input-md" >
					</div>
				</div>
				<!-- Button (Double) -->
				<div class="form-group">
					<label class="col-md-4 control-label" for="button1id"></label>
					<div class="col-md-8">
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#addSuppliesConfirmDialog">Agregar Insumo</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>

	<div id="insumoTableReload">
		<?php require '../controller/InsumoTable.php'; ?>
	</div>

	<!-- Modal Confimacion agregar producto-->
	<div class="modal fade" id="addSuppliesConfirmDialog" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Agregar Insumo</h4>
				</div>
				<div class="modal-body">
					<p>Confirme para agregar el Insumo</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success">Aceptar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal editar producto-->
	<div class="modal fade" id="editInsumoConfirmDialog" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Editar Insumo</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal">
						<fieldset class="">
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="marco">Editar Insumo</label>  
								<div class="col-md-7">
									<input type="text" placeholder="Insumo" class="form-control input-md" >
								</div>
							</div>
							<!-- Select Basic -->
							<div class="form-group">
								<label class="col-md-4 control-label" for="tienda">Seleccione Tienda</label>
								<div class="col-md-7">
									<select id="tienda" name="tienda" placeholder="Tienda" class="form-control">
										<option value="1">Option one</option>
										<option value="2">Option two</option>
									</select>
								</div>
							</div>
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="precio">Editar Detalle</label>  
								<div class="col-md-7">
									<textarea class="form-control" rows="4" placeholder="Detalle" id="comment"></textarea>
								</div>
							</div>

							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="precio">Editar Monto</label>  
								<div class="col-md-7">
									<input type="number" placeholder="Monto" class="form-control input-md" >
								</div>
							</div>
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
	<div class="modal fade" id="deleteInsumoConfirmDialog" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Eliminar Insumo</h4>
				</div>
				<div class="modal-body">
					<p>Confirme para eliminar el Insumo</p>
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