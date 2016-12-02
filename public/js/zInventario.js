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