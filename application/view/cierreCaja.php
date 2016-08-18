<?php include('header.php');?>
<?php include('nav_menu.php') ?>
<?php include('userNav.php') ?>
<!-- Fixed navbar -->
	<!--   <div class="stickNav">  <div class="btn-group stickNavButton" role="group">
    <button type="button" class="btn btn-default dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Dropdown
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
      <li><a href="#">Dropdown link</a></li>
      <li><a href="#">Dropdown link</a></li>
    </ul>
  </div></div>-->
  <div class="contentMain">
    <legend>Cierre Caja</legend>
    <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Pago de Comisión</h3>
        </div>
        <div class="panel-body">
          <button type="button" class="btn btn-info " data-toggle="modal" data-target="#addPayCommissionDialog"><span class="glyphicon glyphicon-usd"></span>&nbsp;Agregar Pago de Comisión</button>
          <br><br>
          <div class="row">
            <div class="form-group col-xs-4">
              <label for="">Total</label>
              <input type="number" class="form-control" id="" disabled="disabled">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Pago de Insumos</h3>
        </div>
        <div class="panel-body">
          <button type="button" class="btn btn-info " data-toggle="modal" data-target="#addPaySupplyDialog"><span class="glyphicon glyphicon-usd"></span>&nbsp;Agregar Pago de Insumo</button>
          <br><br>
          <div class="row">
            <div class="form-group col-xs-4">
              <label for="">Total</label>
              <input type="number" class="form-control" id="" disabled="disabled">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Sistema</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="form-group col-xs-4">
              <label for="">Efectivo</label>
              <input type="number" class="form-control" id="" disabled="disabled">
            </div>
            <div class="form-group col-xs-4">
              <label for="">Tarjetas</label>
              <input type="number" class="form-control" id="" disabled="disabled">
            </div>
            <div class="form-group col-xs-4">
              <label for="">Total</label>
              <input type="number" class="form-control" id="" disabled="disabled">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Real</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="form-group col-xs-4">
              <label for="">Efectivo</label>
              <input type="number" class="form-control" id="">
            </div>
            <div class="form-group col-xs-4">
              <label for="">Tarjetas</label>
              <input type="number" class="form-control" id="">
            </div>
            <div class="form-group col-xs-4">
              <label for="">Total</label>
              <input type="number" class="form-control" id="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Diferencia</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="form-group col-xs-4">
              <input type="number" class="form-control" id="" disabled="disabled">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal agregar pago insumo-->
  <div class="modal fade indexPaySupplyDialog" id="addPaySupplyDialog" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog widthPaySupplyDialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Pagar insumo</h4>
        </div>
        <div class="modal-body">
          <div>
            <table id="tablaInsumos" class="table table-striped table-bordered tableWidth" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Insumo</th>
                  <th>Tienda</th>
                  <th>Detalle</th>
                  <th>Fecha</th>
                  <th>Monto</th>
                  <th>Monto a pagar</th>
                  <th class="widthOptions text-center">Acción</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>System Architectaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                  <th>Fecha</th>
                  <td>61</td>
                  <th><input type="number" class="form-control" id=""></th>
                  <td class="text-center"><button class="btn btn-info btn-xs"><span class="glyphicon glyphicon-usd"></span>&nbsp;Pagar Insumo</button></td>
                </tr>
                <tr>
                  <td>Garrett Winters</td>
                  <td>Accountant</td>
                  <td>System Architect</td>
                  <th>Fecha</th>
                  <td>63</td>
                  <th><input type="number" class="form-control" id=""></th>
                  <td class="text-center"><button class="btn btn-info btn-xs"><span class="glyphicon glyphicon-usd"></span>&nbsp;Pagar Insumo</button></td>
                </tr>
                <tr>
                  <td>Ashton Cox</td>
                  <td>Junior Technical Author</td>
                  <td>System Architect</td>
                  <th>Fecha</th>
                  <td>66</td>
                  <th><input type="number" class="form-control" id=""></th>
                  <td class="text-center"><button class="btn btn-info btn-xs"><span class="glyphicon glyphicon-usd"></span>&nbsp;Pagar Insumo</button></td>
                </tr>
                <tr>
                  <td>Cedric Kelly</td>
                  <td>Senior Javascript Developer</td>
                  <td>System Architect</td>
                  <th>Fecha</th>
                  <td>22</td>
                  <th><input type="number" class="form-control" id=""></th>
                  <td class="text-center"><button class="btn btn-info btn-xs"><span class="glyphicon glyphicon-usd"></span>&nbsp;Pagar Insumo</button></td>
                </tr>
                <tr>
                  <td>Airi Satou</td>
                  <td>Accountant</td>
                  <td>System Architect</td>   
                  <th>Fecha</th>
                  <td>33</td>
                  <th><input type="number" class="form-control" id=""></th>
                  <td class="text-center"><button class="btn btn-info btn-xs"><span class="glyphicon glyphicon-usd"></span>&nbsp;Pagar Insumo</button></td>
                </tr>
              </tbody>
            </table>

          </div>
          <!-- Modal confirmar pago de insumo
          <div class="modal fade" id="paySupplyConfirmDialog" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Pagar insumo</h4>
                </div>
                <div class="modal-body">
                  <p>Confirme para pagar el insumo</p>
                  <input type="hidden" name="delIdProduct" id="delIdProduct">
                </div>
                <div class="modal-footer">
                  <button onclick="delProduct()" type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
              </div>
            </div>
          </div>-->
        </div><br><br>
        <div class="form-group col-xs-4">
          <label for="">Total</label>
          <input type="number" class="form-control" id="" disabled="disabled">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal agregar pago Comision-->
  <div class="modal fade indexPaySupplyDialog" id="addPayCommissionDialog" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog widthPaySupplyDialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Pagar Comisión</h4>
        </div>
        <div class="modal-body">
          <div>
            <div id="captadorTableReload">
              <?php require '../controller/CaptadorTablePay.php'; ?>
            </div>
          </div>
          <!-- Modal confirmar pago de comision
          <div class="modal fade" id="paySupplyConfirmDialog" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Pagar insumo</h4>
                </div>
                <div class="modal-body">
                  <p>Confirme para pagar la Comisión</p>
                  <input type="hidden" name="delIdProduct" id="delIdProduct">
                </div>
                <div class="modal-footer">
                  <button onclick="delProduct()" type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
              </div>
            </div>
          </div>-->
        </div>
        <br><br>
        <div class="form-group col-xs-4">
          <label for="">Total</label>
          <input type="number" class="form-control" id="" disabled="disabled">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
  <?php include('footer.php') ?>