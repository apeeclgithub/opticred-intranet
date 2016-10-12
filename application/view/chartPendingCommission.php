<html>
<head>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script src="../../public/js/jquery-2.2.4.min.js"></script>
  <script type="text/javascript">
  var dataChartPendingCommission = $.ajax({
    url:'../controller/chartPendingCommission.php',
    type:'post',
    dataType:'json',
    async:false    		
  }).responseText;
  
  dataChartPendingCommission = JSON.parse(dataChartPendingCommission);
  google.load("visualization", "0", {packages:["corechart", "bar"]});
  google.setOnLoadCallback(pendingCommission);
  
  function pendingCommission() {
   var data = google.visualization.arrayToDataTable(dataChartPendingCommission);

   var options = {
    title: 'Comisión pendiente por Captador',
    chartArea: {width: '50%'},
    hAxis: {
      title: 'Monto',
      minValue: 0
    },
    vAxis: {
      title: 'Captador'
    }
  };

  var chartPendingCommission = new google.visualization.BarChart(document.getElementById('chartPendingCommission'));
  chartPendingCommission.draw(data, options);
}
</script>
</head>
<body>
  <div class="pull-left" id="chartPendingCommission"></div>
</body>
</html>