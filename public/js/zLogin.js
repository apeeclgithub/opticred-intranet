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
                alertify.success("Se ha enviado e-mail asociado al rut con la contraseña correspondiente.");
            }else{
                alertify.set('notifier','position', 'top-right');
                alertify.error("Datos inválidos.");
            }
        })
};
// fin login