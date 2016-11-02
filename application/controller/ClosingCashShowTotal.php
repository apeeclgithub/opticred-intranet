<?php

        //require '../model/classClosingCash.php';
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