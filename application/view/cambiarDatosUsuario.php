<?php include('header.php');?>
<?php include('nav_menu.php'); ?>
<?php include('userNav.php'); ?>
	    <!-- Fixed navbar -->
	<!--   <div class="stickNav">  <div class="btn-group stickNavButton" role="group">
    <button type="button" class="btn btn-default dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Dropdown
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
      <li><a href="#">Dropdown link</a></li>
      <li><a href="#">Dropdown link</a></li>
    </ul>
  </div></div>-->
<div class="contentMain">
    <div>
    <form class="form-horizontal" id="formEditUser">
      <fieldset class="addProductFormWidth">
        <!-- Form Name -->
        <legend>Modifica tus datos</legend>
        <!-- Text input-->
        <div class="form-group">
          <input type="hidden" name="editIdUserSession" id="editIdUserSession" value="<?php echo $_SESSION['user']['id']; ?>" />
          <input type="hidden" name="editStoreUserSession" id="editStoreUserSession" value="<?php echo($_SESSION['user']['store']=='GORBEA')?1:2; ?>" />
          <label class="col-md-4 control-label" for="editNameUserSession">Modificar Nombre</label>  
          <div class="col-md-4">
            <input name="editNameUserSession" id="editNameUserSession" type="text" placeholder="Nombre del vendedor" class="form-control input-md" value="<?php echo $_SESSION['user']['name']; ?>" />
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="editMailUserSession">Modificar E-Mail</label>  
          <div class="col-md-4">
            <input name="editMailUserSession" id="editMailUserSession" type="text" placeholder="vendedor@opticred.cl" class="form-control input-md" value="<?php echo $_SESSION['user']['mail']; ?>" />
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="editRutUserSession">Modificar Rut</label>
          <div class="col-md-4">
            <input name="editRutUserSession" id="editRutUserSession" type="text" placeholder="Rut del vendedor" class="form-control input-md" value="<?php echo $_SESSION['user']['rut']; ?>" />
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="editPassUserSession">Modificar Password</label>
          <div class="col-md-4">
            <input name="editPassUserSession" id="editPassUserSession" type="text" placeholder="Password del vendedor" class="form-control input-md" value="<?php echo $_SESSION['user']['pass']; ?>" />
          </div>
        </div>
        <!-- Button (Double) -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="button1id"></label>
          <div class="col-md-8">
            <button  type="button" id="button1id" name="button1id" class="btn btn-success" data-toggle="modal" data-target="#updateDataConfirmDialog">Modificar Datos</button>
            <button type="button" onclick="goBack()" class="btn btn-danger">Volver</button>
          </div>
        </div>
      </fieldset>
    </form>
  </div>
</div>
  <!-- Modal editar datos-->
  <div class="modal fade" id="updateDataConfirmDialog" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Editar tus datos</h4>
        </div>
        <div class="modal-body">
          <p>Confirme para finalizar la actualización  de sus datos</p>
          <input type="hidden" name="delIdUser" id="delIdUser">
        </div>
        <div class="modal-footer">
          <button onclick="updateUserSession()" type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
<?php include('footer.php'); ?>