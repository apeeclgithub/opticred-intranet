
Date.prototype.toString = function() { return this.getFullYear()+"-"+(this.getMonth()+1)+"-"+this.getDate(); }

function cambiarTienda(tienda){
    var params = {
        'tienda'    : tienda
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

function goBack() {
    window.history.back();
};

function nuevaVenta(){
    $.ajax({
            url : '../controller/Sale.php?action=1',
            type : 'post',
            dataType : 'json'
        }).done(function(data){
            $('input[id=addSaleNumber]').val(data.number);
            $('input[id=addSaleDateCreate]').val(data.date);
            $('input[id=addSaleTotal]').val(0);
            $('input[id=addSaleAbono]').val(0);
            $('input[id=addSaleSaldo]').val(0);
        }
    );
};
function pendienteVenta(id){
	$.ajax({
		url : '../controller/Sale.php?action=3&id='.concat(id),
		type : 'post',
		dataType : 'json'
	}).always(function(data){
		$('input[id=addSaleNumber]').val(data.correlative);
		$('input[id=addSaleDateCreate]').val(data.date + " " + data.hour);
		$('input[id=addSaleClient]').val(data.name);
		$('input[id=addSalePhono]').val(data.phone);
		$('input[id=addSaleTotal]').val(data.total);
		$('input[id=lejos_l_1]').val(data.Linterp);
		$('input[id=lejos_o_1]').val(data.Lod1);
		$('input[id=lejos_c_1]').val(data.Lcli1);
		$('input[id=lejos_e_1]').val(data.Leje1);
		$('input[id=lejos_o_2]').val(data.Lod2);
		$('input[id=lejos_c_2]').val(data.Lcli2);
		$('input[id=lejos_e_2]').val(data.Leje2);
		$('input[id=addSaleProductLejos]').val(data.Lname);
		$('input[id=cerca_l_1]').val(data.Cinterp);
		$('input[id=cerca_o_1]').val(data.Cod1);
		$('input[id=cerca_c_1]').val(data.Ccli1);
		$('input[id=cerca_e_1]').val(data.Ceje1);
		$('input[id=cerca_o_2]').val(data.Cod2);
		$('input[id=cerca_c_2]').val(data.Ccli2);
		$('input[id=cerca_e_2]').val(data.Ceje2);
		$('input[id=addSaleProductcerca]').val(data.Cname);
		$('input[id=addSaleCristal]').val(data.cristal);
		$('input[id=addSaleAltura]').val(data.altura);
		$('input[id=addSaleCap1]').val(data.cap[0]);
		$('input[id=addSaleCap2]').val(data.cap[1]);
		$('input[id=addSaleAbono]').val(data.abono);
		$('input[id=addSaleSaldo2]').val(data.total - data.abono);
		$('input[id=addSaleDateFinish]').val(data.finish);
		$("#abonos").load('../controller/abonos.php?id='.concat(id));
		if((data.total - data.abono)==0){
			document.getElementById("addSaleAbono2").disabled = true;
			document.getElementById("addSalePayType").disabled = true;
		}
	});
};