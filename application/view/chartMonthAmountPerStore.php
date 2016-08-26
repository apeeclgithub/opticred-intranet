<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="../../public/js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
    	var dataChartMonthAmountPerStore = $.ajax({
    		url:'../controller/chartMonthAmountPerStore.php',
    		type:'post',
    		dataType:'json',
    		async:false    		
    	}).responseText;
    	
    	dataChartMonthAmountPerStore = JSON.parse(dataChartMonthAmountPerStore);
    	google.load("visualization", "0", {packages:["corechart"]});
      	google.setOnLoadCallback(monthAmountPerStore);
      
      	function monthAmountPerStore() {
        	var data = google.visualization.arrayToDataTable(dataChartMonthAmountPerStore);

        var options = {
          title: 'Monto Mes Actual por tienda',
          is3D: true,
        };


        	var chartMonthAmountPerStore = new google.visualization.PieChart(document.getElementById('chartMonthAmountPerStore'));
        	chartMonthAmountPerStore.draw(data, options);
      	}
	</script>
  </head>
  <body>
    <div class="pull-left" id="chartMonthAmountPerStore"></div>
  </body>
</html>