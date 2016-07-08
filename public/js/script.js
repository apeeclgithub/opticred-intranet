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
        'addStockProduct' : $('input[id=addStockProduct]').val()
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
                $("#inventoryTableReload").load('../controller/ProductTable.php');
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

function updateModalProduct(id, name, store, price, stock){
    $('input[id=editIdProduct]').val(id);
    $('input[id=editNameProduct]').val(name);
    $("select[id=editStoreProduct] option").prop('selected', false).filter(function() {
        return $(this).text() == store;
    }).prop('selected', true);
    $('input[id=editPriceProduct]').val(price);
    $('input[id=editStockProduct]').val(stock);
};

function deleteModalProduct(id){
    $('input[id=delIdProduct]').val(id);
};

function updateProduct(){
    var params = {
        'editIdProduct'    : $('input[id=editIdProduct]').val(),
        'editNameProduct'  : $('input[id=editNameProduct]').val(),
        'editStoreProduct' : $('select[id=editStoreProduct]').val(),
        'editPriceProduct' : $('input[id=editPriceProduct]').val(),
        'editStockProduct' : $('input[id=editStockProduct]').val()
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
                $("#inventoryTableReload").load('../controller/ProductTable.php');
                alertify.success("Marco modificado exitosamente.");
            }else{
                alertify.error("Marco ya existe.");
            }
        })
    };
};

function delProduct(){
    var params = {
        'delIdProduct'    : $('input[id=delIdProduct]').val()
    };
    if ($('input[id=delIdProduct]').val() === '') {
        alertify.error("No se selecciono ningun producto.");
    }else{
        $.ajax({
            url : '../controller/Product.php?action=3',
            type : 'post',
            data : params,
            dataType : 'json'
        }).done(function(data){
            if(data.success==true){
                $("#inventoryTableReload").load('../controller/ProductTable.php');
                alertify.error("Marco eliminado exitosamente.");
            }else{
                alertify.error("Marco no existe.");
            }
        })
    };
};

function addUser(){
    var params = {
        'addNameUser'     : $('input[id=addNameUser]').val(),
        'addMailUser'     : $('input[id=addMailUser]').val(),
        'addRutUser'      : $('input[id=addRutUser]').val(),
        'addPassUser'     : $('input[id=addPassUser]').val(),
        'addStoreUser'    : $('select[id=addStoreUser]').val()
    };
    if ($('input[id=addNameUser]').val() === '') {
        alertify.error("Debe ingresar un nombre para el vendedor.");
    }else if($('input[id=addMailUser]').val() === ''){
        alertify.error("Debe ingresar un email para el vendedor.");
    }else if($('input[id=addRutUser]').val() === ''){
        alertify.error("Debe ingresar un rut para el vendedor.");
    }else if($('input[id=addPassUser]').val() === ''){
        alertify.error("Debe ingresar una password para el vendedor.");
    }else if($('select[id=addStoreUser]').val() <= '0'){
        alertify.error("Debe seleccionar una tienda para el vendedor.");
    }else{
        $.ajax({
            url : '../controller/User.php?action=2',
            type : 'post',
            data : params,
            dataType : 'json'
        }).done(function(data){
            if(data.success==true){
                $("#userTableReload").load('../controller/UserTable.php');
                alertify.success("Vendedor agregado exitosamente.");
                $('input[id=addNameUser]').val('');
                $('input[id=addMailUser]').val('');
                $('input[id=addRutUser]').val('');
                $('input[id=addPassUser]').val('');
                $('select[id=addStoreUser]').val('');
            }else{
                alertify.error("Vendedor ya existe.");
            }
        })
    };
};

function updateModalUser(id, name, mail, rut, pass, store){
    $('input[id=editIdUser]').val(id);
    $('input[id=editNameUser]').val(name);
    $('input[id=editMailUser]').val(mail);
    $('input[id=editRutUser]').val(rut);
    $('input[id=editPassUser]').val(pass);
    $("select[id=editStoreUser] option").prop('selected', false).filter(function() {
        return $(this).text() == store;
    }).prop('selected', true); 
};

function deleteModalUser(id){
    $('input[id=delIdUser]').val(id);
};

function updateUser(){
    var params = {
        'editIdUser'    : $('input[id=editIdUser]').val(),
        'editNameUser'  : $('input[id=editNameUser]').val(),
        'editMailUser'  : $('input[id=editMailUser]').val(),
        'editRutUser' : $('input[id=editRutUser]').val(),
        'editPassUser' : $('input[id=editPassUser]').val(),
        'editStoreUser' : $('select[id=editStoreUser]').val()
    };
    if ($('input[id=editIdUser]').val() === '') {
        alertify.error("Error de id.");
    }else if($('input[id=editNameUser]').val() === ''){
        alertify.error("Debe ingresar un nombre para el vendedor.");
    }else if($('input[id=editMailUser]').val() === ''){
        alertify.error("Debe ingresar un email para el vendedor.");
    }else if($('input[id=editRutUser]').val() === ''){
        alertify.error("Debe ingresar un rut para el vendedor.");
    }else if($('input[id=editPassUser]').val() === ''){
        alertify.error("Debe ingresar una password para el vendedor.");
    }else if($('select[id=editStoreUser]').val() <= '0'){
        alertify.error("Debe seleccionar una tienda.");
    }else{
        $.ajax({
            url : '../controller/User.php?action=3',
            type : 'post',
            data : params,
            dataType : 'json'
        }).done(function(data){
            if(data.success==true){
                $("#userTableReload").load('../controller/UserTable.php');
                alertify.success("Vendedor modificado exitosamente.");
            }else{
                alertify.error("Vendedor ya existe.");
            }
        })
    };
};

function delUser(){
    var params = {
        'delIdUser'    : $('input[id=delIdUser]').val()
    };
    if ($('input[id=delIdUser]').val() === '') {
        alertify.error("No se selecciono ningun vendedor.");
    }else{
        $.ajax({
            url : '../controller/User.php?action=4',
            type : 'post',
            data : params,
            dataType : 'json'
        }).done(function(data){
            if(data.success==true){
                $("#userTableReload").load('../controller/UserTable.php');
                alertify.error("Vendedor eliminado exitosamente.");
            }else{
                alertify.error("Vendedor no existe.");
            }
        })
    };
};