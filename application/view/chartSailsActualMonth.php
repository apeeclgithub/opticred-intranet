<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="../../public/js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
    	var dataChartSailsActualMonth = $.ajax({
    		url:'../controller/chartSailsActualMonth.php',
    		type:'post',
    		dataType:'json',
    		async:false    		
    	}).responseText;
    	
    	dataChartSailsActualMonth = JSON.parse(dataChartSailsActualMonth);
    	google.load("visualization", "0", {packages:["corechart"]});
      	google.setOnLoadCallback(sailsActualMonth);
      
      	function sailsActualMonth() {
        	var data = google.visualization.arrayToDataTable(dataChartSailsActualMonth);

        var options = {
          title: 'N° Ventas Mes Actual por tienda',
          is3D: true,
        };

        	var chartSailsActualMonth = new google.visualization.PieChart(document.getElementById('chartSailsActualMonth'));
        	chartSailsActualMonth.draw(data, options);
      	}
	</script>
  </head>
  <body>
    <div class="pull-left" id="chartSailsActualMonth"></div>
  </body>
</html>