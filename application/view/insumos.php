<?php include('header.php');?>
<?php include('nav_menu.php'); ?>
<?php include('userNav.php'); ?>
<div class="contentMain">
	<div>
		<form class="form-horizontal">
			<fieldset class="addProductFormWidth">
				<!-- Form Name -->
				<legend>Agregar Insumo</legend>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="addNameInsumo">Ingrese Insumo</label>  
					<div class="col-md-4">
						<input type="text" id="addNameInsumo" name="addNameInsumo" placeholder="Ingrese insumo" class="form-control input-md" >
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="addDetailInsumo">Ingrese Detalle</label>  
					<div class="col-md-4">
						<textarea class="form-control" id="addDetailInsumo" name="addDetailInsumo" rows="4" placeholder="Detalle del insumo" id="comment"></textarea>
					</div>
				</div>
				<!-- Select Basic 
				<div class="form-group">
					<label class="col-md-4 control-label" for="addStoreInsumo">Seleccione Tienda</label>
					<div class="col-md-4">
						<select id="addStoreInsumo" name="addStoreInsumo" class="form-control">
							<option value="" disabled selected>Seleccione una tienda</option>
							<option value="1">GORBEA</option>
							<option value="2">CONCEPCION</option>
						</select>
					</div>
				</div>-->
				<input type="hidden" id="addStoreInsumo" name="addStoreInsumo" <?php echo 'value="'.$_SESSION["user"]["store"].'"'; ?>/>
				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="addPriceInsumo">Ingrese Precio</label>  
					<div class="col-md-4">
						<input type="number" id="addPriceInsumo" name="addPriceInsumo" placeholder="Ingrese el precio" class="form-control input-md" >
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
					<button onclick="addInsumo()" data-dismiss="modal" type="button" class="btn btn-success">Aceptar</button>
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
							<input type="hidden" name="editIdInsumo" id="editIdInsumo">
							<div class="form-group">
								<label class="col-md-4 control-label" for="editNameInsumo">Editar Insumo</label>  
								<div class="col-md-7">
									<input name="editNameInsumo" id="editNameInsumo" type="text" placeholder="Insumo" class="form-control input-md" >
								</div>
							</div>
							<!-- Select Basic 
							<div class="form-group">
								<label class="col-md-4 control-label" for="editStoreInsumo">Seleccione Tienda</label>
								<div class="col-md-4">
									<select id="editStoreInsumo" name="editStoreInsumo" class="form-control">
										<option value="" disabled selected>Seleccione una tienda</option>
										<option value="1">GORBEA</option>
										<option value="2">CONCEPCION</option>
									</select>
								</div>
							</div>-->
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="editDescInsumo">Editar Detalle</label>  
								<div class="col-md-7">
									<textarea name="editDescInsumo" class="form-control" rows="4" placeholder="Detalle" id="editDescInsumo"></textarea>
								</div>
							</div>

							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="editTotalInsumo">Editar Monto</label>  
								<div class="col-md-7">
									<input id="editTotalInsumo" name="editTotalInsumo" type="number" placeholder="Monto" class="form-control input-md" >
								</div>
							</div>
						</fieldset>
					</form>
				</div>
				<div class="modal-footer">
					<button onclick="updateInsumo()" data-dismiss="modal" type="button" class="btn btn-success">Aceptar</button>
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
			<input type="hidden" name="delIdInsumo" id="delIdInsumo">
				<div class="modal-header">
					<h4 class="modal-title">Eliminar Insumo</h4>
				</div>
				<div class="modal-body">
					<p>Confirme para eliminar el Insumo</p>
				</div>
				<div class="modal-footer">
					<button onclick="delInsumo()" data-dismiss="modal" type="button" class="btn btn-success">Aceptar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php'); ?>
<script src="../../public/js/zInsumo.js"></script>