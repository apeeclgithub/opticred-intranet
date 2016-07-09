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
  <legend>Cierre Caja</legend>
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Sistema</h3>
      </div>
      <div class="panel-body">
      <div class="row">
        <div class="form-group col-xs-4">
          <label for="">Efectivo</label>
          <input type="number" class="form-control" id="" disabled="disabled">
        </div>
        <div class="form-group col-xs-4">
          <label for="">Tarjetas</label>
          <input type="number" class="form-control" id="" disabled="disabled">
        </div>
        <div class="form-group col-xs-4">
          <label for="">Total</label>
          <input type="number" class="form-control" id="" disabled="disabled">
        </div>
      </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Real</h3>
      </div>
      <div class="panel-body">
      <div class="row">
        <div class="form-group col-xs-4">
          <label for="">Efectivo</label>
          <input type="number" class="form-control" id="">
        </div>
        <div class="form-group col-xs-4">
          <label for="">Tarjetas</label>
          <input type="number" class="form-control" id="">
        </div>
        <div class="form-group col-xs-4">
          <label for="">Total</label>
          <input type="number" class="form-control" id="">
        </div>
      </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Diferencia</h3>
      </div>
      <div class="panel-body">
      <div class="row">
        <div class="form-group col-xs-4">
          <input type="number" class="form-control" id="" disabled="disabled">
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
<?php include('footer.php') ?>