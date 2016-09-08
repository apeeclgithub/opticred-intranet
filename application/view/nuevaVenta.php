<?php include('header.php');?>
<?php include('nav_menu.php'); ?>
<?php include('userNav.php'); ?>
<script type="text/javascript">window.onload=nuevaVenta();</script>
<div class="contentMain">
  <legend>Nueva Venta</legend>
  <div class="row">
    <div class="form-group col-xs-6">
      <label for="addSaleNumber">N° Boleta</label>
      <input type="text" class="form-control" id="addSaleNumber" name="addSaleNumber" disabled="disabled">
    </div>
    <div class="form-group col-xs-4">
      <label for="addSaleDate">Fecha</label>
      <input type="text" class="form-control" id="addSaleDate" name="addSaleDate" disabled="disabled" >
    </div>
  </div>
  <div class="row">
    <div class="form-group col-xs-7">
     <label for="">Señor (a):</label>
     <input type="text" class="form-control" id="" >  
   </div> 
   <div class="form-group col-xs-3">
     <label for="">Fono:</label>
     <input type="text" class="form-control" id="" >  
   </div>    
 </div>
<div class=" col-xs-11">

<?php var_dump($_SESSION['user'])?>

<legend>Armazones agregados a la venta</legend>

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
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#finalSailConfirmDialog">Finalizar Venta</button>
<button type="button" class="btn btn-danger">Limpiar</button>
<br><br><br> 

</div>
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
          <button type="button" class="btn btn-success">Aceptar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
<?php include('footer.php'); ?>