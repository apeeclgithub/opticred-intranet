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
    <legend>Dashboard</legend>
    <div class="row">
      <div class="form-group col-xs-6">
        <div class="panel panel-primary">
          <div class="panel-heading"><strong>Monto Diario por tienda</strong></div>
          <div class="panel-body">Monto vendido por tienda</div>
          <div class="panel-body"><img src="../../public/img/chart.gif" class="img-responsive center-block"></div>
        </div>
      </div>
      <div class="form-group col-xs-6">
        <div class="panel panel-primary">
          <div class="panel-heading"><strong>Monto Mes Actual por tienda</strong></div>
          <div class="panel-body">Monto vendido por tienda</div>
          <div class="panel-body"><img src="../../public/img/barr.jpg" class="img-responsive center-block"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-xs-6">
        <div class="panel panel-primary">
          <div class="panel-heading"><strong>N° Ventas del día</strong></div>
          <div class="panel-body">Monto vendido por tienda</div>
          <div class="panel-body"><img src="../../public/img/chart.gif" class="img-responsive center-block"></div>
        </div>
      </div>
      <div class="form-group col-xs-6">
        <div class="panel panel-primary">
          <div class="panel-heading"><strong>N° Ventas Mes Actual</strong></div>
          <div class="panel-body">Monto vendido por tienda</div>
          <div class="panel-body"><img src="../../public/img/barr.jpg" class="img-responsive center-block"></div>
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
          <div class="panel-heading"><strong>Cantidad Ventas Mensuales por tienda</strong></div>
          <div class="panel-body"><img src="../../public/img/sales.gif" class="img-responsive center-block"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-xs-6">
        <div class="panel panel-primary">
          <div class="panel-heading"><strong>Ventas realizadas por captador</strong></div>
          <div class="panel-body"><?php include('chartSellerTotalSails.php') ?></div>
        </div>
      </div>
      <div class="form-group col-xs-6">
        <div class="panel panel-primary">
          <div class="panel-heading"><strong>Comisión ganada por captador</strong></div>
          <div class="panel-body"><?php include('chartSellerComission.php') ?></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-xs-6">
        <div class="panel panel-primary">
          <div class="panel-heading"><strong>Monto Comisión Pendiente Por Captador</strong></div>
          <div class="panel-body"><img src="../../public/img/barra.png" class="img-responsive center-block"></div>
        </div>
      </div>
    </div>
  </div>
  <?php include('footer.php') ?>