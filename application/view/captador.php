<?php include('header.php');?>
<?php include('nav_menu.php') ?>
<?php include('userNav.php') ?>
<div class="contentMain">
	<div>
		<form class="form-horizontal">
			<fieldset class="addProductFormWidth">
				<!-- Form Name -->
				<legend>Agregar Captador</legend>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="addNameCaptador">Ingrese Nombre</label>  
					<div class="col-md-4">
						<input name="addNameCaptador" id="addNameCaptador" type="text" placeholder="Nombre del captador" class="form-control input-md" >
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="addPhoneCaptador">Ingrese Teléfono</label>  
					<div class="col-md-4">
						<input name="addPhoneCaptador" id="addPhoneCaptador" type="text" placeholder="Teléfono del captador" class="form-control input-md" >
					</div>
				</div>
				<!-- Button (Double) -->
				<div class="form-group">
					<label class="col-md-4 control-label" for="button1id"></label>
					<div class="col-md-8">
						<button type="button" id="button1id" name="button1id" class="btn btn-success" data-toggle="modal" data-target="#addCaptadorConfirmDialog">Agregar Captador</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
	
	<div id="captadorTableReload">
		<?php require '../controller/CaptadorTable.php'; ?>
	</div>

	<!-- Modal Confimacion agregar captador-->
	<div class="modal fade" id="addCaptadorConfirmDialog" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Agregar Captador</h4>
				</div>
				<div class="modal-body">
					<p>Confirme para agregar Captador</p>
				</div>
				<div class="modal-footer">
					<button onclick="addCaptador()" type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal editar producto-->
	<div class="modal fade" id="editCaptadorConfirmDialog" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Editar Captador</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal">
						<fieldset class="">
							<!-- Text input-->
							<input type="hidden" name="editIdCaptador" id="editIdCaptador">
							<div class="form-group">
								<label class="col-md-4 control-label" for="editNameCaptador">Ingrese Nombre</label>  
								<div class="col-md-4">
									<input name="editNameCaptador" id="editNameCaptador" type="text" placeholder="Nombre del captador" class="form-control input-md" >
								</div>
							</div>
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="editPhoneCaptador">Ingrese Teléfono</label>  
								<div class="col-md-4">
									<input name="editPhoneCaptador" id="editPhoneCaptador" type="text" placeholder="Teléfono del captador" class="form-control input-md" >
								</div>
							</div>
						</fieldset>
					</form>
				</div>
				<div class="modal-footer">
					<button onclick="updateCaptador()" type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal eliminar producto-->
	<div class="modal fade" id="deleteCaptadorConfirmDialog" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Eliminar Captador</h4>
				</div>
				<div class="modal-body">
					<p>Confirme para eliminar el Captador</p>
					<input type="hidden" name="delIdCaptador" id="delIdCaptador">
				</div>
				<div class="modal-footer">
					<button onclick="delCaptador()" type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php') ?>