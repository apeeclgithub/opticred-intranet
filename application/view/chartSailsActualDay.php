<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="../../public/js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
    	var dataChartsailsActualDay = $.ajax({
    		url:'../controller/chartSailsActualDay.php',
    		type:'post',
    		dataType:'json',
    		async:false    		
    	}).responseText;
    	
    	dataChartsailsActualDay = JSON.parse(dataChartsailsActualDay);
    	google.load("visualization", "0", {packages:["corechart"]});
      	google.setOnLoadCallback(sailsActualDay);
      
      	function sailsActualDay() {
        	var data = google.visualization.arrayToDataTable(dataChartsailsActualDay);

        var options = {
          title: 'N° Ventas del día por tienda',
          is3D: true,
        };


        	var chartSailsActualDay = new google.visualization.PieChart(document.getElementById('chartSailsActualDay'));
        	chartSailsActualDay.draw(data, options);
      	}
	</script>
  </head>
  <body>
    <div class="pull-left" id="chartSailsActualDay"></div>
  </body>
</html>