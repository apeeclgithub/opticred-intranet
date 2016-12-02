
function totales(){
    $('input[id=addSaleSaldo]').val($('input[id=addSaleTotal]').val()-$('input[id=addSaleAbono]').val());
}

function agregarVenta(){
    var params = {
        'addSaleNumber'    : $('input[id=addSaleNumber]').val(),
        'addSaleStore'     : $('input[id=addSaleStore]').val(),
        'addSaleClient'    : $('input[id=addSaleClient]').val(),
        'addSalePhono'     : $('input[id=addSalePhono]').val(),
		'addSaleId'		   : $('input[id=addSaleId]').val(),
		'addSaleTotal'     : $('input[id=addSaleTotal]').val(),
        'addSaleCristal'   : $('input[id=addSaleCristal]').val(),
        'addSaleAltura'    : $('input[id=addSaleAltura]').val(),
        'lejos_l_1'    : $('input[id=lejos_l_1]').val(),
        'lejos_o_1'    : $('input[id=lejos_o_1]').val(),
        'lejos_c_1'    : $('input[id=lejos_c_1]').val(),
        'lejos_e_1'    : $('input[id=lejos_e_1]').val(),
        'lejos_o_2'    : $('input[id=lejos_o_2]').val(),
        'lejos_c_2'    : $('input[id=lejos_c_2]').val(),
        'lejos_e_2'    : $('input[id=lejos_e_2]').val(),
        'cerca_l_1'    : $('input[id=cerca_l_1]').val(),
        'cerca_o_1'    : $('input[id=cerca_o_1]').val(),
        'cerca_c_1'    : $('input[id=cerca_c_1]').val(),
        'cerca_e_1'    : $('input[id=cerca_e_1]').val(),
        'cerca_o_2'    : $('input[id=cerca_o_2]').val(),
        'cerca_c_2'    : $('input[id=cerca_c_2]').val(),
        'cerca_e_2'    : $('input[id=cerca_e_2]').val(),
		'addSaleCap1'    : $('input[id=addSaleCap1]').val(),
        'addSaleCap2'    : $('input[id=addSaleCap2]').val(),
		'addSaleProductLejos'    : $('input[id=addSaleProductLejos]').val(),
		'addSaleProductCerca'    : $('input[id=addSaleProductCerca]').val(),
		'addSalePayType'    	 : $('select[id=addSalePayType]').val(),
        'addSaleAbono'    		 : $('input[id=addSaleAbono]').val(),
		'addSaleMontaje'    	 : $('input[id=addSaleMontaje]').val(),
		'addSaleVidrios'    	 : $('input[id=addSaleVidrios]').val()
    };
	if($('select[id=addSalePayType]').val()==4 && $('input[id=addSaleAbono]').val()!=0){
		alertify.set('notifier','position', 'top-right');
		alertify.error("Debe ingresar un medio de pago");
	}else if($('input[id=addSaleTotal]').val()==0){
		alertify.set('notifier','position', 'top-right');
		alertify.error("Debe ingresar un monto");
	/*}else if($('input[id=addSaleProductLejos]').val()=='' && $('input[id=addSaleProductCerca]').val()==''){
		alertify.set('notifier','position', 'top-right');
		alertify.error("Seleccione al menos un marco");*/
	}else if($('input[id=addSaleMontaje]').val()==0){
		alertify.set('notifier','position', 'top-right');
		alertify.error("Ingrese el valor del montaje.");
	}else{
		$.ajax({
			url : '../controller/Sale.php?action=2',
			type : 'post',
			data : params,
			dataType : 'json'
		}).done(function(data){
			if(data.success==true){
				alertify.set('notifier','position', 'top-right');
				alertify.success("Se ha generado la venta exitosamente.");
				setTimeout(function(){
					location.reload();
				},2000);
			}else{
				alertify.set('notifier','position', 'top-right');
				alertify.error("No se pudo concretar la venta.");
			}
		});
	}
    
};
