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
        'proNameProduct'  : $('input[id=proNameProduct]').val(),
        'proStoreProduct' : $('select[id=proStoreProduct]').val(),
        'proPriceProduct' : $('input[id=proPriceProduct]').val(),
        'proStockProduct' : $('input[id=proStockProduct]').val(),
    };
    if ($('input[id=proNameProduct]').val() === '') {
        alertify.error("Debe ingresar un nombre para el marco.");
    }else if($('select[id=proStoreProduct]').val() <= '0'){
        alertify.error("Debe seleccionar una tienda.");
    }else if($('input[id=proPriceProduct]').val() === ''){
        alertify.error("Debe ingresar un precio para el marco.");
    }else if($('input[id=proStockProduct]').val() === ''){
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
                $('input[id=proNameProduct]').val('');
                $('select[id=proStoreProduct]').val('');
                $('input[id=proPriceProduct]').val('');
                $('input[id=proStockProduct]').val('');
            }else{
                alertify.error("Marco ya existe.");
            }
        })
    };
};
