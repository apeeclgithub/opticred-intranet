<?php

        //require '../model/classClosingCash.php';
        $objClosingCashTotal = new ClosingCash();
        $objClosingCashTotal->buscarCierreShowTotal();

        foreach ( (array) $objClosingCashTotal as $key ) {
          foreach ($key as $key2 => $value) {
            ?> 
			<div class="panel-body">
            <div class="row">
			<table id="vendedorTabla" class="table">
				<thead>
					<tr>
						<th></th>
						<th>SISTEMA</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>EFECTIVO</td>
						<input type="hidden" class="form-control" id="showCashSysClosingCashHidden" value="<?php echo $value['EFECTIVO'];?>">		
						<td></td>
					</tr>
					<tr>
						<td>TARJETA DE CREDITO</td>		
						<td><input type="number" class="form-control" id="showCardSysClosingCash" value="<?php echo $value['TARJETA'];?>" disabled="disabled"></td>
						<td></td>
					</tr>
					<tr>
						<td>CHEQUE</td>		
						<td><input type="number" class="form-control" id="showDocsSysClosingCash" value="<?php echo $value['CHEQUE'];?>" disabled="disabled"></td>
						<td></td>
					</tr>
					<tr class="danger">
						<td>TOTAL</td>		
						<td><input type="number" class="form-control" id="showTotalFinalSysClosingCash" disabled="disabled"></td>
					</tr>
				</tbody>
			</table>
			</div></div>
            <?php
          }
          
        }
        ?>