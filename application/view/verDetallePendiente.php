<?php include('header.php');?>
<?php include('nav_menu.php'); ?>
<?php include('userNav.php'); ?>
<script type="text/javascript">window.onload=pendienteVenta($('input[id=pendId]').val());</script>
<div class="contentMain">
  <legend>Nueva Venta</legend>
  <input type="text" name="pendId" id="pendId" <?php echo 'value="'.$_GET["id"].'"'; ?> />
  <div class="row">
    <div class="form-group col-xs-6">
      <label for="addSaleNumber">N° Boleta</label>
      <input type="text" class="form-control" id="addSaleNumber" name="addSaleNumber" disabled="disabled">
    </div>
    <div class="form-group col-xs-4">
      <label for="addSaleDateCreate">Fecha</label>
      <input type="text" class="form-control" id="addSaleDateCreate" name="addSaleDateCreate" disabled="disabled" >
    </div>
  </div>
  <div class="row">
    <div class="form-group col-xs-7">
     <label for="addSaleClient">Señor (a):</label>
     <input id="addSaleClient" name="addSaleClient" type="text" class="form-control" >  
   </div> 
   <div class="form-group col-xs-3">
     <label for="addSalePhono">Fono:</label>
     <input type="text" class="form-control" id="addSalePhono" name="addSalePhono" >  
   </div>    
 </div>

 <legend>Lejos</legend>
  <div class="row">
    <div class="form-group col-xs-4">
      <label for="lejos_l_1">Lejos D. Interp (N/M):</label>
      <input type="text" class="form-control" id="lejos_l_1" name="lejos_l_1" >
    </div> 
    <div class="form-group col-xs-2">
     <label for="lejos_o_1">Od. Esf:</label>
     <input type="text" class="form-control" id="lejos_o_1" name="lejos_o_1" >  
   </div>
   <div class="form-group col-xs-2">
     <label for="lejos_c_1">Cil:</label>
     <input type="text" class="form-control" id="lejos_c_1" name="lejos_c_1" >  
   </div>
   <div class="form-group col-xs-2">
     <label for="lejos_e_1">Eje:</label>
     <input type="text" class="form-control" id="lejos_e_1" name="lejos_e_1" >  
   </div>
  </div>
  <div class="row">
   <div class="form-group col-xs-4">
     <label for="addSaleProductLejos">Seleccione un marco:</label>
     <div class="ui-widget"><input type="text" class="form-control" id="addSaleProductLejos" name="addSaleProductLejos"></div>
   </div>
   <div class="form-group col-xs-2">
     <label for="lejos_o_2">Od. Esf:</label>
     <input type="text" class="form-control" id="lejos_o_2" name="lejos_o_2" >  
   </div>
   <div class="form-group col-xs-2">
     <label for="lejos_c_2">Cil:</label>
     <input type="text" class="form-control" id="lejos_c_2" name="lejos_c_2" >  
   </div>
   <div class="form-group col-xs-2">
     <label for="lejos_e_2">Eje:</label>
     <input type="text" class="form-control" id="lejos_e_2" name="lejos_e_2" >  
   </div>  
  </div>
  <legend>Cerca</legend>
    <div class="row">
      <div class="form-group col-xs-4">
        <label for="cerca_l_1">Cerca D. Interp (N/M):</label>
        <input class="form-control" id="cerca_l_1" name="cerca_l_1" >
      </div> 
      <div class="form-group col-xs-2">
       <label for="cerca_o_1">Od. Esf:</label>
       <input type="text" class="form-control" id="cerca_o_1" name="cerca_o_1" >  
     </div>
     <div class="form-group col-xs-2">
       <label for="cerca_c_1">Cil:</label>
       <input type="text" class="form-control" id="cerca_c_1" name="cerca_c_1" >  
     </div>
     <div class="form-group col-xs-2">
       <label for="cerca_e_1">Eje:</label>
       <input type="text" class="form-control" id="cerca_e_1" name="cerca_e_1" >  
     </div>
    </div>
    <div class="row">
      <div class="form-group col-xs-4">
     <label for="addSaleProductCerca">Seleccione un marco:</label>
     <div class="ui-widget"><input type="text" class="form-control" id="addSaleProductCerca" name="addSaleProductCerca"></div>
   </div>
     <div class="form-group col-xs-2">
       <label for="cerca_o_2">Od. Esf:</label>
       <input type="text" class="form-control" id="cerca_o_2" name="cerca_o_2">  
     </div>
     <div class="form-group col-xs-2">
       <label for="cerca_c_2">Cil:</label>
       <input type="text" class="form-control" id="cerca_c_2" name="cerca_c_2" >  
     </div>
     <div class="form-group col-xs-2">
       <label for="cerca_e_2">Eje:</label>
       <input type="text" class="form-control" id="cerca_e_2" name="cerca_e_2" >  
     </div>  
    </div>

 <legend>Montos</legend> 
  <div class="row">
    <div class="form-group col-xs-3">
     <label for="addSalePayType">Método de Pago:</label>
     <select type="text" class="form-control" id="addSalePayType" name="addSalePayType">  
		<option value="4" disabled selected>Método de Pago</option>
       <option value="1">Efectivo</option>
       <option value="2">Tarjeta</option>
       <option value="3">Cheque</option>
     </select>
   </div>
    <div class="form-group col-xs-3">
     <label for="addSaleTotal">Total:</label>
     <input onkeyup="totales()" type="text" class="form-control" id="addSaleTotal" name="addSaleTotal" >  
   </div>
    <div class="form-group col-xs-2">
     <label for="addSaleAbono">Abono:</label>
     <input onkeyup="totales()" type="text" class="form-control" id="addSaleAbono" name="addSaleAbono" >  
   </div>
    <div class="form-group col-xs-2">
     <label for="addSaleSaldo">Saldo:</label>
     <input type="text" class="form-control" id="addSaleSaldo" name="addSaleSaldo" disabled="disabled" >  
   </div> 
  </div>

