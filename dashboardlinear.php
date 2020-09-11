<?php

include_once('autentica.php');
include_once('connect.php');

$sql = "select month(dat_exec) AS mes , year(dat_exec) as ano, sum(valor_total) as total, sum(vcust_peca) as cpec,
sum(valor_pecas) as vpec FROM servicos where year(dat_exec) = year(now()) group by mes,ano order by ano,mes;";
$resultado = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Mês/ano', 'Total', 'Custo peças', 'Total peças'],
          <?php while ($dados = $resultado->fetch_array()) { ?>
          ['<?php echo $dados['mes'].'/'.$dados['ano'];?>',<?php echo $dados['total'];?>,<?php echo $dados['cpec'];?>,<?php echo $dados['vpec'];?>],
          <?php } ?> 
        ]);

        var options = {
          title: 'Faturamento anual',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
   
    <div id="curve_chart" style="width: auto; height: 500px"></div>
  </body>
</html>