<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

 var data = google.visualization.arrayToDataTable([
        ['Producto', 'Cantidad',],
        ['New York City, NY', 8175000],
        ['Los Angeles, CA', 3792000],
        ['Chicago, IL', 2695000],
        ['Houston, TX', 2099000],
        ['Philadelphia, PA', 1526000]
      ]);

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

      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
  </script>
</head>
<body>
<!-- Identify where the chart should be drawn. -->

  <div id="chart_div"></div>

</body>