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
