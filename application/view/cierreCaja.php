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
  <script type="text/javascript">
    $( function() {
    var availableTags = $.ajax({
        url:'../controller/Captador.php?action=4',
        type:'post',
        dataType:'json',
        async:false       
      }).responseText;
  $obj = JSON.parse(availableTags);
    $( "#closingCashPayCaptador" ).autocomplete({
      source: $obj
    });
  } );
  </script>
 
  <input type="hidden" name="insStore" id="insStore" <?php echo 'value="'.$_SESSION["user"]["store"].'"'; ?> />
  <div class="contentMain">
    <legend>Cierre Caja</legend>
    <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Pago de Comisión a captador</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="form-group col-xs-11">
              <div id="captadorTableReload">
                <?php require '../controller/CaptadorTablePay.php'; ?>
              </div>
            </div>
            <div class="form-group col-xs-4">
              <label for="">Total a pagar</label>
              <input type="number" class="form-control" id="inputPayCaptadorTotal">
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
                <?php require '../controller/InsumoTableClosingCash.php'; ?>
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
              <input type="number" onkeyup="discountCristal()" class="form-control" id="cristalPay">
            </div><!--
            <div class="form-group col-xs-4"><br>
              <button type="button" class="btn btn-info">&nbsp;Pagar</button>
            </div>-->
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Sistema</h3>
        </div>
        <?php

        require '../model/classClosingCash.php';
        $objClosingCash = new ClosingCash();
        $objClosingCash->listClosingCash();

        foreach ( (array) $objClosingCash as $key ) {
          foreach ($key as $key2 => $value) {
            ?> 
            <div class="panel-body">
              <div class="row">
                <div class="form-group col-xs-4">
                  <label for="">Efectivo</label>
                  <input type="number" class="form-control" id="showCashSysClosingCash" value="<?php echo $value['efectivo'];?>" disabled="disabled">
                </div>
                <div class="form-group col-xs-4">
                  <label for="">Tarjetas</label>
                  <input type="number" class="form-control" id="showCardSysClosingCash" value="<?php echo $value['tarjeta'];?>" disabled="disabled">
                </div>
                <div class="form-group col-xs-4">
                  <label for="">Cheque</label>
                  <input type="number" class="form-control" id="showDocsSysClosingCash" value="<?php echo $value['cheque'];?>" disabled="disabled">
                </div>
                <div class="form-group col-xs-4">
                  <label for="">Total</label>
                  <input type="hidden" class="form-control" id="showTotalSysClosingCash" value="<?php echo $value['cheque']+$value['tarjeta']+$value['efectivo'];?>" disabled="disabled">
                  <input type="number" class="form-control" id="showTotalFinalSysClosingCash" value="<?php echo $value['cheque']+$value['tarjeta']+$value['efectivo'];?>" disabled="disabled">
                </div>
              </div>
            </div>
            <?php
          }
        }
        ?>
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
              <input type="number" onkeyup="discountCristal();cuadrarCaja()" class="form-control" id="cashClosingCash">
            </div>
            <div class="form-group col-xs-4">
              <label for="">Tarjetas</label>
              <input type="number" onkeyup="discountCristal();cuadrarCaja()" class="form-control" id="cardClosingCash">
            </div>
            <div class="form-group col-xs-4">
              <label for="">Cheque</label>
              <input type="number" onkeyup="discountCristal();cuadrarCaja()" class="form-control" id="docsClosingCash">
            </div>
            <div class="form-group col-xs-4">
              <label for="">Total</label>
              <input type="number" class="form-control" id="totalClosingCash">
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
              <input type="number" class="form-control" id="diffClosingCash" disabled="disabled">
            </div>
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
        <button onclick="" type="button" class="btn btn-success" onclick="" data-dismiss="modal">Aceptar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<?php include('footer.php'); ?>