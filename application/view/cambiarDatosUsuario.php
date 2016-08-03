<?php include('header.php');?>
<?php include('nav_menu.php') ?>
<?php include('userNav.php') ?>
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
    <form class="form-horizontal">
      <fieldset class="addProductFormWidth">
        <!-- Form Name -->
        <legend>Modifica tus datos</legend>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="editNameUser">Modificar Nombre</label>  
          <div class="col-md-4">
            <input name="editNameUser" id="editNameUser" type="text" placeholder="Nombre del vendedor" class="form-control input-md" ><?php echo $_SESSION['user']['name']?></input>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="editMailUser">Modificar E-Mail</label>  
          <div class="col-md-4">
            <input name="editMailUser" id="editMailUser" type="text" placeholder="vendedor@opticred.cl" class="form-control input-md" ><?php echo $_SESSION['user']['mail']?>
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="editRutUser">Modificar Rut</label>  <?php echo $_SESSION['user']['rut']?>
          <div class="col-md-4">
            <input name="editRutUser" id="editRutUser" type="text" placeholder="Rut del vendedor" class="form-control input-md" >
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="editPassUser">Modificar Password</label>  <?php echo $_SESSION['user']['pass']?>
          <div class="col-md-4">
            <input name="editPassUser" id="editPassUser" type="text" placeholder="Password del vendedor" class="form-control input-md" >
          </div>
        </div>
        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="editStoreUser">Seleccione Tienda</label>
          <div class="col-md-4">
            <select id="editStoreUser" name="editStoreUser" class="form-control" disabled="disabled">
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
            <button  type="button" id="button1id" name="button1id" class="btn btn-success" data-toggle="modal" data-target="#updateDataConfirmDialog">Modificar Datos</button>
            <button type="button" class="btn btn-danger">Volver</button>
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
          <button onclick="updateUser()" type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
<?php include('footer.php') ?>