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
    <legend>Cierre Caja Anterior</legend>
    <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Ingrese información de cierre caja anterior</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="form-group col-xs-4">
              <label for="">Fecha</label>
              <input type="date" class="form-control" id="searchDate" name="searchDate" />
			  <input type="hidden" class="form-control" id="searchStore" name="searchStore" <?php echo 'value="'.$_SESSION["user"]["store"].'"'; ?> />
			  <button type="button" class="btn btn-success" onclick="buscarCierre()">Buscar</button>
			</div>
          </div>
        </div>
      </div>
    </div>
	
	<div id="BuscarCierreCaptadorPaid" class="row"></div>
	<div id="BuscarCierreInsumosClosingCash" class="row"></div>
	<div id="BuscarCierreShowTotals" class="row"></div>
	<div id="BuscarCierreTotales" class="row"></div>
	

<?php include('footer.php'); ?>
<script src="../../public/js/zCierreCaja.js"></script>