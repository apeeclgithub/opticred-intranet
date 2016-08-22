<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="../../public/js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
    	var dataChartSellerTotalSails = $.ajax({
    		url:'../controller/chartSellerTotalSails.php',
    		type:'post',
    		dataType:'json',
    		async:false    		
    	}).responseText;
    	
    	dataChartSellerTotalSails = JSON.parse(dataChartSellerTotalSails);
    	google.load("visualization", "0", {packages:["corechart"]});
      	google.setOnLoadCallback(sellerTotalSails);
      
      	function sellerTotalSails() {
        	var data = google.visualization.arrayToDataTable(dataChartSellerTotalSails);

        var options = {
          title: 'Ventas realizadas por captador',
          is3D: true,
        };


        	var chartSellerTotalSails = new google.visualization.PieChart(document.getElementById('chartSellerTotalSails'));
        	chartSellerTotalSails.draw(data, options);
      	}
	</script>
  </head>
  <body>
    <div class="pull-left" id="chartSellerTotalSails"></div>
  </body>
</html>