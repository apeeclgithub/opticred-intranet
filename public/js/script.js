//login

$(document).ready(function() {
  $('#olvidado').click(function(e) {
    e.preventDefault();
    $('div#form-olvidado1').toggle('500');
  });
  $('#olvidado').click(function(e) {
    e.preventDefault();
    $('div#form-olvidado').toggle('500');
  });
  $('#acceso1').click(function(e) {
    e.preventDefault();
    $('div#form-olvidado').toggle('500');
  });
  $('#acceso1').click(function(e) {
    e.preventDefault();
    $('div#form-olvidado1').toggle('500');
  });
});
// fin login

function login(){
    var params = {
      'userRut'     : $('input[id=userRut]').val(),
      'userPass'    : $('input[id=userPass]').val()
    };
    $.ajax({
        url         : '../controller/User.php?action=1',
        type        : 'post',
        data        : params,
        dataType    : 'json'
    }).done(function(data){
        if(data.success==true){
           location.href="main.php";
        }else{
            alertify.error('Datos erroneos.');
            $('input[id=userPass]').val('');
        }
    })
}

function addProduct(){
    var params = {
        'addNameProduct'  : $('input[id=addNameProduct]').val(),
        'addStoreProduct' : $('select[id=addStoreProduct]').val(),
        'addPriceProduct' : $('input[id=addPriceProduct]').val(),
        'addStockProduct' : $('input[id=addStockProduct]').val(),
    };
    if ($('input[id=addNameProduct]').val() === '') {
        alertify.error("Debe ingresar un nombre para el marco.");
    }else if($('select[id=addStoreProduct]').val() <= '0'){
        alertify.error("Debe seleccionar una tienda.");
    }else if($('input[id=addPriceProduct]').val() === ''){
        alertify.error("Debe ingresar un precio para el marco.");
    }else if($('input[id=addStockProduct]').val() === ''){
        alertify.error("Debe ingresar la cantidad de marcos.");
    }else{
        $.ajax({
            url : '../controller/Product.php?action=1',
            type : 'post',
            data : params,
            dataType : 'json'
        }).done(function(data){
            if(data.success==true){
                $("#inventoryTableReload").load('../controller/ProductInventory.php');
                alertify.success("Marco agregado exitosamente.");
                $('input[id=addNameProduct]').val('');
                $('select[id=addStoreProduct]').val('');
                $('input[id=addPriceProduct]').val('');
                $('input[id=addStockProduct]').val('');
            }else{
                alertify.error("Marco ya existe.");
            }
        })
    };
};

function loadModalProduct(id, name, store, price, stock){
    $('input[id=editIdProduct]').val(id);
    $('input[id=editNameProduct]').val(name);
    $("select[id=editStoreProduct] option").prop('selected', false).filter(function() {
        return $(this).text() == store;
    }).prop('selected', true);
    $('input[id=editPriceProduct]').val(price);
    $('input[id=editStockProduct]').val(stock);
};

function updateProduct(){
    var params = {
        'editIdProduct'    : $('input[id=editIdProduct]').val(),
        'editNameProduct'  : $('input[id=editNameProduct]').val(),
        'editStoreProduct' : $('select[id=editStoreProduct]').val(),
        'editPriceProduct' : $('input[id=editPriceProduct]').val(),
        'editStockProduct' : $('input[id=editStockProduct]').val(),
    };
    if ($('input[id=editNameProduct]').val() === '') {
        alertify.error("Debe ingresar un nombre para el marco.");
    }else if($('select[id=editStoreProduct]').val() <= '0'){
        alertify.error("Debe seleccionar una tienda.");
    }else if($('input[id=editPriceProduct]').val() === ''){
        alertify.error("Debe ingresar un precio para el marco.");
    }else if($('input[id=editStockProduct]').val() === ''){
        alertify.error("Debe ingresar la cantidad de marcos.");
    }else{
        $.ajax({
            url : '../controller/Product.php?action=2',
            type : 'post',
            data : params,
            dataType : 'json'
        }).done(function(data){
            if(data.success==true){
                $("#inventoryTableReload").load('../controller/ProductInventory.php');
                alertify.success("Marco modificado exitosamente.");
            }else{
                alertify.error("Marco ya existe.");
            }
        })
    };
};