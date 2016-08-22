<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="../../public/js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
    	var dataChartSellerComission = $.ajax({
    		url:'../controller/chartSellerComission.php',
    		type:'post',
    		dataType:'json',
    		async:false    		
    	}).responseText;
    	
    	dataChartSellerComission = JSON.parse(dataChartSellerComission);
    	google.load("visualization", "0", {packages:["corechart"]});
      	google.setOnLoadCallback(sellerComission);
      
      	function sellerComission() {
        	var data = google.visualization.arrayToDataTable(dataChartSellerComission);

        var options = {
          title: 'Comisión ganada por captador',
          is3D: true,
        }

        	var chartSellerComission = new google.visualization.PieChart(document.getElementById('chartSellerComission'));
        	chartSellerComission.draw(data, options);
      	}
	</script>
  </head>
  <body>
    <div class="pull-left" id="chartSellerComission"></div>
  </body>
</html>