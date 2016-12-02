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
