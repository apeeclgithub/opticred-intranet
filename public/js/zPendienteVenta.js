
function saveSale(){
	var test = 'update';
	if(document.getElementById('addSaleDateFinish').checked){
		test = 'final';
	}
	var params = {
        'addSalePayType'    : $('select[id=addSalePayType]').val(),
		'addSaleAbono2'     : $('input[id=addSaleAbono2]').val(),
		'finishDate'		: test,
		'id'				: $('input[id=pendId]').val()
    };
	if($('input[id=addSaleTotal]').val()==0){
		$.ajax({
			url : '../controller/Sale.php?action=4',
			type : 'post',
			data : params,
			dataType : 'json'
		}).done(function(data){
			if(data.success==true){
				alertify.set('notifier','position', 'top-right');
				alertify.success("Se ha guardado exitosamente los cambios.");
				setTimeout(function(){
					location.href='ventasPendientes.php';
				},3000);
			}else{
				alertify.set('notifier','position', 'top-right');
				alertify.error("No se pudo guardar los nuevos datos.");
			}
		});
	}else if($('select[id=addSalePayType]').val()==4 && $('input[id=addSaleSaldo2]').val()!=0){
		alertify.set('notifier','position', 'top-right');
		alertify.error("Debe ingresar un medio de pago");
	/*}else if($('input[id=addSaleAbono2]').val()==0){
		alertify.set('notifier','position', 'top-right');
		alertify.error("Debe ingresar un monto");*/
	}else if((document.getElementById('addSaleDateFinish').checked)&& $('input[id=addSaleSaldo2]').val()!=0){
		alertify.set('notifier','position', 'top-right');
		alertify.error("No se puede finalizar una venta con un monto pendiente");
	}else{
		$.ajax({
			url : '../controller/Sale.php?action=4',
			type : 'post',
			data : params,
			dataType : 'json'
		}).done(function(data){
			if(data.success==true){
				alertify.set('notifier','position', 'top-right');
				alertify.success("Se ha guardado exitosamente los cambios.");
				setTimeout(function(){
					location.href='ventasPendientes.php';
				},3000);
			}else{
				alertify.set('notifier','position', 'top-right');
				alertify.error("No se pudo guardar los nuevos datos.");
			}
		});
	}
};

function pendienteSaldo(){
    var total = $('input[id=addSaleTotal]').val();
    var abono1 = $('input[id=addSaleAbono]').val();
    var abono2 = $('input[id=addSaleAbono2]').val();
    $('input[id=addSaleSaldo2]').val(Number(total)-Number(abono1)-Number(abono2))
};

function finaliza(){
	if(document.getElementById('addSaleDateFinish').checked){
		if($('input[id=addSaleSaldo2]').val()==0){
			document.getElementById('test').innerHTML = 'Finalizar Venta';
		}
	}
};