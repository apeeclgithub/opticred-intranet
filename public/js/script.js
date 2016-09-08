//login
Date.prototype.toString = function() { return this.getFullYear()+"-"+(this.getMonth()+1)+"-"+this.getDate(); }

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
           location.href=data.main;          
        }else{
            alertify.set('notifier','position', 'top-right');
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
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe ingresar un nombre para el marco.");
    }else if($('select[id=addStoreProduct]').val() <= '0'){
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe seleccionar una tienda.");
    }else if($('input[id=addPriceProduct]').val() === ''){
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe ingresar un precio para el marco.");
    }else if($('input[id=addStockProduct]').val() === ''){
        alertify.set('notifier','position', 'top-right');
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
                alertify.set('notifier','position', 'top-right');
                alertify.success("Marco agregado exitosamente.");
                $('input[id=addNameProduct]').val('');
                $('select[id=addStoreProduct]').val('');
                $('input[id=addPriceProduct]').val('');
                $('input[id=addStockProduct]').val('');
            }else{
                alertify.set('notifier','position', 'top-right');
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
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe ingresar un nombre para el marco.");
    }else if($('select[id=editStoreProduct]').val() <= '0'){
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe seleccionar una tienda.");
    }else if($('input[id=editPriceProduct]').val() === ''){
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe ingresar un precio para el marco.");
    }else if($('input[id=editStockProduct]').val() === ''){
        alertify.set('notifier','position', 'top-right');
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
                alertify.set('notifier','position', 'top-right');
                alertify.success("Marco modificado exitosamente.");
            }else{
                alertify.set('notifier','position', 'top-right');
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
        alertify.set('notifier','position', 'top-right');
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
                alertify.set('notifier','position', 'top-right');
                alertify.error("Marco eliminado exitosamente.");
            }else{
                alertify.set('notifier','position', 'top-right');
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
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe ingresar un nombre para el vendedor.");
    }else if($('input[id=addMailUser]').val() === ''){
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe ingresar un email para el vendedor.");
    }else if($('input[id=addRutUser]').val() === ''){
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe ingresar un rut para el vendedor.");
    }else if($('input[id=addPassUser]').val() === ''){
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe ingresar una password para el vendedor.");
    }else if($('select[id=addStoreUser]').val() <= '0'){
        alertify.set('notifier','position', 'top-right');
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
                alertify.set('notifier','position', 'top-right');
                alertify.success("Vendedor agregado exitosamente.");
                $('input[id=addNameUser]').val('');
                $('input[id=addMailUser]').val('');
                $('input[id=addRutUser]').val('');
                $('input[id=addPassUser]').val('');
                $('select[id=addStoreUser]').val('');
            }else{
                alertify.set('notifier','position', 'top-right');
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
        alertify.set('notifier','position', 'top-right');
        alertify.error("Error de id.");
    }else if($('input[id=editNameUser]').val() === ''){
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe ingresar un nombre para el vendedor.");
    }else if($('input[id=editMailUser]').val() === ''){
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe ingresar un email para el vendedor.");
    }else if($('input[id=editRutUser]').val() === ''){
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe ingresar un rut para el vendedor.");
    }else if($('input[id=editPassUser]').val() === ''){
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe ingresar una password para el vendedor.");
    }else if($('select[id=editStoreUser]').val() <= '0'){
        alertify.set('notifier','position', 'top-right');
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
                alertify.set('notifier','position', 'top-right');
                alertify.success("Vendedor modificado exitosamente.");
            }else{
                alertify.set('notifier','position', 'top-right');
                alertify.error("Vendedor ya existe.");
            }
        })
    };
};

function updateUserSession(){
    var params = {
        'editIdUserSession'    : $('input[id=editIdUserSession]').val(),
        'editNameUserSession'  : $('input[id=editNameUserSession]').val(),
        'editMailUserSession'  : $('input[id=editMailUserSession]').val(),
        'editRutUserSession'   : $('input[id=editRutUserSession]').val(),
        'editPassUserSession'  : $('input[id=editPassUserSession]').val(),
        'editStoreUserSession' : $('input[id=editStoreUserSession]').val()
    };
    if ($('input[id=editNameUserSession]').val() === ''){
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe ingresar un nombre.");
    }else if($('input[id=editMailUserSession]').val() === ''){
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe ingresar un email.");
    }else if($('input[id=editRutUserSession]').val() === ''){
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe ingresar un rut.");
    }else if($('input[id=editPassUserSession]').val() === ''){
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe ingresar una password.");
    }else{
        $.ajax({
            url : '../controller/User.php?action=5',
            type : 'post',
            data : params,
            dataType : 'json'
        }).done(function(data){
            if(data.success==true){
                alertify.set('notifier','position', 'top-right');
                alertify.success("Datos modificados correctamente.");
            }else{
                alertify.set('notifier','position', 'top-right');
                alertify.error("Datos no modificados.");
            }
        })
    };
};

