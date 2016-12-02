function addInsumo(){
    var params = {
        'addNameInsumo'  : $('input[id=addNameInsumo]').val(),
        'addDetailInsumo' : $('textarea[id=addDetailInsumo]').val(),
        'addStoreInsumo' : $('input[id=addStoreInsumo]').val(),   
        'addPriceInsumo' : $('input[id=addPriceInsumo]').val(),
        'addDateInsumo' : new Date()
    };
    if ($('input[id=addNameInsumo]').val() === '') {
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe ingresar un nombre para el insumo.");
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
    $('input[id=editTotalInsumo]').val(total);
};

function deleteModalInsumo(id){
    $('input[id=delIdInsumo]').val(id);
};

function updateInsumo(){
    var params = {
        'editIdInsumo'    : $('input[id=editIdInsumo]').val(),
        'editNameInsumo'  : $('input[id=editNameInsumo]').val(),
        'editDescInsumo'  : $('textarea[id=editDescInsumo]').val(),
        'editTotalInsumo'  : $('input[id=editTotalInsumo]').val()
    };
    if ($('input[id=editIdInsumo]').val() === '') {
        alertify.set('notifier','position', 'top-right');
        alertify.error("Error de id.");
    }else if($('input[id=editNameInsumo]').val() === ''){
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe ingresar un nombre para el insumo.");
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
