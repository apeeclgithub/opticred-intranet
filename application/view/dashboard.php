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
  <?php
	if($_SESSION['user']['type']==2){
		echo "<script>location.href='nuevaVenta.php';</script>";
	}
	?>
  <div class="contentMain">
    <legend>Dashboard</legend>
    <div class="row">
      <div class="form-group col-xs-6">
        <div class="panel panel-primary">
          <div class="panel-heading"><strong>Monto Diario Vendido por tienda $</strong></div>
          <div class="panel-body"><?php include('chartDailyAmountPerStore.php') ?></div>
        </div>
      </div>
      <div class="form-group col-xs-6">
        <div class="panel panel-primary">
          <div class="panel-heading"><strong>Monto Mes Actual por tienda $</strong></div>
          <div class="panel-body"><?php include('chartMonthAmountPerStore.php') ?></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-xs-6">
        <div class="panel panel-primary">
          <div class="panel-heading"><strong>N° Ventas del día</strong></div>
          <div class="panel-body"><?php include('chartSailsActualDay.php') ?></div>
        </div>
      </div>
      <div class="form-group col-xs-6">
        <div class="panel panel-primary">
          <div class="panel-heading"><strong>N° Ventas Mes Actual por tienda</strong></div>
          <div class="panel-body"><?php include('chartSailsActualMonth.php') ?></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-xs-6">
        <div class="panel panel-primary">
          <div class="panel-heading"><strong>Monto ventas mensuales por tienda ($)</strong></div>
          <div class="panel-body"><?php include('chartSailsQtyByMonth.php') ?></div>
        </div>
      </div>
      <div class="form-group col-xs-6">
        <div class="panel panel-primary">
          <div class="panel-heading"><strong>N° de ventas mensuales por tienda</strong></div>
          <div class="panel-body"><?php include('chartSailsCountByMonth.php') ?></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-xs-6">
        <div class="panel panel-primary">
          <div class="panel-heading"><strong>Productos más vendidos</strong></div>
          <div class="panel-body"><?php include('chartTopTenProduct.php') ?></div>
        </div>
      </div>
      <div class="form-group col-xs-6">
        <div class="panel panel-primary">
          <div class="panel-heading"><strong>Ventas realizadas por captador</strong></div>
          <div class="panel-body"><?php include('chartSellerTotalSails.php') ?></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-xs-6">
        <div class="panel panel-primary">
          <div class="panel-heading"><strong>Comisión ganada por captador</strong></div>
          <div class="panel-body"><?php include('chartSellerComission.php') ?></div>
        </div>
      </div>
      <div class="form-group col-xs-6">
        <div class="panel panel-primary">
          <div class="panel-heading"><strong>Monto Comisión por Pagar al Captador</strong></div>
          <div class="panel-body"><?php include('chartPendingCommission.php') ?></div>
        </div>
      </div>
    </div>
  </div>
  <?php include('footer.php'); ?>