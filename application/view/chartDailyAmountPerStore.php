<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="../../public/js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
    	var dataChartDailyAmountPerStore = $.ajax({
    		url:'../controller/chartDailyAmountPerStore.php',
    		type:'post',
    		dataType:'json',
    		async:false    		
    	}).responseText;
    	
    	dataChartDailyAmountPerStore = JSON.parse(dataChartDailyAmountPerStore);
    	google.load("visualization", "0", {packages:["corechart"]});
      	google.setOnLoadCallback(dailyAmountPerStore);
      
      	function dailyAmountPerStore() {
        	var data = google.visualization.arrayToDataTable(dataChartDailyAmountPerStore);

        var options = {
          title: 'Monto Diario vendido por tienda',
          is3D: true,
        };


        	var chartDailyAmountPerStore = new google.visualization.PieChart(document.getElementById('chartDailyAmountPerStore'));
        	chartDailyAmountPerStore.draw(data, options);
      	}
	</script>
  </head>
  <body>
    <div class="pull-left" id="chartDailyAmountPerStore"></div>
  </body>
</html>