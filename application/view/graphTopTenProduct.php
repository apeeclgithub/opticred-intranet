<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="../../public/js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
    	var datos = $.ajax({
    		url:'../controller/graphTopTenProduct.php',
    		type:'post',
    		dataType:'json',
    		async:false    		
    	}).responseText;
    	
    	datos = JSON.parse(datos);
    	google.load("visualization", "0", {packages:["corechart", "bar"]});
      	google.setOnLoadCallback(topTen);
      
      	function topTen() {
        	var data = google.visualization.arrayToDataTable(datos);

      var options = {
        title: 'Productos más vendidos',
        chartArea: {width: '50%'},
        hAxis: {
          title: 'Cantidad',
          minValue: 0
        },
        vAxis: {
          title: 'Productos'
        }
      };

        	var grafico = new google.visualization.BarChart(document.getElementById('grafica'));
        	grafico.draw(data, options);
      	}
	</script>
  </head>
  <body>
    <div id="grafica" style="width: 900px; height: 500px;"></div>
  </body>
</html>