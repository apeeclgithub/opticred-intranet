<?php include('header.php');?>
<?php include('nav_menu.php'); ?>
<?php include('userNav.php'); ?>
<script type="text/javascript">window.onload=nuevaVenta();</script>
<div class="contentMain">
  <legend>Nueva Venta</legend>
  <input type="hidden" name="addSaleStore" id="addSaleStore" <?php echo 'value="'.$_SESSION["user"]["store"].'"'; ?> />
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
      <label for="comment">Lejos D. Interp (N/M):</label>
      <input type="text" class="form-control" id="comment" >
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
  <div class="row">
   <div class="form-group col-xs-4">
     <label for="">Seleccione un marco:</label>
     <div id="productCerca"><?php require '../controller/ProductSelectCerca.php'; ?></div>  
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
      <div class="form-group col-xs-4">
        <label for="comment">Cerca D. Interp (N/M):</label>
        <input class="form-control" id="comment" >
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
    <div class="row">
      <div class="form-group col-xs-4">
       <label for="">Seleccione un marco:</label>
       <div id="productCerca"><?php require '../controller/ProductSelectLejos.php'; ?></div>  
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

 <legend>Montos</legend> 
  <div class="row">
    <div class="form-group col-xs-3">
     <label for="addSaleTotal">Total:</label>
     <input type="text" class="form-control" id="addSaleTotal" name="addSaleTotal" >  
   </div>
    <div class="form-group col-xs-4">
     <label for="addSaleAbono">Abono:</label>
     <input type="text" class="form-control" id="addSaleAbono" name="addSaleAbono" >  
   </div>
    <div class="form-group col-xs-3">
     <label for="addSaleSaldo">Saldo:</label>
     <input type="text" class="form-control" id="addSaleSaldo" name="addSaleSaldo" disabled="disabled" >  
   </div> 
  </div>

<legend>Datos Entrega</legend>
<div class="row">
  <div class="form-group col-xs-3">
   <label for="addSaleDateFinish">Fecha Entrega:</label>
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

<button type="button" class="btn btn-success" data-toggle="modal" data-target="#finalSailConfirmDialog">Finalizar Venta</button>
<button type="button" class="btn btn-danger">Limpiar</button>
<br><br><br> 
<!-- Modal confirmacion Venta-->
  <div class="modal fade" id="finalSailConfirmDialog" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Finalizar Venta</h4>
        </div>
        <div class="modal-body">
          <p>Confirme para finalizar la venta</p>
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