function delUser(){
    var params = {
        'delIdUser'    : $('input[id=delIdUser]').val()
    };
    if ($('input[id=delIdUser]').val() === '') {
        alertify.set('notifier','position', 'top-right');
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
                alertify.set('notifier','position', 'top-right');
                alertify.error("Vendedor eliminado exitosamente.");
            }else{
                alertify.set('notifier','position', 'top-right');
                alertify.error("Vendedor no existe.");
            }
        })
    };
};

function addCaptador(){
    var params = {
        'addNameCaptador'      : $('input[id=addNameCaptador]').val(),
        'addPhoneCaptador'     : $('input[id=addPhoneCaptador]').val()
    };
    if ($('input[id=addNameCaptador]').val() === '') {
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe ingresar un nombre para el captador.");
    }else if($('input[id=addPhoneCaptador]').val() === ''){
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe ingresar un teléfono para el captador.");
    }else{
        $.ajax({
            url : '../controller/Captador.php?action=1',
            type : 'post',
            data : params,
            dataType : 'json'
        }).done(function(data){
            if(data.success==true){
                $("#captadorTableReload").load('../controller/CaptadorTable.php');
                alertify.set('notifier','position', 'top-right');
                alertify.success("Captador agregado exitosamente.");
                $('input[id=addNameCaptador]').val('');
                $('input[id=addPhoneCaptador]').val('');
            }else{
                alertify.set('notifier','position', 'top-right');
                alertify.error("Captador ya existe.");
            }
        })
    };
};

function updateModalCaptador(id, name, phone){
    $('input[id=editIdCaptador]').val(id);
    $('input[id=editNameCaptador]').val(name);
    $('input[id=editPhoneCaptador]').val(phone);
};

function deleteModalCaptador(id, total){
    $('input[id=delIdCaptador]').val(id);
    $('input[id=delTotalCaptador]').val(total);
};

function updateCaptador(){
    var params = {
        'editIdCaptador'    : $('input[id=editIdCaptador]').val(),
        'editNameCaptador'  : $('input[id=editNameCaptador]').val(),
        'editPhoneCaptador'  : $('input[id=editPhoneCaptador]').val()
    };
    if ($('input[id=editIdCaptador]').val() === '') {
        alertify.set('notifier','position', 'top-right');
        alertify.error("Error de id.");
    }else if($('input[id=editNameCaptador]').val() === ''){
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe ingresar un nombre para el captador.");
    }else if($('input[id=editPhoneCaptador]').val() === ''){
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe ingresar un teléfono para el captador.");
    }else{
        $.ajax({
            url : '../controller/Captador.php?action=2',
            type : 'post',
            data : params,
            dataType : 'json'
        }).done(function(data){
            if(data.success==true){
                $("#captadorTableReload").load('../controller/CaptadorTable.php');
                alertify.set('notifier','position', 'top-right');
                alertify.success("Captador modificado exitosamente.");
            }else{
                alertify.set('notifier','position', 'top-right');
                alertify.error("Captador ya existe.");
            }
        })
    };
};

function delCaptador(){
    var params = {
        'delIdCaptador'    : $('input[id=delIdCaptador]').val()
    };
    if ($('input[id=delIdCaptador]').val() === '') {
        alertify.set('notifier','position', 'top-right');
        alertify.error("No se selecciono ningun captador.");
    }else if($('input[id=delTotalCaptador]').val() > 0){
        alertify.set('notifier','position', 'top-right');
        alertify.error("Imposible eliminar captador, presenta comisiones impagas.");
    }else{
        $.ajax({
            url : '../controller/Captador.php?action=3',
            type : 'post',
            data : params,
            dataType : 'json'
        }).done(function(data){
            if(data.success==true){
                $("#captadorTableReload").load('../controller/CaptadorTable.php');
                alertify.set('notifier','position', 'top-right');
                alertify.error("Captador eliminado exitosamente.");
            }else{
                alertify.set('notifier','position', 'top-right');
                alertify.error("Captador no existe.");
            }
        })
    };
};

function addInsumo(){
    var params = {
        'addNameInsumo'  : $('input[id=addNameInsumo]').val(),
        'addDetailInsumo' : $('textarea[id=addDetailInsumo]').val(),
        'addStoreInsumo' : $('select[id=addStoreInsumo]').val(),   
        'addPriceInsumo' : $('input[id=addPriceInsumo]').val(),
        'addDateInsumo' : new Date()
    };
    if ($('input[id=addNameInsumo]').val() === '') {
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe ingresar un nombre para el insumo.");
    }else if($('select[id=addStoreInsumo]').val() <= '0'){
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe seleccionar una tienda.");
    }else if($('textarea[id=addDetailInsumo]').val() === ''){
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe ingresar un detalle para el insumo.");
    }else if($('input[id=addPriceInsumo]').val() === ''){
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe ingresar el precio del insumo.");
    }else{
        $.ajax({
            url : '../controller/Insumo.php?action=1',
            type : 'post',
            data : params,
            dataType : 'json'
        }).done(function(data){
            if(data.success==true){
                $("#insumoTableReload").load('../controller/InsumoTable.php');
                alertify.set('notifier','position', 'top-right');
                alertify.success("Insumo agregado exitosamente.");
                $('input[id=addNameInsumo]').val('');
                $('select[id=addStoreInsumo]').val('');
                $('textarea[id=addDetailInsumo]').val('');
                $('input[id=addPriceInsumo]').val('');
            }else{
                alertify.set('notifier','position', 'top-right');
                alertify.error("Error al agregar el insumo.");
            }
        })
    };
};

