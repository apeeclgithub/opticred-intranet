<div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Valores Totales</h3>
        </div>
        <div id="showTotals">
          <?php

        require '../model/classClosingCash.php';
        $objClosingCashTotal = new ClosingCash();
        $objClosingCashTotal->buscarCierreShowTotal($_GET['fecha'],$_GET['tienda']);

        foreach ( (array) $objClosingCashTotal as $key ) {
          foreach ($key as $key2 => $value) {
            ?> 
			<div class="panel-body">
            <div class="row">
			<table id="vendedorTabla" class="table">
				<thead>
					<tr>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>EFECTIVO</td>
						<td><input type="number" class="form-control" id="sysCashMinusdiscount" value="<?php echo $value['EFECTIVO'];?>" disabled="disabled"></td>
					</tr>
					<tr>
						<td>TARJETA DE CREDITO</td>		
						<td><input type="number" class="form-control" id="showCardSysClosingCash" value="<?php echo $value['TARJETA'];?>" disabled="disabled"></td>
					</tr>
					<tr>
						<td>CHEQUE</td>		
						<td><input type="number" class="form-control" id="showDocsSysClosingCash" value="<?php echo $value['CHEQUE'];?>" disabled="disabled"></td>
					</tr>
					<tr class="danger">
						<td>TOTAL</td>		
						<td><input type="number" class="form-control" id="showTotalFinalSysClosingCash" value="<?php echo $value['CHEQUE']+$value['TARJETA']+$value['EFECTIVO'];?>" disabled="disabled"></td>
					</tr>
				</tbody>
			</table>
			</div></div>
            <?php
          }
          
        }
        ?>
        </div>
      </div>
    </div>