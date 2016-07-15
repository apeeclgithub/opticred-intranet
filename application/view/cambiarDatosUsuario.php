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
          <label class="col-md-4 control-label" for="addNameUser">Modificar Nombre</label>  
          <div class="col-md-4">
            <input name="addNameUser" id="addNameUser" type="text" placeholder="Nombre del vendedor" class="form-control input-md" >
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="addMailUser">Modificar E-Mail</label>  
          <div class="col-md-4">
            <input name="addMailUser" id="addMailUser" type="text" placeholder="vendedor@opticred.cl" class="form-control input-md" >
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="addRutUser">Modificar Rut</label>  
          <div class="col-md-4">
            <input name="addRutUser" id="addRutUser" type="text" placeholder="Rut del vendedor" class="form-control input-md" >
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="addPassUser">Modificar Password</label>  
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
            <button type="button" id="button1id" name="button1id" class="btn btn-success" data-toggle="modal" data-target="#addVendedorConfirmDialog">Modificar Datos</button>
            <button type="button" class="btn btn-danger">Volver</button>
          </div>
        </div>
      </fieldset>
    </form>
  </div>
</div>
<?php include('footer.php') ?>