function updateModalInsumo(id, name, desc, store, total){
    $('input[id=editIdInsumo]').val(id);
    $('input[id=editNameInsumo]').val(name);
    $('textarea[id=editDescInsumo]').val(desc);
    $("select[id=editStoreInsumo] option").prop('selected', false).filter(function() {
        return $(this).text() == store;
    }).prop('selected', true); 
    $('input[id=editTotalInsumo]').val(id);
};

function deleteModalInsumo(id){
    $('input[id=delIdInsumo]').val(id);
};

function updateInsumo(){
    var params = {
        'editIdInsumo'    : $('input[id=editIdInsumo]').val(),
        'editNameInsumo'  : $('input[id=editNameInsumo]').val(),
        'editDescInsumo'  : $('textarea[id=editDescInsumo]').val(),
        'editStoreInsumo'  : $('select[id=editStoreInsumo]').val(),
        'editTotalInsumo'  : $('input[id=editTotalInsumo]').val()
    };
    if ($('input[id=editIdInsumo]').val() === '') {
        alertify.set('notifier','position', 'top-right');
        alertify.error("Error de id.");
    }else if($('input[id=editNameInsumo]').val() === ''){
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe ingresar un nombre para el insumo.");
    }else if($('select[id=editStoreInsumo]').val() <= '0'){
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe seleccionar una tienda.");
    }else if($('input[id=editTotalInsumo]').val() === ''){
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe ingresar un valor para el insumo.");
    }else{
        $.ajax({
            url : '../controller/Insumo.php?action=2',
            type : 'post',
            data : params,
            dataType : 'json'
        }).done(function(data){
            if(data.success==true){
                $("#insumoTableReload").load('../controller/InsumoTable.php');
                alertify.set('notifier','position', 'top-right');
                alertify.success("Insumo modificado exitosamente.");
            }else{
                alertify.set('notifier','position', 'top-right');
                alertify.error("Insumo no modificado.");
            }
        })
    };
};

function delInsumo(){
    var params = {
        'delIdInsumo'    : $('input[id=delIdInsumo]').val()
    };
    if ($('input[id=delIdInsumo]').val() === '') {
        alertify.set('notifier','position', 'top-right');
        alertify.error("No se selecciono ningun insumo.");
    }else{
        $.ajax({
            url : '../controller/Insumo.php?action=3',
            type : 'post',
            data : params,
            dataType : 'json'
        }).done(function(data){
            if(data.success==true){
                $("#insumoTableReload").load('../controller/InsumoTable.php');
                alertify.set('notifier','position', 'top-right');
                alertify.error("Insumo eliminado exitosamente.");
            }else{
                alertify.set('notifier','position', 'top-right');
                alertify.error("Insumo no existe.");
            }
        })
    };
};

function cambiarTienda(tienda){
    var params = {
        'tienda'    : (tienda == 'Quinto')? 'Tercero' : 'Quinto'
    };
    $.ajax({
            url : '../controller/User.php?action=6',
            type : 'post',
            data : params,
            dataType : 'json'
        }).done(function(data){
            if(data.success==true){
                $("#reloadNav").load('../view/userNav.php');
                alertify.set('notifier','position', 'top-right');
                alertify.error("Cambio de tienda realizado con exito.");
            }else{
                alertify.set('notifier','position', 'top-right');
                alertify.error("No se pudo realizar el cambio de tienda.");
            }
        })

        setTimeout(function(){
            location.reload();
        },2000);
};

function nuevaVenta(){
    $.ajax({
            url : '../controller/Sale.php?action=1',
            type : 'post',
            dataType : 'json'
        }).done(function(data){
            $('input[id=addSaleNumber]').val(data.number);
            $('input[id=addSaleDate]').val(data.date);
        }
    );
};

function goBack() {
    window.history.back();
};

function recoverPasword(){
    var params = {
        'rutRecover'    : $('input[id=rutRecover]').val()
    };
        $.ajax({
            url : '../controller/User.php?action=7',
            type : 'post',
            data : params,
            dataType : 'json'
        }).done(function(data){
            if(data.success==true){
                alertify.set('notifier','position', 'top-right');
                alertify.error("Se ha enviado e-mail con la contraseña.");
            }else{
                alertify.set('notifier','position', 'top-right');
                alertify.error("Rut inválido.");
            }
        })
    };
