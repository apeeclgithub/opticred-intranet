<?php

  //require '../model/classClosingCash.php';
  $objClosingCash = new ClosingCash();
  $objClosingCash->totalPaidOutCommision();

  foreach ( (array) $objClosingCash as $key ) {
    foreach ($key as $key2 => $value) {
      ?> 
      <div class="form-group col-xs-4">
        <label for="">Comisión Total a pagar</label>
        <input type="number" class="form-control" id="showPaidOutReload" disabled="disabled" value="<?php echo $value['PAG_CAP'];?>">
      </div>
      <?php
    }
  }
?>