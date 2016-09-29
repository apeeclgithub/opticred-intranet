<?php include('header.php');?>
<?php include('nav_menu.php'); ?>
<?php include('userNav.php'); ?>
<div class="contentMain">
  <legend>Venta Pendiente</legend>
  <p><h3><u>Si desea guardar los cambios debe presionar el botón Actualizar que se encuentra al final de la página</u></h3><p>
  <br><br>
  <div class="row">
    <div class="form-group col-xs-6">
      <label for="">N° Boleta</label>
      <input type="number" class="form-control" id="" disabled="disabled">
    </div>
    <div class="form-group col-xs-5">
      <label for="">Fecha</label>
      <input type="date" class="form-control" id="" >
    </div>
  </div>
  <div class="row">
    <div class="form-group col-xs-11">
     <label for="">Señor (a):</label>
     <input type="date" class="form-control" id="" >  
   </div>   
 </div>
 <div class="row">
  <div class="form-group col-xs-8">
   <label for="">Dirección:</label>
   <input type="text" class="form-control" id="" >  
 </div>   
 <div class="form-group col-xs-3">
   <label for="">Fono:</label>
   <input type="text" class="form-control" id="" >  
 </div>   
</div>  
<div class="row">
  <div class="form-group col-xs-6">
   <label for="">Ciudad:</label>
   <input type="text" class="form-control" id="" >  
 </div>   
 <div class="form-group col-xs-5">
  <label for="sel1">Vendedor:</label>
  <select class="form-control" id="sel1">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
  </select>
</div>   
</div> 
<div class="row">
  <div class="form-group col-xs-6">
   <label for="">N° Receta:</label>
   <input type="text" class="form-control" id="" >  
 </div>   
 <div class="form-group col-xs-5">
   <label for="">Doctor:</label>
   <input type="text" class="form-control" id="" >  
 </div>   
</div>
<legend>Armazones disponibles para venta</legend>
<div class=" col-xs-11">
  <div id="inventoryTableReload">
    <?php require '../controller/ProductTableSailPending.php'; ?>
  </div>
</div>
<legend>Armazones agregados a la venta</legend>
<div class=" col-xs-11">
  <div id="inventoryTableReload">
    <?php require '../controller/ProductTableSailPendingAdd.php'; ?>
  </div>
</div>
<legend>Lejos</legend>
<div class="row">
  <div class="form-group col-xs-5">
    <label for="comment">Lejos D. Interp (N/M):</label>
    <textarea class="form-control" rows="5" id="comment"></textarea>
  </div> 
  <div class="form-group col-xs-2">
   <label for="">Od. Esf:</label>
   <input type="text" class="form-control" id="" >  
 </div>
 <div class="form-group col-xs-2">
   <label for="">Cil:</label>
   <input type="text" class="form-control" id="" >  
 </div>
 <div class="form-group col-xs-2">
   <label for="">Eje:</label>
   <input type="text" class="form-control" id="" >  
 </div>
 <div class="form-group col-xs-2">
   <label for="">Od. Esf:</label>
   <input type="text" class="form-control" id="" >  
 </div>
 <div class="form-group col-xs-2">
   <label for="">Cil:</label>
   <input type="text" class="form-control" id="" >  
 </div>
 <div class="form-group col-xs-2">
   <label for="">Eje:</label>
   <input type="text" class="form-control" id="" >  
 </div>  
</div>
<legend>Cerca</legend>
<div class="row">
  <div class="form-group col-xs-5">
    <label for="comment">Cerca D. Interp (N/M):</label>
    <textarea class="form-control" rows="5" id="comment"></textarea>
  </div> 
  <div class="form-group col-xs-2">
   <label for="">Od. Esf:</label>
   <input type="text" class="form-control" id="" >  
 </div>
 <div class="form-group col-xs-2">
   <label for="">Cil:</label>
   <input type="text" class="form-control" id="" >  
 </div>
 <div class="form-group col-xs-2">
   <label for="">Eje:</label>
   <input type="text" class="form-control" id="" >  
 </div>
 <div class="form-group col-xs-2">
   <label for="">Od. Esf:</label>
   <input type="text" class="form-control" id="" >  
 </div>
 <div class="form-group col-xs-2">
   <label for="">Cil:</label>
   <input type="text" class="form-control" id="" >  
 </div>
 <div class="form-group col-xs-2">
   <label for="">Eje:</label>
   <input type="text" class="form-control" id="" >  
 </div>  
</div>
<legend>Monto</legend>
<div class="form-group col-xs-3">
     <label for="addSalePayType">Método de Pago:</label>
     <select onkeyup="" type="text" class="form-control" id="addSalePayType" name="addSalePayType" >  <option value="" disabled selected>Método de Pago</option>
       <option value="" >Efectivo</option>
       <option value="" >Tarjeta</option>
       <option value="" >Cheque</option>
     </select>
   </div>
<div class="row">
  <div class="form-group col-xs-3">
   <label for="">Total:</label>
   <input type="text" class="form-control" id="" >  
 </div>
</div>
<div class="row">
  <div class="form-group col-xs-3">
   <label for="">Abono:</label>
   <input type="text" class="form-control" id="" >  
 </div>
</div>
<div class="row">
  <div class="form-group col-xs-3">
   <label for="">Saldo:</label>
   <input type="text" class="form-control" id="" >  
 </div> 
</div>
<legend>Datos Entrega</legend>
<div class="row">
  <div class="form-group col-xs-8">
   <label for="">Fecha Entrega:</label>
   <input type="text" class="form-control" id="" >  
 </div>   
 <div class="form-group col-xs-3">
   <label for="">Hora:</label>
   <input type="text" class="form-control" id="" >  
 </div>   
</div>
<div class="row">
  <div class="form-group col-xs-8">
   <label for="">Tipo Cristal:</label>
   <input type="text" class="form-control" id="" >  
 </div>   
 <div class="form-group col-xs-3">
   <label for="">Altura:</label>
   <input type="text" class="form-control" id="" >  
 </div>   
</div> 
<div class="row">
  <div class="form-group col-xs-8">
   <label for="">Laboratorio:</label>
   <input type="text" class="form-control" id="" >  
 </div>   
 <div class="form-group col-xs-3">
   <label for="">N° Guía:</label>
   <input type="text" class="form-control" id="" >  
 </div>   
</div> 
<div class="row">
  <div class="form-group col-xs-11">
   <label for="">Empresa:</label>
   <input type="text" class="form-control" id="" >  
 </div>
</div>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateSailConfirmDialog">Actualizar</button>
<button type="button" class="btn btn-danger">Cancelar</button>
<br><br><br> 
</div>
  <!-- Modal confirmacion producto-->
  <div class="modal fade" id="updateSailConfirmDialog" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Actualizar Venta</h4>
        </div>
        <div class="modal-body">
          <p>Confirme para actualizar la venta</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success">Aceptar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
<?php include('footer.php'); ?>