<legend>Datos Entrega</legend>
<div class="row">
  <div class="form-group col-xs-3">
   <label for="addSaleDateFinish">Realizar Entrega: <input type="checkbox" id="addSaleDateFinish" name="addSaleDateFinish" ></label>
   <input type="text" class="form-control" id="addSaleDateFinish" name="addSaleDateFinish" disabled="disabled" >  
  </div>  
  <div class="form-group col-xs-4">
   <label for="addSaleCristal">Tipo Cristal:</label>
   <input type="text" class="form-control" id="addSaleCristal" name="addSaleCristal" >  
 </div> 
 <div class="form-group col-xs-3">
   <label for="addSaleAltura">Altura:</label>
   <input type="text" class="form-control" id="addSaleAltura" name="addSaleAltura" >  
 </div>
 </div>  
 <legend>Captador/es</legend>
 <div class="row">
   <div class="form-group col-xs-3">
   <label for="addSaleCap1">Captador 1</label>
   <input type="text" class="form-control" id="addSaleCap1" name="addSaleCap1" >  
  </div> 
  <div class="form-group col-xs-3">
   <label for="addSaleCap2">Captador 2</label>
   <input type="text" class="form-control" id="addSaleCap2" name="addSaleCap2" >  
  </div> 
 </div>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#finalSailConfirmDialog">Ingresar Venta</button>
<button type="button" class="btn btn-danger">Limpiar</button>
<br><br><br> 
<!-- Modal confirmacion Venta-->
  <div class="modal fade" id="finalSailConfirmDialog" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ingresar Venta</h4>
        </div>
        <div class="modal-body">
          <p>Confirme para ingresar la venta</p>
        </div>
        <div class="modal-footer">
          <button onclick="agregarVenta()" type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('footer.php'); ?>