<?php

        //require '../model/classClosingCash.php';
        $objClosingCashTotal = new ClosingCash();
        $objClosingCashTotal->listClosingCash();

        foreach ( (array) $objClosingCashTotal as $key ) {
          foreach ($key as $key2 => $value) {
            ?> 
            <?php if ($_SESSION["user"]["store"] == $value['tienda']): ?>
            <div class="panel-body">
              <div class="row">
                <div class="form-group col-xs-4">
                  <label for="">Efectivo</label>
                  <input type="number" class="form-control" id="showCashSysClosingCash" value="<?php echo $value['EFECTIVO'];?>" disabled="disabled">
                </div>
                <div class="form-group col-xs-4">
                  <label for="">Tarjetas</label>
                  <input type="number" class="form-control" id="showCardSysClosingCash" value="<?php echo $value['TARJETA'];?>" disabled="disabled">
                </div>
                <div class="form-group col-xs-4">
                  <label for="">Cheque</label>
                  <input type="number" class="form-control" id="showDocsSysClosingCash" value="<?php echo $value['CHEQUE'];?>" disabled="disabled">
                </div>
                <div class="form-group col-xs-4">
                  <label for="">Total</label>
                  <input type="hidden" class="form-control" id="showTotalSysClosingCash" value="<?php echo $value['CHEQUE']+$value['TARJETA']+$value['EFECTIVO'];?>" disabled="disabled">
                  <input type="number" class="form-control" id="showTotalFinalSysClosingCash" value="<?php echo $value['CHEQUE']+$value['TARJETA']+$value['EFECTIVO'];?>" disabled="disabled">
                </div>
              </div>
            </div>
            <?php endif ?>
            <?php
          }
          
        }
        ?>