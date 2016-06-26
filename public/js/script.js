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
           location.href="insumos.php";
        }else{
            alertify.error('Datos erroneos.');
            $('input[id=userRut]').val('');
            $('input[id=userPass]').val('');
        }
    })
}