function drawChart() {

    var data = google.visualization.arrayToDataTable([
     ['Mês', 'Valor'],
     ['jan', 1000],
     ['Fev', 5000],
     ['Fev', 1500]
    ]);

    var options = {
      title: 'Faaturamento anual',
      curveType: 'function',
      legend: { position: 'bottom' }
    };

    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

    chart.draw(data, options);
  }