<html>
<head>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script src="../../public/js/jquery-2.2.4.min.js"></script>
  <script type="text/javascript">
  var dataChartTopTen = $.ajax({
    url:'../controller/chartTopTenProduct.php',
    type:'post',
    dataType:'json',
    async:false    		
  }).responseText;
  
  dataChartTopTen = JSON.parse(dataChartTopTen);
  google.load("visualization", "0", {packages:["corechart", "bar"]});
  google.setOnLoadCallback(topTen);
  
  function topTen() {
   var data = google.visualization.arrayToDataTable(dataChartTopTen);

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

  var chartTopTen = new google.visualization.BarChart(document.getElementById('chartTopTen'));
  chartTopTen.draw(data, options);
}
</script>
</head>
<body>
  <div class="pull-left" id="chartTopTen"></div>
</body>
</html>