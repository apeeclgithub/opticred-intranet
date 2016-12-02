function cargarAnula(id, tienda){
	$('input[id=anulaId]').val(id);
    $('input[id=anulaTienda]').val(tienda);
}

function anularVenta(){
    var params = {
        'id'   : $('input[id=anulaId]').val(),
        'tienda'     : $('input[id=anulaTienda]').val()
    };

	$.ajax({
		url : '../controller/Sale.php?action=6',
		type : 'post',
		data : params,
		dataType : 'json'
	}).done(function(data){
		if(data.success==true){
			alertify.set('notifier','position', 'top-right');
			alertify.success("Venta anulada.");
			setTimeout(function(){
				location.href='ventasPendientes.php';
			},3000);
		}else{
			alertify.set('notifier','position', 'top-right');
			alertify.error("Error al anular la venta.");
		}
	})
};