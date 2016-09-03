<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="../../public/js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
    	var dataChartSailsCountByMonth = $.ajax({
    		url:'../controller/chartSailsCountByMonth.php',
    		type:'post',
    		dataType:'json',
    		async:false    		
    	}).responseText;
    	
    	dataChartSailsCountByMonth = JSON.parse(dataChartSailsCountByMonth);
    	google.load("visualization", "0", {packages: ['corechart', 'bar']});
      	google.setOnLoadCallback(sailsCountByMonth);
      
      	function sailsCountByMonth() {
        	var data = google.visualization.arrayToDataTable(dataChartSailsCountByMonth);

    var options = {
chartArea: {width: '50%'}, is3D: true, title: 'N° de ventas mensuales por tienda',
    hAxis: {
      title: 'N° de ventas)',
      minValue: 0
    },
    vAxis: {
      title: 'Meses'
    }
    };


        	var chartSailsCountByMonth = new google.visualization.BarChart(document.getElementById('chartSailsCountByMonth'));
        	chartSailsCountByMonth.draw(data, options);
      	}
	</script>
  </head>
  <body>
    <div class="pull-left" id="chartSailsCountByMonth"></div>
  </body>
</html>