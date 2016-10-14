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
    <legend>Cierre Caja</legend>
    <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Pago de Comisión</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="form-group col-xs-6">
              <label for="">Captador</label>
              <select class="form-control" id="sel1">
                <option>Captador 1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
              </select>
            </div>
            <div class="form-group col-xs-3">
              <label for="">Monto</label>
              <input type="number" class="form-control" id="">
            </div>
            <div class="form-group col-xs-2">
              <br>
              <button type="button" class="btn btn-info">&nbsp;Aceptar</button>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-xs-11">
              <label for="">Captador</label><br>
              <div id="captadorTableReload">
                <?php require '../controller/CaptadorTablePay.php'; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Pago de Insumos</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="form-group col-xs-6">
              <label for="">Insumo</label><br>
              <label for="">NOMBRE insumo 1</label>
            </div>
            <div class="form-group col-xs-3">
              <label for="">Monto</label><br>
              <label for="">GRILLA Q SOLO MUESTRE LOS INSUMOS DEL DIA YA QUE LA PLATA FUE RETIRADA DE LA CAJA</label><br>
              <label for="">2313123213</label>
            </div>
            <div class="form-group col-xs-2">
              <br>
              <button onclick="" class="btn btn-danger" data-toggle="modal" data-target="#deleteCaptadorConfirmDialog"><span class="glyphicon glyphicon-remove"></span></button>
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
              <label for="">Total PONEN MANUAL EL MONTO</label>
              <input type="number" class="form-control" id="">
            </div>
            <div class="form-group col-xs-4"><br>
              <button type="button" class="btn btn-info">&nbsp;Pagar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
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
    <!-- Modal pagar captador -->
  <div class="modal fade" id="PayCaptadorConfirmDialog" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Pagar al Captador</h4>
        </div>
        <div class="modal-body">
          <p>Confirme para pagar el Captador</p>
          <input type="hidden" name="payIdCaptador" id="payIdCaptador">
          <input type="hidden" name="payTotalCaptador" id="payTotalCaptador">
        </div>
        <div class="modal-footer">
          <button onclick="" type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
  <?php include('footer.php'); ?>