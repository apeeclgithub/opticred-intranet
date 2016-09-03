<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="../../public/js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
    	var dataChartSailsQtyByMonth = $.ajax({
    		url:'../controller/chartSailsQtyByMonth.php',
    		type:'post',
    		dataType:'json',
    		async:false    		
    	}).responseText;
    	
    	dataChartSailsQtyByMonth = JSON.parse(dataChartSailsQtyByMonth);
    	google.load("visualization", "0", {packages: ['corechart', 'bar']});
      	google.setOnLoadCallback(sailsQtyByMonth);
      
      	function sailsQtyByMonth() {
        	var data = google.visualization.arrayToDataTable(dataChartSailsQtyByMonth);

    var options = {
chartArea: {width: '50%'}, is3D: true, title: 'Monto ventas mensuales por tienda ($)',
    hAxis: {
      title: 'Monto($)',
      minValue: 0
    },
    vAxis: {
      title: 'Meses'
    }
    };


        	var chartSailsQtyByMonth = new google.visualization.BarChart(document.getElementById('chartSailsQtyByMonth'));
        	chartSailsQtyByMonth.draw(data, options);
      	}
	</script>
  </head>
  <body>
    <div class="pull-left" id="chartSailsQtyByMonth"></div>
  </body>
</html>