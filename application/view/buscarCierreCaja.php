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
  <input type="hidden" name="insStore" id="insStore" <?php echo 'value="'.$_SESSION["user"]["store"].'"'; ?> />
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
              <input type="date" class="form-control" id="searchDate">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-xs-4">
              <label for="">Tienda</label>
              <input type="text" class="form-control" id="searchStore">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Comisión Pagada a captador</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="form-group col-xs-11">
              <div id="captadorTablePaidOutReload">
                <?php require '../controller/BuscarCierreCaptadorPaid.php'; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Insumos de día</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="form-group col-xs-11">
              <label for="">Insumo</label><br>
              <div id="insumoTableReload">
                <?php require '../controller/BuscarCierreInsumoTableClosingCash.php'; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Cristales</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="form-group col-xs-4">
              <label for="">Total</label>
              <input type="number" class="form-control" id="cristalPay">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Valores Totales</h3>
        </div>
        <div id="showTotals">
          <?php require '../controller/ClosingCashShowTotal.php'; ?>
        </div>
      </div>
    </div>
<?php include('footer.php'); ?>