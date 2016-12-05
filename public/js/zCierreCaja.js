function discountFromTotal(){
    var paidComission = $('input[id=showPaidOutReload]').val();
    var insumo = $('input[id=showInsumoTotalClosingCash]').val();
    var cristalPay = $('input[id=cristalPay]').val();
    var systemTotal = $('input[id=showTotalSysClosingCashHidden]').val();
    $('input[id=discountClosingCash]').val(Number(cristalPay)+Number(insumo)+Number(paidComission))
};

function cuadrarCaja(){

    var discountFromTotal = $('input[id=discountClosingCash]').val();
    var showCashSysClosingCashHidden = $('input[id=showCashSysClosingCashHidden]').val();
    $('input[id=sysCashMinusdiscount]').val(Number(showCashSysClosingCashHidden)-Number(discountFromTotal));

    var sysCashMinusdiscount = $('input[id=sysCashMinusdiscount]').val();
    var showCardSysClosingCash =  $('input[id=showCardSysClosingCash]').val();
    $('input[id=showTotalFinalSysClosingCash]').val(Number(sysCashMinusdiscount)+Number(showCardSysClosingCash));
    
    var cashClosingCash = $('input[id=cashClosingCash]').val();
    var cardClosingCash = $('input[id=cardClosingCash]').val();
    var docsClosingCash = $('input[id=docsClosingCash]').val();

    $('input[id=totalClosingCash]').val(Number(cashClosingCash)+Number(cardClosingCash)+Number(docsClosingCash));
    var showTotalFinalSysClosingCash = $('input[id=showTotalFinalSysClosingCash]').val();
    var totalClosingCash = $('input[id=totalClosingCash]').val();
    $('input[id=diffClosingCash]').val(Number(showTotalFinalSysClosingCash)-Number(totalClosingCash));
};

function dataCaptadorPay(id, name, total, pay){
    $('input[id=payIdCaptador]').val(id);
    $('input[id=payNameCaptador]').val(name);
    $('input[id=payComissionCaptador]').val(total);
    $('input[id=payTotalCaptador]').val(pay);
};

function insertPayComission(){
    var params = {
        'payTotalCaptador'  : $('input[id=payTotalCaptador]').val(),
        'payIdCaptador'    : $('input[id=payIdCaptador]').val()
    };
    if ($('input[id=payTotalCaptador]').val() === '') {
        alertify.set('notifier','position', 'top-right');
        alertify.error("Ingrese monto de comisión a pagar.");
    }else{
        $.ajax({
            url : '../controller/ClosingCash.php?action=1',
            type : 'post',
            data : params,
            dataType : 'json'
        }).done(function(data){
            if(data.success==true){
                $("#captadorTablePayReload").load('../controller/CaptadorTablePay.php');
                $("#captadorTablePaidOutReload").load('../controller/CaptadorTablePaidOut.php');
                $("#paidOutCommisionTotalReload").load('../controller/ClosingCashTotalPaidCommision.php');
                alertify.set('notifier','position', 'top-right');
                alertify.success("Comisión pagada.");
                $('input[id=payTotalCaptador]').val('');
            }else{
                alertify.set('notifier','position', 'top-right');
                alertify.error("Error al pagar comisión.");
            }
        })
    };
};

function dataToDeletePaidCaptador(id, name, paid){
    $('input[id=paidOutIdCaptador]').val(id);
    $('input[id=paidOutNameCaptador]').val(name);
    $('input[id=paidOutComissionCaptador]').val(paid);
};

function deletePaidOutComission(){
    var params = {
        'paidOutIdCaptador'    : $('input[id=paidOutIdCaptador]').val()
    };
        $.ajax({
            url : '../controller/ClosingCash.php?action=2',
            type : 'post',
            data : params,
            dataType : 'json'
        }).done(function(data){
            if(data.success==true){
                $("#captadorTablePayReload").load('../controller/CaptadorTablePay.php');
                $("#captadorTablePaidOutReload").load('../controller/CaptadorTablePaidOut.php');
                $("#paidOutCommisionTotalReload").load('../controller/ClosingCashTotalPaidCommision.php');
                alertify.set('notifier','position', 'top-right');
                alertify.success("Pago eliminado.");
            }else{
                alertify.set('notifier','position', 'top-right');
                alertify.error("Error al eliminar pago de comisión.");
            }
        })
};

function dataToCloseCash(totalClosingCash, diffTotal){
    $('input[id=criTotal]').val(totalClosingCash);
    $('input[id=diffTotal]').val(diffTotal);
};


function insertCrystal(){
    var params = {
        'criTotal'   : $('input[id=criTotal]').val(),
        'criTie'     : $('input[id=criTie]').val()
    };
    if ($('input[id=diffTotal]').val() != 0) {
        alertify.set('notifier','position', 'top-right');
        alertify.error("Existe una diferencia en el cierre de caja.");
    }else if($('input[id=criTotal]').val() === ''){
        alertify.set('notifier','position', 'top-right');
        alertify.error("Debe ingresar correctamente el total.");
    }else{
        $.ajax({
            url : '../controller/ClosingCash.php?action=3',
            type : 'post',
            data : params,
            dataType : 'json'
        }).done(function(data){
            if(data.success==true){
                alertify.set('notifier','position', 'top-right');
                alertify.success("Caja cerrada.");
                setTimeout(function(){
                    location.href='dashboard.php';
                },3000);
            }else{
                alertify.set('notifier','position', 'top-right');
                alertify.error("Error al cerrar caja.");
            }
        })
    };
};



function buscarCierre(){
	var fechas   		= $('input[id=searchDate]').val();
    var tiendas	    	= $('input[id=searchStore]').val();

	$("#BuscarCierreCaptadorPaid").load('../controller/BuscarCierreCaptadorPaid.php?fecha='.concat(fechas));
	$("#BuscarCierreInsumosClosingCash").load('../controller/BuscarCierreInsumosClosingCash.php?fecha='.concat(fechas).concat('&tienda=').concat(tiendas));
	$("#BuscarCierreCristal").load('../controller/BuscarCierreCristal.php?fecha='.concat(fechas).concat('&tienda=').concat(tiendas));
    $("#BuscarCierreTotales").load('../controller/BuscarCierreTotales.php?fecha='.concat(fechas).concat('&tienda=').concat(tiendas));

}

function totales(){
    var sysCashMinusdiscountBuscarCierre= $('input[id=sysCashMinusdiscountBuscarCierre]').val();
    var showCaptadorTotalBuscarCierre    = $('input[id=showCaptadorTotalBuscarCierre]').val();
    var showInsumosTotalBuscarCierre    = $('input[id=showInsumosTotalBuscarCierre]').val();
    var showCristalTotalBuscarCierre   = $('input[id=showCristalTotalBuscarCierre]').val();

    $('input[id=sumatoriaBuscarCierre]').val(Number(sysCashMinusdiscountBuscarCierre)-Number(showCaptadorTotalBuscarCierre)-Number(showInsumosTotalBuscarCierre)-Number(showCristalTotalBuscarCierre));
    var sumatoriaBuscarCierre = $('input[id=sumatoriaBuscarCierre]').val();
    var showCardSysBuscarCierre = $('input[id=showCardSysBuscarCierre]').val();
    var showDocsSysBuscarCierre = $('input[id=showDocsSysBuscarCierre]').val();
    $('input[id=showTotalFinalSysBuscarCierre]').val(Number(sumatoriaBuscarCierre)+Number(showCardSysBuscarCierre)+Number(showDocsSysBuscarCierre));
}