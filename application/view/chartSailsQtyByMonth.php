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
    	google.load("visualization", "1", {packages:["columnchart"]});
      	google.setOnLoadCallback(sailsQtyByMonth);
      
      	function sailsQtyByMonth() {
        	var data = google.visualization.arrayToDataTable(dataChartSailsQtyByMonth);

    var options = {
width: 600, height: 300, is3D: true, title: 'Cantidad de ventas Mensualmente',
hAxis: {title: 'MESES'},
        vAxis: {title: 'CANTIDAD'}
    };


        	var chartSailsQtyByMonth = new google.visualization.ColumnChart(document.getElementById('chartSailsQtyByMonth'));
        	chartSailsQtyByMonth.draw(data, options);
      	}
	</script>
  </head>
  <body>
    <div class="pull-left" id="chartSailsQtyByMonth"></div>
  </body>
</html>