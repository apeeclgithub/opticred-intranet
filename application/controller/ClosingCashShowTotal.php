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
			<table id="vendedorTabla" class="table">
				<thead>
					<tr>
						<th></th>
						<th>SISTEMA</th>
						<th>REAL</th>
						<th>DIFERENCIA</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>EFECTIVO</td>		
						<td><input type="number" class="form-control" id="showCashSysClosingCash" value="<?php echo $value['EFECTIVO'];?>" disabled="disabled"></td>
						<td><input type="number" onkeyup="cuadrarCaja()" class="form-control" id="cashClosingCash"></td>
						<td></td>
					</tr>
					<tr>
						<td>TARJETA DE CREDITO</td>		
						<td><input type="number" class="form-control" id="showCashSysClosingCash" value="<?php echo $value['TARJETA'];?>" disabled="disabled"></td>
						<td><input type="number" onkeyup="cuadrarCaja()" class="form-control" id="cardClosingCash"></td>
						<td></td>
					</tr>
					<tr>
						<td>CHEQUE</td>		
						<td><input type="number" class="form-control" id="showCashSysClosingCash" value="<?php echo $value['CHEQUE'];?>" disabled="disabled"></td>
						<td><input type="number" onkeyup="cuadrarCaja()" class="form-control" id="docsClosingCash"></td>
						<td></td>
					</tr>
					<tr class="danger">
						<td>TOTAL</td>		
						<td><input type="number" class="form-control" id="showCashSysClosingCash" value="<?php echo $value['CHEQUE']+$value['TARJETA']+$value['EFECTIVO'];?>" disabled="disabled"></td>
						<td><input type="number" class="form-control" id="totalClosingCash"></td>
						<td><input type="number" class="form-control" id="showTotalFinalSysClosingCash" value="<?php echo $value['CHEQUE']+$value['TARJETA']+$value['EFECTIVO'];?>" disabled="disabled"></td>
					</tr>
				</tbody>
			</table>
			</div></div>
            <?php endif ?>
            <?php
          }
          
        }
        ?>
<script type="text/javascript" language="javascript">
	$(document).ready(function() {
		$('#vendedorTabla').DataTable({
			 "pagingType": 
		});
	} );
</script>