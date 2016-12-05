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
						<input type="hidden" class="form-control" id="sysCashMinusdiscountBuscarCierre" value="<?php echo $value['EFECTIVO'];?>" >
						<td><input type="text" class="form-control" id="sumatoriaBuscarCierre" value="" disabled="disabled"></td>
					</tr>
					<tr>
						<td>TARJETA DE CREDITO</td>		
						<td><input type="number" class="form-control" id="showCardSysBuscarCierre" value="<?php echo $value['TARJETA'];?>" disabled="disabled"></td>
					</tr>
					<tr>
						<td>CHEQUE</td>		
						<td><input type="number" class="form-control" id="showDocsSysBuscarCierre" value="<?php echo $value['CHEQUE'];?>" disabled="disabled"></td>
					</tr>
					<tr class="danger">
						<td>TOTAL</td>		
						<td><input type="number" class="form-control" id="showTotalFinalSysBuscarCierre" value="<?php echo $value['CHEQUE']+$value['TARJETA']+$value['EFECTIVO'];?>" disabled="disabled"></td>
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
	<script type="text/javascript">window.onload=setTimeout(function(){
					totales();
				},500);</script>