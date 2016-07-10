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
<<<<<<< HEAD
	<div id="captadorTableReload">
		<?php require '../controller/CaptadorTable.php'; ?>
=======
	<div>
		<table id="captadorTabla" class="table table-striped table-bordered tableWidth" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Fono</th>
					<th>Comisión</th>
					<th class="widthOptions text-center">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Tiger Nixon</td>
					<td>61</td>
					<td>61</td>
					<td class="text-center"><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#editCaptadorConfirmDialog"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Editar</button>&nbsp;&nbsp;<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteCaptadorConfirmDialog"><span class="glyphicon glyphicon-trash"></span>&nbsp;Eliminar</button></td>
				</tr>
				<tr>
					<td>Garrett Winters</td>
					<td>63</td>
					<td>61</td>					
					<td class="text-center"><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#editCaptadorConfirmDialog"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Editar</button>&nbsp;&nbsp;<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteCaptadorConfirmDialog"><span class="glyphicon glyphicon-trash"></span>&nbsp;Eliminar</button></td>
				</tr>
				<tr>
					<td>Ashton Cox</td>
					<td>66</td>
					<td>66</td>
					<td class="text-center"><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#editCaptadorConfirmDialog"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Editar</button>&nbsp;&nbsp;<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteCaptadorConfirmDialog"><span class="glyphicon glyphicon-trash"></span>&nbsp;Eliminar</button></td>
				</tr>
				<tr>
					<td>Cedric Kelly</td>
					<td>22</td>
					<td>66</td>
					<td class="text-center"><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#editCaptadorConfirmDialog"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Editar</button>&nbsp;&nbsp;<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteCaptadorConfirmDialog"><span class="glyphicon glyphicon-trash"></span>&nbsp;Eliminar</button></td>
				</tr>
				<tr>
					<td>Airi Satou</td>
					<td>33</td>
					<td>66</td>
					<td class="text-center"><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#editCaptadorConfirmDialog"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Editar</button>&nbsp;&nbsp;<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteCaptadorConfirmDialog"><span class="glyphicon glyphicon-trash"></span>&nbsp;Eliminar</button></td>
				</tr>
			</tbody>
		</table>
>>>>>>> origin/master
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
<<<<<<< HEAD
								<label class="col-md-4 control-label" for="editNameCaptador">Ingrese Nombre</label>  
								<div class="col-md-4">
									<input name="editNameCaptador" id="editNameCaptador" type="text" placeholder="Nombre del captador" class="form-control input-md" >
=======
								<label class="col-md-4 control-label" for="marco">Ingrese Nombre</label>  
								<div class="col-md-7">
									<input type="text" placeholder="Nombre" class="form-control input-md" >
>>>>>>> origin/master
								</div>
							</div>
							<!-- Text input-->
							<div class="form-group">
<<<<<<< HEAD
								<label class="col-md-4 control-label" for="editPhoneCaptador">Ingrese Teléfono</label>  
								<div class="col-md-4">
									<input name="editPhoneCaptador" id="editPhoneCaptador" type="text" placeholder="Teléfono del captador" class="form-control input-md" >
=======
								<label class="col-md-4 control-label" for="stock">Ingrese Teléfono</label>  
								<div class="col-md-7">
									<input type="number" placeholder="123" class="form-control input-md" >
>>>>>>> origin/master
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